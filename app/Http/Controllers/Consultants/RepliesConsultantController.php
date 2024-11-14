<?php

namespace App\Http\Controllers\Consultants;

use Carbon\Carbon;
use App\Models\User;
use App\Traits\ZoomJWT;
use App\Models\Consultant;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Models\ConsultationReply;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ConsultationRepliedByConsultant;


class RepliesConsultantController extends Controller
{
    use ZoomJWT;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    public function index($id)
    {
        $data= Consultation::find($id);
        $replies= ConsultationReply::where('consultation_id', $id)->get();
        $user=Auth::user();
        return view('consultants.consultation_admin_chat', compact('data','id','user','replies'));
    }

    public function store(Request $request,$id)
    {
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
            'owner' => '0',
            'consultant_id' => Consultant::where('user_id', Auth::user()->id)->first()->id,
            'status' =>'submitted',
            'attachment' => $saved_path,
        ]);



        $path = 'users/me/meetings';


        if($request->start_time){
            $response = $this->zoomPost($path, [
                'topic' => $consultation->category->name,
                'type' => self::MEETING_TYPE_SCHEDULE,
                'start_time' => $this->toZoomTimeFormat($request->start_time),
                'duration' => 30,
                'agenda' => 'nothing',
                'settings' => [
                    'host_video' => false,
                    'participant_video' => false,
                    'waiting_room' => true,
                ]
            ]);
            $data = json_decode($response->body());
            $meeting_link = $data->start_url;
            $reply->meeting_url = $meeting_link;
            $reply->meeting_time = $request->start_time;
            $reply->save();
        }

        $users = User::where('role_id', '4' )->orWhere('role_id', '7')->get();

        Notification::send($users, new ConsultationRepliedByConsultant($consultation));

        return redirect()->back()->with('msg', __('site.sent successfully'));

    }
}
