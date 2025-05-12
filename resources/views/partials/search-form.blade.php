<form action="{{ LaravelLocalization::getLocalizedURL(App::getLocale(), 'search') }}" method="GET">
    <input type="search" name="q" placeholder="{{ __('Search...') }}" value="{{ request('q') }}" aria-label="Search">
    <button type="submit">{{ __('Search') }}</button>
</form>





