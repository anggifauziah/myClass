<header class="main-header">
    <!-- Logo -->
    <a href="{{route('class')}}" class="logo" style="border-right: 0px solid">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LMS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LMS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a> -->

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @if(Auth::user()->level_user == 2)
                                    <li type=none>
                                        <a href="{{ route('create-class') }}" style="color: black;"><h4>Create class</h4></a>
                                    </li>
                                @elseif(Auth::user()->level_user == 1)
                                    <li type=none>
                                        <a href="{{ route('join-class') }}" style="color: black;"><h4>Join class</h4></a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('public/files/user_photo/'.Auth::user()->user_photo) }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ Auth::user()->username }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ url('public/files/user_photo/'.Auth::user()->user_photo) }}" class="img-circle" alt="User Image">

                            <p>
                                {{ Auth::user()->username }}
                                <small>Member since {!! date('d M Y', strtotime(Auth::user()->created_at)) !!}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
