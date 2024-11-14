@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.Alliances') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Alliances.css?v=1.3')}}">
@endsection

@section('content')
    @include('web.inc.map')
    <section id="alliances">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.Alliances') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <h1 class="alliances_title">{{ __('lang.alliances_title') }}</h1>
        <p class="alliances_details">{{ __('lang.alliances_details') }}</p>
        <div class="alliances">
            @forelse($alliances as $alliance)
                <div class="alliance">
                    <p>{{$alliance->$details}}</p>
                    <a href="{{$alliance->link}}"><img src="{{ asset('storage/' . $alliance->image) }}" alt="Alliances"></a>
                </div>
            @empty
            @endforelse
        </div>
        <div class="details">
            <img src="" alt="" width="200" height="auto">
            <section>
                <h1></h1>
                <div class="info"></div>
            </section>
        </div>
    </section>

@endsection



