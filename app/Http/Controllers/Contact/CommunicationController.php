<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Communication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommunicationController extends Controller
{
    public function create ($contact_id, $type, $value) {
        return DB::insert('INSERT INTO communication (contact_id, type, value) values(?, ?, ?)',[$contact_id, $type, $value]);
    }

    public function update ($id, $type, $value) {
        return Communication::where('communication_id', $id)->update([
            'type' => $type, 
            'value' => $value,
        ]);
    }

    public function retrieve ($id) {
        return Communication::where('contact_id', $id)->paginate(20);
    }

    public function delete ($id) {
       return Communication::where('communication_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->type, $request->value);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService (Request $request) {
        return self::delete($request->id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->type, $request->value);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }

}
