@extends('web.layouts.master')

@section('page_name') {{ __('lang.ApplyJob') }}  @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Carrers.css?v=1.1')}}"/>
@endsection

@section('content')
    <section id="ThnaksForApply">
        <img src="{{asset('img/carrers/thanks.svg')}}" alt="thnaks" width="100" height="100">
        <h1>{{__('lang.ThankYouForApplying')}}</h1>
        <a href="/">{{__('lang.home')}}</a>
    </section>
@endsection
