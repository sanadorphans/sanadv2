
<!DOCTYPE html>
<html  dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Luckiest+Guy&family=Potta+One&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;700&display=swap" rel="stylesheet">  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->

  <!-- Theme style -->
      <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">

      <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/all.min.css')}}">


      @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('dist/css/adminlte_rtl.min.css')}}">
        <style>
            .float-sm-right{
                float: left !important;
            }

            .card-white:not(.card-outline)>.card-header {

            }
            .navbar-nav.ml-auto{
                    margin-left :0 !important;
                    margin-right:auto;
            }
            .alert-dismissible .close{
                    right: auto !important;
            }
            .dropdown-menu {
                /* left: 0 !important; */
                left: auto !important;
            }


        </style>
      @else
          <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">
      @endif

      <style>
        @font-face {
            font-family: 'dli';
            src:url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }
        .br-img{
          height: 60px;
        }
        @media (max-width: 520px){
          .bs-stepper-content {
              padding: 0 20px 20px;
          }
          .bs-stepper-header {
              margin: 0 10px;
              text-align: center;
          }
        }
        @media (max-width:766px){
          .br-img{
            height: 40px;
          }
          .tx-sm{
            font-size: 14px
          }
        }
        body, h1, h2, h3, h4, h5, h6 {
          font-family: 'Almarai', sans-serif !important;
        }
        .sidebar-dark-success{
          background-color: #034939ec !important;
          color: white !important;
        }
        [class*=sidebar-dark-] .sidebar a {
            color: white !important;
        }
        [class*=sidebar-dark] .brand-link, [class*=sidebar-dark] .brand-link .pushmenu {
            color: white !important;
        }
        [class*=sidebar-dark] .brand-link {
            border-bottom: 1px solid #999999;
        }
        [class*=sidebar-dark] .user-panel {
            border-bottom: none;
        }
        .nav-end-items{
          margin-right: auto;
        }
        .dataTables_filter{
          text-align: left !important;
        }
        div.dataTables_wrapper div.dataTables_filter input {
          margin-right: 0.5em;
        }
        dt-button-collection{
          right:0 !important;
        }
        nav .nav-item p{
          font-weight: bold;
        }
        .dropdown-menu {
            /* left: 0 !important; */
            right: auto !important;
        }
        [dir="rtl"] .voyager .navbar .navbar-nav .dropdown-menu, [dir="rtl"] .voyager .navbar.navbar-default .navbar-nav .dropdown-menu {
            background-color: #fff;
            display: block;
            position: absolute !important;
        }
        .navbar .open .dropdown-menu.dropdown-menu-animated {
            visibility: visible;
            opacity: 1;
            transition: opacity .5s,transform .5s;
            transition-timing-function: cubic-bezier(.2,1,.3,1);
            transform: scaleX(1) translateZ(0);
        }
        .navbar .dropdown.profile .dropdown-menu {
            width: 250px;
            padding: 18px;
        }
        .navbar-nav .nav-item{
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .user-name{

            font-family: 'Almarai', sans-serif !important;
            /* font-size: 1rem;*/
            font-weight: bold;

        }
        .nav-treeview a{
            margin-right: 5px;
        }
        .nav-treeview p{
            font-size: 0.8rem;
        }
        .alert{
          margin-top: 10px;
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


      <style>
        .btn:not(:disabled):not(.disabled){
            padding: 0px !important;
            margin: 0px !important;
        }
      </style>


  @yield('css')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php
    if (\Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'http://') || \Illuminate\Support\Str::startsWith(Auth::user()->avatar, 'https://')) {
        $user_avatar = Auth::user()->avatar;
    } else {
        $user_avatar = Voyager::image(Auth::user()->avatar);
    }
  ?>
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light pr-0 justify-content-space-between" style="justify-content: space-between;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item align-items-center justify-content-center d-flex">
          <a class="nav-link d-flex align-items-center justify-content-center" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="font-size: 20px;"></i></a>
        </li>
        <li class="nav-item">
          <a href="{{url('/')}}">
            <img src="{{asset('img/wataneya_logo_middle.png')}}"   class="brand-image br-img">
            {{-- <span class="tx-sm" style="font-weight: 700">--}}
          </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav nav-end-items" style="margin: 0 20px">


        @php

              $lang = app()->getLocale() == 'ar' ? 'EN' : 'العربية';
              $language = app()->getLocale() == 'ar' ? 'en' : 'ar';
              $locale = app()->getLocale();

        @endphp
        <li class="nav-item dropdown">
          <a class="nav-link text-bold"  href="{{ LaravelLocalization::getLocalizedURL($language, null, [],true) }}">
              {{ $lang }}
          </a>

          {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                  <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [],true) }}">
                      {{ $properties['native'] }}
                  </a>

              @endforeach
          </div> --}}
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell" style="font-size: 20px"></i>
            {{-- <span class="badge badge-warning navbar-badge" style="background-color: #79d700;color:white;font-size:11px">15</span> --}}
          </a>
          {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">


            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div> --}}
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link"  href="#" role="button">
            <i class="fa fa-power-off " style="font-size: 20px" aria-hidden="true"></i>
          </a>
        </li> --}}
        <li class="nav-item mr-3">
          <ul class="navbar-nav mr-auto text-center px-0 ">
            <li class="nav-item dropdown text-center">
              <a class="nav-link dropdown-toggle drop3 pr-1" href="" id="navbardrop" data-toggle="dropdown" >
                {{-- <span class="user-name mx-2" style="color:rgb(133, 133, 133);">{{Auth::user()->name}}</span> --}}
              </a>
              <div class="dropdown-menu drop2 text-center">
                <a class="dropdown-item" href="{{route('users.edit')  }}" style="font-size: 15px">{{Auth::user()->name}}</a>
                <form action="/logout" method="post">
                  @csrf
                  <div class="input-logout text-white " id="navbardrop"  >
                    <input type="submit" value="{{ __('lang.logout') }}" style="color :rgb(133, 133, 133) ; border:0;font-size:15px;width:100%">

                  </div>
                </form>

              </div>
            </li>
            <div class="container-fluid  mx-0 nav-header text-right text-white">
              {{-- <a href="{{route('dashboard')}}">
                 <p class="ml-2 user-name" style="">{{Auth::user()->name}}</p>
              </a> --}}
              <img class="mb-0 mb-lg-0" width="50px" height="50px" src="{{ filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL) ? Auth::user()->avatar : Voyager::image( Auth::user()->avatar ) }}" alt="" style="border-radius:50%; border: 2px solid #71b7c0">

            </div>

          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->



      @if (LaravelLocalization::getCurrentLocale() == 'ar')
        @if(Auth::user()->category == 'consultant')
          @include('consultants.layout.inc._sidebar_rtl')

        @else
          @include('users.layout.inc._sidebar_rtl')

        @endif
      @else
        @if(Auth::user()->consultant)
          @include('consultants.layout.inc._sidebar')

        @else
          @include('users.layout.inc._sidebar')
        @endif
      @endif


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->



  </div>
<!-- ./wrapper -->
  {{-- <script type="text/javascript" src="{{ voyager_asset('js/app.js') }}"></script> --}}


  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  {{-- <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
  <!-- AdminLTE -->
  <script src="{{asset('dist/js/adminlte.js')}}"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>
  <!-- jQuery -->

  <!-- InputMask -->
  <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>


  <script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
  <script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    @yield('js')

</body>
</html>
