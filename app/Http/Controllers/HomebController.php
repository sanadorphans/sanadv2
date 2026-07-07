<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Slide;
use App\Models\Story;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Campaign;
use App\Models\AnnualReport;
use App\Models\ImpactNumber;
use App\Models\PeriodicalNewsletter;
use App\Models\ImportantLink;
use App\Models\StoriesCategory;
use App\Models\Program;

class HomebController extends Controller
{
 
    function index(){

        $slides = Slide::get();
        $impact_numbers = ImpactNumber::get();
        $news = News::orderBy('created_at','desc')->paginate(4);
        $services = Service::get();
        $NewsLetter = PeriodicalNewsletter::first();
        $AnnualReport = AnnualReport::orderBy('order')->first();
        $Campaign = Campaign::latest()->first();
        // show 10 parteners randomly
        $ImportantLinks  = ImportantLink::inRandomOrder()->limit(3)->get();
        $Partners = Partner::inRandomOrder()->limit(20)->get();
        $stories = Story::latest()->limit(10)->get();
        $StoriesCategory = StoriesCategory::with('Story')->first();
        $programs = Program::with('sub_programs')->get();
        return view('landing2',compact(['slides','impact_numbers','news','services','NewsLetter','AnnualReport','Campaign','Partners','stories','ImportantLinks','StoriesCategory','programs']));
    }

    
    function index2(){
        $services= Service::get();
        return view('ourservices',compact(['services']));
    }
}
