<?php

namespace App\Http\Controllers\cms;

use App\Models\KnowledgeCreation;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    function index($id){
        $KnowledgeCreation = KnowledgeCreation::with('Resources')->find($id);
        return view('cms.resources.index',compact(['KnowledgeCreation']));
    }
}
