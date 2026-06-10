@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ __('lang.services') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/Services.css?v=2.2') }}" />
    <link rel="stylesheet" href="{{asset('css/Careers.css?v=1.9')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="jobs">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.services') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="jobs">
            @forelse($services as $service)
                <div class="job job{{$service->id}}">
                    <h2>{{ $service->$title }}</h2>
                    <div class="links">
                        <a class="call-to-job" href="{{ route('web.pages.services', $service->id) }}">{{ __('lang.details') }}</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">{{ __('lang.no_data') }}</div>
            @endforelse
    </section>

@endsection
