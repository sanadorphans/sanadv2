@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $image = 'image' . '_' . app()->getLocale();
    $file = 'file' . '_' . app()->getLocale();

    if (!function_exists('to_arabic_number')) {
        function to_arabic_number($Month) {
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
            $Month = str_replace("July", "يليو", $Month);
            $Month = str_replace("August", "أغسطس", $Month);
            $Month = str_replace("September", "سبتمبر", $Month);
            $Month = str_replace("October", "أكتوبر", $Month);
            $Month = str_replace("November", "نوفمبر", $Month);
            $Month = str_replace("December", "ديسمبر", $Month);
            return $Month;
        }
    }
@endphp

@section('page_name')
    {{ __('lang.Who We Are') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/WhoWeAre.css?v=1.9') }}">
@endsection

@section('content')

    <section class="watania-story">
        <div class="title general">
            <h1 class="GeneralTitle">{{ $sections[0]->$title }}</h1>
        </div>
        <div class="container">
            <div class="text">
                <p class="text-justify">
                    {{ $sections[0]->$details }}
                </p>
                <button class="full-text">{{ __('lang.more') }}</button>
            </div>
            <div class="watania-video">
                <iframe class="story-video" src="https://www.youtube.com/embed/lNpo7sIex6s" width="450" height="300"
                    name="sanadstory" title="sanadstory"></iframe>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="title general">
            <h1 class="GeneralTitle">{{ $sections[1]->$title }}</h1>
        </div>
        <div class="description">
            <img src="{{ asset('img/nav/sen-black.svg') }}" alt="sen-black" width="50" height="50">
            <p>{{ $sections[1]->$details }}</p>
            <img src="{{ asset('img/nav/dal-black.svg') }}" alt="dal-black" width="50" height="50">
        </div>
    </section>

    <section id="about">
        <div class="title general">
            <h1 class="GeneralTitle">{{ $sections[2]->$title }}</h1>
        </div>
        <div class="description">
            <p>{{ $sections[2]->$details }}</p>
        </div>
    </section>

    <section class="our-values">
        <div class="title general">
            <h1 class="GeneralTitle">{{ $sections[3]->$title }}</h1>
        </div>
        <div class="container">
            <div class="description">
                <p>{{ $sections[3]->$details }}</p>
            </div>
            <div class="values">
                <img class="value" src="{{ '/storage/' . str_replace('\\', '/', $sections[4]->$image) }}"  alt="{{$sections[4]->$title}}"
                    onclick="changeImg('#854893','{{ $sections[4]->$details }}')"
                    width="200" height="auto">
                <img class="value" src="{{ '/storage/' . str_replace('\\', '/', $sections[5]->$image) }}"  alt="{{$sections[5]->$title}}"
                    onclick="changeImg('#6fc1c2','{{ $sections[5]->$details }}')"
                    width="200" height="auto">
                <img class="value" src="{{ '/storage/' . str_replace('\\', '/', $sections[6]->$image) }}"  alt="{{$sections[6]->$title}}"
                    onclick="changeImg('#e4824a','{{ $sections[6]->$details }}')"
                    width="200" height="auto">
                <img class="value" src="{{ '/storage/' . str_replace('\\', '/', $sections[7]->$image) }}"  alt="{{$sections[7]->$title}}"
                    onclick="changeImg('#db3e79','{{ $sections[7]->$details }}')"
                    width="200" height="auto">
            </div>
            <div class="slider-values">
                <p></p>
            </div>
    </section>

    <!-- section4 -->
    <section class="our-methodology">
        <div class="title general">
            <h1 class="GeneralTitle">{{ $sections[8]->$title }}</h1>
        </div>
        <div class="container">
            <div class="text">
                <p>{{ $sections[8]->$details }}</p>
            </div>
        </div>
    </section>

    <div style="display:grid; justify-items: center; margin: 20px 0;">
        <a class="call-action" href="/storage/{{json_decode($sections[15]->$file)[0]->download_link }}">{{ $sections[15]->$title }}</a>
    </div>

@endsection

@section('js')
    <script src="{{ asset('js/WhoWeAre.js?v=1.7') }}"></script>
@endsection
