@extends('web.layouts.master')
@php
    $title = 'title' . '_' . app()->getLocale();
    $page = 'page' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $event->$title }}
@endsection
@section('content')
    <div>
        {!! $event->$page !!}
    </div>
@endsection
