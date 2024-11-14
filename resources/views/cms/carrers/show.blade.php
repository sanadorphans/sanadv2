@extends('web.layouts.master')


@php
    $title = "title" . "_" . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.ApplyJob') }}  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Carrers.css?v=1.2')}}"/>
@endsection

@section('content')

    <section id="Applyjob">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.ApplyJob') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <form method="post" action="{{route('web.pages.carrer.apply')}}" enctype="multipart/form-data">
             @csrf()
            <input type="hidden" name="jobtitle" value="{{$carrer->id}}">
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
                <input type="tel" name="phone" id="phone">
            </div>
            <div>
                <label for="files">{{__('lang.cv')}}</label>
                <input type="file" name="files" id="files">
            </div>
            <div>
                <label for="information">{{__('lang.MoreInformation')}}</label>
                <textarea name="information" cols="30" rows="10" id="information"></textarea>
            </div>
             <button type="submit">{{__('site.send')}}</button>
        </form>
    </section>
@endsection
