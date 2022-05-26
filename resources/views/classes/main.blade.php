@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- MENU -->
<div class="row" style="padding-left: 7px;">
    @if(Auth::user()->level_user == 1)
    <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8">
        <i class="fa fa-check-square-o fa-lg"></i>
        <span style="font-size: 17px; padding-left: 7px;">To do</span></button>
    @elseif(Auth::user()->level_user == 2)
    <a href="{{ url('class') }}">
        <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;">
            <i class="fa fa-folder-o fa-lg"></i>
            <span style="font-size: 17px; padding-left: 7px;">To be checked</span></button>
    </a>
    <!-- <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;"><i
            class="fa fa-calendar fa-lg"></i>
        <span style="font-size: 17px; padding-left: 7px;">Calendar</span></button> -->
    @endif
</div><br>
<!-- MENU -->

<!-- CLASSES -->
<div class="row">
    @foreach($classes->groupBy('id_class') as $class)
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-circle" src="{{asset('lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><a href="{{ url('class', $class[0]['class_code']) }}"
                        style="color: white; text-decoration: none;">{{$class[0]['class_name']}}</a></h3>
                <h5 class="widget-user-desc">{{$class[0]['teacher_name']}}</h5>
            </div>
            <div class="box-footer no-padding">
                @foreach($class->groupBy('assign_title') as $assign)
                @if($assign[0]['assign_title'] != null)
                <ul class="nav nav-stacked">
                    <li>
                        <a href="{{ url('assignment', $assign[0]['class_code'].'-'.$assign[0]['group_assign_code']) }}">
                            <p style="color:grey; font-size:13px;">
                            Due {!! date('d M Y', strtotime($assign[0]['assign_deadline'])) !!}</p>
                            {!! date('H:i', strtotime($assign[0]['assign_deadline'])) !!} -
                            {{$assign[0]['assign_title']}}
                        </a>
                    </li>
                </ul>
                @else
                <ul class="nav nav-stacked">
                    <li>
                        <a href="#">
                            <p style="color:grey; font-size:13px;"></p>
                        </a>
                    </li>
                </ul>
                @endif
                @endforeach
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
