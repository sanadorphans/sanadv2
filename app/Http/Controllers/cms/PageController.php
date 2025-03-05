<?php

namespace App\Http\Controllers\CMS;

use App\Models\Story;
use App\Models\Carrer;
use App\Models\Impact;
use App\Models\ApplyJob;
use App\Models\CarrerType;
use App\Models\Certificate;
use App\Models\ImpactNumber;
use App\Models\WhoWeArePage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequst;

class PageController extends Controller
{
    //
    public function who_we_are(){
        $sections = WhoWeArePage::get();
        return view('cms.who_we_are',compact(['sections']));
    }
    public function index(){
        $carrers = Carrer::get();
        $carrer_types = CarrerType::with('carrer')->orderBy('created_at', 'desc')->get();
        return view('cms.carrers.index',compact(['carrers','carrer_types']));
    }
    public function show($id){
        $carrer = Carrer::find($id);
        return view('cms.carrers.show',compact(['carrer']));
    }
    public function apply(ApplyJobRequst $request){
        ApplyJob::StoreData($request);
        return view('cms.carrers.thanks');
    }
    public function awards(){
        $awards = Certificate::get();
        return view('cms.awards',compact(['awards']));
    }

    public function impact(){
        $impact_main = Impact::where('section','main')->get();
        $title = 'title' . '_' . app()->getLocale();
        $stories = Story::latest()->limit(10)->get();
        $impact_numbers = ImpactNumber::get();
        $impact_main_output = array();
        foreach($impact_main as $impact_main_item){
            if(!array_key_exists($impact_main_item->$title, $impact_main_output)){
                $impact_main_output[$impact_main_item->$title] = array();
                array_push($impact_main_output[$impact_main_item->$title],$impact_main_item);
            }else{
                array_push($impact_main_output[$impact_main_item->$title],$impact_main_item);
            }
        }
        return view('cms.impact',compact(['impact_main_output','impact_numbers','stories']));
    }

}
