<?php

namespace App\Http\Controllers\cms;

use App\Models\SubProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubProgramController extends Controller
{
    public function show($id)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $SubProgram = SubProgram::whereNotNull($columnName)->find($id);
        if (!$SubProgram) {
            abort(404);
        }else{
            return view('cms.Programs.sub.index')->with([
                'sub_program' => $SubProgram,
            ]);
        }
    }
}
