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
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ConsultationCategory;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\UserConsultation;
use App\Notifications\newConsultation;
use TCG\Voyager\Events\BreadDataDeleted;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreIndividualRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\StoreOrganisationRequest;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class RequestController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->orderBy('id','desc')->paginate(5);
        $tap = __('site.all consultations');
        return view('users.consultation_main', compact('tap','userconsultations'));
    }
    public function newConsultations()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->where('status', 'submitted')->orderBy('id','desc')->paginate(5);
        $tap = __('site.new consultations');
        return view('users.consultation_main', compact('tap','userconsultations'));
    }
    public function closedConsultations()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->where('status', 'closed')->orderBy('id','desc')->paginate(5);
        $tap = __('site.closed consultations');
        return view('users.consultation_main', compact('tap','userconsultations'));
    }
    public function assignedConsultations()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->where('status', 'assigned')->orderBy('id','desc')->paginate(5);
        $tap = __('site.assigned consultations');
        return view('users.consultation_main', compact('tap','userconsultations'));
    }
    public function rejectedConsultations()
    {
        $user=Auth::user();
        $userconsultations = Consultation::where('user_id', $user->id)->where('status', 'rejected')->orderBy('id','desc')->paginate(5);
        $tap = __('site.rejected consultations');
        return view('users.consultation_main', compact('tap','userconsultations'));
    }


    public function create()
    {
        $user=Auth::user();
        $phone="";
        $categories = ConsultationCategory::get();

        if ($user->individual) {
            $phone= $user->individual->phone;
        }
        else if($user->organisation)

        {
            $phone= $user->organisation->phone;
        }
        else if($user->Orphanage)
        {
            $phone= $user->Orphanage->mobile;
        }

        return view('users.consultation_request', compact('user', 'phone','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company_validated = $request->validate([
            'title' => ['required', 'string'],
            'category' => ['required', 'exists:consultation_categories,id'],
            'content' => ['required', 'string'],
            'attachment' => ['file'],
        ]);
        $saved_path = '';
        if($request->file('attachment')){
            $path = 'public/consultations/'.Carbon::now()->format('d-m-Y');
            $file_name = str_replace(' ', '_', Auth::user()->name);
            $saved_path =  env('APP_URL').'/storage/consultations/'.Carbon::now()->format('d-m-Y').'/'.$file_name.'.'.$request->attachment->getClientOriginalExtension();
            $request->file('attachment')->storeAs($path, $file_name.'.'.$request->attachment->getClientOriginalExtension());

        }
        $consultation = Consultation::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'status' =>'submitted',
            'attachment' => $saved_path,
        ]);

        // $users = User::where('role_id', '4' )->orWhere('role_id', '7')->get();

        // Notification::send($users, new newConsultation($consultation));

        return redirect()->back()->with('msg', __('site.sent successfully'));
    }

    public function status($id) {

        //$withdraw = new Consultation; '/consultation/main' ->with('message', 'Success', compact('withdraw'));
        //$withdraw = $request->input('status');
        $withdraw = Consultation::select('status')->where('id', $id)->first();
        Consultation::where('id' , $id)->update(['status'=>'closed']);

        //$withdraw -> status = 'closed';
        //$withdraw->save();
        //DB::update('update consultations set status ?', [$withdraw]);
        //dd($withdraw);
        return redirect()->back()->with('msg', __('site.consultation was closed successfully'));;
       }
}
