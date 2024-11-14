<?php

namespace App\Http\Controllers\CMS;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Models\SocialMediaStaff;
use App\Http\Controllers\Controller;

class TeamMemberController extends Controller
{

    public function index()
    {
        $team_members = TeamMember::orderBy('order')->get();
        return view('cms.team_members.index',compact(['team_members']));
    }

    public function show($id)
    {
        $team_member = TeamMember::find($id);
        $socialMediaStaff = SocialMediaStaff::where('staff_name',$id)->get();
        return view('cms.team_members.show',compact(['team_member','socialMediaStaff']));
    }


}
