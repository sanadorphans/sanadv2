<?php

namespace App\Http\Controllers\CMS;

use App\Models\Resource;
use App\Models\SubService;
use Illuminate\Http\Request;
use App\Models\ResourceDownload;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceDataRequest;
use Illuminate\Support\Facades\Response;

class SubServiceController extends Controller
{
    //
    public function show($slug)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $SubService = $this->findOrFailBySlug(SubService::class, $slug);
        if ($columnName && is_null($SubService->$columnName)) {
            abort(404);
        }
        $SubService->load('items');
        return view('cms.services.sub.index')->with([
            'sub_service' => $SubService,
            'resource' =>  Resource::find(9),
        ]);
    }


}