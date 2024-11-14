<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users\UserConsultation;
use App\Models\Consultant;
use App\Models\Consultation;
use App\Models\ConsultationCategory;
use App\Models\CommonQuestion;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Alert\Components\TitleComponent;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;

class SearchController extends Controller
{
    public function index(Request $request)

    {
        $categories = ConsultationCategory::get();
        $search_text = $request->search;
        // $requestFaq1 = CommonQuestion::where('title', 'LIKE', '%' . $search_text . '%')->get();
        // $requestFaq = CommonQuestion::where('content', 'LIKE', '%' . $search_text . '%')->get();
        $consultations = new CommonQuestion();
        if($request->category > 0 ){
            $category = ConsultationCategory::find($request->category);

            $consultations = $consultations->where('category_id',$request->category);
        }else{
            $category = 0;
        }
        if($request->search){
            $consultations = $consultations->where('title', 'LIKE', '%' . $search_text . '%')->orWhere('content', 'LIKE', '%' . $search_text . '%');
        }
        $consultations = $consultations->where('status',1)->simplePaginate(10);
        return view('users.consultation_faq', compact('search_text', 'category', 'consultations','categories'));
    }


    public function search(Request $request)
    {

        $categories = ConsultationCategory::get();
        $search_text = $request->search;
        // $requestFaq1 = CommonQuestion::where('title', 'LIKE', '%' . $search_text . '%')->get();
        // $requestFaq = CommonQuestion::where('content', 'LIKE', '%' . $search_text . '%')->get();
        $consultations = new CommonQuestion();
        if($request->category > 0){
            $category = ConsultationCategory::find($request->category);

            $consultations = $consultations->where('category_id',$request->category);

        }else{
            $category = 0;
        }
        if($request->search){
            $consultations = $consultations->where('status',1)->where('title', 'LIKE', '%' . $search_text . '%')->orWhere('content', 'LIKE', '%' . $search_text . '%');
        }
        $consultations = $consultations->simplePaginate(10);
        return view('users.consultation_faq', compact('search_text', 'category', 'consultations','categories'));

        //->with('consultationCategory')->simplePaginate(5)
    }
}
