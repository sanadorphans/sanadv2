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
    public function show($id)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $SubService = SubService::with('items')->whereNotNull($columnName)->find($id);
        if (!$SubService) {
            abort(404);
        }else{
            return view('cms.services.sub.index')->with([
                'sub_service' => $SubService,
                'resource' =>  Resource::find(id: 9),
            ]);
        }
    }


}
