@extends('web.layouts.master')

@section('page_name') {{ __('lang.board_members') }} @endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Staff.css?v=1.7')}}">
@endsection

@section('content')
    @include('web.inc.map')
   <section id="boards">
        <div class="title general">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ __('lang.board_members') }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
        </div>
        <div class="boards">
            @forelse($board as $board_member)
                @include('cms.board.components.board_member')
            @empty
                <div>{{ __('lang.no_data') }}</div>
            @endforelse
        </div>
   </section>

@endsection
