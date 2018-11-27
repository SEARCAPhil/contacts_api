<?php

namespace App\Http\Controllers;

use App\Sector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    
    public function create ($sectorName) {
        return DB::insert('INSERT INTO sector (sectorName) values(?)', [$sectorName]);
    }

    public function update ($id, $sectorName) {
        return Sector::where('sector_id', $id)->update([
            'sectorName' => $sectorName, 
        ]);
    }

    public function retrieve () {
        return Sector::paginate(100);
    }

    public function delete ($id) {
       return Sector::where('sector_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->sectorName);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->sectorName);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }
}
