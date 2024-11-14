@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.forget_password')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
    <div class="container">
        <div class="box signin">
            <form method="POST" action="{{ route('password.email') }}" >
                @csrf
                <img width="100px" class="logo" src="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" alt="logo">
                <h3>{{__('lang.change_password')}}</h3>
                <div>
                    <label for="email">{{__('lang.email')}}</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input class="btn" type="submit" value="{{__('lang.change_password')}}">
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

