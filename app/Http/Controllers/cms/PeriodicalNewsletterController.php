<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\PeriodicalNewsletter;
use Illuminate\Http\Request;

class PeriodicalNewsletterController extends Controller
{
    //
    public function index()
    {
        $news_letters = PeriodicalNewsletter::get();
        return view('cms.periodical_newsletters.index',compact(['news_letters']));
    }
}
