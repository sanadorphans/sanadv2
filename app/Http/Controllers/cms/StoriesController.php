<?php

namespace App\Http\Controllers\CMS;

use App\Models\Story;
use Illuminate\Http\Request;
use App\Models\StoriesCategory;
use App\Http\Controllers\Controller;

class StoriesController extends Controller
{
    //
    public function index()
    {
        $StoriesCategory = StoriesCategory::with('Story')->get();
        return view('cms.stories.index',compact(['StoriesCategory']));
    }

    public function show($id)
    {
        $story = Story::find($id);
        return view('cms.stories.show',compact(['story']));
    }
}
