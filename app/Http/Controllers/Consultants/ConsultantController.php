<?php

namespace App\Http\Controllers\Consultants;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Consultation;
use App\Notifications\ConsultationRejectedByConsultant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ConsultantController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->orderBy('id','desc')->paginate(5);
        $tap = __('site.all consultations');
        return view('consultants.consultation_admin', compact('tap','userconsultations'));
    }
    public function newConsultations()
    {
        $consultant=Auth::user()->id;

        $userconsultations = Consultation::where('consultant_id', Auth::user()->id)->where('status', 'assigned')->whereDoesntHave('replies', function($q) use($consultant){
            $q->where('owner', '0')->where('consultant_id', $consultant);
        })->orderBy('id','desc')->paginate(5);
        $tap = __('site.new consultations');
        return view('consultants.consultation_admin', compact('tap','userconsultations'));
    }
    public function closedConsultations()
    {
        $consultant=Auth::user()->id;
        $userconsultations = Consultation::where('consultant_id', Auth::user()->id)->where('status', 'closed')->orderBy('id','desc')->paginate(5);
        $tap = __('site.closed consultations');
        return view('consultants.consultation_admin', compact('tap','userconsultations'));
    }
    public function assignedConsultations()
    {
        $consultant=Auth::user()->id;
        // dd($consultant->id);
        $userconsultations = Consultation::where('consultant_id', Auth::user()->id)->where('status', 'assigned')->whereHas('replies', function($q) use($consultant){
            $q->where('owner', '0')->where('consultant_id', $consultant);
        })->orderBy('id','desc')->paginate(5);
        $tap = __('site.assigned consultations');
        return view('consultants.consultation_admin', compact('tap','userconsultations'));
    }

    public function status($id) {

        $withdraw = Consultation::select('status')->where('id', $id)->first();
        Consultation::where('id' , $id)->update(['status'=>'closed']);
        return redirect()->back()->with('msg', 'تم سحب الاستشارة');;
       }

    public function reject($id) {

        $consultation = Consultation::where('id', $id)->first();
        $consultation->update([
            'status'=>'rejected'
        ]);

        $users = User::where('role_id', '4' )->orWhere('role_id', '7')->get();

        Notification::send($users, new ConsultationRejectedByConsultant($consultation));

        return redirect()->back()->with('msg', __('site.rejected successfully'));
    }
    public function close($id) {

        $consultation = Consultation::where('id', $id)->first();
        $consultation->update([
            'status'=>'closed'
        ]);
        return redirect()->back()->with('msg', __('site.closed successfully'));
    }
}
