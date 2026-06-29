<?php

namespace App\Http\Controllers\cms;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\KnowledgeCreation;
use App\Http\Controllers\Controller;

class KnowledgeCreationController extends Controller
{
    function index($slug){
        $KnowledgeCreation = $this->findOrFailBySlug(KnowledgeCreation::class, $slug);

        if($KnowledgeCreation->id == 1){
            $KnowledgeCreation->load('Resources');
            return view('cms.resources.index',compact(['KnowledgeCreation']));
        }else if($KnowledgeCreation->id == 2){
            $KnowledgeCreation->load('ConferencesAndForum');
            return view('cms.conferencesAndForums.index',compact(['KnowledgeCreation']));
        }else if($KnowledgeCreation->id == 3){
            $KnowledgeCreation->load('Events');
            return view('cms.events.index',compact(['KnowledgeCreation']));
        }

    }

    // make function that take value from search field and make query to search about some thisng like this and return responce json
    public function search(Request $request)
    {
        $searchValue = $request->input('search');

        // Perform the search query based on the search term w
        $results = Resource::where('title_ar', 'LIKE', '%' . $searchValue . '%')
                ->orwhere('title_en', 'LIKE', '%' . $searchValue . '%')->get();

        // Return the search results as JSON response
        return response()->json($results);
    }


}