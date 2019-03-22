<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    
    public function create ($contact_id, $saaftype_id, $title, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $trainingType, $organizingAgency, $hostUniversity, $notes) {
        return DB::insert('INSERT INTO training (contact_id, saaftype_id, title, dateStarted, dateEnded, scholarship, venue, sponsor, trainingType, organizingAgency, hostUniversity, notes) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$contact_id, $saaftype_id, $title, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $trainingType, $organizingAgency, $hostUniversity, $notes]);
    }

    public function update ($id, $title, $saaftype_id, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $trainingType, $organizingAgency, $hostUniversity, $notes) {
        return Training::where('training_id', $id)->update([
            'title' => $title, 
            'saaftype_id' => $saaftype_id, 
            'dateStarted' => $dateStarted, 
            'dateEnded' => $dateEnded, 
            'scholarship' => $scholarship, 
            'venue' => $venue, 
            'sponsor' => $sponsor, 
            'trainingType' => $trainingType, 
            'organizingAgency' => $organizingAgency, 
            'hostUniversity' => $hostUniversity, 
            'notes' => $notes,
            #'isSearcaTraining' => $isSearcaTraining,
        ]);
    }

    public function retrieve ($id) {
        return Training::where('contact_id', $id)->paginate(100);
    }

    public function delete ($id) {
       return Training::where('training_id', $id)->delete();
    }

    public function view ($id) {
        return Training::leftJoin('saafclass', 'saafclass_id', '=', 'training.saaftype_id')->where('training_id', $id)->get();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->saafTypeId, $request->title, $request->dateStarted, $request->dateEnded, $request->scholarship, $request->venue, $request->sponsor, $request->trainingType, $request->organizingAgency, $request->hostUniversity, $request->notes);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->title, $request->saafTypeId, $request->dateStarted, $request->dateEnded, $request->scholarship, $request->venue, $request->sponsor, $request->trainingType, $request->organizingAgency, $request->hostUniversity, $request->notes);
    }

    public function retrieveService (Request $request) {
        return self::retrieve($request->id);
    }

    public function viewService (Request $request) {
        return self::view($request->id);
    }
}
