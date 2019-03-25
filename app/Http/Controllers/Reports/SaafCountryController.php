<?php

namespace App\Http\Controllers\Reports;

use App\Saaf\Contact;
use App\Saaf\Classes;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

ini_set('max_execution_time', 120);
ini_set('memory_limit', '2048M');
ini_set('system_temp_dir', '/Applications/XAMPP/xamppfiles/temp/');

class SaafCountryController extends Controller
{
  static $ALL_SUBS = [];
  public function __constructor() {
    
  }

  public function get_all_subs ($id) {
    if(!$id) exit;
    $filters = self::get_sub_filters($id);
    foreach(self::accessProtected($filters, 'items') as $key => $value) { 
      if($value->saafclass_id && !is_null($value->saafclass_id)) {
        self::$ALL_SUBS[$value->saafclass_id] = $value->saafclass;
        // get children
        self::get_all_subs ($value->saafclass_id);
      }
    }

    return self::$ALL_SUBS;
  }
  public function get_sub_filters ($id) {
    return Classes::where('saafclass_parent_id', '=', $id)->paginate();
  }

  public function get_country ($id) {
    return Country::where('country_id', '=', $id)->paginate();
  }

  public function get_type ($id) {
    return Classes::where('saafclass_id', '=', $id)->first();
  }

  /** https://stackoverflow.com/questions/20334355/how-to-get-protected-property-of-object-in-php 8\**/
  function accessProtected($obj, $prop) {
    $reflection = new \ReflectionClass($obj);
    $property = $reflection->getProperty($prop);
    $property->setAccessible(true);
    return $property->getValue($obj);
  }


  public function paginate ($page, $data, $per_page) {
    $total = count($data);
    $json = [
      'current_page' => $page,
      'data' => $data,
      'first_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page=1',
      'from' => null,
      'last_page' => ceil($total/$per_page),
      'last_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.ceil($total/$per_page),
      'next_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.ceil($page + 1),
      'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
      'per_page' => $per_page,
      'prev_page_url' => ($page - 1) > 0 ? \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.ceil($page - 1) : null,
      'to' => ($per_page * ($page - 1)) + $total,
      'total' => $total
    ];

    return $json;
}

public function retrieve () {

    $page = \Request::get('page', 1);
    $per_page = 1000;

    #country details
    $countryClass = self::get_country(\Request::get('country')); 
    $countryDetails = self::accessProtected($countryClass, 'items'); 
    $country = @$countryDetails[0];

    #type details
    $typeDetails = self::get_type (\Request::get('type'));

    # get all contact with research equivalent to filter
    $res = \DB::table('contact')
    ->select("contact.*")
    ->whereIn('contact_id', function($query) {
        $query->select('contact_id')
            ->from('research')
            ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'research.saaftype_id')
            ->where('saafclass.saafclass_id', '=', \Request::get('type'));
           // get sub saaf
          foreach(self::$ALL_SUBS as $key => $val) {
            $query->orWhere('saafclass.saafclass', '=', $val);     
          }
    })->where('homeCountry', '=', \Request::get('country'))->orderBy('firstname', 'ASC');

    # count data sets
    $resCount = \DB::table('contact')
    ->select(\DB::raw("count(contact_id) as total"))
    ->whereIn('contact_id', function($query) {
        $query->select('contact_id')
            ->from('research')
            ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'research.saaftype_id')
            ->where('saafclass.saafclass_id', '=', \Request::get('type'));
        // get sub saaf
        foreach(self::$ALL_SUBS as $key => $val) {
          $query->orWhere('saafclass.saafclass', '=', $val);     
        }
    })->where('homeCountry', '=', \Request::get('country'));

    # read result and convert to array
    $contacts = $res->get()->toArray();
    $total = ($resCount->get()->toArray());

    # get all research and inject to 'graduate_alumni_research' property
    foreach($contacts as $key => $value) {
        if(!isset($value->graduate_alumni_research)) $value->graduate_alumni_research = [];
        $research = (\DB::table('research')
        ->select('*')
        ->leftJoin('saafclass', function($query) {
            $query->on('saafclass.saafclass_id', '=', 'research.saaftype_id');
            // get sub saaf
            foreach(self::$ALL_SUBS as $key => $val) {
              $query->orWhere('saafclass.saafclass', '=', $val);     
            }
        })->where('contact_id', '=', $value->contact_id));
        // get sub saaf
        foreach(self::$ALL_SUBS as $key => $val) {
          $research->orWhere('saafclass.saafclass', '=', $val);     
        }
        $research->get()
        ->toArray();

        # employment
        if(!isset($value->employment)) $value->employment = [];
        $emp = \DB::table('employment')
        ->select('*')
        ->where('contact_id', '=', $value->contact_id)
        ->get()
        ->toArray();
        $value->employment = $emp;

        # education
        if(!isset($value->education)) $value->education = [];
        $educ = \DB::table('education')
        ->select('*')
        ->where('contact_id', '=', $value->contact_id)
        ->get()
        ->toArray();
        $value->education = $educ;
                
        
    }

    # call custom paginator
    # neccessary to mimic Eloquent's built-in pagination() function
    $pdfData = ['country' => $country, 'type' => @$typeDetails->saafclass, 'data' => $this->paginate($page, $contacts, $per_page, @$total[0]->total)];
    return $pdfData;
  }


  public function showPDFNotFound () {
    return "<center style='margin-top: 10vh;'>
      <h2>Sorry! This page does not contain any data</h2>
      <p>Please try to reload the page or try again later.</p>
    </center>";
  }

  public function retrieveService (Request $request) {
    $type = $request->get('type');
    $country = $request->get('country');
    if(empty($type) || empty($country)) return;

    # get all categories
    $typeDetails = self::get_type($type);
    self::$ALL_SUBS[$typeDetails->saafclass_id] = $typeDetails->saafclass;
    self::get_all_subs($type);

    # generate PDF
    $data = self::retrieve();
    if(!count($data['data'])) return self::showPDFNotFound ();
      $pdf = \PDF::loadView('reports/saafPerCountry', self::retrieve());
      return $pdf->stream();
  }

}
