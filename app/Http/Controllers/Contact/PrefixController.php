<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Prefix;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PrefixController extends Controller
{
    
    public function create ($prefix) {
        return DB::insert('INSERT INTO prefix (prefix) values(?)', [$prefix]);
    }

    public function update ($id, $prefix) {
        return Prefix::where('prefix_id', $id)->update([
            'prefix' => $prefix, 
        ]);
    }

    public function retrieve () {
        return Prefix::paginate(100);
    }

    public function delete ($id) {
       return Prefix::where('prefix_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) { 
        $inserted = self::create ($request->prefix);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->prefix);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }
}
