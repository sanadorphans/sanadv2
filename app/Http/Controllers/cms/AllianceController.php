<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Alliance;
use Illuminate\Http\Request;

class AllianceController extends Controller
{
    //
    public function index()
    {
        $alliances = Alliance::orderBy('order')->get();
        return view('cms.alliances.index',compact(['alliances']));
    }
}
