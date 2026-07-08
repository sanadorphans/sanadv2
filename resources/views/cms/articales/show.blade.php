@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $article->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/MediaCenter.css?v=1.6') }}">
@endsection

@section('content')
    @include('web.inc.map')
    <section class="ShowNew new{{ $article->id }}">
        <h1>{{ $article->$title }}</h1>
        <p style="text-align:center;">{{ $date }}</p>
        <img src="/storage/{{ $article->image }}" alt="{{ $article->title }}">
        <p>{!! $article->$details !!}</p>
    </section>
    <aside>
        <h1>{{ __('lang.read_too') }}</h1>
        <div class="news">
            @forelse($other_articles as $article)
                <div class="new new{{$article->id}}">
                    <a href="/pages/article/{{$article->id}}">
                        <div class="image" style="--background: url(../storage/{{str_replace("\/" , "/",$article->image)}})"></div>
                        <p>{{$article->$title}}</p>
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
