@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right box-header with-border bg-blue">
        <li>
            <a class="tablinks" onclick="openCity(event, 'People')" style="color: white;">People</a>
        </li>
        <li>
            <a class="tablinks " onclick="openCity(event, 'Classwork')" style="color: white;">Classwork</a>
        </li>
        <li>
            <a class="tablinks activated" onclick="openCity(event, 'Forum')" style="color: white;">Forum</a>
        </li>
        <li class="pull-left">
            <div class="user-block">
                <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username" style="font-size: 21px; color: white;">{{$datas->class_name}}</span>
                <span class="description" style="color: white;">{{$datas->teacher_name}}</span>
            </div>
        </li>
    </ul>

    <!-- /.tab-content -->
    <div class="tab-content">
        <!-- FORUM -->
        @include('class.forum')
        <!-- END FORUM -->

        <!-- CLASSWORK -->
        @include('class.classwork')
        <!-- END CLASSWORK -->

        <!-- PEOPLE -->
        @include('class.people')
        <!-- END PEOPLE -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->

@endsection
@section('js')

<!-- TAB PANE -->
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" activated", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " activated";
    }
</script>
<!-- TAB PANE -->

@endsection