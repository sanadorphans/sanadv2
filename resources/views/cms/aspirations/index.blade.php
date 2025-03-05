@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();

    function to_arabic_number($Month)
    {
        if (app()->getLocale() == 'ar') {
            $Month = str_replace('1', '۱', $Month);
            $Month = str_replace('2', '۲', $Month);
            $Month = str_replace('3', '۳', $Month);
            $Month = str_replace('4', '٤', $Month);
            $Month = str_replace('5', '٥', $Month);
            $Month = str_replace('6', '٦', $Month);
            $Month = str_replace('7', '۷', $Month);
            $Month = str_replace('8', '۸', $Month);
            $Month = str_replace('9', '۹', $Month);
            $Month = str_replace('0', '۰', $Month);
            $Month = str_replace('January', 'يناير', $Month);
            $Month = str_replace('February', 'فبراير', $Month);
            $Month = str_replace('March', 'مارس', $Month);
            $Month = str_replace('April', 'أبريل', $Month);
            $Month = str_replace('May', 'مايو', $Month);
            $Month = str_replace('June', 'يونيو', $Month);
            $Month = str_replace('July', 'يليو', $Month);
            $Month = str_replace('August', 'أغسطس', $Month);
            $Month = str_replace('September', 'سبتمبر', $Month);
            $Month = str_replace('October', 'أكتوبر', $Month);
            $Month = str_replace('November', 'نوفمبر', $Month);
            $Month = str_replace('December', 'ديسمبر', $Month);
        }
        return $Month;
    }
@endphp

@section('page_name') {{ __('lang.Our_Aspirations') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Aspiration.css?v=1.3')}}">
    <link rel="stylesheet" href="{{ asset('css/WhoWeAre.css?v=1.6') }}">
@endsection

@section('content')
    @include('web.inc.map')
    <section id="Aspirations">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.Our_Aspirations') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="watania d2030">
            <h1>{{ $sections[14]->$title }}</h1>
            @if (app()->getLocale() == 'ar')
                <div class="development-img">
                    <img src="{{ asset('img/b1.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b2.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b3.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b4.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b5.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b6.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b7.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b8.png') }}" loading="lazy" alt="achieve">
                </div>
            @else
                <div class="development-img">
                    <img src="{{ asset('img/b1_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b2_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b3_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b4_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b5_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b6_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b7_en.png') }}" loading="lazy" alt="achieve">
                    <img src="{{ asset('img/b8_en.png') }}" loading="lazy" alt="achieve">
                </div>
            @endif
        </div>
        {{-- <div class="Aspirations" style="margin:0px 50px">
            <p>{!! $Aspiration[0]->$details !!}</p>
        </div> --}}
    </section>
    <!-- section5 -->
    <section class="future-of-watania">
        <div class="container">
            <div class="watania d2017">
                <h1>{{ $sections[10]->$title }}</h1>
                <div class="targets">
                    @forelse (App\Models\WhoWeArePage::where('title_en','Strategic Goals 2024 - 2030')->get() as $index => $target)
                        <div class="target target{{ $index + 1 }}">
                            <h1>{{ to_arabic_number($index + 1) }}</h1>
                            <p>
                                {{ $target->$details }} ​
                            </p>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
@endsection

