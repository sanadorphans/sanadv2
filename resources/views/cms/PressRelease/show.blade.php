@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $PressRelease->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/MediaCenter.css?v=1.3') }}">
@endsection

@section('content')

    <section class="ShowPressRelease PressRelease{{ $PressRelease->id }}">
        <h1>{{ $PressRelease->$title }}</h1>
        <p>{{ $date }}</p>
        <img src="/storage/{{ $PressRelease->image }}" alt="{{ $PressRelease->title }}">
        <p>{!! $PressRelease->$details !!}</p>
    </section>
    <aside>
        <h1>{{ __('lang.read_too') }}</h1>
        <div class="PressReleases">
            @forelse($other_PressReleases as $PressRelease)
                <div class="PressRelease PressRelease{{$PressRelease->id}}">
                    <a href="/pages/PressRelease/{{$PressRelease->id}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$PressRelease->image)}})"></div>
                        <p>{{$PressRelease->$title}}</p>
                    </a>
                </div>
            @empty
            @endforelse
        </div>
    </aside>
@endsection

{{-- <script>
    function changeImage(image_src){
        $('#main-image').attr("src",image_src);
        $('#main-image').parent().css("opacity", "1 !important")
    }
</script> --}}
