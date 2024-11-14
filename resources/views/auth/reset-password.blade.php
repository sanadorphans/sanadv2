@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.reset_password')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
    <div class="container">
        <div class="box signin">
            <form method="POST" action="{{ route('password.update') }}" >
                @csrf
                <img width="100px" class="logo" src="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" alt="logo">
                <h3>{{__('lang.change_password')}}</h3>

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div>
                    <label for="email">{{__('lang.email')}}</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $request->email)}}" required autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="password">{{__('lang.password')}}</label>
                    <input type="password" name="password" id="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation">{{__('lang.password_confirmation')}}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input class="btn" type="submit" value="{{__('lang.confirm')}}">
                @if (session('status'))
                    <div class="mb-4 alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </div>
        <div class="box signup" style="--background: url(../img/auth/auth.jpg)">

        </div>
    </div>
@endsection

