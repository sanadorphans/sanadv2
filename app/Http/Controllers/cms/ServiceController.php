<?php

namespace App\Http\Controllers\CMS;

use App\Models\Service;
use App\Models\KnowledgeCreation;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function show($id)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $service = Service::whereNotNull($columnName)->find($id);

        if (!$service) {
            abort(404);
        }else{
            return view('cms.services.index')->with([
                'service' => $service,
                'sub_services' => $service->sub_services->whereNotNull($columnName)->sortBy('order'),
                'KnowledgeCreations' => KnowledgeCreation::whereNotNull($columnName)->get()
            ]);
        }

    }
}

