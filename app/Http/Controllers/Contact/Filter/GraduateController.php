<?php

namespace App\Http\Controllers\Contact\Filter;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GraduateController extends Controller
{
    public function __construct () {

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

        echo json_encode($json);
    }

    public function retrieve ($filter = '') {

        # return all research finished at SEARCA
      if (empty($filter) || $filter === 'undefined') return Contact::has('graduateAlumniResearch')->with(['graduateAlumniResearch'])->paginate(50);

        $page = \Request::get('page', 1);
        $per_page = 50;

        # get all contact with research equivalent to filter
        $res = \DB::table('contact')
        ->select("contact.*")
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('research')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'research.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));
        })->limit($per_page)->offset($page < 2 ? 0 : ($page*$per_page) - 1);

        # count data sets
        $resCount = \DB::table('contact')
        ->select(\DB::raw("count(contact_id) as total"))
        ->whereIn('contact_id', function($query) {
            $query->select('contact_id')
                ->from('research')
                ->leftJoin('saafclass','saafclass.saafclass_id', '=', 'research.saaftype_id')
                ->where('saafclass.saafclass', '=', \Request::get('filter'));
        });

        # read result and convert to array
        $contacts = $res->get()->toArray();
        $total = ($resCount->get()->toArray());

        # get all research and inject to 'graduate_alumni_research' property
        foreach($contacts as $key => $value) {
            if(!isset($value->graduate_alumni_research)) $value->graduate_alumni_research = [];
            $research = \DB::table('research')
            ->select('*')
            ->leftJoin('saafclass', function($query) {
                $query->on('saafclass.saafclass_id', '=', 'research.saaftype_id');
            })->where('saafclass.saafclass', '=', \Request::get('filter'))
            ->where('contact_id', '=', $value->contact_id)
            ->get()
            ->toArray();
            
            $value->graduate_alumni_research = $research;
        }

        # call custom paginator
        # neccessary to mimic Eloquent's built-in pagination() function
        return $this->paginate($page, $contacts, $per_page, @$total[0]->total);
    }

    public function search ($param) {
        $res = Contact::where('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.lastname', 'like', '%'.$param.'%')
        ->orWhere('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.middleinit', 'like', '%'.$param.'%')
        ->has('graduateAlumniResearch')->with(['graduateAlumniResearch'])->paginate(50);
        return $res;
    }  

    
    public function retrieveService (Request $request) {
        return self::retrieve($request->filter);
    }

    public function searchService (Request $request) {
        return self::search($request->param);
    }
}
