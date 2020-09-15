<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}">
                    <div class="logo-icon-container">
                        <?php $admin_logo_img = Voyager::setting('admin.icon_image', ''); ?>
                        @if($admin_logo_img == '')
                             <img src="/assets/images/logo-faari2.0-final-192x136.jpg" alt="Logo Icon">
                             @else
                            <img src="{{ Voyager::image($admin_logo_img) }}" alt="Logo Icon">
                        @endif
                    </div>
                </a>
            </div><!-- .navbar-header -->

            <div class="panel widget center bgimage"
                 style="background-image:url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('images/bg.jpg') ) }}); background-size: cover; background-position: 0px;">
                <div class="dimmer"></div>
                <div class="panel-content"> <br> <br>
                    <h4>{{ ucwords(Auth::user()->name) }}</h4>
                    <p>{{ Auth::user()->email }}</p>

                    <a href="{{ route('voyager.profile') }}" class="btn btn-primary">{{ __('voyager::generic.profile') }}</a>
                    <div style="clear:both"></div>
                </div>
            </div>

        </div>

            @if (Auth::user()->role->name=='admin')
                <div id="adminmenu">
                    <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="{{route('voyager.profile')}}"><span class="icon voyager-person"></span><span class="title"> Profil</span> </a></li>
                        <li class="nav-item deconnexion"><a href="{{route('voyager.logout')}}"><span class=" icon voyager-power"></span> <span class="title"> Deconnexion</span> </a></li>
                    </ul>
                </div>
            @endif
            @if (Auth::user()->role->name=='partenaires')
                <div id="adminmenu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{set_current('voyager.dashboard')}}"><a href="{{route('voyager.dashboard')}}"> <span class="icon voyager-home"></span>  <span class="title"> Accueil </span> </a></li>

                        <li class="nav-item deconnexion"><a href="{{route('logout')}}"><span class=" icon voyager-power"></span> <span class="title"> Deconnexion</span> </a></li>
                    </ul>
                </div>
            @endif
            @if (Auth::user()->role->name=='administrateurs')
                <div id="adminmenu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{set_current('voyager.dashboard')}}"><a href="{{route('voyager.dashboard')}}"> <span class="icon voyager-home"></span> <span class="title"> Accueil </span> </a></li>

                        <li class="nav-item deconnexion"><a href="{{route('logout')}}"><span class="icon voyager-power"></span> <span class="title"> Deconnexion </span> </a></li>
                    </ul>
                </div>
            @endif
            @if (Auth::user()->role->name=='gestionnaires')
                <div id="adminmenu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{set_current('voyager.dashboard')}}"><a href="{{route('voyager.dashboard')}}"> <span class="icon voyager-home"></span> <span class="title"> Accueil </span> </a></li>

                        <li class="nav-item deconnexion"><a href="{{route('logout')}}"><span class="icon voyager-power"></span> <span class="title"> Deconnexion </span> </a></li>
                    </ul>
                </div>
            @endif
            @if (Auth::user()->role->name=='comptables')
                <div id="adminmenu">
                    <ul class="nav navbar-nav">
                        <li class="nav-item {{set_current('voyager.dashboard')}}"><a href="{{route('voyager.dashboard')}}"> <span class="icon voyager-home"></span> <span class="title"> Accueil </span> </a></li>

                        <li class="nav-item deconnexion"><a href="{{route('logout')}}"><span class="icon voyager-power"></span> <span class="title"> Deconnexion </span> </a></li>
                    </ul>
                </div>
            @endif

    </nav>
</div>
