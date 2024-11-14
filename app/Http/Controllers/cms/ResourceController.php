<?php

namespace App\Http\Controllers\cms;

use App\Models\Resource;
use App\Models\ResourceDownload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ResourceDataRequest;

class ResourceController extends Controller
{
    function index($id){
        $resource = Resource::find($id);
        return view('cms.resources.show',compact(['resource']));
    }
    function download(ResourceDataRequest $request,$id){
        ResourceDownload::StoreData($request,$id);
        $file= public_path(). "/storage/" . json_decode(Resource::find($id)->first()->file)[0]->download_link;
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, 'filename.pdf', $headers);
    }
}
