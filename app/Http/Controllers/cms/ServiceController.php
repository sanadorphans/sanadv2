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
        $columnName = $locale ? 'title_' . $locale : 'title_en'; // fallback if needed

        $service = Service::with(['sub_services' => function ($query) use ($columnName) {
            $query->whereNotNull($columnName)->orderBy('order');
        }])->findOrFail($id);

        return view('cms.services.index')->with([
            'service' => $service,
            'sub_services' => $service->sub_services->unique('id'),
            'KnowledgeCreations' => KnowledgeCreation::whereNotNull($columnName)->get(),
        ]);

    }
}

