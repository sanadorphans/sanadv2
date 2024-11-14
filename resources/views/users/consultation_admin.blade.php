@extends('users.layout.app')
        <!--nav-->
    <!--nav-->
    <!--start main section-->

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/section-4.css') }}">



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
      </style>

  @endsection


@section('content')

   <!-- Content Wrapper. Contains page content -->
   <div class="content">
    <div class="container">
        <div class="btn">
            <button>
                <i class="fa-solid fa-circle-plus"></i>
                اضافة جديد
            </button>
            <button>
                <i class="fa-solid fa-circle-plus"></i>
                اضافة الي FAQ
            </button>
        </div>
        <!-- End btn -->
        <div class="search">
            <div class="consulting">
                    <p>الاستشارات</p>
                    <p><i class="fa-solid fa-angle-left"></i></p>
                    <p>الاستشارات جديدة</p>
            </div>
            <div class="ser">
                <label for="search">البحث :</label>
                <input type="text">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
        </div>
        <!-- End search -->

        <div class="evaluation">
            <div class="header-evaluation">
                <input type="checkbox" name="" id="">
                <label>التقييم المؤسسي</label>
            </div>
            <!-- End Header -->
            <table>
                <thead>
                    <tr>
                        <td>اسم المستخدم</td>
                        <td>الاستشارة</td>
                        <td>حالة الاستشارة</td>
                        <td>الاجراءات</td>
                        <td>تاريخ التحديث</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <span></span>
                        </td>
                        <td>
                            <a href="#">تفاصيل</a>
                        </td>
                        <td>
                          <h5 class="square-blue">في انتظار المراجعة</h5>
                          <span>في انتظار موافقة المسؤول</span>
                        </td>
                        <td>
                            <button>تعيين استشاري</button>
                            <button>فتح الاستشارة</button>
                            <button>
                                <i class="fa-solid fa-trash-can"></i>
                                رفض
                            </button>
                        </td>
                        <td>
                            <span>13/7/2022</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="evaluation">
          <div class="header-evaluation">
              <input type="checkbox" name="" id="">
              <label>التقييم المؤسسي</label>
          </div>
          <!-- End Header -->
          <table>
              <thead>
                  <tr>
                      <td>اسم المستخدم</td>
                      <td>الاستشارة</td>
                      <td>حالة الاستشارة</td>
                      <td>الاجراءات</td>
                      <td>تاريخ التحديث</td>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          <span></span>
                      </td>
                      <td>
                          <a href="#">تفاصيل</a>
                      </td>
                      <td>
                        <h5 class="square-orange">مُكَلَّف</h5>
                        <span>(اسم الاستشاري)</span>
                      </td>
                      <td>
                          <button>تعيين استشاري</button>
                          <button>فتح الاستشارة</button>
                          <button>
                              <i class="fa-solid fa-trash-can"></i>
                              رفض
                          </button>
                      </td>
                      <td>
                          <span>13/7/2022</span>
                      </td>
                  </tr>
              </tbody>
          </table>
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
