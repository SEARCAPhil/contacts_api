<?php

namespace App\Http\Controllers\Contact;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PersonalInfo extends Controller
{
    public function __construct () {

    }

    public function create ($affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank ) {
        return DB::insert('INSERT INTO contact (affiliateCode, prefix, suffix, lastname, firstname, middleinit, nickname, gender, birthdate, spouse, children, hobbies, nationality, specialization, civilStat, others, rank ) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )', [$affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank]);
    }

    public function update ($id, $affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank) {
        return Contact::where('contact_id', $id)->update(['affiliateCode' => $affiliateCode, 
        'prefix' => $prefix, 
        'suffix' => $suffix, 
        'lastname' => $lastname, 
        'firstname' => $firstname, 
        'middleinit' => $middlename, 
        'nickname' => $nickname, 
        'gender' => $gender, 
        'birthdate' => $birthdate, 
        'spouse' => $spouse, 
        'children' => $children, 
        'hobbies' => $hobbies, 
        'nationality' => $nationality, 
        'specialization' => $specialization, 
        'civilStat' => $civilStatus,
        'others' => $others,
        'rank' => $rank]);
    }

    public function retrieve () {
        return Contact::paginate();
    }

    public function delete ($id) {
       return Contact::where('contact_id', $id)->delete();
    }

    /** Services */

    public function createService (Request $request) {
        $inserted = self::create ($request->affiliateCode, $request->prefix, $request->suffix, $request->lastname, $request->firstname, $request->middlename, $request->nickname, $request->gender, $request->birthdate, $request->spouse, $request->children, $request->hobbies, $request->nationality, $request->specialization, $request->civilStatus, $request->others, $request->rank);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService (Request $request) {
        return self::delete($request->id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->affiliateCode, $request->prefix, $request->suffix, $request->lastname, $request->firstname, $request->middlename, $request->nickname, $request->gender, $request->birthdate, $request->spouse, $request->children, $request->hobbies, $request->nationality, $request->specialization, $request->civilStatus, $request->others, $request->rank);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }
}
