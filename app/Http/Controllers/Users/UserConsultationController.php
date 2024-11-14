<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\UserConsultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrganisationRequest;
use App\Http\Requests\StoreIndividualRequest;
use App\Models\Individual;
use App\Models\Organisation;
use App\Models\User;
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

class UserConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users\UserConsultation  $userConsultation
     * @return \Illuminate\Http\Response
     */
    public function show(UserConsultation $userConsultation)
    {
 /*         $dataconsultation = Consultation::all();
        $user=Auth::user();
        $userdata = "";
        if ($user) {
            $userdata = $dataconsultation->id;
            $userdata = $dataconsultation->title;
            $userdata = $dataconsultation->id;
        } else {
        }

        return view('users.consultation_chat', compact('dataconsultation')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users\UserConsultation  $userConsultation
     * @return \Illuminate\Http\Response
     */
    public function edit(UserConsultation $userConsultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users\UserConsultation  $userConsultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserConsultation $userConsultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users\UserConsultation  $userConsultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserConsultation $userConsultation)
    {
        //
    }
}
