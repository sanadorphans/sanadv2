<?php

namespace App\Http\Controllers\Users;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Consultant;
use App\Models\Individual;
use App\Models\Consultation;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\CommonQuestion;
use TCG\Voyager\Facades\Voyager;
use App\Models\ConsultationReply;
use App\Events\NewMessageReceived;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ConsultationCategory;
use Illuminate\Support\Facades\Auth;
use Facade\FlareClient\Http\Response;
use TCG\Voyager\Events\BreadDataDeleted;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreIndividualRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\StoreOrganisationRequest;
use App\Notifications\ConsultationRepliedByUser;
use App\Notifications\ConsultationRepliedByConsultant;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class RepliesController extends Controller
{
    public function index($id)
    {
        $data= Consultation::find($id);
        $replies= ConsultationReply::where('consultation_id', $id)->get();
        $user=Auth::user();
        return view('users.consultation_chat', compact('data','id','user','replies'));
    }

/*     public function reply($id)
    {
        $reply= ConsultationReply::find($id);
        $user=Auth::user();
        return view('users.consultation_chat', compact('id','user','reply'));
    } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id){

        $consultation = Consultation::find($id);

        $saved_path = "";

        if($request->file('attachment')){
            $path = 'public/replies/'.Carbon::now()->format('d-m-Y');
            $file_name = str_replace(' ', '_', Auth::user()->name.'_reply');
            $saved_path =  env('APP_URL').'/storage/replies/'.Carbon::now()->format('d-m-Y').'/'.$file_name.'.'.$request->attachment->getClientOriginalExtension();
            $request->file('attachment')->storeAs($path, $file_name.'.'.$request->attachment->getClientOriginalExtension());

        }

        $reply = ConsultationReply::create([
            'consultation_id' => $consultation->id,
            'content' => $request->content,
            'owner' => '1',
            'user_id' => Auth::user()->id,
            'status' =>'approved',
            'attachment' => $saved_path,
        ]);

        $users = User::whereHas('role',function($q){
            $q->whereHas('permissions',function($q2){
                $q2->where('key','browse_consultations');
            });
        })->get();


        Notification::send($users, new ConsultationRepliedByUser($consultation));
        // dispatch(new ConsultationRepliedByConsultantJob($consultation,$users));

        // return redirect()->back()->with('msg', __('site.sent successfully'));

        // broadcast(new NewMessageReceived(Auth::user()->id,$consultation->consultant_id, $reply->content,$reply->attachment));

        return  response()->json([
            'reply' => $reply,
        ]);

    }

}
