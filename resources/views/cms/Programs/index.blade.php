@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ __('lang.our_programs') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/Services.css?v=2.0') }}" />
@endsection

@section('content')
    <header id="header" data-content="{{ $Program->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$Program->image)}})">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        <h1 class="GeneralTitle">{{ $Program->$title }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')
    <section id="services">
        <p> {{ $Program->$details }} </p>
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.our_programs') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="services">
                @forelse($sub_Programs as $sub_Program)
                    <div class="service service{{$sub_Program->id}}"  style="--background: url(../storage/{{str_replace("\\" , "/",$sub_Program->image)}})">
                        <h1>{{ $sub_Program->$title }}</h1>
                        <a href="{{ route('web.pages.sub_Programs',$sub_Program->id) }}">{{__('lang.more')}}</a>
                    </div>
                @empty
                    <div class="alert alert-info">{{ __('lang.no_data') }}</div>
                @endforelse
        </div>
    </section>
@endsection
