@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.important links') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.2')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="Links">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.important links') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Links">
            @forelse ($ImportantLinks as $ImportantLink)
                <div class="Link Link{{$ImportantLink->id}}">
                    <a href="{{$ImportantLink->link}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\/" , "/",$ImportantLink->image)}})"></div>
                        <p>{{$ImportantLink->$title}}</p>
                    </a>
                </div>
            @empty
            @endforelse
            @forelse ($ImportantLinks as $ImportantLink)
        @empty
        @endforelse
        </div>
    </section>
    <div class="pagination" >{!! $ImportantLinks->links() !!}</div>

@endsection
