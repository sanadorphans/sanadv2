<?php

namespace App\Http\Controllers\cms;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
    public function show($id)
    {
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $Program = Program::whereNotNull($columnName)->find($id);
        if (!$Program) {
            abort(404);
        }else{
            return view('cms.Programs.index')->with([
                'Program' => $Program,
                'sub_Programs' => $Program->sub_Programs->whereNotNull($columnName)->sortBy('order'),
            ]);
        }

    }
}
