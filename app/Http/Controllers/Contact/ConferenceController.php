<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Conference;
use App\Contact\Conference\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ConferenceController extends Controller
{
    public function create ($contact_id, $title, $venue, $dateStarted, $dateEnded) {
        return DB::insert('INSERT INTO conference (contact_id, title, venue, dateStarted, dateEnded) values(?, ?, ?, ?, ?)', [$contact_id, $title, $venue, $dateStarted, $dateEnded]);
    }

    public function update ($id, $title, $venue, $dateStarted, $dateEnded) {
        return Conference::where('id', $id)->update([
            'title' => $title, 
            'venue' => $venue, 
            'dateStarted' => $dateStarted, 
            'dateEnded' => $dateEnded,
        ]);
    }

    public function retrieve ($id) {
        return Conference::where('contact_id', $id)->paginate(20);
    }

    public function delete ($id) {
       $isDeleted = Conference::where('id', $id)->delete();

       # delete child lectures
       if($isDeleted) {
        Lecture::where('conference_id', $id)->delete();
       }
       return $isDeleted;
    }

    public function view($id) {
        return Conference::where('id', $id)->get();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->title, $request->venue, $request->dateStarted, $request->dateEnded);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->title, $request->venue, $request->dateStarted, $request->dateEnded);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }

    public function viewService (Request $request, $id) {
        return self::view($id);
    }

}
