@extends('web.layouts.master')

@php
    $title = 'title' . '_' . app()->getLocale();
    $details = 'details' . '_' . app()->getLocale();
@endphp

@section('page_name')
    {{ $KnowledgeCreation->$title }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{asset('css/Resources.css?v=1.3')}}"/>
@endsection

@section('content')
    <header id="header" data-content="{{ $KnowledgeCreation->$title }}" style="--background: url(../storage/{{str_replace("\\" , "/",$KnowledgeCreation->image)}})">
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
            <h1 class="GeneralTitle">{{ $KnowledgeCreation->$title }}</h1>
            <img src="{{asset('img/nav/dal.svg')}}" alt="dal" width="50" height="50">
    </header>
    @include('web.inc.map')
    <input type="search" name="search" id="search" placeholder="{{ __('lang.search') }}">
    <section id="resources">
        <div class="resources">
            @foreach ($KnowledgeCreation->Resources as $resource)
                <div class="resource">
                    <a href="{{ route('web.pages.resource',$resource->id) }}"><div class="image" style="--background: url(../storage/{{str_replace("\\" , "/",$resource->image)}})"></div></a>
                    <a href="{{ route('web.pages.resource',$resource->id) }}"><h1>{{$resource->$title}}</h1></a>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('js')

    {{-- <script src="{{asset('js/Resources.js?v=1.1')}}"></script> --}}
    <script>
        // when user type on search field send ajax request
        $('#search').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('web.pages.KnowledgeCreation.search') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('.resources').html(data);
                        console.log(data);
                    }
                });
            }
        });
    </script>

@endsection
