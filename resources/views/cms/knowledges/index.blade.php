@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
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
@endphp

@section('page_name') {{ __('lang.article') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.5')}}"/>
    <link rel="stylesheet" href="{{asset('css/Home.css?v=2.8')}}">
@endsection

@section('content')
    @include('web.inc.map')
    <section class="news-section" id="news">
      <div class="si">
        <div class="news-hdr">
          <div>
            <div class="stag"><span class="stag-line"></span><span>{{ __('lang.article') }}</span></div>
          </div>
        </div>
            <div class="news">
                @forelse ($articles as $article)
                      <div class="ncard" style="margin: 10px; background: white; height: 100%;">
                        <div class="nimg" style="background: url(../storage/{{str_replace("\\" , "/",$article->image)}});background-size: cover; background-position: center; height: 230px;">
                        </div>
                        <div class="nbody" style="padding: 1.5rem;">
                          <div class="ndate" style="font-size: 12px; color: var(--muted); margin-bottom: 0.5rem;">{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($article->created_at))) : $article->created_at->formatLocalized('%B %Y') }}</div>
                          <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 1rem; line-height: 1.4; min-height: 48px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$article->$title}}</h4>
                          <a href="/pages/article/{{$article->id}}" class="nread" style="font-size: 13px; color: var(--teal); font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">{{ __('lang.more') }} {{ __('lang.arrow_dir') }}</a>
                        </div>
                      </div>
                @empty
                @endforelse
            </div>
            <div class="pagination" >{!! $articles->links() !!}</div>
      </div>
    </section>

@endsection
