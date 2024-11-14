@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.register')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
        <div class="container">
            <div class="box signin">
                <form method="POST" action="{{ route('register') }}" >
                    @csrf
                    <img width="100px" class="logo" src="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" alt="logo">
                    <h3>{{__('lang.register')}}</h3>
                    <div>
                        <label for="name">{{__('lang.name')}}</label>
                        <input type="text" name="name" id="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                    <div>
                        <label for="password_confirmation">{{__('lang.password_confirmation')}}</label>
                        <input type="password" name="password_confirmation" id="password_confirmation">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input class="btn" type="submit" value="{{__('lang.register')}}">
                </form>
                <div class="signup-box">
                    <h2>{{__('lang.have_account')}}</h2>
                    <a href="{{ route('login') }}" class="signup-btn">{{__('lang.login')}}</a>
                </div>
            </div>
            <div class="box signup" style="--background: url(../img/auth/auth.jpg)">
                <div class="signup-box">
                    <h2>{{__('lang.have_account')}}</h2>
                    <a href="{{ route('login') }}" class="signup-btn">{{__('lang.login')}}</a>
                </div>
            </div>
        </div>
@endsection
