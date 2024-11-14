@extends('users.layout.app')
        <!--nav-->
    <!--nav-->
    <!--start main section-->

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/Request.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Stepper.css') }}">


    <style>
        @font-face {
            font-family: 'dli';
            src:url('/fonts/DINNextLTArabic-Regular-2.ttf');
            /* src: url(https://fonts.gstatic.com/s/lato/v16/S6uyw4BMUTPHjx4wXiWtFCc.woff2); */
        }
        .content-wrapper .h1{
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
            left: 0 !important;
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

      </style>

  @endsection


@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content">
      <div class="container ">

            <div class="stepper d-flex flex-column mt-5 ml-2 mb-5">
                <h1 class="head">تعليمات استخدام خدمة تقديم الاستشارات</h1>
                <div class="d-flex mb-1 py-4">
                  <div class="index d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1"><h1>1</h1></div>
                    <div class="line "></div>

                  </div>
                  <div class="steps">
                    <h5 class="text-dark text-bold">اختر  نوع الاستشارة</h5>
                    <p class="lead text-muted pb-3">قم باختيار نوع استشارتك من مجموعة الاستشارات المعروضة من خلال قراءة شرح وتفاصيل كل استشارة لمعرفة فئة استشارتك.</p>
                  </div>
                </div>
                <div class="d-flex mb-1 py-4">
                  <div class="index d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white font-size-500 mb-1"><h1>2</h1></div>
                    <div class="line  "></div>
                  </div>
                  <div class="steps">
                    <h5 class="text-dark text-bold"> اطلب استشارة   </h5>
                    <p class="lead text-muted pb-3">  بعد اختيار نوع الاستشارة، اضغط زر طلب استشارة الموجود أسفل بطاقة الشرح. </p>
                  </div>
                </div>
                <div class="d-flex mb-1 py-4">
                  <div class="index d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1"><h1>3</h1></div>
                    <div class="line  "></div>
                  </div>
                  <div class="steps">
                    <h5 class="text-dark text-bold">  الأسئلة الأكثر شيوعًا </h5>
                    <p class="lead text-muted pb-3"> بعد الضغط على زر طلب استشارة سيتم توجيهك إلى صفحة الأسئلة الأكثر شيوعًا. تصفح الأسئلة المعروضة وقم باستخدام محرك البحث لحصر الأسئلة. في حالم لم تجد إجابة على سؤالك قم بتقديم طلب استشارة جديدة.  </p>
                  </div>
                </div>
                <div class="d-flex mb-1 py-4">
                  <div class="index d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1"><h1>4</h1></div>
                    <div class="line  "></div>
                  </div>
                  <div class="steps">
                    <h5 class="text-dark text-bold"> املأ طلبك</h5>
                    <p class="lead text-muted pb-3"> قم بكتابة استشارتك في المربع المخصص. كما يمكنك إضافة ملفات أو صور إذا أردت من خلال الضغط على “إضافة مرفق”.</p>
                  </div>
                </div>
                <div class="d-flex mb-1 py-4">
                  <div class="index d-flex flex-column pr-4 align-items-center">
                    <div class="rounded-circle py-2 px-3 bg-primary text-white mb-1"><h1>5</h1></div>
                  </div>
                  <div class="steps">
                    <h5 class="text-dark text-bold">الأن يمكنك متابعة استشارتك</h5>
                    <p class="lead text-muted pb-3"> يمكنك متابعة  حالة استشارتك الجارية و تصفح استشاراتك السابقة من خلال صفحتك الشخصية باستخدامالقائمة الجانبية على اليمين والذهاب إلى “الاستشارات”.    </p>
                  </div>
                </div>
                <button class="btnInfo ">
                 <a href="{{ url('/users/consultation/faq') }}" style="color:black">
                    رجوع لطلب استشارة </a>
                </button>


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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="./FAQ'S.js"></script>


  @endsection
