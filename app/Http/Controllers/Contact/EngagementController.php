<?php

namespace App\Http\Controllers\Contact;

use App\Contact\Engagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EngagementController extends Controller
{
    
    public function create ($contact_id, $engageFrom, $engageTo, $researchId, $engagement, $type) {
        return DB::insert('INSERT INTO engagement (contact_id, engageFrom, engageTo, researchId, engagement, type) values(?, ?, ?, ?, ?, ?)', [$contact_id, $engageFrom, $engageTo, $researchId, $engagement, $type]);
    }

    public function update ($id, $engageFrom, $engageTo, $researchId, $engagement, $type) {
        return Engagement::where('engage_id', $id)->update([
            'engageFrom' => $engageFrom, 
            'engageTo' => $engageTo, 
            'researchId' => $researchId, 
            'engagement' => $engagement, 
            'type' => $type
        ]);
    }

    public function retrieve ($id) {
        return Engagement::where('contact_id', $id)->paginate(20);
    }

    public function delete ($id) {
       return Engagement::where('engage_id', $id)->delete();
    }

    /** Services */
    public function createService (Request $request) {
        $inserted = self::create ($request->id, $request->engageFrom, $request->engageTo, $request->researchId, $request->engagement, $request->type, $request->nature);
        return $inserted ? DB::getPdo()->lastInsertId() : 0;
    }

    public function deleteService ($id) {
        return self::delete($id);
    } 

    public function updateService (Request $request) {
        return self::update($request->id, $request->engageFrom, $request->engageTo, $request->researchId, $request->engagement, $request->type, $request->nature);
    }

    public function retrieveService (Request $request, $contactId) {
        return self::retrieve($contactId);
    }
}
