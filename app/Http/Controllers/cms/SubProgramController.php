<?php

namespace App\Http\Controllers\cms;

use App\Models\SubProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubProgramController extends Controller
{
    public function show($slug)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $SubProgram = $this->findOrFailBySlug(SubProgram::class, $slug);
        if ($columnName && is_null($SubProgram->$columnName)) {
            abort(404);
        }
        return view('cms.Programs.sub.index')->with([
            'sub_program' => $SubProgram,
        ]);
    }
}