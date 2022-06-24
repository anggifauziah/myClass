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
            
            <!-- TEACH -->
            @if(Auth::user()->level_user == 2)
            <li class="header">Teach</li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span></span>
                </a>
            </li>
            <!-- END TEACH -->

            <!-- ENROLLED -->
            @elseif(Auth::user()->level_user == 1)
            <li class="header">Enrolled</li>
            <li>
                <a href="#">
                    <i class="fa fa-users"></i> <span></span>
                </a>
            </li>
            @endif
            <!-- END ENROLLED -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
