<?php

namespace App\Http\Controllers;

use App\AffType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AffTypeController extends Controller
{
    public function retrieve () {
        return AffType::paginate(100);
    }
}
