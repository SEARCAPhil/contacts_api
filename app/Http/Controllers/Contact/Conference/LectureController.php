<?php

namespace App\Http\Controllers\Contact\Conference;

use App\Contact\Conference\Lecture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LectureController extends Controller
{
    public function create ($conference_id, $paperTitle, $lectureVenue, $lectureTitle, $dateStarted, $dateEnded) {
        return DB::insert('INSERT INTO lecture (conference_id, paperTitle, lectureVenue, lectureTitle, dateStarted, dateEnded) values(?, ?, ?, ?, ?, ?)', [$conference_id, $paperTitle, $lectureVenue, $lectureTitle, $dateStarted, $dateEnded]);
    }

    public function update ($id, $paperTitle, $lectureVenue, $lectureTitle, $dateStarted, $dateEnded) {
        return Lecture::where('id', $id)->update([
            'paperTitle' => $paperTitle, 
            'lectureVenue' => $lectureVenue, 
            'lectureTitle' => $lectureTitle, 
            'dateStarted' => $dateStarted, 
            'dateEnded' => $dateEnded,
        ]);
    }

    public function retrieve ($id) {
        return lecture::where('conference_id', $id)->paginate(20);
    }

    public function delete ($id) {
       return Lecture::where('id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->paperTitle, $request->lectureVenue, $request->lectureTitle, $request->dateStarted, $request->dateEnded);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->paperTitle, $request->lectureVenue, $request->lectureTitle, $request->dateStarted, $request->dateEnded);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }
}
