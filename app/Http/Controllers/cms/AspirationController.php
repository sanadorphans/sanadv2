<?php

namespace App\Http\Controllers\cms;

use App\Models\Aspiration;
use App\Models\WhoWeArePage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AspirationController extends Controller
{
    public function index(){
        $sections = WhoWeArePage::get();
        $Aspiration = Aspiration::get();
        return view('cms.aspirations.index',compact(['sections','Aspiration']));
    }
}
