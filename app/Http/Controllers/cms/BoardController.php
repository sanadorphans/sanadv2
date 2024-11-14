<?php

namespace App\Http\Controllers\CMS;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Models\SocialMediaStaff;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{

    public function index()
    {
        $board = Board::orderBy('order')->get();
        return view('cms.board.index',compact(['board']));
    }
    public function show($id)
    {
        $board_member = Board::find($id);
        $socialMediaBoard = SocialMediaStaff::where('board_name',$id)->get();
        return view('cms.board.show',compact(['board_member','socialMediaBoard']));
    }

}
