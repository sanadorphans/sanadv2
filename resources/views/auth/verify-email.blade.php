

@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.verify_account')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
    <div class="container">
        <div class="box signin">
            <form method="POST" action="{{ route('verification.send') }}" >
                @csrf
                <img width="100px" class="logo" src="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" alt="logo">
                <p>{{__('lang.Verification_Email_Message')}}</p>
                <input class="btn" type="submit" value="{{__('lang.Resend')}}">
                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 alert alert-success">
                        {{__('lang.a_fresh_verification_link_has_been_sent_to_your_email_address')}}
                    </div>
                @endif
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    {{__('lang.logout')}}
                </button>
            </form>

        </div>
        <div class="box signup" style="--background: url(../img/auth/auth.jpg)">

        </div>
    </div>
@endsection


