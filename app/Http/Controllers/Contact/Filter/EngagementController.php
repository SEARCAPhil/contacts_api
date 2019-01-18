<?php

namespace App\Http\Controllers\Contact\Filter;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EngagementController extends Controller
{
    public function __construct () {

    }

    public function retrieve () {
        $res = Contact::has('engageResearch')->with(['engageResearch'])->paginate(50);
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
        return self::retrieve();
    }

    public function infoService (Request $request) {
        return self::view($request->id);
    }

    public function searchService (Request $request) {
        return self::search($request->param);
    }
}
