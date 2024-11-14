<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CmsEvent;
use Illuminate\Http\Request;

class CmsEventController extends Controller
{
    public function show($id)
    {
        $event = CmsEvent::find($id);
        return view('cms.events.show',compact(['event']));
    }
}
