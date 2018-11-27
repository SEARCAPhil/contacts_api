<?php

namespace App\Http\Controllers\Contact;

use App\Contact\FellowAff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FellowController extends Controller
{
    
    public function create ($contact_id, $saaftype_id, $dateFrom, $dateTo) {
        return DB::insert('INSERT INTO fellowaff (contact_id, saaftype_id, dateFrom, dateTo) values(?, ?, ?, ?)', [$contact_id, $saaftype_id, $dateFrom, $dateTo]);
    }

    public function update ($id, $saaftype_id, $dateFrom, $dateTo) {
        return FellowAff::where('fellowaff_id', $id)->update([
            'saaftype_id' => $saaftype_id, 
            'dateFrom' => $dateFrom, 
            'dateTo' => $dateTo,
        ]);
    }

    public function retrieve ($id) {
        return FellowAff::where('contact_id', $id)->paginate(20);
    }

    public function delete ($id) {
       return FellowAff::where('fellowaff_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->id, $request->saafTypeId, $request->dateFrom, $request->dateTo);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->saafTypeId, $request->dateFrom, $request->dateTo);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }
}
