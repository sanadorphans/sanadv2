@extends('web.layouts.master')

@php
    $name = 'name' . '_' . app()->getLocale();
    $details =  'details' . '_' . app()->getLocale();
    $position = 'position' . '_' . app()->getLocale();
@endphp

@section('page_name') {{ $board_member->$name ? $board_member->$name : $board_member->name }} @endsection


@section('style')
    <link rel="stylesheet" href="{{asset('css/Staff.css?v=1.7')}}">
@endsection

@section('content')
@include('web.inc.map')
    <div class="showBoard">
        <div class="member">
            <div class="boardMemberWithImage">
                <div class="title">
                    <h1>{{ $board_member->$name ? $board_member->$name : $board_member->name  }}</h1>
                    <p>{{  $board_member->$position ? $board_member->$position : $board_member->position }}</p>
                </div>
                <a class="boardImage" href="{{ route('web.board.show',$board_member->id) }}" aria-label="{{ $board_member->$name }}"><div style="--background: url(../storage/{{str_replace("\\" , "/",$board_member->image)}})"></div></a>
                <div class="socialMedia">
                    @forelse(App\Models\SocialMediaStaff::where('board_name',$board_member->id)->get() as $socialMedia)
                        <a class="social" href="{{$socialMedia->link}}" aria-label="{{ $board_member->$name . ' ' . $socialMedia->title }}"><img src="/storage/{{$socialMedia->image}}" alt="{{$socialMedia->title}}" width="40" height="40"></a>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="description">
                <p >{!! $board_member->$details ? $board_member->$details : $board_member->details !!}</p>
            </div>
        </div>
    </div>

@endsection
