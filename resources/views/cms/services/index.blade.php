@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ __('lang.services') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/Services.css?v=2.3') }}" />
    <link rel="stylesheet" href="{{asset('css/Careers.css?v=2.0')}}"/>

@endsection

@section('content')
    @include('web.inc.map')
    <section id="jobs">
        <p> {!! $service->$details !!} </p>
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.services') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="jobs">
            @forelse($sub_services as $sub_service)
                <div class="job job{{$sub_service->id}}">
                    <h2>{{ $sub_service->$title }}</h2>
                    <div class="links">
                        <a class="call-to-job" href="{{ route('web.pages.sub_services',$sub_service->id) }}">{{ __('lang.details') }}</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">{{ __('lang.no_data') }}</div>
            @endforelse
        </div>
    </section>

@endsection
