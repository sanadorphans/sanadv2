@extends('users.layout.app')
        <!--nav-->
    <!--nav-->
    <!--start main section-->

    @section('css')
    <link rel="stylesheet" href="{{ asset('css/About.css') }}">

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

        <div class="links p-3">
          <p href="">الرئيسية <i class="fa-solid fa fa-chevron-left"></i><i class="fa-solid fa fa-chevron-left"></i> </i>   الخدمــات</p>
          <!-- <i class="nav-icon fa fa-newspaper-o"></i> -->
        </div>

      <div class=" mb-5">

        <div >
        <ul class="nav nav-pills nav-fill">

          <li class="nav-item line tabItem1">
            <a class="nav-link" href="#" onclick="openTab('firstTab')"> تطوير نظم الرعاية البديلة </a>
          </li>
          <li class="nav-item line tabItem2" >
            <a class="nav-link activeTab  " onclick="openTab('secondtTab')"  href="#"> الاستشارات الفنية  </a>
          </li>

          <li class="nav-item line tabItem3">
            <a class="nav-link" href="#" onclick="openTab('thirdTab')">برامج التعلم والتطوير</a>
          </li>
          <li class="nav-item line tabItem4">
            <a class="nav-link " href="#" onclick="openTab('fourthTab')">الإنتاج المعرفي</a>
          </li>
        </ul>
        </div>




        <div class="container py-3 tab" style="display: none;"  id="firstTab">
          section 1
        </div>



        <div class="container py-5 tab"  id="secondtTab">

          <header class="py-5 text-bold ">
          <i class="fa-sharp fa-solid fa-circle-small"></i > أنواع الاستشارات
        </header>


          <!-- section1 -->
          <div class="section1 py-3 "  >


              <div class="row">
                <div class="col-md-8 ">
                  <div class="textArea">

            <p >
              بناء على معايير جودة الرعاية البديلة، وبناءا على نتيجة التقييم يتم تطوير خطة عمل لرفع كفاءة واستدامة جودة الرعاية في بيوت الرعاية.



             تقوم وطنية بتقييم بيوت الرعاية لقياس جودة الرعاية المقدمة للأطفال والشباب وتطوير أدائها، وذلك لتقييم مواطن القوة ونقاط التحسين
             <br>
             <header class="text-bold">
             الخدمة مقدمة الي:
            </header>
             <br>
             ١ -تطوير خطة تطوير تقييم مؤسسات الرعاية البديلة بناء على معايير الجودة )الأيتام، بلا مأوى، ذوي الإعاقة( ووضع خطة تطوير.

             <br>
             ٢ -تطوير منهجية وأدوات تقييم بناء على المعايير.
             <br>
             ٣ -تقييم الحضانات.
             <br>
             ٤ -تطوير أدوات تقييم للحضانات.
             <br>

             ٥ -تدريب على تقييم الحضانات .
             <br>


             <br>
             <header class="text-bold">
             الفئة المستهدفة
            </header>
            <br>

             القطاع الخاص - الجهات المانحة - متبرعين أفراد - المدارس والجامعات - وزارة التضامن في مصر وزارة التضامن في البلاد العربية.</p>

            </div>

             <div class="btn float-start py-3">
              <button class="btnInfo">
                <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
              </button>
              <button class="btnRequest">
                <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
              </button>
            </div>
          </div>

          <div class="col-md-4 ">



          <div class="card" style="width: 90%;">
            <img src="{{ asset('img/image 64.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="text-bold mt-3">   التقييم المؤسسي  </p>
            </div>
          </div>









          </div>
        </div>


          <!-- section1 -->






           </div>

           <div class="section2 py-5  " >


          <div class="row">


            <div class="col-md-4 ">



          <div class="card" style="width: 90%;">
            <img src="{{ asset('img/image 2.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">

              <p class="text-bold mt-3">  تطوير معايير الجودة    </p>
            </div>
          </div>





              </div>


            <div class="col-md-8 ">
              <div class="textArea">

        <p >
          اعتمدت وزارة التضامن الاجتماعي بقرار وزاري رقم ١٨٨ في يونيو ٢٠١٤ معايير قومية إلزامية يتم بناءًا عليها دعم وتطوير وتقييم المؤسسات الإيوائية في مصر كان هذا نتاج جهود جمعية وطنية التي استمرت لستة سنوات بالتعاون مع مؤسسات محلية ودولية لتطوير وتطبيق معايير الجودة لتجربتها ومن ثم الدعوة إلى تبنيها وتعميمها. استعانت وزارة التضامن االجتماعي بخبراء جمعية وطنية لمراجعة هذه المعايير وتحديثها في 2018 وفي 2020
         <br>
         <header class="text-bold">
         الخدمة مقدمة الي:
        </header>
         <br>

         (الحضانات - دور المسنين - الدفاع الاجتماعي - ذوي الاحتياجات الخاصة)

         <br>


         <br>
         <header class="text-bold">
         الفئة المستهدفة
        </header>
        <br>

        وزارة التضامن الاجتماعي في البلاد العربية - وزارة التضامن الاجتماعي في مصر

        <br>
        <br>


        <br>

        </div>

         <div class="btn float-start py-3">
            <button class="btnInfo">
                <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
              </button>
              <button class="btnRequest">
                <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
              </button>
        </div>
      </div>


    </div>


      <!-- section1 -->






            </div>

            <div class="section3 py-5 " >


      <div class="row">
        <div class="col-md-8 ">
          <div class="textArea">

    <p >
      تقدم وطنية لمؤسسات المجتمع المدني العاملة في مجال الأطفال والشباب المعرضين لخطر استشارات لتمكينها من تطوير وتفعيل استراتيجيتها بمشاركة فريق عمل المؤسسة والأطراف المعنية.
     <br>
     <header class="text-bold">
     الخدمة مقدمة الي:
    </header>
     <br>
     ۱- تطوير وتوثيق الاستراتيجية
     <br>

    ۲- تقييم ومراجعة الاستراتيجية الحالية للمؤسسات

     <br>
     <br>
     <header class="text-bold">
     الفئة المستهدفة
    </header>
    <br>

    مؤسسات المجتمع المدني العاملة في مجال الطفولة وتنمية الشباب
    <br>

    <br>
    <br>

    <br>
    </div>

     <div class="btn float-start py-3">
        <button class="btnInfo">
            <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
          </button>
          <button class="btnRequest">
            <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
          </button>
    </div>
    </div>

    <div class="col-md-4 ">



    <div class="card" style="width: 90%;">
    <img src="{{ asset('img/image 3.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">

      <p class="text-bold mt-3">   التخطيط الاستراتيجي </p>
    </div>
    </div>




    </div>
    </div>


    <!-- section1 -->






            </div>

            <div class="section4 py-5 " >


              <div class="row">


                <div class="col-md-4 ">


                  <div class="card" style="width: 90%;">
                    <img src="{{ asset('img/image 4.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="text-bold mt-3">  تطوير معايير الجودة </p>
                    </div>
                  </div>




                  </div>


                <div class="col-md-8 ">
                  <div class="textArea">

            <p >

              استطاعت وطنية التعاون مع عدد من شركات القطاع الخاص لتفعيل دورهم تجاه تمكين الأطفال والشباب فاقدي الرعاية الوالدية اجتماعيا واقتصاديا من خلال تقديم استشارات لتطوير المسؤولية المجتمعية للشركات وبما يتفق مع أهداف التنمية المستدامة.

              <br>
            <header class="text-bold">
            الخدمة مقدمة الي:
            </header>
            <br>

            شرح كيفية تصميم فعاليات لخدمة ودمج الأيتام.

            <br>
            التدريب على كيفية تصميم برامج للمسؤولية الاجتماعية للشركات لخدمة الأيتام.

            <br>
            تقديم ورش توعوية عن التطوع وعن المعايير وعن قضية الأيتام.

            <br>


            <br>
            <header class="text-bold">
            الفئة المستهدفة
            </header>
            <br>
            المسؤولية الاجتماعية للشركات.
            <br>
            <br>




            </div>

            <div class="btn float-start py-3">
                <button class="btnInfo">
                    <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
                  </button>
                  <button class="btnRequest">
                    <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
                  </button>
            </div>
            </div>


            </div>


            <!-- section1 -->






            </div>

            <div class="section5 py-5 ">


              <div class="row">
                <div class="col-md-8 ">
                  <div class="textArea">

                    <p >

                      أصبح وجود سياسة مفعلة لحماية الطفل والنشء لمؤسسات المجتمع المدني التي تعمل بشكل مباشر مع الأطفال والشباب أمرا في غاية الضرورة والأهمية
                    تقدم وطنية استشارات تربوية ونفسية تتعلق بتنشئة ورعاية الطفل والنشء و استشارات خاصة بحماية الطفل لبيوت الرعاية.


                      <br>
                    <header class="text-bold">
                    الخدمة مقدمة الي:
                    </header>
                    <br>


                    ١- تقديم استشارات تربوية ونفسية (إدارة سلوك، الهوية، ...)


                    <br>
                    ٢- تقديم استشارات خاصة بالكفالة

                    <br>
                    ٣- تقديم استشارات خاصة بتطوير سياسة حماية الطفل

                    <br>


                    <br>
                    <header class="text-bold">
                    الفئة المستهدفة
                    </header>
                    <br>

                    مؤسسي ومديري بيوت الرعاية البديلة (الأيتام والأطفال بلا مأوى)– الكفلاء - مقدمي الرعاية مؤسسات وجمعيات تعمل مع بيوت الرعاية البديلة - الأسر البديلة
                    <br>


                    </div>

            <div class="btn float-start py-3">
                <button class="btnInfo">
                    <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
                  </button>
                  <button class="btnRequest">
                    <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
                  </button>
            </div>
            </div>

            <div class="col-md-4 ">



            <div class="card" style="width: 90%;">
            <img src="{{ asset('img/image 5.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">

              <p class="text-bold mt-3">   حماية ورعاية الطفل  </p>
            </div>
            </div>




            </div>
            </div>


            <!-- section1 -->






            </div>

            <div class="section6 py-5  ">


            <div class="row">


              <div class="col-md-4 ">


                <div class="card" style="width: 90%;">
                  <img src="{{ asset('img/image 6.png') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <p class="text-bold mt-3">  استشارات في الإدارة   </p>
                  </div>
                </div>




                </div>


              <div class="col-md-8 ">
                <div class="textArea">

            <p >

              تقدم وطنية استشارات لإدارات دور الرعاية بناء على معايير جودة الرعاية وأفضل الممارسات في الرعاية البديلة وايضا لمؤسسات المجتمع المدني لتمكينها من الإشراف ومتابعة استدامة جودة الرعاية المقدمة للأطفال والشباب داخل بيوت الرعاية

            <br>
            <header class="text-bold">
            الخدمة مقدمة الي:
            </header>
            <br>

            ١- تقديم استشارات خاصة بالرعاية اللاحقة.

            <br>
            ٢- تقديم استشارات خاصة بالبنية والتجهيزات.


            <br>

            ٣- تقديم استشارات خاصة بالاستدامة المالية (تسويق- تمويل-مشاريع).

            <br>

            <br>
            <br>
            <br>


            <br>
            <br>

            <br>
            </div>

            <div class="btn float-start py-3">
                <button class="btnInfo">
                    <a href="{{ url('/users/consultation/stepper') }}" style="color:black">تعليمات طلب استشارة</a>
                  </button>
                  <button class="btnRequest">
                    <a href="{{ url('/users/consultation/faq') }}" style="color:black">طلب استشارة</a>
                  </button>
            </div>
            </div>


            </div>


            <!-- section1 -->






            </div>

         </div>
      </div>





        <div class="container py-3 tab" style="display: none;"  id="thirdTab">
          section 3
        </div>

        <div class="container py-3 tab" style="display: none;" id="fourthTab">
          section 4
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

  <script src="js/About.js"></script>

  @endsection
