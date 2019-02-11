<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    
    public function retrieve () {
        return Country::paginate(500);
    }

    public function retrieveService (Request $request) {
        return self::retrieve();
    }
}
