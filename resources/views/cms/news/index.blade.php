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

@section('page_name') {{ __('lang.news') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.5')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="news">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.news') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="news">
            @forelse ($news as $new)
                <div class="new new{{$new->id}}">
                    <a href="/pages/news/{{$new->id}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\/" , "/",$new->image)}})"></div>
                        <p class="title">{{$new->$title}}</p>
                        <p>{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($new->created_at))) : $new->created_at->formatLocalized('%B %Y') }}</p>

                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </section>
    <div class="pagination" >{!! $news->links() !!}</div>

@endsection
