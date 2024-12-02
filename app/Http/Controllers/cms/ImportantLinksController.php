<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportantLink;

class ImportantLinksController extends Controller
{
    public function index(){
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $ImportantLinks = ImportantLink::orderBy('created_at','desc')
            ->whereNotNull($columnName)
            ->paginate(12);

        return view('cms.ImportantLink.index')->with('ImportantLinks', $ImportantLinks);
    }
}
