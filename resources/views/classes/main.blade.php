@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- MENU -->
<div class="row" style="padding-left: 7px;">
    <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8"><i
            class="fa fa-check-square-o fa-lg"></i>
        <span style="font-size: 17px; padding-left: 7px;">To do</span></button>
    <a href="{{ url('class') }}">
        <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;"><i
                class="fa fa-folder-o fa-lg"></i>
            <span style="font-size: 17px; padding-left: 7px;">To be checked</span></button>
    </a>
    <!-- <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;"><i
            class="fa fa-calendar fa-lg"></i>
        <span style="font-size: 17px; padding-left: 7px;">Calendar</span></button> -->
</div><br>
<!-- MENU -->

<!-- CLASSES -->
<div class="row">
    @foreach($classes as $class)
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-circle" src="{{asset('lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><a href="{{ url('class', $class->class_code) }}" style="color: white;">{{$class->class_name}}</a></h3>
                <h5 class="widget-user-desc">{{$class->teacher_name}}</h5>
            </div>
            <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                    <!-- view-assignment-teacher (assignment guru) - view-assignment (assignment murid)- -->
                    <li><a href="{{ route('view-assignment-teacher') }}">Due date <span class="pull-right badge bg-red">Jumat</span></a></li>
                    <li><a href="{{ route('view-assignment') }}">07.30 - Ujian Tengah Semester</li>
                    <br><br>
                    <br><br>
                </ul>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    @endforeach
    <!-- CLASSES -->
</div>
@endsection

@section('js')

@endsection
