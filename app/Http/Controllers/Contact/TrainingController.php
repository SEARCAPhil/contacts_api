<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    
    public function create ($contact_id, $saaftype_id, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $supervisor, $supervisorDesignation, $trainingType, $organizingAgency, $hostUniversity, $notes) {
        return DB::insert('INSERT INTO training (contact_id, saaftype_id, dateStarted, dateEnded, scholarship, venue, sponsor, supervisor, supervisorDesignation, trainingType, organizingAgency, hostUniversity, notes) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$contact_id, $saaftype_id, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $supervisor, $supervisorDesignation, $trainingType, $organizingAgency, $hostUniversity, $notes]);
    }

    public function update ($id, $saaftype_id, $dateStarted, $dateEnded, $scholarship, $venue, $sponsor, $supervisor, $supervisorDesignation, $trainingType, $organizingAgency, $hostUniversity, $notes) {
        return Training::where('training_id', $id)->update([ 
            'saaftype_id' => $saaftype_id, 
            'dateStarted' => $dateStarted, 
            'dateEnded' => $dateEnded, 
            'scholarship' => $scholarship, 
            'venue' => $venue, 
            'sponsor' => $sponsor, 
            'supervisor' => $supervisor, 
            'supervisorDesignation' => $supervisorDesignation, 
            'trainingType' => $trainingType, 
            'organizingAgency' => $organizingAgency, 
            'hostUniversity' => $hostUniversity, 
            'notes' => $notes,
        ]);
    }

    public function retrieve ($id) {
        return Training::where('contact_id', $id)->paginate(100);
    }

    public function delete ($id) {
       return Training::where('training_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->saafTypeId, $request->dateStarted, $request->dateEnded, $request->scholarship, $request->venue, $request->sponsor, $request->supervisor, $request->supervisorDesignation, $request->trainingType, $request->organizingAgency, $request->hostUniversity, $request->notes);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->saafTypeId, $request->dateStarted, $request->dateEnded, $request->scholarship, $request->venue, $request->sponsor, $request->supervisor, $request->supervisorDesignation, $request->trainingType, $request->organizingAgency, $request->hostUniversity, $request->notes);
    }

    public function retrieveService (Request $request) {
        return self::retrieve($request->id);
    }
}
