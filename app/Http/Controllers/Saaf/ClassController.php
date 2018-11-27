<?php

namespace App\Http\Controllers\Saaf;

use App\Saaf\Classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    
    public function create ($saafclass, $saafclass_parent_id) {
        return DB::insert('INSERT INTO saafclass (saafclass, saafclass_parent_id) values(?, ?)', [$saafclass, $saafclass_parent_id]);
    }

    public function update ($id, $saafclass) {
        return Classes::where('saafclass_id', $id)->update([
            'saafclass' => $saafclass, 
        ]);
    }

    public function retrieve () {
        return Classes::paginate(100);
    }

    public function delete ($id) {
       return Classes::where('saafclass_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->saafClass, $request->saafClassParentId);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->saafClass);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }
}
