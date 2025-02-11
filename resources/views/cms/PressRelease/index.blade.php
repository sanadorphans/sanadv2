@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.Press_Releases') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.3')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="PressReleases">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.Press_Releases') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="PressReleases">
            @forelse ($PressReleases as $PressRelease)
                <div class="PressRelease PressRelease{{$PressRelease->id}}">
                    <a href="/pages/PressRelease/{{$PressRelease->id}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$PressRelease->image)}})"></div>
                        <p>{{$PressRelease->$title}}</p>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </section>
    <div class="pagination" >{!! $PressReleases->links() !!}</div>

@endsection
