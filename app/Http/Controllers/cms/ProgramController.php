<?php

namespace App\Http\Controllers\cms;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function show($slug)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $Program = $this->findOrFailBySlug(Program::class, $slug);
        if ($columnName && is_null($Program->$columnName)) {
            abort(404);
        }
        return view('cms.Programs.index')->with([
            'Program' => $Program,
            'sub_Programs' => $Program->sub_programs->whereNotNull($columnName)->sortBy('order'),
        ]);

    }
}