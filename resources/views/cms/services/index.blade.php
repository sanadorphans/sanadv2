@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ __('lang.services') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/Services.css?v=2.0') }}" />
@endsection

@section('content')
    {{-- <header id="header" data-content="{{ $service->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$service->image)}})"> --}}
    <header id="header" data-content="{{ $service->$title }}" style="--background: url(../img/a1.jpeg)">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        {{-- <h1 class="GeneralTitle">{{ $service->$title }}</h1> --}}
        <h1 class="GeneralTitle">{{ __('lang.our_services') }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')
    <section id="services">
        {{-- <p> {{ $service->$details }} </p> --}}
        {{-- <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.services') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div> --}}
        <div class="services">
            {{-- @if ($service->id == 3)
            @forelse($KnowledgeCreations as $KnowledgeCreation)
                <div class="service service{{$KnowledgeCreation->id}}"  style="--background: url(../storage/{{str_replace("\\" , "/",$KnowledgeCreation->image)}})">
                    <h1>{{ $KnowledgeCreation->$title }}</h1>
                    <a href="{{ route('web.pages.KnowledgeCreation',$KnowledgeCreation->id) }}">{{__('lang.more')}}</a>
                </div>
            @empty
                <div class="alert alert-info">{{ __('lang.no_data') }}</div>
            @endforelse
            @else
                @forelse($sub_services as $sub_service)
                    <div class="service service{{$sub_service->id}}"  style="--background: url(../storage/{{str_replace("\\" , "/",$sub_service->image)}})">
                        <h1>{{ $sub_service->$title }}</h1>
                        <a href="{{ route('web.pages.sub_services',$sub_service->id) }}">{{__('lang.more')}}</a>
                    </div>
                @empty
                    <div class="alert alert-info">{{ __('lang.no_data') }}</div>
                @endforelse
            @endif --}}
            {{-- <img src="{{ asset('img/a1.jpeg') }}" alt="services" width="100" height="100"> --}}
            <p>{{ __('lang.services-details') }} <span style="color:#1EC0CA;">info@sanadorphans.org </span></p>
        </div>
    </section>
@endsection
