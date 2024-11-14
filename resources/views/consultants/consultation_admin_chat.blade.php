@extends('consultants.layout.app')
<!--nav-->

<!--nav-->
<!--start main section-->

@section('css')
    <link rel="stylesheet" href="{{ asset('css/section-2.css') }}">

    <style>
        @font-face {
            font-family: 'dli';
            src: url('/fonts/DINNextLTArabic-Regular-2.ttf');
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

        section .chat-box .text-box {
            width: 100% !important;
            height: auto !important;
            background-color: #333;
            border-radius: 20px;
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            -ms-border-radius: 20px;
            -o-border-radius: 20px;
        }
        section .chat-box .image {
            display: block;
            width: auto !important;
            text-align: center;
        }
        section .text-box .box-content .first-box p {
            color: white;
            font-weight: 400;
            font-size: 16px;
            margin-bottom: 15px;
            justify-content: start;
            display: block;
        }
        .content-wrapper section {
            direction: inherit;
            height: 100vh;
        }
        section .chat-box .image {
            margin-right: 10px;
            margin-left: 10px;
        }
        .content-wrapper {
            padding: 60px 0 150px 20px;

        }
        section .text-box .box-content .first-box {
            margin-bottom: 5px;
            width: 100%;
        }
        .footer-section .box-cont .text-cont {
            width: 100%;
            height: 136px;
        }
        .messagecontainer{
  border-radius: 6px;
        border: solid 1px #75767a;
  display:flex;
  justify-content:space-between;
  width:750px;
  min-height:44px;
  height:auto;
}

#file{
  display: none;
}

.file{
  display:flex;
  font-size:32px;
  font-weight:bold;
  color:#75767a;
  border-right: 1px solid #75767a;
  padding: 4px 16px;
  cursor:pointer;
}

.send{
  /* border-left: 1px solid #75767a;
  background-color: #a0a0a0; */
  width:65px;
  padding: 4px 16px;
  display:flex;
}

.btn{
  border:none;
  font-size:14px;
  line-height:34px;
  background-color:transparent;
  color:white;
  font-weight:bold;
  cursor:pointer;
}

.input{
  flex-grow:1;
  padding: 4px 16px;
  display:flex;

}

