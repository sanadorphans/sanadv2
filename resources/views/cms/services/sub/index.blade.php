@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $target = 'target' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $sub_service ? $sub_service->$title :  '' }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Service.css?v=1.4')}}"/>
@endsection

@section('content')


    <header id="header" data-content="{{ $sub_service->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$sub_service->image)}})">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        <h1 class="GeneralTitle">{{ $sub_service->$title }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')

    @if ($sub_service->$details != "")
        <section id="service">
            <div class="service">
                <div class="details">
                    <p>{!! $sub_service->$details !!}</p>
                    {{-- <div class="target">
                        <h1>{{__('lang.targeted_groups')}}</h1>
                        <p>{!! $sub_service->$target !!}</p>
                        @if (!empty(json_decode($sub_service->file)))
                            <a href="/storage/{{json_decode($sub_service->file)[0]->download_link}}">{{ __('lang.more') }}</a>
                        @endif
                    </div> --}}
                </div>
                <div class="image">
                    <img src="{{asset('/storage/' . str_replace("\\" , "/",$sub_service->image))}}" alt="{{ $sub_service->$title }}">
                </div>
            </div>
        </section>
    @endif

    @if($sub_service->items->first() != null)

        @forelse($sub_service->items as $index => $items)
            <section id="service">
                <div class="service">
                    <div class="details">
                        <div class="title">
                            <span>0{{$index + 1}}</span>
                            <h1>{{ $items->$title }}</h1>
                        </div>
                        <p>{!! $items->$details !!}</p>
                        <div class="target">
                            <h1>{{__('lang.targeted_groups')}}</h1>
                            <p>{!! $items->$target !!}</p>
                        </div>
                    </div>
                    <div class="image">
                        <img src="{{asset('/storage/' . str_replace("\\" , "/",$items->image))}}" alt="{{ $items->$title }}">
                    </div>
                </div>

            </section>
        @empty
            <div class="alert alert-info">{{ __('lang.no_data') }}</div>
        @endforelse

    @endif

@endsection
