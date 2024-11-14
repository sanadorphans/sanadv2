<div class="map">
    <ul>
        <li><a href="{{ LaravelLocalization::localizeUrl(route('landing')) }}">{{ __('lang.home') }}</a></li>
        <li><p>@yield('page_name')</p></li>
    </ul>
</div>