.text{
  width:100%;
  font-size:13px;
  font-family: Arial;
  resize:none;
  border:none;
}
  .text:focus{
    outline:none;
  }
}
    </style>
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content">
        <section style="display: contents;">
            <div class="container-fluid">
                <div class="chat-box">
                    <div class="image">
                        <img src="{{ filter_var($data->user->avatar, FILTER_VALIDATE_URL) ? $data->user->avatar : Voyager::image($data->user->avatar) }}"
                            alt="">
                        <span>{{ $data->user->name }}</span>
                    </div>
                    <div class="text-box shadow-sm" style="background: #bbe1e6">
                        <div class="box-content">
                            <div class="first-box">
                                <p style="font-weight: bold;color:black">{{ $data->title }}</p>
                                <pre style="color:black;background:none;border:0;font-size: 1rem !important;font-family: 'Almarai', sans-serif !important;">{!! $data->content !!}</pre>
                                @if ($data->attachment)
                                    <div>
                                        <a style="color: #0078f9;text-decoration: underline;background-color: transparent;" target="_blank" href="{{ $data->attachment }}">{{ __('site.attachment') }}</a>

                                    </div>
                                @endif

                                <div class="text-white mt-3 d-flex justify-content-end" style="color: black !important">{{ $data->created_at }}</div>

                            </div>
                            {{-- <div class="second-box">
                                <img src="{{ asset('img/Group 223.png') }}" alt="">
                                <img src="{{ asset('img/Group 224.png') }}" alt="">
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="time">
                        <span>{{ $data->updated_at }}</span>
                    </div> --}}
                </div>

                @foreach ($replies as $reply)
                    @if ($reply->owner == 0)
                        <div class="chat-box">
                            <div class="image">
                                <img src="{{ filter_var($reply->consultant->user->avatar, FILTER_VALIDATE_URL) ? $reply->consultant->user->avatar : Voyager::image($reply->consultant->user->avatar) }}"
                                    alt="">
                                <span>{{ $reply->consultant->user->name }} <span class="text-success">({{__('site.consultant')}})</span> </span>
                            </div>
                            <div class="text-box shadow-sm" style="background-color: @if($reply->status == 'rejected')  #ffc4c4 @else #efefef @endif;">
                                <div class="box-content">
                                    <div class="first-box">
                                        {{-- <p style="font-weight: bold">{{ $reply->title }}</p> --}}
                                        <pre style="color:black;background:none;border:0;font-size: 1rem !important;font-family: 'Almarai', sans-serif !important;">{!! $reply->content !!}</pre>
                                        @if ($reply->attachment)
                                            <div>
                                                <a style="color: #0078f9;text-decoration: underline;background-color: transparent;" target="_blank" href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>

                                            </div>
                                        @endif

                                        @if ($reply->comment)
                                            <div class="mt-3">

                                                <p style="color: #ff1e1e"><i class="fa-solid fa-circle-exclamation mx-2" style="font-size: 1.2rem"></i> {!! $reply->comment !!}</p>

                                            </div>
                                        @endif

                                        @if ($reply->meeting_url)
                                            <div class="mt-3">

                                                {{-- <p style="color: #c"><i class="fa-solid fa-circle-info mx-2"></i>{{ __('site.The consultant request for a meeting at : ') . $reply->meeting_time}}</p> --}}
                                                <a href="{{ $reply->meeting_url }}" target="_blank" class="btn btn-primary @if($reply->meeting_time > now()->addMinutes(30) || $reply->meeting_time < now()->subMinutes(30)) disabled @endif" style="background: #098cff;padding:5px 10px !important;"><img src="{{ asset('img/zoom.png') }}" class="mx-1" style="height: 40px" alt=""><span class="mx-1">{{ __('site.start meeting') }}</span></a>
                                                <div style="color:black;font-size:0.9rem;color:#098cff">{{ $reply->meeting_time }}</div>
                                            </div>
                                        @endif

                                        <div class="mt-3 d-flex justify-content-end" style="color:black">{{ $reply->created_at }}</div>

                                    </div>
                                    {{-- <div class="second-box">
                                        <img src="{{ asset('img/Group 223.png') }}" alt="">
                                        <img src="{{ asset('img/Group 224.png') }}" alt="">
                                    </div> --}}
                                </div>
                            </div>
                            {{-- <div class="time">
                                <span>{{ $data->updated_at }}</span>
                            </div> --}}
                        </div>
                        {{-- <div class="chat-box">
                            <div class="image">
                                <img src="{{ filter_var($reply->consultant->user->avatar, FILTER_VALIDATE_URL) ? $reply->consultant->user->avatar : Voyager::image($reply->consultant->user->avatar) }}"
                                    alt="">
                                <span>{{ $reply->consultant->user->name }}</span>
                            </div>
                            <div class="text-box">
                                <div class="box-content">
                                    <div class="first-box">
                                        <p>{!! $reply->content !!}</p>
                                    </div>
                                    <div class="second-box">
                                        <img src="{{ asset('img/Group 223.png') }}" alt="">
                                        <img src="{{ asset('img/Group 224.png') }}" alt="">
                                        <a href="{{ $reply->attachment }}">Download</a>
                                    </div>
                                </div>
                            </div>
                            <div class="time">
                                <span>{{ $reply->updated_at }}</span>
                            </div>
                        </div> --}}
                    @elseif($reply->owner == 1)
                        <div class="chat-box">
                            <div class="image">
                                <img src="{{ filter_var($reply->user->avatar, FILTER_VALIDATE_URL) ? $reply->user->avatar : Voyager::image($reply->user->avatar) }}"
                                    alt="">
                                <span>{{ $reply->user->name }}</span>
                            </div>
                            <div class="text-box shadow-sm" style="background: #bbe1e6">
                                <div class="box-content">
                                    <div class="first-box">
                                        {{-- <p style="font-weight: bold">{{ $reply->title }}</p> --}}
                                        <pre style="color:black;background:none;border:0;font-size: 1rem !important;font-family: 'Almarai', sans-serif !important;">{!! $reply->content !!}</pre>
                                        @if ($reply->attachment)
                                            <div>
                                                <a style="color: #0078f9;text-decoration: underline;background-color: transparent;" target="_blank" href="{{ $reply->attachment }}">{{ __('site.attachment') }}</a>

                                            </div>
                                        @endif



                                        <div class="mt-3 d-flex justify-content-end" style="color: black !important">{{ $reply->created_at }}</div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>

            @if ($data->status == 'assigned')
            {{-- <div class="messagecontainer">

                <div class="file">
                  <label for="file" class="label">+</label>
                  <input type="file" id="file"/>
                </div>
              <div class="input">
                <textarea class="text"></textarea>
                </div>
                <div class="send">
                  <input type="submit" class="btn"/>
                </div>
            </div> --}}
                <div class="footer-section">
                    <div class="container-fluid">
                        <span>Your Answer</span>
                        <div class="box-cont">

                            <img src="{{ asset('img/wataneya logo middle3.png') }}" alt="">
                            <div class="text-cont">
                                {{-- <header>
                                    <ul>
                                        <li><i class="fa-thin fa-b"></i></li>
                                        <li><i class="fa-solid fa-i"></i></li>
                                        <li><i class="fa-solid fa-download"></i></li>
                                        <li><i class="fa-solid fa-download"></i></li>
                                        <li><i class="fa-solid fa-download"></i></li>
                                    </ul>
                                </header> --}}
                                <form class="d-block" class="send" method="POST" action="{{ url('consultants/consultation/chat/store/'.$data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <textarea class="px-2 w-100 shadow-sm" rows="5" style="border-radius: 5px;" name="content" id="" required></textarea>
                                    <div class="d-flex align-items-top">
                                        <button class="btn btn-white shadow-sm " type="submit" style="height:43px;background: white;padding: 3px 8px !important;color:black;border: 1px solid #999999;">
                                            <img style="width: 20px;height:auto" src="{{ asset('img/Fill 2.png') }}" alt="">
                                            <span class="mx-1 my-0 d-inline-block">{{ __('site.send') }}</span>
                                        </button>

                                        {{-- <label for="file" class="label"> --}}
                                        <div class="d-inline-block mx-2">
                                           <button type="button" onclick="importData()" class="btn btn-white shadow-sm " style="background: white;padding: 3px 8px !important;color:black;border: 1px solid #999999;">
                                               <img style="width: 20px;height:auto" src="{{ asset('img/attachment.png') }}" alt="">
                                               <span class="mx-1 my-0 d-inline-block">{{ __('site.add attachment') }}</span>


                                          </button>
                                          <div id="files"></div>
                                        </div>






                                    </div>
                                    <div >
                                        <div>
                                            <label for="start_time" class="mb-1 mt-2" style="font-size: 1rem;font-weight:300">{{ __('site.request zoom meeting:') }}</label>

                                        </div>
                                        <input type="datetime-local" class="form-control col-md-4" name="start_time" id="start_time">
                                    </div>






                                   {{-- </label> --}}
                                   <input type="file" id="file" onchange="showFile()" name="attachment"/>



                                    {{-- <img
                                            src="{{ asset('img/Fill 2.png') }}" alt="">
                                            <div class="file" style="position: absolute;
                                            right: 40px;
                                            bottom: 20px;">
                                                <label for="file" class="label">+</label>
                                                <input type="file" id="file"/>
                                              </div> --}}
                                    {{-- <button type="submit" name="id" value="{{ $id }}"></button> --}}
                                </form>
            @endif
    </div>
    </div>
    </div>
    </div>
    </section>
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
    <script>
        function importData() {
            let input = $('#file');
            // input.type = 'file';
            // input.onchange = function(e) {
            //     // you can use this method to get file and perform respective operations
            //     console.log('here');
            //             let files =   Array.from(input.files);
            //             console.log(files);
            //         };
            input.click();

        }
        function showFile(){
            let files = $('#file').prop('files');
            $('#files').text(files[0].name);
            // console.log(files[0].name);
        }
    </script>
@endsection
