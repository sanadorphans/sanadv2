@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
    $image = 'image' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.impact') }}@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Impact.css?v=1.4')}}">
@endsection

@section('content')
@include('web.inc.map')
<div class="showStory">
    <div class="member">
        <div class="StoryWithImage">
            <div class="title">
                <h1>{{ $story->$title }}</h1>
                <p>{{ isset($story->$position) ? $story->$position : null }}</p>
            </div>
            <a class="StoryImage" href="#" aria-label="{{ $story->$title }}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$story->$image)}})"></div></a>
        </div>
        <div class="details">
            <div >{!! $story->$details !!}</div>
        </div>
    </div>
</div>
@endsection
