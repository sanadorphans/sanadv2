@extends('web.layouts.master')

@php
    $name = 'name' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ $team_member->$name ? $team_member->$name : $team_member->name }}@endsection


@section('style')
    <link rel="stylesheet" href="{{asset('css/Staff.css?v=1.7')}}">
@endsection

@section('content')
@include('web.inc.map')
    <div class="showStaff">
        <div class="member">
            <div class="StaffMemberWithImage">
                    <div class="title">
                        <h1> {{ $team_member->$name ? $team_member->$name :$team_member->name }}</h1>
                        <p>{{ $team_member->$position ? $team_member->$position :$team_member->position }}</p>
                    </div>
                <a class="staffImage" href="{{ route('web.team_members.show',$team_member->id) }}" aria-label=" {{ $team_member->name}}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$team_member->image)}})"></div></a>
                <div class="socialMedia">
                    @forelse(App\Models\SocialMediaStaff::where('staff_name',$team_member->id)->get() as $socialMedia)
                        <a class="social" href="{{$socialMedia->link}}" aria-label="{{ $team_member->name . ' ' . $socialMedia->title }}"><img src="/storage/{{$socialMedia->image}}" alt="linkedIn" width="40" height="40"></a>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="description">
                @if (app()->getLocale() == 'ar')
                    <p >{!! $team_member->$details ? $team_member->$details : $team_member->details !!}</p>
                @else
                    <p >{!! $team_member->$details ? $team_member->$details : $team_member->details !!}</p>
                @endif
            </div>
        </div>
    </div>
@endsection

