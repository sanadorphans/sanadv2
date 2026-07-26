@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.important links') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/ImportantLink.css?v=1.3')}}"/>
@endsection

@section('content')
    @include('web.inc.map')
    <section id="Links">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.important links') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="Links">
            @forelse ($ImportantLinks as $ImportantLink)
                @php
                    $url = $ImportantLink->link;
                    $isYoutube = false;
                    $youtubeId = null;

                    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $url, $matches)) {
                        $isYoutube = true;
                        $youtubeId = $matches[1];
                    }
                @endphp

                <div class="Link Link{{$ImportantLink->id}}">
                    @if ($isYoutube)
                        <div class="youtube-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; border-radius: 8px;">
                            <iframe 
                                src="https://www.youtube.com/embed/{{ $youtubeId }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                            </iframe>
                        </div>
                        <p style="text-align: center; margin-top: 8px;">{{$ImportantLink->$title}}</p>
                    @else
                        <a href="{{$ImportantLink->link}}" target="_blank">
                            <div class="image" style="--background: url(../storage/{{str_replace("\/" , "/",$ImportantLink->image)}})"></div>
                            <p>{{$ImportantLink->$title}}</p>
                        </a>
                    @endif
                </div>
            @empty
            @endforelse
        </div>
    </section>
    <div class="pagination" >{!! $ImportantLinks->links() !!}</div>

@endsection
