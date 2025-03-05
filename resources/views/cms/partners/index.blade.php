@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details =  'details' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.Partners_Network') }} @endsection


@section('style')
    <link rel="stylesheet" href="{{asset('css/Partners.css?v=2.2')}}">
@endsection

@section('content')
    @include('web.inc.map')

    @forelse ($PartnerType as $PartnerType)
    <section id="partners">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{$PartnerType->$title}}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
            <div class="partners">
                <div class="description">
                    <p>{!! $PartnerType->$details !!}</p>
                </div>
                <div class="image">
                @forelse ($PartnerType->Partner as $Partner)
                    <li class="glide__slide"><img src="{{ asset('storage/' . $Partner->image) }}" alt="image" width="60" height="60"></li>
                @empty
                @endforelse
               </div>

            </div>
    </section>
    @empty
    @endforelse
@endsection

@section('js')
    <script src="{{asset('js/Partners.js')}}"></script>
@endsection
