@extends('web.layouts.master')

@php
    $title = "title" . "_" . app()->getLocale();
@endphp

@section('page_name') {{ $KnowledgeCreation->$title }}  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.2')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="events">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ $KnowledgeCreation->$title }} </h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="events">
            @forelse($KnowledgeCreation->Events as $event)
                <div class="event event{{$event->id}}">
                    <a href="{{route('web.pages.events.show',$event->id)}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$event->image)}})"></div>
                        <p>{{$event->$title}}</p>
                    </a>
                </div>
            @empty
                <div>{{ __('lang.no_data') }}</div>
            @endforelse
        </div>
    </section>
    {{-- <div class="pagination" >{!! $bags->links() !!}</div> --}}

@endsection

