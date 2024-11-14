<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\SanadItem;
use Illuminate\Http\Request;

class SanadController extends Controller
{
    //
    public function index()
    {
        $sanad_items = SanadItem::orderBy('order')->get();
        // dd($page->page);
        return view('cms.sanad.index',compact(['sanad_items']));
    }
}
