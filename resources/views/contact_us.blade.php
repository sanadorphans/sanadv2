@extends('web.layouts.master')

@section('page_name') {{ __('lang.contact_us') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/ContactUs.css?v=1.1') }}">
@endsection

@section('content')
    @include('web.inc.map')

    <section id="ContactUs">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.contact_us') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <form method="post" action="{{ route('contact_us.send') }}">
            @csrf()
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
                <input type="text" name="phone" id="phone">
            </div>
            <div>
                <label for="message">{{__('lang.MoreInformation')}}</label>
                <textarea name="message" id="message" cols="10" rows="10"></textarea>
            </div>
            <button type="submit">{{__('site.send')}}</button>
        </form>
        <span class="details">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13809.051343420178!2d31.3289431!3d30.086658!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e2229cbc89f%3A0x7728f47eab7d5044!2zU2FuYWQgZm9yIEFsdGVybmF0aXZlIFBhcmVudGFsIENhcmUg2LPZhtivINmE2YTYsdi52KfZitipINin2YTZiNin2YTYr9mK2Kkg2KfZhNio2K_ZitmE2Kk!5e0!3m2!1sar!2seg!4v1705175834959!5m2!1sar!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </span>
    </section>

@endsection

