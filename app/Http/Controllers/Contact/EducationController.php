<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{
    
    public function create ($contact_id, $institution, $country, $field, $grad, $scholarship, $type) {
        return DB::insert('INSERT INTO education (contact_id, institution, country, field, grad, scholarship, type) values (?, ?, ?, ?, ?, ?, ?)', [$contact_id, $institution, $country, $field, $grad, $scholarship, $type]);
    }

    public function update ($id, $institution, $country, $field, $grad, $scholarship, $type) {
        return Education::where('educ_id', $id)->update([
            'institution' => $institution, 
            'country' => $country, 
            'field' => $field, 
            'grad' => $grad, 
            'scholarship' => $scholarship, 
            'type' => $type,
        ]);
    }

    public function retrieve ($id) {
        return Education::where('contact_id', $id)->paginate(20);
    }

    public function view ($id) {
        return Education::where('educ_id', $id)->get();
    }

    public function delete ($id) {
       return Education::where('educ_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->institution, $request->country, $request->field, $request->grad, $request->scholarship, $request->type);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->institution, $request->country, $request->field, $request->grad, $request->scholarship, $request->type);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }

    public function viewService (Request $request, $contactId) {
        return self::view($contactId);
    }
}
