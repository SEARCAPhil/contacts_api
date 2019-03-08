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

    public function create ($affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank, $homeAddress, $homeAreaCode, $homeZipCode, $country ) {
        return DB::insert('INSERT INTO contact (affiliateCode, prefix, suffix, lastname, firstname, middleinit, nickname, gender, birthdate, spouse, children, hobbies, nationality, specialization, civilStat, others, rank , homeAddress, homeAreaCode, homeZipCode, homeCountry) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )', [$affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank, $homeAddress, $homeAreaCode, $homeZipCode, $homeCountry]);
    }

    public function update ($id, $affiliateCode, $prefix, $suffix, $lastname, $firstname, $middlename, $nickname, $gender, $birthdate, $spouse, $children, $hobbies, $nationality, $specialization, $civilStatus, $others, $rank, $homeAddress, $homeAreaCode, $homeZipCode, $homeCountry) {
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
        'rank' => $rank,
        'homeAddress' => $homeAddress,
        'homeAreaCode' => $homeAreaCode,
        'homeZipCode' => $homeZipCode,
        'homeCountry' => $homeCountry]);
    }

    public function update_photo ($id, $filename) {
        return Contact::where('contact_id', $id)->update(['photo' => $filename]);
    }

    public function retrieve () {
        $res = Contact::orderBy('firstname','asc')->with(['communications'])->paginate(50);
        return $res;
    }

    public function delete ($id) {
       return Contact::where('contact_id', $id)->delete();
    }

    public function view ($id) {
        $res = Contact::select('contact.*', 'country.countryName as country')->leftJoin('country', 'contact.homeCountry', '=', 'country_id')->findOrFail($id)->load(['communications', 'conferences', 'educationalBackgrounds', 'research', 'trainings', 'employments', 'engagements', 'fellowships']);
        return $res;
    }
    
    public function search ($param) {
        $res = Contact::where('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.lastname', 'like', '%'.$param.'%')
        ->orWhere('contact.firstname', 'like', '%'.$param.'%')
        ->orWhere('contact.middleinit', 'like', '%'.$param.'%')
        ->with(['communications'])->paginate(50);
        return $res;
    }  

    public function uploadProfilePhoto ($req) {
        $file = $req->file('file');
        $id = $req->id;
        $valid_extensions = ['jpeg', 'png'];
        # filter
        if(!$id) exit();
        if(!$file->isValid()) exit;
        if(!in_array($file->extension(), $valid_extensions)) exit;
        # upload
        $filename = "{$id}.{$file->extension()}";
        $moved = $file->move(public_path('uploads'), $filename);
        if($moved) {
            # update name
            return $this->update_photo ($id, $filename);
        }
    }

    public function get_affiliate_contact_hint ($id, $country, $gender='male') {
        DB::statement(DB::raw('set @rownum=0'));
        $res = \DB::select(DB::raw('SELECT * FROM (SELECT *, @rownum:=@rownum + 1 AS pos FROM contact d
        WHERE d.homeCountry = ? and deleted_at IS NULL and gender = ? ORDER BY contact_id) a where contact_id = ?'), [$country, $gender, $id]);

        return $res;
    }

    /** Services */

    public function createService (Request $request) {
        $inserted = self::create ($request->affiliateCode, $request->prefix, $request->suffix, $request->lastname, $request->firstname, $request->middlename, $request->nickname, $request->gender, $request->birthdate, $request->spouse, $request->children, $request->hobbies, $request->nationality, $request->specialization, $request->civilStatus, $request->others, $request->rank, $request->address, $request->areaCode, $request->zipCode, $homeCountry);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService (Request $request) {
        return self::delete($request->id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->affiliateCode, $request->prefix, $request->suffix, $request->lastname, $request->firstname, $request->middlename, $request->nickname, $request->gender, $request->birthdate, $request->spouse, $request->children, $request->hobbies, $request->nationality, $request->specialization, $request->civilStatus, $request->others, $request->rank, $request->address, $request->areaCode, $request->zipCode, $request->country);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }

    public function infoService (Request $request) {
        return self::view($request->id);
    }

    public function searchService (Request $request) {
        return self::search($request->param);
    }
    public function photoService (Request $request) {
        return self::uploadProfilePhoto($request);
    }

    public function get_affiliate_contact_hint_service (Request $request) {
        return self::get_affiliate_contact_hint($request->id, $request->country, $request->gender);
    }
}
