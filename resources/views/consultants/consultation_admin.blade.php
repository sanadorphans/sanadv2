@extends('consultants.layout.app')
<!--nav-->
<!--nav-->
<!--start main section-->

@section('css')
    <link rel="stylesheet" href="{{ asset('css/section.css') }}">

    <style>
        @font-face {
            font-family: 'dli';
            src: url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }

        .br-img {
            height: 60px;
        }

        @media (max-width: 520px) {
            .bs-stepper-content {
                padding: 0 20px 20px;
            }

            .bs-stepper-header {
                margin: 0 10px;
                text-align: center;
            }
        }

        @media (max-width:766px) {
            .br-img {
                height: 40px;
            }

            .tx-sm {
                font-size: 14px
            }
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Almarai', sans-serif !important;
        }

        .sidebar-dark-success {
            background-color: #034939ec !important;
            color: white !important;
        }

        [class*=sidebar-dark-] .sidebar a {
            color: white !important;
        }

        [class*=sidebar-dark] .brand-link,
        [class*=sidebar-dark] .brand-link .pushmenu {
            color: white !important;
        }

        [class*=sidebar-dark] .brand-link {
            border-bottom: 1px solid #999999;
        }

        [class*=sidebar-dark] .user-panel {
            border-bottom: none;
        }

        .nav-end-items {
            margin-right: auto;
        }

        .dataTables_filter {
            text-align: left !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin-right: 0.5em;
        }

        dt-button-collection {
            right: 0 !important;
        }

        nav .nav-item p {
            font-weight: bold;
        }

        .dropdown-menu {
            left: 0 !important;
            right: auto !important;
        }

        [dir="rtl"] .voyager .navbar .navbar-nav .dropdown-menu,
        [dir="rtl"] .voyager .navbar.navbar-default .navbar-nav .dropdown-menu {
            background-color: #fff;
            display: block;
            position: absolute !important;
        }

        .navbar .open .dropdown-menu.dropdown-menu-animated {
            visibility: visible;
            opacity: 1;
            transition: opacity .5s, transform .5s;
            transition-timing-function: cubic-bezier(.2, 1, .3, 1);
            transform: scaleX(1) translateZ(0);
        }

        .navbar .dropdown.profile .dropdown-menu {
            width: 250px;
            padding: 18px;
        }

        .navbar-nav .nav-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-name {

            font-family: 'Almarai', sans-serif !important;
            /* font-size: 1rem;*/
            font-weight: bold;

        }

        .nav-treeview a {
            margin-right: 5px;
        }

        .nav-treeview p {
            font-size: 0.8rem;
        }

        .alert {
            margin-top: 10px;
        }

        .header-evaluation {
            padding: 10px 15px;
            border-radius: 5px 5px 0 0;
            height: auto !important;
        }
        .btn-orange {
          color: #ffffffd4;
          background-color: #e7a600;
          outline-color: white;
          border-radius: 4px;
          border: none;
          font-size: 0.9rem;
          font-weight:bold;
          padding:10px 20px !important;

        }
        .btn-orange:hover {
          color: #ffffffd4;
          background-color: #e7a600;
          opacity: 0.8;

        }
        .btn-red {
          color: #ffffffd4;
          background-color: #dc3545;
          outline-color: white;
          border-radius: 4px;
          border: none;
          font-size: 0.9rem;
          font-weight:bold;
          padding:10px 20px !important;

        }
        .btn-red:hover {
          color: #ffffffd4;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #71b7c0;
            border-color: #71b7c0;
        }

        .page-link {
            position: relative;
            display: block;
            padding: 0.5rem 0.75rem;
            margin-right: -1px;
            line-height: 1.25;
            color: #3e3e3e;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .evaluation {
            width: 100%;
            margin-top: 20px;
            height: auto !important;
            border-radius: 5px 5px 5px 5px;
            background-color: white;
            position: relative;
            margin-bottom: 15px;
        }

        .table .thead-dark th {
            color: #fff;
            background-color: #71b7c0;
            border: 0;
            /* border-color: #71b7c0; */
        }

        /* .evaluation table tbody tr td:first-child {
            display: block !important;

        } */

        .evaluation table tbody tr td:first-child {
            /* display: flex; */
            align-items: start !important;
            justify-content: start !important;
            /* border-color: #71b7c0; */
        }

        .evaluation table tbody tr td:first-child span {
            width: 100%;
        }

        .evaluation table tbody tr td {
            text-align: start;
            height: 100%;
            border-left: 0 !important;
        }

        .badge {
            padding: 5px;
            font-size: 0.9rem;
        }
    </style>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <div class="container-fluid mt-4">
            <div class="search  d-flex justify-content-space-between  px-3" style="justify-content: space-between; border-radius:5px;">
                <div class="d-flex align-items-center justify-content-center my-3 p-2" style="font-size:0.8rem;background:#dedede;border-radius:3px;">
                  {{ __('site.consultations') }}
                  <i class="fa-solid fa-angle-left mx-2"></i>
                  {{ $tap }}
                    {{-- <span>
                        <p>الاستشارات</p>
                        <p><i class="fa-solid fa-angle-left"></i></p>
                        <p>{{ $tap }}</p>
                    </span> --}}

                </div>
                {{-- <a href="{{ url('/users/consultation/faq') }}" class="bg-success my-2 d-flex align-items-center p-2" style="color:white;border-radius:4px">
                  <i class="fa-solid fa-circle-plus mx-1"></i>
                      {{ __('site.new consultation') }}
                </a> --}}

                {{--             <div class="ser">
              <label for="search">البحث :</label>
              <input type="text">
              <label for="search" class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></label>
            </div> --}}
            </div>


            @foreach ($userconsultations as $consultation)
                <div class="evaluation shadow-sm">
                    <div class="header-evaluation">
                        {{-- <input type="checkbox" name="" id=""> --}}
                        <label>{{ $consultation->category->name }}</label>
                    </div>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('site.title') }}</th>
                                <th>{{ __('site.status') }}</th>
                                <th>{{ __('site.updated at') }}</th>
                                <th>{{ __('site.actions') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td style="width: 40%">
                                    <span>
                                        {{ \Illuminate\Support\Str::limit($consultation->title, $limit = 200, $end = '...') }}
                                        {{-- {{ $consultation->title }}  --}}
                                    </span>

                                </td>
                                <td style="width: 20%">
                                    @if ($consultation->status == 'submitted')
                                        <span
                                            class="badge badge-pill badge-warning">{{ __('site.' . $consultation->status) }}</span>
                                    @elseif($consultation->status == 'approved')
                                        <span
                                            class="badge badge-pill badge-success">{{ __('site.' . $consultation->status) }}</span>
                                    @elseif($consultation->status == 'rejected')
                                        <span
                                            class="badge badge-pill badge-danger">{{ __('site.' . $consultation->status) }}</span>
                                    @elseif($consultation->status == 'closed')
                                        <span
                                            class="badge badge-pill badge-success">{{ __('site.' . $consultation->status) }}</span>
                                    @elseif($consultation->status == 'assigned')
                                        <?php $last_reply = $consultation->replies()->orderBy('created_at','desc')->first()?>
                                      @if($last_reply)
                                        @if ($last_reply->owner == 1)
                                      <span
                                          class="badge badge-pill badge-warning">{{ __('site.waiting for consultant reply') }}
                                      </span>
                                      @elseif ($last_reply->owner == 0 && $last_reply->status == 'rejected')
                                      <span
                                          class="badge badge-pill badge-danger">{{ __('site.your last reply was rejected') }}
                                      </span>
                                      @elseif ($last_reply->owner == 0 && $last_reply->status == 'submitted')
                                      <span
                                          class="badge badge-pill badge-warning">{{ __('site.your last reply was sent') }}
                                      </span>
                                      @elseif ($last_reply->owner == 0 && $last_reply->status == 'approved')
                                      <span
                                          class="badge badge-pill badge-warning">{{ __('site.your last reply was approved') }}
                                      </span>
                                      @endif
                                      @endif

                                    @endif
                                </td>

                                <td style="width: 20%">{{ $consultation->updated_at }}</td>

                                <td style="width: 20%">
                                  <div>

                                      <a href="{{ url('consultants/consultation/chat/'.$consultation->id) }}" class="btn btn-orange" style="padding:5px 10px !important">
                                              {{ __('site.details') }}
                                      </a>
                                      @if ($tap ==  __('site.new consultations'))
                                          <a href="{{ url('consultants/consultation/reject/' . $consultation->id) }}" class="btn btn-red" style="padding:5px 10px !important">
                                                  {{ __('site.reject') }}
                                          </a>

                                      @endif

                                      @if ($tap ==  __('site.assigned consultations'))
                                          <a href="{{ url('consultants/consultation/close/' . $consultation->id) }}" class="btn btn-red" style="padding:5px 10px !important">
                                                  {{ __('site.close') }}
                                          </a>

                                      @endif


                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                </div>
            @endif

            <div class="d-flex justify-content-center">
                {{ $userconsultations->links() }}

            </div>

            <div class="new-evaluation">

            </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection




@section('js')
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- AdminLTE -->
    <script src="./dist/js/adminlte.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="./dist/js/pages/dashboard3.js"></script>
    <!-- jQuery -->

    <!-- InputMask -->
    <script src="./plugins/jquery-ui/jquery-ui.min.js"></script>


    <script src="./plugins/fullcalendar/main.js"></script>
    <script src="./plugins/bs-stepper/js/bs-stepper.min.js"></script>
@endsection
