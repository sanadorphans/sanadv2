<div class="side-menu sidebar-inverse" style="position:fixed">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                            <img src="{{ voyager_asset('images/logo-icon-light.png') }}" alt="Logo Icon">
                        @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                    {{-- <div class="title">{{Voyager::setting('admin.title', 'VOYAGER')}}</div> --}}
                    <div class="title" style="font-size: 1.3em">ســـــــــنـــــــــــــــــــــــــــد</div>

                </a>
            </div><!-- .navbar-header -->

            {{-- <div class="panel widget center bgimage" style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;"> --}}
            <div class="panel widget center" style="background:#263137 ;border-top:1px solid rgba(112, 112, 112, 0.432);border-bottom:1px solid rgba(112, 112, 112, 0.432);margin-bottom:5px">
   
                <div class="dimmer"></div>
                <div class="panel-content">
                    <img src="{{ $user_avatar }}" style="top:auto" class="avatar" alt="{{ Auth::user()->name }} avatar">
                    <h4 style="margin-top: 13px">{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
