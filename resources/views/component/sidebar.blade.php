<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- CLASS -->
            <li>
                <a href="{{ route('classes') }}">
                    <i class="fa fa-home"></i> <span>Classes</span>
                </a>
            </li>
            <!-- END CLASS -->
            <!-- CALENDAR -->
            <li>
                <a href="#">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <span class="pull-right-container">
                        <!-- <small class="label pull-right bg-red">3</small>
                        <small class="label pull-right bg-blue">17</small> -->
                    </span>
                </a>
            </li>
            <!-- END CALENDAR -->
            <!-- TEACH -->
            <li class="header">Teach</li>
            <li>
                <a href="#">
                    <i class="fa fa-folder-o"></i>
                    <span>To be checked</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <!-- END TEACH -->
            <!-- CLASS -->
            <li>
                <a href="#">
                    <i class="fa fa-circle"></i> <span>Kecerdasan Bisnis</span>
                </a>
            </li>
            <!-- END CLASS -->
            <!-- ENROLLED -->
            <li class="header">Enrolled</li>
            <li>
                <a href="#">
                    <i class="fa fa-check-square-o"></i>
                    <span>To do</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">4</span>
                    </span>
                </a>
            </li>
            <!-- END TEACH -->
            <!-- CLASS -->
            <li>
                <a href="#">
                    <i class="fa fa-circle"></i> <span>Kecerdasan Bisnis</span>
                </a>
            </li>
            <!-- END CLASS -->
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
