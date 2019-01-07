<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Research;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
{
    
    public function create ($contact_id, $saaftype_id, $dateStarted, $dateEnded, $title, $fieldStudy, $funding, $remarks, $hostUniversity) {
        return DB::insert('INSERT INTO research (contact_id, saaftype_id, dateStarted, dateEnded, title, fieldStudy, funding, remarks, hostUniversity) values(?, ?, ?, ?, ?, ?, ?, ?, ?)', [$contact_id, $saaftype_id, $dateStarted, $dateEnded, $title, $fieldStudy, $funding, $remarks, $hostUniversity]);
    }

    public function update ($id, $saaftype_id, $dateStarted, $dateEnded, $title, $fieldStudy, $funding, $remarks, $hostUniversity) {
        return Research::where('research_id', $id)->update([ 
            'saaftype_id' => $saaftype_id, 
            'dateStarted' => $dateStarted, 
            'dateEnded' => $dateEnded, 
            'title' => $title, 
            'fieldStudy' => $fieldStudy, 
            'funding' => $funding, 
            'remarks' => $remarks, 
            'hostUniversity' => $hostUniversity, 
        ]);
    }

    public function retrieve ($id) {
        return Research::leftJoin('saafclass', 'saafclass_id', '=', 'research.saaftype_id')->where('contact_id', $id)->paginate(100);
    }

    public function delete ($id) {
       return Research::where('research_id', $id)->delete();
    }

    public function view ($id) {
        return Research::leftJoin('saafclass', 'saafclass_id', '=', 'research.saaftype_id')->where('research_id', $id)->get();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->saafTypeId, $request->dateStarted, $request->dateEnded, $request->title, $request->fieldStudy, $request->funding, $request->remarks, $request->hostUniversity);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->saafTypeId, $request->dateStarted, $request->dateEnded, $request->title, $request->fieldStudy, $request->funding, $request->remarks, $request->hostUniversity);
    }

    public function retrieveService (Request $request) {
        return self::retrieve($request->id);
    }

    public function viewService (Request $request) {
        return self::view($request->id);
    }
}
