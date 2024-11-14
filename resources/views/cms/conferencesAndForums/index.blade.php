@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $KnowledgeCreation->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/ConferencesAndForums.css?v=1.2')}}"/>
@endsection

@section('content')
    <header id="header" data-content="{{ $KnowledgeCreation->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$KnowledgeCreation->image)}})">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        <h1 class="GeneralTitle">{{ $KnowledgeCreation->$title }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')
    <section id="ConferencesAndForums">
        <div class="ConferencesAndForums">
            <div class="description">
                <p>{!! $KnowledgeCreation->$details !!}</p>
            </div>
            <div class="image">
                <div class="glide AllConfrences">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @forelse($KnowledgeCreation->ConferencesAndForum as $ConferencesAndForum)
                                <li class="glide__slide"><img src="{{ asset('storage/' . $ConferencesAndForum->image) }}" alt="{{$ConferencesAndForum->$title}}" width="100" height="100" data-details="{{ $ConferencesAndForum->$details }}" data-title="{{ $ConferencesAndForum->$title }}"></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="glide__arrows" data-glide-el="controls">
                        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><img src="{{asset('img/Home/blue-arrow.svg')}}" alt="blue-arrow" width="80px" height="80px"></button>
                    </div>
                </div>
            </div>
            <div class="details">
                <img src="{{ asset('storage/' . $ConferencesAndForum->image) }}" alt="{{$ConferencesAndForum->$title}}" width="200" height="auto">
                <section>
                    <h1>{{$ConferencesAndForum->$title}}</h1>
                    <div class="info">{!!$ConferencesAndForum->$details!!}</div>
                </section>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="{{asset('js/ConferencesAndForums.js?v=1.0')}}"></script>
@endsection
