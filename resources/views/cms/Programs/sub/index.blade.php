@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $achievement = 'achievements' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $sub_program ? $sub_program->$title :  '' }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Service.css?v=1.3')}}"/>
@endsection

@section('content')


    <header id="header" data-content="{{ $sub_program->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$sub_program->image)}})">
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        <h1 class="GeneralTitle">{{ $sub_program->$title }}</h1>
        <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')
        <section id="service">
            <div class="service">
                <div class="details">
                    <p>{!! $sub_program->$details !!}</p>
                    {{-- <div class="target">
                        <h1>{{__('lang.Achievements')}}</h1>
                        <p>{!! $sub_program->$achievement !!}</p>
                        @if (!empty(json_decode($sub_program->file)))
                            <a href="/storage/{{json_decode($sub_program->file)[0]->download_link}}">{{ __('lang.more') }}</a>
                        @endif
                    </div> --}}

                </div>
                <div class="image">
                    <img src="{{asset('/storage/' . str_replace("\\" , "/",$sub_program->image))}}" alt="{{ $sub_program->$title }}">
                </div>
            </div>
        </section>

    {{-- @if($sub_program->items->first() != null)

        @forelse($sub_program->items as $index => $items)
            <section id="service">
                <div class="service">
                    <div class="details">
                        <div class="title">
                            <span>0{{$index + 1}}</span>
                            <h1>{{ $items->$title }}</h1>
                        </div>
                        <p>{!! $items->$details !!}</p>
                        @if ($items->$achievements != null)
                            <div class="target">
                                <h1>{{__('lang.Achievements')}}</h1>
                                <p>{!! $items->$achievements !!}</p>
                            </div>
                        @endif
                    </div>
                    <div class="image">
                        <img src="{{asset('/storage/' . str_replace("\\" , "/",$items->image))}}" alt="{{ $items->$title }}">
                    </div>
                </div>

            </section>
        @empty
            <div class="alert alert-info">{{ __('lang.no_data') }}</div>
        @endforelse

    @endif --}}

@endsection
