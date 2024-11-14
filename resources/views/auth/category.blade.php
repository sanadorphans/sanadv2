@extends('auth.layouts.master')

<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
?>

@section('page_name')
    {{__('lang.category')}}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Auth.css')}}"/>
@endsection

@section('content')
    <div class="AllCategories">
        <div class="box signin">
            <form method="POST" action="{{ route('users.categorize') }}">
                @csrf
                <div class="categories">
                    <div class="category">
                        <img width="100" height="100" src="{{asset('img/company.png')}}" alt="">
                        <label class="form-check-label" for="radio1">{{ __('lang.organization') }}</label>
                        <input type="radio" class="" id="radio1" name="category" value="organization" checked>
                    </div>
                    <div class="category">
                        <img  height="100" src="{{asset('img/home.png')}}" alt="">
                        <label class="form-check-label" for="radio2">{{ __('lang.orphanage') }}</label>
                        <input type="radio" class="" id="radio2" name="category" value="orphanage">
                    </div>
                    <div class="category">
                        <img  height="100" src="{{asset('img/person.png')}}" alt="">
                        <label class="form-check-label px-auto" for="radio3">{{ __('lang.individual') }}</label>
                        <input type="radio" class="" id="radio3" name="category" value="individual">
                    </div>
                </div>
                <div>
                    <input class="btn" type="submit" value="{{ __('lang.next') }}">
                </div>
            </form>
        </div>
    </div>
@endsection

