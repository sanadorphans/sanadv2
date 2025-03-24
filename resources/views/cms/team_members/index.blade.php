@extends('web.layouts.master')

@section('page_name') {{ __('lang.staff') }} @endsection

@php
    $name = 'name' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp


@section('style')
    <link rel="stylesheet" href="{{asset('css/Staff.css?v=1.7')}}">
@endsection

@section('content')
    @include('web.inc.map')

   <section id="staff">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.staff') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="staff">
            @forelse($team_members as $team_member)
                <div class="member">
                    <a class="staffImage" href="{{ route('web.team_members.show',$team_member->id) }}" aria-label="{{ $team_member->$name }}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$team_member->image)}})"></div></a>
                    <div class="info">
                        <h1> {{ $team_member->$name ? $team_member->$name : $team_member->name }}</h1>
                        <p> {{ $team_member->$position ? $team_member->$position : $team_member->name }}</p>
                    </div>
                </div>
            @empty
                <div>{{ __('lang.no_data') }}</div>
            @endforelse
        </div>
   </section>

@endsection
