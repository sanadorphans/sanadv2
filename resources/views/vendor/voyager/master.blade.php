<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="rtl">
{{-- <head>
    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}"/>

    <!-- Google Fonts -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>

    @if ($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif



    <!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif

    <!-- Few Dynamic Styles -->

    <style type="text/css">
        .ps__rail-y{
            left: 0 !important;
            /* display: block; */
        }
        .voyager .side-menu .navbar-header {
            background:#263137;
            border-color:#22A7F0;
        }
        .voyager .side-menu.sidebar-inverse {
            /* background:rgba(68, 68, 68, 0.33); */
            text-shadow: 2px 2px 2px #3131319f;


        }
        .app-container .content-container .side-menu .navbar-nav li a {
            font-size:1.3em !important;
        }
        .app-container .content-container .side-menu .navbar-nav li a:hover {
            background-color: rgba(204, 201, 201, 0.233) ;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 5px;
        }
        .app-container .content-container .side-menu .navbar-nav li a {
            padding-left: 0;
            padding-right: 0;
            margin-left: 10px;
            margin-right: 10px
        }
        .voyager .side-menu.sidebar-inverse .navbar li:hover {
            color: white !important;
        }
        @font-face {
            font-family: 'dli';
            src:url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }
         .voyager .side-menu{
            font-family: 'DIN';
        }
        *{
            font-family:'dli' !important;
        }
        .app-container .content-container .side-menu .navbar-nav li a {
            font-family:'dli' !important;
        }
        .btn{
            font-family:'dli' !important;
        }
        .widget .btn-primary{
            border-color:#22A7F0;
        }
        .widget .btn-primary:focus, .widget .btn-primary:hover, .widget .btn-primary:active, .widget .btn-primary.active, .widget .btn-primary:active:focus{
            background:#22A7F0;
        }
        .voyager .breadcrumb a{
            color:#22A7F0;
        }
    </style>

    @if (!empty(config('voyager.additional_css')))<!-- Additional CSS -->
        @foreach (config('voyager.additional_css') as $css)<link rel="stylesheet" type="text/css" href="{{ asset($css) }}">@endforeach
    @endif

    @yield('head')
</head> --}}

<head>
    <title>@yield('page_title', setting('admin.title') . ' - ' . setting('admin.description'))</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="assets-path" content="{{ route('voyager.voyager_assets') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <!-- Favicon -->
    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if ($admin_favicon == '')
        <link rel="shortcut icon" href="{{ voyager_asset('images/logo-icon.png') }}" type="image/png">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/png">
    @endif



    <!-- App CSS -->
    <link rel="stylesheet" href="{{ voyager_asset('css/app.css') }}">

    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
    <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    {{-- @if (__('voyager::generic.is_rtl') == 'true')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css">
        <link rel="stylesheet" href="{{ voyager_asset('css/rtl.css') }}">
    @endif --}}

    <!-- Few Dynamic Styles -->
    <style type="text/css">
        .ps__rail-y {
            left: 0 !important;
            /* display: block; */
        }

        .voyager .side-menu .navbar-header {
            background: #263137;
            border-color: #22A7F0;
        }

        .voyager .side-menu.sidebar-inverse {
            /* background:rgba(68, 68, 68, 0.33); */
            text-shadow: 2px 2px 2px #3131319f;


        }

        .app-container .content-container .side-menu .navbar-nav li a {
            font-size: 1.3em !important;
        }

        .app-container .content-container .side-menu .navbar-nav li a:hover {
            background-color: rgba(204, 201, 201, 0.233);
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 5px;
        }

        .app-container .content-container .side-menu .navbar-nav li a {
            padding-left: 0;
            padding-right: 0;
            margin-left: 10px;
            margin-right: 10px
        }

        .voyager .side-menu.sidebar-inverse .navbar li:hover {
            color: white !important;
        }

        @font-face {
            font-family: 'dli';
            src: url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }

        .voyager .side-menu {
            font-family: 'DIN';
        }

        * {
            font-family: 'dli' !important;
        }

        .app-container .content-container .side-menu .navbar-nav li a {
            font-family: 'dli' !important;
        }

        .btn {
            font-family: 'dli' !important;
        }

        .widget .btn-primary {
            border-color: #22A7F0;
        }

        .widget .btn-primary:focus,
        .widget .btn-primary:hover,
        .widget .btn-primary:active,
        .widget .btn-primary.active,
        .widget .btn-primary:active:focus {
            background: #22A7F0;
        }

        .voyager .breadcrumb a {
            color: #22A7F0;
        }

        .app-container .content-container .side-menu .navbar-nav li.dropdown ul li a {
            height: 44px;
            line-height: 44px;
            vertical-align: middle;
            padding: 0 1.2em;
            padding: 0;
        }

        .ps--focus>.ps__rail-x,
        .ps--focus>.ps__rail-y,
        .ps--scrolling-x>.ps__rail-x,
        .ps--scrolling-y>.ps__rail-y,
        .ps:hover>.ps__rail-x,
        .ps:hover>.ps__rail-y {
            opacity: .6;
            display: block !important;
            left: 0 !important;
            right: 234px !important;
        }

        .badge.badge-pill {
            font-size: 1rem;
        }

        pre {
            overflow: initial;
            word-wrap: break-word;
            background-color: #ffffff;
            border: 1px solid #fff;
            border-radius: 4px;
            color: #333;
            display: block;
            font-size: 13px;
            line-height: 1.428571429;
            margin: 0 0 10px;
            padding: 9.5px;
            word-break: break-word;
            white-space: pre-wrap;
        }
    </style>

    @if (!empty(config('voyager.additional_css')))<!-- Additional CSS -->
        @foreach (config('voyager.additional_css') as $css)
            <link rel="stylesheet" type="text/css" href="{{ asset($css) }}">
        @endforeach
    @endif

    @yield('head')
