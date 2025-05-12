@extends('web.layouts.master')


@section('page_name')  Search Results  @endsection

@section('style')
{{-- Add your site's CSS --}}
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .search-bar { margin-bottom: 30px; }
    .result-item { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
    .result-item h5 { margin-bottom: 5px; }
    .result-item .meta { font-size: 0.9em; color: #666; }
</style>
@endsection

@section('content')
<div class="container">
    <h1>{{ __('Search Results') }}</h1>

    {{-- Include the search form again or ensure it's in your layout --}}
    @include('partials.search-form')

    @if($keyword)
        <p>{{ __('Showing results for:') }} <strong>{{ htmlspecialchars($keyword) }}</strong></p>

        @if(count($results) > 0)
            <ul class="search-results-list">
                @foreach($results as $result)
                    <li>
                        <h3>
                            <a href="{{ $result['url'] }}">{{ $result['title'] }}</a>
                        </h3>
                        @if($result['snippet'])
                            <p>{{ $result['snippet'] }}</p>
                        @endif
                        <small>{{ trans_choice('messages.keyword_found_times', $result['keyword_count'], ['count' => $result['keyword_count']]) }}</small>
                        {{-- Using trans_choice for pluralization --}}
                    </li>
                @endforeach
            </ul>
        @else
            <p>{{ __('No results found for your query.') }}</p>
        @endif
    @else
        @if(request()->has('q'))
             <p>{{ __('Please enter a more specific keyword.') }}</p>
        @else
             <p>{{ __('Please enter a keyword to search.') }}</p>
        @endif
    @endif
</div>
@endsection

@push('styles')
<style>
.search-results-list {
    list-style: none;
    padding-left: 0;
}
.search-results-list li {
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #e0e0e0;
}
.search-results-list li:last-child {
    border-bottom: none;
}
</style>
@endpush



