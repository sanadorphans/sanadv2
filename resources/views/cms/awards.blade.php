@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.awards') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Awards.css?v=2.1')}}">
@endsection

@section('content')
    @include('web.inc.map')
    <section id="Awards">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.awards') }} </h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Awards">
            @forelse($awards as $award)
                <div class="details">
                    <img src="{{ asset('storage/' . $award->image) }}" alt="{{$award->$title}}" width="200" height="auto">
                    <section>
                        <h1>{{$award->$title}}</h1>
                        <div class="info">{!!$award->$details!!}</div>
                    </section>
                </div>
            @empty
            @endforelse
        </div>
    </section>
    {{-- <section id="Awards">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.awards') }} </h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Awards">
            <div class="image">
                <div class="glide AllAwards">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @forelse($awards as $award)
                                <li class="glide__slide"><img src="{{ asset('storage/' . $award->image) }}" alt="{{$award->$title}}" width="100" height="100" data-details="{{ $award->$details }}" data-title="{{ $award->$title }}"></li>
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
                <img src="{{ asset('storage/' . $award->image) }}" alt="{{$award->$title}}" width="200" height="auto">
                <section>
                    <h1>{{$award->$title}}</h1>
                    <div class="info">{!!$award->$details!!}</div>
                </section>
            </div>
        </div>
    </section> --}}
@endsection

@section('js')
    <script src="{{asset('js/Awards.js?v=1.0')}}"></script>
@endsection

