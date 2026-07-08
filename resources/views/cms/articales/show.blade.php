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
                      <div class="ncard" style="margin: 10px; background: white; height: 100%;">
                        <div class="nimg" style="background: url(/storage/{{str_replace("\\" , "/",$article->image)}});background-size: cover; background-position: center; height: 230px;">
                        </div>
                        <div class="nbody" style="padding: 1.5rem;">
                          <div class="ndate" style="font-size: 12px; color: var(--muted); margin-bottom: 0.5rem;">{{ app()->getLocale() == 'ar' ? to_arabic_number(date('F Y', strtotime($article->created_at))) : $article->created_at->formatLocalized('%B %Y') }}</div>
                          <h4 style="font-size: 16px; font-weight: 700; margin-bottom: 1rem; line-height: 1.4; min-height: 48px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{$article->$title}}</h4>
                          <a href="/pages/articles/{{$article->id}}" class="nread" style="font-size: 13px; color: var(--teal); font-weight: bold; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">{{ __('lang.more') }} {{ __('lang.arrow_dir') }}</a>
                        </div>
                      </div>
            @empty
            @endforelse
        </div>
    </aside>
@endsection


