<?php

namespace App\Http\Controllers\Contact\Filter;

use App\Contact;
use App\Saaf\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AssociateController extends Controller
{
    public function __construct () {

    }

    public function retrieve ($filter = '') {

      # return all research finished at SEARCA
      if (empty($filter)) return Contact::has('graduateAlumniResearch')->with(['graduateAlumniResearch'])->paginate(50);

      $res = Contact::has(['graduateAlumniResearch' => function ($query) {
          $query->where('saafclass.saafclass', '=', $filter);
      }])->with(['graduateAlumniResearch' => function ($query) {
          $query->where('saafclass.saafclass', '=', $filter)->where('research.contact_id', '=', 'contact.contact_id');
      }])
      ->orderBy('firstname', 'asc')
      ->paginate(50);
    
        return $res;
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

    public function infoService (Request $request) {
        return self::view($request->id);
    }

    public function searchService (Request $request) {
        return self::search($request->param);
    }
}
