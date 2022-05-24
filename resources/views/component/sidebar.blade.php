<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- CLASS -->
            <li>
                <a href="{{ route('class') }}">
                    <i class="fa fa-home"></i> <span>Classes</span>
                </a>
            </li>
            <!-- END CLASS -->
            <!-- CALENDAR -->
            <!-- <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li> -->
            <!-- END CALENDAR -->
            <!-- TEACH -->
            @if(Auth::user()->level_user == 2)
            <li class="header">Teach</li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>To be checked</span>
                </a>
            </li>
            <!-- END TEACH -->
            <!-- TEACHER CLASS -->
            <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span></span>
                </a>
            </li>
            <!-- END TEACHER CLASS -->

            <!-- ENROLLED -->
            @elseif(Auth::user()->level_user == 1)
            <li class="header">Enrolled</li>
            <li>
                <a href="#">
                    <i class="fa fa-check-square-o"></i>
                    <span>To do</span>
                </a>
            </li>
            <!-- END TEACH -->
            <!-- STUDENT CLASS -->
            <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span></span>
                </a>
            </li>
            @endif
            <!-- END STUDENT CLASS -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
