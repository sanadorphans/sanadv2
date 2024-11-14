<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    //
    public function index()
    {
        $campaigns = Campaign::get();
        return view('cms.campaigns.index',compact(['campaigns']));
    }
}
