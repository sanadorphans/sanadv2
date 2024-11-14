<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\MediaBag;
use Illuminate\Http\Request;

class MediaBagController extends Controller
{
    //
    public function index()
    {
        $bags = MediaBag::get();
        return view('cms.media_bags.index',compact(['bags']));
    }
}