</head>

<body class="voyager @if (isset($dataType) && isset($dataType->slug)) {{ $dataType->slug }} @endif">


    <div id="voyager-loader">
        <?php $admin_loader_img = Voyager::setting('admin.loader', ''); ?>
        @if ($admin_loader_img == '')
            <img src="{{ voyager_asset('images/logo-icon.png') }}" alt="Voyager Loader">
        @else
            <img src="{{ Voyager::image($admin_loader_img) }}" alt="Voyager Loader">
        @endif
    </div>

    <?php
    if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
        $user_avatar = Auth::user()->avatar;
    } else {
        $user_avatar = Voyager::image(Auth::user()->avatar);
    }
    ?>

    <div class="app-container">
        <div class="fadetoblack visible-xs"></div>
        <div class="row content-container">
            @include('voyager::dashboard.navbar')
            @include('voyager::dashboard.sidebar')
            <script>
                (function() {
                    var appContainer = document.querySelector('.app-container'),
                        sidebar = appContainer.querySelector('.side-menu'),
                        navbar = appContainer.querySelector('nav.navbar.navbar-top'),
                        loader = document.getElementById('voyager-loader'),
                        hamburgerMenu = document.querySelector('.hamburger'),
                        sidebarTransition = sidebar.style.transition,
                        navbarTransition = navbar.style.transition,
                        containerTransition = appContainer.style.transition;

                    sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition =
                        appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                        navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = 'none';

                    if (window.innerWidth > 768 && window.localStorage && window.localStorage['voyager.stickySidebar'] ==
                        'true') {
                        appContainer.className += ' expanded no-animation';
                        loader.style.left = (sidebar.clientWidth / 2) + 'px';
                        hamburgerMenu.className += ' is-active no-animation';
                    }

                    navbar.style.WebkitTransition = navbar.style.MozTransition = navbar.style.transition = navbarTransition;
                    sidebar.style.WebkitTransition = sidebar.style.MozTransition = sidebar.style.transition = sidebarTransition;
                    appContainer.style.WebkitTransition = appContainer.style.MozTransition = appContainer.style.transition =
                        containerTransition;
                })();
            </script>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body padding-top">
                    @yield('page_header')
                    <div id="voyager-notifications"></div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    {{-- @include('voyager::partials.app-footer') --}}

    <!-- Javascript Libs -->


    <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script>

    <script>
        @if (Session::has('alerts'))
            let alerts = {!! json_encode(Session::get('alerts')) !!};
            helpers.displayAlerts(alerts, toastr);
        @endif

        @if (Session::has('message'))

            // TODO: change Controllers to use AlertsMessages trait... then remove this
            var alertType = {!! json_encode(Session::get('alert-type', 'info')) !!};
            var alertMessage = {!! json_encode(Session::get('message')) !!};
            var alerter = toastr[alertType];

            if (alerter) {
                alerter(alertMessage);
            } else {
                toastr.error("toastr alert-type " + alertType + " is unknown");
            }
        @endif
    </script>
    @include('voyager::media.manager')
    @yield('javascript')
    @stack('javascript')
    @if (!empty(config('voyager.additional_js')))<!-- Additional Javascript -->
        @foreach (config('voyager.additional_js') as $js)
            <script type="text/javascript" src="{{ asset($js) }}"></script>
        @endforeach
    @endif

</body>

</html>
