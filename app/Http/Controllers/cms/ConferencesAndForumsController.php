<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Models\KnowledgeCreation;
use App\Http\Controllers\Controller;

class ConferencesAndForumsController extends Controller
{
    function index($id){
        $KnowledgeCreation = KnowledgeCreation::with('ConferencesAndForum')->find($id);
        return view('cms.resources.index',compact(['KnowledgeCreation']));
    }
}
