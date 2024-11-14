@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.login')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
    <div class="container">
        <div class="box signin">
            <form method="POST" action="{{ route('login') }}" >
                @csrf
                <img width="100px" class="logo" src="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" alt="logo">
                <h3>{{__('lang.login')}}</h3>
                <div>
                    <label for="email">{{__('lang.email')}}</label>
                    <input type="email" name="email" id="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="password">{{__('lang.password')}}</label>
                    <input type="password" name="password" id="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href="{{ route('password.request') }}" class="forgot">{{__('lang.forget_password')}}</a>
                <input class="btn" type="submit" value="{{__('lang.login')}}">
            </form>
            <div class="signup-box">
                <h2>{{__('lang.dont_have_account')}}</h2>
                <a href="{{ route('register') }}" class="signup-btn">{{__('lang.register')}}</a>
            </div>
        </div>
        <div class="box signup" style="--background: url(../img/auth/auth.jpg)">
            <div class="signup-box">
                <h2>{{__('lang.dont_have_account')}}</h2>
                <a href="{{ route('register') }}" class="signup-btn">{{__('lang.register')}}</a>
            </div>
        </div>
    </div>
@endsection

