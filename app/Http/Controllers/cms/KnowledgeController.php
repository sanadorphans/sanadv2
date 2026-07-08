<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Knowledge;

class KnowledgeController extends Controller
{

    public function index(){
        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $articles = Knowledge::orderBy('created_at','desc')
            ->whereNotNull($columnName)
            ->paginate(12);

        return view('cms.article.index')->with('articles', $articles);
    }

    public function show($slug){

        $locale = app()->getLocale();
        $columnName = $locale ? 'title_' . $locale : false;
        $article = Knowledge::findOrFailBySlug(Knowledge::class, $slug);

        return view('cms.knowledge.show')->with([
            'article' => $article,
            'other_articles' => Knowledge::inRandomOrder()->whereNotNull($columnName)->take(3)->get(),
            'title' => $article->title,
            'date' => app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($article->created_at))) : $article->created_at->formatLocalized('%B %Y')
        ]);

    }

}
function to_arabic_number($Month)
    {
        $Month = str_replace("1", "۱", $Month);
        $Month = str_replace("2", "۲", $Month);
        $Month = str_replace("3", "۳", $Month);
        $Month = str_replace("4", "٤", $Month);
        $Month = str_replace("5", "٥", $Month);
        $Month = str_replace("6", "٦", $Month);
        $Month = str_replace("7", "۷", $Month);
        $Month = str_replace("8", "۸", $Month);
        $Month = str_replace("9", "۹", $Month);
        $Month = str_replace("0", "۰", $Month);
        $Month = str_replace("January", "يناير", $Month);
        $Month = str_replace("February", "فبراير", $Month);
        $Month = str_replace("March", "مارس", $Month);
        $Month = str_replace("April", "أبريل", $Month);
        $Month = str_replace("May", "مايو", $Month);
        $Month = str_replace("June", "يونيو", $Month);
        $Month = str_replace("July", "يوليو", $Month);
        $Month = str_replace("August", "أغسطس", $Month);
        $Month = str_replace("September", "سبتمبر", $Month);
        $Month = str_replace("October", "أكتوبر", $Month);
        $Month = str_replace("November", "نوفمبر", $Month);
        $Month = str_replace("December", "ديسمبر", $Month);
        return $Month;
}