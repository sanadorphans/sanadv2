<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    function index(){
        return view('cms.accreditation.index');
    }
}
