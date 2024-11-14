<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>تسجيل الدخول</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> --}}

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>

            body {
                font-family: 'Nunito', sans-serif;
                text-align: right;
            }
            /* body.active{
                background: #ffdd03;
            } */
            @font-face {
                font-family: 'dli';
                src:url('/fonts/DINNextLTArabic-Regular-2.ttf');
                /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
            }
         
        
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family:'dli' !important; 
            }
            [class*=icheck-]>input:first-child:checked+label::after {
                left: 6px !important;
            }
            .container-all{
                background-color: #03a9f4;
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                transition: 0.5s;
            }
            .container-all.active{
                background: #f1d72b;
            }             
            .login-container{
                position:relative;
                display: block;
                width: 400px;
                height: 500px;
                margin: 20px;
                text-align: center;
                /* background: #ff0; */
            }
            .blue-bg{
                position: absolute;
                top: 40px;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 420px;
                background: rgba(255, 255, 255, 0.2);
                box-shadow: 0px 5px 45px rgba(0,0,0,0.15);
            }
            .blue-bg .box{
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100%;
                width: 50%;
                flex-direction: column;
            }
            .blue-bg .box h2{
                color: #fff;
                font-size: 1.2em;
                font-weight: 500;
                margin-bottom: 10px;
            }
            .blue-bg .box button{
                cursor: pointer;
                font-size: 16px;
                font-weight: 500;
                padding: 10px 20px;
                color: #333;
                background-color: #fff;
                border: none;
            }
            .formBx{
                position: absolute;
                top: 0;
                /* right: 25%; */
                width: 400px;
                height: 100%;
                background: #fff;
                z-index: 1000;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                box-shadow: 0px 5px 45px rgba(0,0,0,0.25);
                transition: 0.5s ease-in-out;
            }
            .formBx.active{
                right: 50%;
            }
            .formBx .form{
                position: absolute;
                right: 0;
                width: 100%;
                padding: 50px;
                transition: 0.5s;
            }
            .formBx .form form{
                width: 100%;
                display: flex;
                flex-direction: column;
            }
            .formBx .form form h3{
                font-size: 1.5em;
                font-weight: 500;
                margin-bottom: 20px;
                color: #333;
            }
            .formBx .form form input{
                padding: 10px;
                border: 0.5px solid #03a9f4;
                outline: none;
                width: 100%;
                margin-bottom: 20px;
                /* font-size: 16px; */
                background: white;
                border-radius: 5px;
                
            }
            .formBx .signup-form form input{
                border: 0.5px solid #a7a4a4;
            }
            .formBx .form form input[type="submit"]{
                border:none;
                background-color: #777d80;
                box-shadow: 2px 2px 5px rgba(0,0,0,0.10); 
                max-width: 140px;
                color: #fff;
                cursor: pointer;
            }
            .formBx .signup-form form input[type="submit"]{
                
                background-color: #ffff4d;
                color: rgb(83, 83, 83);
                box-shadow: 2px 2px 5px rgba(0,0,0,0.10); 
                cursor: pointer;
               
            }
            .formBx .form form .forgot{
                
                text-decoration: underline !important;
                color: #03a9f4;
            }
            .formBx .signin-form{
                transition-delay: 0.25s;
            }
            .formBx.active .signin-form{
                right: -100%;
                transition-delay: 0s;
            }
            .formBx .signup-form{
                right: 100%;
                transition-delay: 0s;
            }
            .formBx.active .signup-form{
                right: 0;
                transition-delay: 0.25s;
            }
            
            input:-webkit-autofill {
                 -webkit-box-shadow: 0 0 0 1000px white inset !important;
                 
            }
            form .logo-container{
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 20px; 
                
                
            }
            @media (max-width: 991px){
                .login-container{
                    max-width: 400px;
                    /* height: 650px; */
                    display: flex;
                    align-items: center;
                    justify-content: center; 
                }
                .login-container .blue-bg{
                    top: 0;
                    height: 100%;
                }
                .formBx{
                    width: 100%;
                    height: 500px;
                    top: 0;
                    box-shadow: none;
                }
                .blue-bg .box{
                    position: absolute;
                    width: 100%;
                    height: 150px;
                    bottom: 0;
                }
                .box.signin{
                    top: 0;
                }
                .formBx.active{
                    right: 0;
                    top: 150px;
                }
            }
            .header{
                /* left: 0; */
                display: flex;
                /* justify-content: center; */
                justify-content: end;
                align-items: center;
            }
            .header-2{
                /* left: 0; */
                position: absolute;
                top: 0;
                left: 0;
                display: flex;
                /* justify-content: center; */
                justify-content: start;
                align-items: center;
            }
            .header-3{
                /* left: 0; */
                position: absolute;
                bottom: 0;
                left: 0;
                display: flex;
                /* justify-content: center; */
                justify-content: start;
                align-items: center;
            }
            .header-container{
                position: relative;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                /* width: 620px; */
                width: 515px;
                /* gap:10px; */
                gap:5px;
            }
            .header-container-2{
               
                width: 303px;
                
            }
            
            .header-container .card{
                overflow: hidden;
                width: 200px;
                height: 200px;
                clip-path: polygon(50% 100%, 0 0, 100% 0);
                /* margin: 0 -75px; */
                margin: 0 -50px;

                background-color: #00c4d0;
                transition: background-color 0.2s ease;

            }
            .header-container .card:hover{
               
                background-color: #242424 !important;
            }
            .header-container .card:nth-child(even){
                
                clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
                background-color: #ffdd03;
            }
            .header-container .card:nth-child(6){
                
                clip-path: polygon(50% 100%, 0 0, 100% 0) ;
                background-color: #00c4d0 ;
            }
            .header-container .card:nth-child(7){
                
                clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
                background-color: #ffdd03;
            }
           .header-container .card:nth-child(8){
                
                clip-path: polygon(50% 100%, 0 0, 100% 0) !important;
                background-color: #00c4d0 !important;
            }
             /* .header-container .card:nth-child(6){
                
                clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
            }
             */
            .header-container .card img{
                width: 200px;
                transition: 0.5s;
            }
            .header-container .card:hover img{
                transform: scale(1.2);
            }
            .alert li{
                list-style-type: none;
            }
            .icheck-primary{
                margin-bottom:10px !important;
                margin-top:0 !important;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container-all">
            <div class="login-container">
                {{-- <div class="blue-bg">
                    <div class="box signin">
                        <h2>تمتلك حساب بالفعل ؟</h2>
                        <button class="signin-btn">تسجيل الدخول</button>
                        @if ($errors->any())
                            <div class="alert alert-danger my-3 shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>                        
                        @endif 
                    </div>
                    <div class="box signup">
                        <h2>لا تملك حساب ؟</h2>
                        <button class="signup-btn">إنشاء حساب</button>
                        @if ($errors->any())
                            <div class="alert alert-danger my-3 shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>                        
                        @endif 
                    </div>

                </div> --}}
                <div class="formBx">
                       
                    <div class="form signin-form">
                      
                        <form action="{{ route('voyager.login') }}" method="POST" >
                            @csrf
                            <div class="logo-container">
                                 <img width="100px" class="logo" src="{{asset('img/wataneya_logo_middle.png')}}" alt="">
                            </div>
                            <h3>تسجيل الدخول</h3>
                            <input type="email" name="email" id="email"  placeholder="البريد الإلكتروني" value="{{ old('email') }}" required >
                            <input type="password" name="password" id="password" placeholder="كلمة المرور" required>
                            <div class="icheck-primary  d-inline text-right" style="">
                                <input type="checkbox" id="checkboxPrimary2" name="remember" id="remember">
                                <label  for="checkboxPrimary2">
                                    
                                    
                                </label>
                                <span class="" >تذكرنى</span>
                            </div>    
                            <input class="btn" type="submit" value="تسجيل الدخول">
                            @if(!$errors->isEmpty())
                                <div class="alert alert-danger">
                                    <ul class="list-unstyled">
                                        @foreach($errors->all() as $err)
                                            <li>{{ $err }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- <a href="#" class="forgot">نسيت كلمة المرور</a> --}}
                        </form>
                    </div>
                    {{-- <div class="form signup-form">
                         
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="logo-container">
                                <img width="100px" class="logo" src="{{asset('img/wataneya_logo_middle.png')}}" alt="">
                            </div>
                            <h3>إنشاء حساب</h3>
                            <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="الاسم" >
                            <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="البريد الإلكتروني" >
                            <input type="password" name="password" id="password" placeholder="كلمة المرور">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تأكيد كلمة المرور">
                            <input class="btn" type="submit" value="إنشاء حساب">
                            
                        </form>
                    </div> --}}
                </div>
            </div>    
        </div>
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        {{-- <script>
            const signin_btn = document.querySelector('.signin-btn');
            const signup_btn = document.querySelector('.signup-btn');

            const formBx = document.querySelector('.formBx');
            const container_all = document.querySelector('.container-all');
            signup_btn.onclick = function(){
                formBx.classList.add('active');
                container_all.classList.add('active');
            }
            signin_btn.onclick = function(){
                formBx.classList.remove('active');
                container_all.classList.remove('active');
            }
        </script> --}}
    </body>
</html>
