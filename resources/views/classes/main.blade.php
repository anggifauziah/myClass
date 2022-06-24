@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- CLASSES -->
<div class="row">
    @foreach($classes->groupBy('id_class') as $class)
    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <div class="widget-user-image">
                    <img class="img-circle" style="width:60px; height:60px;" src="{{ url('public/files/user_photo/'.$class[0]['user_photo']) }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><a href="{{ url('class', $class[0]['class_code']) }}"
                        style="color: white; text-decoration: none;">{{$class[0]['class_name']}}</a></h3>
                <h5 class="widget-user-desc">{{$class[0]['teacher_name']}}</h5>
            </div>
            <div class="box-footer no-padding">
                @foreach($class->groupBy('assign_title') as $assign)
                @if($assign[0]['assign_title'] != null)
                @if($assign[0]['assign_deadline'] >= Carbon\Carbon::now())
                <ul class="nav nav-stacked">
                    <li>
                        <a href="{{ url('assignment', $assign[0]['class_code'].'-'.$assign[0]['id_assign']) }}">
                            <p style="color:grey; font-size:13px;">
                                Due {!! date('d M Y', strtotime($assign[0]['assign_deadline'])) !!}</p>
                            {!! date('H:i', strtotime($assign[0]['assign_deadline'])) !!} -
                            {{$assign[0]['assign_title']}}
                        </a>
                    </li>
                </ul>
                @endif
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
