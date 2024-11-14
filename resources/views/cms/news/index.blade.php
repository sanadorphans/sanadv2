@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.news') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.2')}}"/>
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
                        <p>{{$new->$title}}</p>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </section>
    <div class="pagination" >{!! $news->links() !!}</div>

@endsection
