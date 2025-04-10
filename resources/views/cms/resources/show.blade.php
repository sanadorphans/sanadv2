@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $resource->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Resource.css?v=1.3')}}"/>
@endsection

@section('content')
@include('web.inc.map')
    {{-- <section>
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ $resource->$title }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
    </section> --}}
    <section id="ResourceForm">
        <form method="post" action="{{ route('web.pages.resource.download',$resource->id) }}">
            @csrf()
            <p class="DataRequired">{{__('lang.DataRequired')}}</p>
            <div>
                <label for="name">{{__('lang.fullName')}}</label>
                <input type="text" name="name" id="name">
            </div>
            <div>
                <label for="email">{{__('lang.email')}}</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="phone">{{__('lang.phone')}}</label>
                <input type="text" name="phone" id="phone">
            </div>
            <div>
                <label for="society">{{__('lang.organizationOrCompany')}}</label>
                <input type="text" name="society" id="society">
            </div>
            <button type="submit">{{__('lang.download')}}</button>
        </form>
        <img class="image" src="/storage/{{str_replace("\\" , "/",$resource->image)}}" width="100" height="auto" alt="{{$resource->$title}}" />
    </section>

@endsection
