<?php

namespace App\Http\Controllers\Contact\Filter;

use App\Contact;
use App\Saaf\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    public function __construct () {
        $this->parent_saaf_id = 2;
    }

    public function get_sub_filters () {
        \Request::merge([
            'page' => 1
        ]);

        return Classes::where('saafclass_parent_id', '=', $this->parent_saaf_id)->paginate();
    }

    /** https://stackoverflow.com/questions/20334355/how-to-get-protected-property-of-object-in-php 8\**/
    function accessProtected($obj, $prop) {
        $reflection = new \ReflectionClass($obj);
        $property = $reflection->getProperty($prop);
        $property->setAccessible(true);
        return $property->getValue($obj);
      }

    public function paginate ($page, $data, $per_page, $total = 0) { 
        $total_current_data = count($data);
        $total = $total ? $total : count($total_current_data );
        $json = [
            'current_page' => $page,
            'data' => $data,
            'first_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page=1',
            'from' => null,
            'last_page' => ceil($total/$per_page),
            'last_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.floor($total/$per_page),
            'next_page_url' => \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.ceil($page + 1),
            'path' => \Illuminate\Pagination\Paginator::resolveCurrentPath(),
            'per_page' => $per_page,
            'prev_page_url' => ($page - 1) > 0 ? \Illuminate\Pagination\Paginator::resolveCurrentPath().'?page='.floor($page - 1) : null,
            'to' => ($per_page * ($page - 1)) + $total_current_data,
            'total' => $total
        ];
        
        echo json_encode($json);
    }

    public function retrieve ($filter = '') {

        # return all research finished at SEARCA
        #custom filters
        if($filter === 'Training Alumni') $this->parent_saaf_id = 2;

        $page = \Request::get('page', 1);
        $per_page = 50;
        //var_dump(\Illuminate\Pagination\Paginator::resolveCurrentPage(1));
        # get all contact with research equivalent to filter
        $res = \DB::table('contact')
        ->select("contact.*")
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('training')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'training.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));

                foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
                    $query->orWhere('saafclass.saafclass', '=', $val['saafclass']);    
                }
        })
       ->orderBy('firstname', 'asc')
        ->limit($per_page)->offset($page < 1 ? 0 : $per_page * ($page - 1));
       
        # count data sets
        $resCount = \DB::table('contact')
        ->select(\DB::raw("count(contact_id) as total"))
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('training')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'training.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));
            foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
                $query->orWhere('saafclass.saafclass', '=', $val['saafclass']);    
            }
        });

        # read result and convert to array
        $contacts = $res->get()->toArray();
        $total = ($resCount->get()->toArray());
      
        $ids = [\Request::get('filter')];
        foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
            array_push($ids, $val['saafclass']); 
        }

        # get all research and inject to 'graduate_alumni_research' property
        foreach($contacts as $key => $value) {
            if(!isset($value->graduate_alumni_trainings)) $value->graduate_alumni_trainings = [];

            $research = \DB::table('training')
            ->select('*')
            ->leftJoin('saafclass', function($query) {
                $query->on('saafclass.saafclass_id', '=', 'training.saaftype_id');
            })
            ->whereIn('saafclass.saafclass', $ids)
            ->where('contact_id', '=', $value->contact_id)
            ->get()
            ->toArray();
            
            $value->graduate_alumni_trainings = $research;
            
        }

        # call custom paginator
        # neccessary to mimic Eloquent's built-in pagination() function
        return $this->paginate($page, $contacts, $per_page, @$total[0]->total);
    }

    public function search ($param, $filter = '') {
       
        # return all research finished at SEARCA
        #custom filters
        if($filter === 'Training Alumni') $this->parent_saaf_id = 2;

        $page = \Request::get('page', 1);
        $per_page = 50;
        //var_dump(\Illuminate\Pagination\Paginator::resolveCurrentPage(1));
        # get all contact with research equivalent to filter
        $res = \DB::table('contact')
        ->select("contact.*")
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('training')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'training.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));

                foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
                    $query->orWhere('saafclass.saafclass', '=', $val['saafclass']);    
                }
        })
        ->where('contact.lastname', 'like', '%'.$param.'%')
        ->orWhere('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.middleinit', 'like', '%'.$param.'%')
        ->orderBy('firstname', 'asc')
        ->limit($per_page)->offset($page < 1 ? 0 : $per_page * ($page - 1));
       
        # count data sets
        $resCount = \DB::table('contact')
        ->select(\DB::raw("count(contact_id) as total"))
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('training')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'training.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));
            foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
                $query->orWhere('saafclass.saafclass', '=', $val['saafclass']);    
            }
        })
        ->where('contact.lastname', 'like', '%'.$param.'%')
        ->orWhere('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.middleinit', 'like', '%'.$param.'%');

        # read result and convert to array
        $contacts = $res->get()->toArray();
        $total = ($resCount->get()->toArray());
      
        $ids = [\Request::get('filter')];
        foreach(self::accessProtected(self::get_sub_filters(), 'items') as $key => $val) {
            array_push($ids, $val['saafclass']); 
        }

        # get all research and inject to 'graduate_alumni_research' property
        foreach($contacts as $key => $value) {
            if(!isset($value->graduate_alumni_trainings)) $value->graduate_alumni_trainings = [];

            $research = \DB::table('training')
            ->select('*')
            ->leftJoin('saafclass', function($query) {
                $query->on('saafclass.saafclass_id', '=', 'training.saaftype_id');
            })
            ->whereIn('saafclass.saafclass', $ids)
            ->where('contact_id', '=', $value->contact_id)
            ->get()
            ->toArray();
            
            $value->graduate_alumni_trainings = $research;
            
        }

        # call custom paginator
        # neccessary to mimic Eloquent's built-in pagination() function
        return $this->paginate($page, $contacts, $per_page, @$total[0]->total);
    }  

    
    public function retrieveService (Request $request) {
        return self::retrieve($request->filter);
    }

    public function searchService (Request $request) {
        return self::search($request->param, $request->filter);
    }
}
