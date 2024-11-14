<?php

namespace App\Http\Controllers\cms;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\KnowledgeCreation;
use App\Http\Controllers\Controller;

class KnowledgeCreationController extends Controller
{
    function index($id){
        if($id == 1){
            $KnowledgeCreation = KnowledgeCreation::with('Resources')->find($id);
            return view('cms.resources.index',compact(['KnowledgeCreation']));
        }else if($id == 2){
            $KnowledgeCreation = KnowledgeCreation::with('ConferencesAndForum')->find($id);
            return view('cms.conferencesAndForums.index',compact(['KnowledgeCreation']));
        }else if($id == 3){
            $KnowledgeCreation = KnowledgeCreation::with('Events')->find($id);
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

        // $data = '';
        // foreach($results as $result){
        //     $data = `
        //     <div class="resource">
        //         <a href="{{ route('web.pages.resource',$result->id}) }}"><div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$result->image})}})"></div></a>
        //         <a href="{{ route('web.pages.resource',$result->id}) }}"><h1>$result->title_ar}</h1></a>
        //     </div>
        //     `;
        // }

        // Return the search results as JSON response
        return response()->json($results);
    }


}
