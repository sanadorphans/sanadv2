@extends('web.layouts.master')

@php
    $title = "title" . "_" . app()->getLocale();
    $file = "file" . "_" . app()->getLocale();
    $image = "image" . "_" . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.technical_reports') }}  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/MediaCenter.css?v=1.2')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="AnnualReports">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.technical_reports') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="AnnualReports">
            @forelse($reports as $report)
                <div class="AnnualReport AnnualReport{{$report->id}}">
                    @if ($report->$file == null || json_decode($report->$file) == [])
                        <a href="/storage/{{json_decode($report->file_ar)[0]->download_link}}">
                            <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$report->$image == null ? $report->image : $report->$image)}})"></div>
                            <p>{{$report->$title}}</p>
                        </a>
                    @else
                        <a href="/storage/{{json_decode($report->$file)[0]->download_link}}">
                            <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$report->$image)}})"></div>
                            <p>{{$report->$title}}</p>
                        </a>
                    @endif
                </div>
            @empty
                <div>{{ __('lang.no_data') }}</div>
            @endforelse
        </div>
    </section>
    {{-- <div class="pagination" >{!! $bags->links() !!}</div> --}}

@endsection
