<?php

namespace App\Http\Controllers\cms;

use App\Models\Resource;
use App\Models\ResourceDownload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\ResourceDataRequest;

class ResourceController extends Controller
{
    function index($slug){
        $resource = $this->findOrFailBySlug(Resource::class, $slug);
        return view('cms.resources.show',compact(['resource']));
    }
    function download(ResourceDataRequest $request,$slug){
        $resource = $this->findOrFailBySlug(Resource::class, $slug);
        ResourceDownload::StoreData($request,$resource->id);
        $file= public_path(). "/storage/" . json_decode($resource->file)[0]->download_link;
        if($resource->id == "9"){
            $file= public_path(). "/storage/" . 'resources/May2025/K4C3FeBKtxNB8vtXi6IF.pdf';
            $headers = array('Content-Type: application/pdf',);
            return Response::download($file,'دليل خدمات الرعاية اللاحقة للشباب خريجي دور الرعاية.pdf', $headers);
        }
        $headers = array('Content-Type: application/pdf',);
        return Response::download($file, $resource->id . '.pdf', $headers);
    }
}