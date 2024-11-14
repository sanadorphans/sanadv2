

<aside class="main-sidebar sidebar-dark-success elevation-4" style="background-color: #71b7c0 !important">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar px-0" >
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel pt-3 pb-3 mb-3 d-flex px-1" style="background-color: #8FCDD5">
        <div class="image">
          <img style="width: 40px !important;height: 40px !important" src="{{asset('img/boy.png')}}"  class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block ml-1">إسلام محمد سعيد</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-4 px-0">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item mb-2">
                <a href="#" class="nav-link mx-auto">
                    <i class="nav-icon fa fa-handshake-o"></i>
                    <p>
                    الاستشارات
                    <i class="left fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ url('consultants/consultation/new') }}" class="nav-link mx-auto">
                            <i class="far  nav-icon"></i>
                            <p>الاستشارات الجديدة</p>
                        </a>
                        </li>

                    <li class="nav-item ">
                    <a href="{{ url('consultants/consultation/assigned') }}" class="nav-link mx-auto">
                        <i class="far  nav-icon"></i>
                        <p>الاستشارات الجارية</p>
                    </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('consultants/consultation/closed') }}" class="nav-link mx-auto">
                            <i class="far  nav-icon"></i>
                            <p>الاستشارات المغلقة</p>
                        </a>
                        </li>

                        
                </ul>
            </li>
            @if(Auth::user()->documented_at)
              <li class="nav-item mb-2">
                  <a href="{{ route('users.edit') }}" class="nav-link mx-auto">
                      <i class="nav-icon fa fa-address-book"></i>
                  <p>
                      تعديل الملف الشخصى

                  </p>
                  </a>

              </li>
            @endif  



            
            {{-- <li class="nav-item mb-2">
                <a href="https://wataneya.org/ar/services?service_category_id=3" class="nav-link mx-auto">
                <i class="nav-icon fa fa-newspaper-o"></i>
                <p>

                    البرامج و المؤتمرات
                </p>
                </a>
            </li> --}}





          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="left fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="left fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
