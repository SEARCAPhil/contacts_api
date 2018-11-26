<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Employment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EmploymentController extends Controller
{
    public function __construct () {

    }

    public function create ($contact_id, $companyName, $companyAddress, $position, $employedFrom, $employedTo, $country, $countryCode, $zip, $fax, $areaCode, $sector) {
        return DB::insert('INSERT INTO employment (contact_id, companyName, companyAddress, position, employedFrom, employedTo, country, countryCode, zip, fax, areaCode, sector) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$contact_id, $companyName, $companyAddress, $position, $employedFrom, $employedTo, $country, $countryCode, $zip, $fax, $areaCode, $sector]);
    }

    public function update ($id, $companyName, $companyAddress, $position, $employedFrom, $employedTo, $country, $countryCode, $zip, $fax, $areaCode, $sector) {
        return Employment::where('employ_id', $id)->update([
            'companyName' => $companyName, 
            'companyAddress' => $companyAddress, 
            'position' => $position, 
            'employedFrom' => $employedFrom, 
            'employedTo' => $employedTo, 
            'country' => $country, 
            'countryCode' => $countryCode, 
            'zip' => $zip, 
            'fax' => $fax, 
            'areaCode' => $areaCode,
            'sector' => $sectoer, 
        ]);
    }

    public function retrieve ($id) {
        return Employment::where('contact_id', $id)->paginate(20);
    }

    public function delete ($id) {
       return Employment::where('employ_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->companyName, $request->companyAddress, $request->position, $request->employedFrom, $request->employedTo, $request->country, $request->countryCode, $request->zip, $request->fax, $request->areaCode, $request->sector);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService (Request $request) {
        return self::delete($request->id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->companyName, $request->companyAddress, $request->position, $request->employedFrom, $request->employedTo, $request->country, $request->countryCode, $request->zip, $request->fax, $request->areaCode, $request->sector);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }


}
