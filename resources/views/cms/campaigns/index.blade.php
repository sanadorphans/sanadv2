@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ __('lang.campaigns') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Campaigns.css?v=1.4')}}"/>
@endsection

@section('content')
    @php
        $title = 'title' . '_' . app()->getLocale();
        $details = 'details' . '_' . app()->getLocale();
    @endphp
        @include('web.inc.map')
        <!-- section 1 -->
        <section id="Campaigns">
            <div class="title general">
                <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
                <h1 class="GeneralTitle">{{ __('lang.campaigns') }}</h1>
                <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            </div>
            <div class="Campaigns">
                <p class="campaigns_details">{{__('lang.campaigns_details')}}</p>
                <h1 class="title">{{__('lang.campaigns_details2')}}</h1>
                <div class="image">
                    <div class="glide AllCampaigns">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">
                                @forelse($campaigns as $campaign)
                                    <li class="glide__slide"><h1 data-details="{{ $campaign->$details }}" data-title="{{ $campaign->$title }}" data-link="{{ $campaign->link }}" data-image="{{ asset("/storage/$campaign->image")}}">{{ $campaign->$title }}</li>
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
                    <img src="" alt="" width="200" height="auto">
                    <section>
                        <h1></h1>
                        <div class="info"></div>
                        <a class="a-HasTag" href="{{ $campaigns[0]->link }}">{{ __('lang.more') }}</a>
                        <img src="{{ asset('img/611bcb73e85fe.svg') }}" alt="شكل هاشتاج">
                    </section>
                </div>
            </div>
        </section>


@endsection

@section('js')
    <script src="{{asset('js/Campaigns.js?v=1.0')}}"></script>
@endsection

