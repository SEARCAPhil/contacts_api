<?php

namespace App\Http\Controllers;

use App\Trainees;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TraineesController extends Controller
{
    
    public function create ($contact_id, $training_id) {
        return DB::insert('INSERT INTO trainees (contact_id, training_id) values(?, ?)', [$contact_id, $training_id]);
    }

    public function update ($id, $training_id) {
        return Trainees::where('refNo', $id)->update([ 
            'training_id' => $training_id, 
        ]);
    }

    public function retrieve ($id) {
        return Trainees::where('contact_id', $id)->paginate(100);
    }

    public function delete ($id) {
       return Trainees::where('refNo', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->trainingId);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->trainingId);
    }

    public function retrieveService (Request $request) {
        return self::retrieve($request->id);
    }
}
