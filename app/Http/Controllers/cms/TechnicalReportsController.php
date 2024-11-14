<?php

namespace App\Http\Controllers\CMS;

use App\Models\AnnualReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicalReportsController extends Controller
{
    //
    public function index()
    {
        $reports = AnnualReport::orderBy('order')->get();
        return view('cms.technical_reports.index',compact(['reports']));
    }
}
