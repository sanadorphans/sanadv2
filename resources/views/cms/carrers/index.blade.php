@extends('web.layouts.master')

@php
    $title = "title" . "_" . app()->getLocale();
    $carrer_type_title = "title" . "_" . app()->getLocale();
@endphp

@section('page_name') {{ __('lang.join_wataneya') }}  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Careers.css?v=1.7')}}"/>
@endsection

@section('content')

{{-- <div id="slider">
    <div class="glide slider">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                @php
                    $Agent = new Jenssegers\Agent\Agent();
                @endphp
                    @if ($Agent->isMobile())
                        <li class="glide__slide"><img src="{{ asset('img/Careers/1.jpg') }}" alt="image" width="100" height="100"></li>
                        <li class="glide__slide"><img src="{{ asset('img/Careers/2.jpg') }}" alt="image" width="100" height="100"></li>
                    @else
                    <li class="glide__slide"><img src="{{ asset('img/Careers/1.jpg') }}" alt="image" width="100" height="100"></li>
                    <li class="glide__slide"><img src="{{ asset('img/Careers/2.jpg') }}" alt="image" width="100" height="100"></li>
                    @endif
            </ul>
            </div>
        </div>
    </div> --}}

    @include('web.inc.map')
    <section id="career">
        <div class="details">
            <h2>{{ __('lang.career_title') }} </h2>
            <p>{{ __('lang.career_details1') }} </p>
            <p>{{ __('lang.career_details2') }} </p>
            <p>{{ __('lang.career_details3') }} </p>
            <p>{{ __('lang.career_details4') }} </p>
            <p>{{ __('lang.career_details5') }} </p>
        </div>
        <div class="images">
            <img src="{{asset('/img/Careers/3.png')}}" alt="" width="100" height="100">
            <img src="{{asset('/img/Careers/4.png')}}" alt="" width="100" height="100">
        </div>
    </section>
    @forelse ( $carrer_types as $carrer_type )
        @if ($carrer_type->carrer->first() != null)
            <section id="jobs">
                <div class="title general">
                    <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
                    <h1 class="GeneralTitle">{{ $carrer_type->$carrer_type_title }}</h1>
                    <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
                </div>
                <div class="jobs">
                    @forelse ( $carrer_type->carrer()->orderBy('created_at', 'desc')->get() as $carrer )
                        <div class="job job{{$carrer->id}}">
                            {{-- <h1>{{ __('lang.looking_for_talents') }}</h1> --}}
                            <h2>{!! $carrer->$title !!}</h2>
                            <div class="links">
                                <a class="call-to-job" href="/storage/{{json_decode($carrer->file)[0]->download_link}}">{{ __('lang.more') }}</a>
                                @if ($carrer->apply_link)
                                        <a class="apply-to-job" href="{{$carrer->apply_link}}">{{ __('lang.Apply') }}</a>
                                @endif
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </section>
        @endif
    @empty
        <div>{{ __('lang.no_data') }}</div>
    @endforelse

@endsection

@section('js')
    <script src="{{asset('js/Carrers.js?v=1.0')}}"></script>
@endsection
