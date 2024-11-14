<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index(){
        $socials = SocialMedia::get();
        return view('contact_us',compact(['socials']));
    }
    public function send(Request $request){
        Mail::to(env('MAIL_USERNAME'))
            ->send(new ContactUs($request->name,$request->message,$request->email,$request->phone));
        return back();
    }
}
