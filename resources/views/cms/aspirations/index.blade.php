@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.Our_Aspirations') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Aspiration.css?v=1.3')}}">
    <link rel="stylesheet" href="{{ asset('css/WhoWeAre.css?v=1.6') }}">
@endsection

@section('content')
    @include('web.inc.map')
    <section id="Aspirations">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.Our_Aspirations') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="watania d2030">
            <h1>{{ $sections[14]->$title }}</h1>
            @if (app()->getLocale() == 'ar')
                <div class="development-img">
                    <img src="{{ asset('img/b1.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b2.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b3.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b4.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b5.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b6.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b7.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b8.png') }}" loading="lazy" alt="achieve">
                </div>
            @else
                <div class="development-img">
                    <img src="{{ asset('img/b1_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b2_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b3_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b4_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b5_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b6_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b7_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b8_en.png') }}" loading="lazy" alt="achieve">
                </div>
            @endif
        </div>
        {{-- <div class="Aspirations" style="margin:0px 50px">
            <p>{!! $Aspiration[0]->$details !!}</p>
        </div> --}}
    </section>

@endsection

