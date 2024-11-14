
<?php
    $logo_ar = Voyager::setting('site.logo', '');
    $logo_en = Voyager::setting('site.logo_en', '');
    $title_ar = Voyager::setting('site.title', __('lang.sanad'));
    $title_en = Voyager::setting('site.title_en', __('lang.sanad'));
    $description_ar = Voyager::setting('site.description', __('lang.Meta_description'));
    $description_en = Voyager::setting('site.description_en', __('lang.Meta_description'));
?>


<!DOCTYPE html>
<html dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta name="keywords" content="{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta name="author" content="{{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">
    <link rel="shortcut icon" href="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}" type="image/png">
    <link rel="canonical" href="https://sanadorphans.org"/>

    <title>@yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}} </title>

    <meta itemprop="name" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta itemprop="description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta itemprop="image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <!-- Facebook Meta Tags -->
    <meta property="og:title" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta property="og:url" content="{{ env('APP_URL') }}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta property="og:image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:title" content=" @yield('page_name') | {{ app()->getLocale() == 'ar' ? $title_ar : $title_en}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ app()->getLocale() == 'ar' ? $description_ar : $description_en }}">
    <meta name="twitter:image" content="{{ Voyager::image(app()->getLocale() == 'ar' ? $logo_ar : $logo_en) }}">

    <link rel="stylesheet" href="{{asset('css/Master.css?v=1.2')}}"/>
    @yield('style')
</head>
<body>

    @yield('content')
    @yield('js')
</body>
</html>
