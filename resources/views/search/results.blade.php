@extends('web.layouts.master')


@section('page_name')  {{__('lang.Search_Results')}}  @endsection

@section('content')
<style>
    .search-form-section {
        /* Add any custom styles for the search bar section if needed */
        margin-top:50px !important;
    }
    .search-results-section .list-group-item h5 {
        color: var(--bs-primary); /* Example: make result titles primary color */
    }

    .search-results-section .list-group-item:hover h5 {
        text-decoration: underline;
    }
    mark { /* Style for the highlighted keyword */
        padding: 0.2em 0.1em;
        background-color: #fff3cd; /* Bootstrap's warning background, or choose another */
    }
</style>
<main class="container my-4"> {{-- Added my-4 for vertical spacing --}}

    {{-- Search Bar Section --}}
    <section class="search-form-section mb-5 p-4 bg-light rounded shadow-sm">
        <form action="{{ route('search') }}" method="GET" class="row g-3 align-items-center">
            <div class="col flex-grow-1">
                <label for="searchInput" class="visually-hidden">{{ __('lang.search') }}</label>
                <input class="form-control form-control-lg" id="searchInput" type="search" name="q"
                       placeholder="{{ __('lang.search') }}" aria-label="{{ __('lang.search') }}"
                       value="{{ request('q') }}">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary btn-lg" type="submit">
                    {{ __('lang.search') }}
                    <i class="fas fa-search me-2"></i> {{-- Optional: Font Awesome icon --}}
                </button>
            </div>
        </form>
    </section>

    <section style="width: 80%;margin: auto;">
        <h1>{{__('lang.Search_Results')}}</h1>

        @if($keyword)
            <p class="mt-3">{{__('lang.You_searched_for')}} <strong>{{ $keyword }}</strong></p>
        @endif

        @if($results->isEmpty())
            @if($keyword)
                <p>{{__('lang.No_results_found')}} </p>
            @else
                <p>{{__('lang.Please_enter_a_search_keyword')}}</p>
            @endif
        @else
            <p>{{ $results->count() }} {{__('lang.results_found')}}</p>
            <ul class="list-group mt-3">
                @foreach($results as $result)
                    <li class="list-group-item" style="margin-top:20px;">
                        <h5>
                            <a href="{{ $result['url'] }}"
                                class="list-group-item list-group-item-action flex-column align-items-start py-3"
                                @if(isset($result['is_file_download']) && $result['is_file_download'])
                                    target="_blank" {{-- Open PDF in new tab --}}
                                    {{-- title="{{ __('lang.download_report_title', ['report_title' => $result['title']]) }}" --}}
                                @endif
                                >
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1 h5" style="color:#F37246;font-weight: bold;font-size: 20px;">
                                            {!! $result['title'] !!}
                                            @if(isset($result['is_file_download']) && $result['is_file_download'])
                                                <i class="fas fa-file-pdf text-danger ms-2" title="{{ __('lang.pdf_document') }}"></i> {{-- Optional: PDF icon --}}
                                            @endif
                                        </h5>
                                    </div>
                                    {{-- ... snippet and keyword count ... --}}
                            </a>
                            <small class="text-muted" style="font-size: 16px;"> ({{ $result['type'] }})</small>
                        </h5>
                        {{-- @if(isset($result['snippet']))
                            <p class="mb-0 text-muted"><small>{!! $result['snippet'] !!}</small></p>
                        @endif --}}
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

</main>
@endsection


