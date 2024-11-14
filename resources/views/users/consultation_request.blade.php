@extends('users.layout.app')
<!--nav-->
<!--nav-->
<!--start main section-->

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Request.css') }}">


    <style>
        @font-face {
            font-family: 'dli';
            src: url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }

        /* .custom-file-label::after {
            content: "<?php echo __('site.add attachment'); ?>";
        } */

        .custom-file-button input[type="file"] {
                margin-left: -2px !important;

        }
        .custom-file-button input[type="file"]::-webkit-file-upload-button {    
            display: none;
        }
        .custom-file-button input[type="file"]::file-selector-button {    
            display: none;
        }

            /* &:hover {
                label {
                    background-color: #dde0e3;
                    cursor: pointer;
                }
            }
        } */
        .btn-orange {
          color: #ffffffd4;
          background-color: #e7a600;
          outline-color: white;
          border-radius: 4px;
          border: none;
          font-size: 1rem;
          font-weight:bold;
          padding:10px 20px !important;
          
        }

        .content-wrapper .h1 {
            width: 164px;
            height: 29px;

            font-family: 'DIN Next LT Arabic';
            font-style: normal;
            font-weight: 500;
            font-size: 19.8828px;
            line-height: 29px;
            text-align: right;
            letter-spacing: 0.01em;


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
        /* .custom-file-input.is-valid~.custom-file-label, .was-validated .custom-file-input:valid~.custom-file-label {
            border-color: rgb(200, 200, 200) !important;
        } */

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
    </style>
<style>
.form-control.is-invalid, .was-validated .form-control:invalid {
    border: 0 !important;
    box-shadow: none;
}
.form-control:focus{
    border: 1px solid rgb(92, 92, 92);
}
.form-control.is-valid, .was-validated .form-control:valid {
    border-color: rgb(200, 200, 200);
    /* padding-right: calc(1.5em + 0.75rem); */
    background-image: none !important;
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

element.style {
}
.form-control.is-invalid, .was-validated .form-control:invalid {
    border: 0 !important;
    box-shadow: none;
}
.main-form .org-data .form-control {
    background-color: #ECECEC;
    border: 1px solid #D1D1D1;
    box-sizing: border-box;
    border-radius: 5px;
}

.form-custom{
    padding: 8px;
    display: block;
    width: 100%;
    background: #ECECEC;
    border: 1px solid #D1D1D1;
    box-sizing: border-box;
    border-radius: 5px;
    cursor: pointer;
}
.form-custom:focus{
    /* border: 3px solid rgba(0, 128, 0, 0.479) !important; */
}
input:focus,textarea:focus{
 outline: 2px solid rgba(0, 128, 0, 0.24);
}
input.form-custom.error{
    outline: 2px solid rgba(211, 1, 1, 0.664);
}

 </style>

@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->

    @if (session('msg'))
    <div class="alert alert-success mx-4 my-3">
        {{ session('msg') }}
    </div>
    @endif



        <div class="content">

            <div class="container-fluid">

                <form method="post" action="{{ url('users/consultation/request/store') }}" class="main-form was-validated px-5 py-5 " enctype="multipart/form-data">
                    @csrf
                    <div class="form-container container-fluid bg-white px-3 py-3 shadow-sm" style="border-radius:15px; ">
                        <div class="row w-100">
                            <div class="mb-3 col-md-4">
                            
                                <label>{{ __('site.name') }}<small class="text-danger mx-2"> '{{ __('site.required') }}'</small></label>
                                <input type="text" class="form-custom @error('name') error @enderror"  name="name" value="{{ $user->name }}" >
                                <small>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                            
                                <label>{{ __('site.email') }}<small class="text-danger mx-2"> '{{ __('site.required') }}'</small></label>
                                <input type="text" class="form-custom @error('email') error @enderror"  name="email" value="{{ $user->email }}" >
                                <small>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-4">
                            
                                <label>{{ __('site.phone') }}<small class="text-danger mx-2"> '{{ __('site.required') }}'</small></label>
                                <input type="text" class="form-custom @error('phone') error @enderror"  name="phone" value="{{ $phone }}" >
                                <small>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            
                        </div>
                        <div class="row w-100" >
                            <div class="mb-3 col-md-12">
                            
                                <label  class="org-name">{{ __('site.category') }}<small class="text-danger mr-2"> '{{ __('site.required') }}'</small></label>
                                {{-- <input type="text" class="form-custom @error('category') error @enderror"  name="category" value="{{old('category')}}"> --}}
                                <select class="form-custom @error('category') error @enderror" id="category" name="category" value="{{old('category')}}">
                                    {{-- <option value="0" selected>{{ __('site.all') }}</option> --}}

                                    @foreach ($categories as $category_item)
                                        @if ( isset($category->id) && $category->id == $category_item->id)
                                            <option value="{{ $category_item->id }}" selected>{{ $category_item->name }}</option>
                                        @else
                                            <option value="{{ $category_item->id }}">{{ $category_item->name }}</option>

                                        @endif
                                        {{-- <a class="dropdown-item" href="{{ route('users.consultation.index',['category'=>$item->name]) }}"></a> --}}
                                    @endforeach
                                    
                                </select>
                                <small>
                                    @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-12">
                            
                                <label>{{ __('site.title') }}<small class="text-danger mx-2"> '{{ __('site.required') }}'</small></label>
                                <input type="text" class="form-custom @error('title') error @enderror"  name="title" value="{{ old('title') }}" >
                                <small>
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row w-100" >
                            <div class="mb-3 col-md-12">
                            
                                <label>{{ __('site.content') }}<small class="text-danger mx-2"> '{{ __('site.required') }}'</small></label>
                                <textarea class="form-control" rows="5" name="content" style="background: #ECECEC;" id="content">{{ old('content') }}</textarea>
                                <small>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row w-100">
                            <div class="mb-3 col-md-12">
                                {{-- <div>
                                    <label >{{ __('site.attachment') }}</label>

                                </div> --}}

                                {{-- <div>
                                    <input type="file" class="custom-file-input" id="attachment" name="attachment">
                                    <label class="custom-file-label" style="background: #ECECEC;" for="customFile"></label>
                                </div> --}}
                                <div class="input-group custom-file-button">
                                    <label class="input-group-text" for="inputGroupFile">{{ __('site.add attachment') }}</label>
                                    <input type="file" class="form-control" id="inputGroupFile" name="attachment">
                                </div>
                                
                                <small>
                                    @error('attachment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-orange" style="padding:10px 20px !important;margin-top: 20px !important">
                                {{ __('site.send') }}
                            </button>
                        </div>
                        
                        
                    </div>
                </form>    


                {{-- <div class="form w-50">



                    <div id="form">

                        <label for="inputPassword5" class="form-label">الاسم</label>
                        <input type="name" name="name" value="{{ $user->name }}" id="inputPassword5" class="form-control">
                    </div>


                    <div id="form">
                        <label for="inputPassword5" class="form-label "> البريد الالكتروني </label>
                        <input type="email" name="email" value="{{ $user->email }}" id="inputPassword5" class="form-control">
                    </div>


                    <div id="form">
                        <label for="inputPassword5" class="form-label"> رقم الهاتف </label>
                        <input type="text" value="{{ $phone }}" id="inputPassword5" class="form-control">
                    </div>


                    <form method="POST" action="{{ url('users/consultation/request/store') }}">
                        @csrf
                    <div id="form">
                        <label for="inputPassword5" class="form-label"> العنوان</label>
                        <input class="form-control " name="title" placeholder="العنوان:" id="inputPassword5" aria-describedby="required-description" required>
                    </div>


                    <div id="form">

                        <label for="inputPassword5" class="form-label"> ضع استشارتك هنا </label>


                        <div class="content mb-5">
                            <textarea class="form-control " name="content" placeholder="اكتب هنا :" id="floatingTextarea2" style="height: 100px" aria-describedby="required-description" required></textarea>
                            <div class="attach w-100 ">

                                <input class="btn w-100" type="file" name="attachment" multiple>
                                    اضف مرفق <i class="fa fa-paperclip"></i>

                            </div>
                        </div>


                    </div>


                  

                    <div class="send w-100 my-5">
                        <button class="btn w-100">
                            ارسال
                        </button>
                    </div>
                </form>


                </div> --}}
            </div>
        </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
@endsection
