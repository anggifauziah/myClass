@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- <div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right box-header with-border bg-blue">
        <li><a href="#" style="color:white;">People</a></li>
        <li><a href="#" style="color:white;">Classwork</a></li>
        <li><a href="#" style="color:white;">Forum <span class="sr-only">(current)</span></a>
        </li>
        <li>
            <div class="user-block pull-left" style="padding-right: 1000px;">
                <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username" style="font-size: 21px; color: white; margin-top: -4px">{{$datas->class_name}}</span>
                <span class="description" style="color: white;">{{$datas->teacher_name}}</span>
            </div>
        </li>
    </ul> -->

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
        <div class="tab-pane active tabcontent" id="Forum">
            <!-- BOX CLASS DETAILS -->
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h1 class="box-title" style="padding-top: 10px"><b>Class Details</b></h1>
                    <div class="box-tools pull-right">
                        <button class="btn btn-lg" data-widget="collapse" title="Information">
                            <i class="fa fa-info-circle"></i>
                        </button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table>
                        <tr>
                            <td width="90"><b>Class Code</b></td>
                            <td width="10">:</td>
                            <td width="170">{{$datas->class_code}}</td>
                        </tr>
                        <tr>
                            <td><b>Subject</b></td>
                            <td>:</td>
                            <td>{{$datas->class_subject}}</td>
                        </tr>
                        <tr>
                            <td><b>Room</b></td>
                            <td>:</td>
                            <td>{{$datas->class_room}}</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p>
                                    {{$datas->class_desc}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- END BOX CLASS DETAILS -->

            <!-- POST ANNOUNCEMENT -->
            @include('class.create-announcement')
            <!-- END POST ANNOUNCEMENT -->

            <!-- BOX ANNOUNCEMENT -->
            @foreach($announcement->groupBy('announce_content') as $announce)
            <div class="box box-solid box-default">
                    <!-- tools box -->
                    @if(Auth::user()->id == $announce[0]['user_id'])
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- /. tools -->
                <div class="box-body">
                    <!-- users -->
                    <div class="user-block">
                        <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <span class="username" style="font-size: 15px;">{{$announce[0]['creator_name']}}</span>
                        <span class="description">{!! date('d M Y', strtotime($announce[0]['created_at'])) !!}</span>
                    </div>
                    <br>
                    <!-- post text -->
                    {!! html_entity_decode($announce[0]['announce_content']) !!}
                    <!-- Attachment -->
                    @foreach($announce as $item)
                    <div class="attachment-block clearfix">
                        <h4 class="attachment-heading">
                            <a href="#">{{$item->announce_file}}</a>
                        </h4>
                        <!-- /.attachment-pushed -->
                    </div>
                    @endforeach
                    <!-- /.attachment-block -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer box-comments">
                    <!-- /.box-comment -->
                    <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                            alt="User Image">
                        <div class="comment-text">
                            <span class="username">
                                Nora Havisham
                                <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <img class="img-responsive img-circle img-sm"
                                src="{{asset('lte/dist/img/user4-128x128.jpg')}}" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm"
                                    placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box-comment -->
            </div>
            @endforeach
            <!-- END BOX ANNOUNCEMENT -->

            <!-- BOX ASSIGNMENT -->
            @foreach($assignment->groupBy('assign_content') as $assign)
            <div class="box box-solid box-primary">
                <!-- /.box-header -->
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-file-text"></i> {{$assign[0]['assign_title']}}</h3>
                    <!-- tools box -->
                    @if(Auth::user()->id == $assign[0]['user_id'])
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    @endif
                    <!-- /. tools -->
                </div><!-- /.box-header -->
                <!-- /.box-body -->
                <div class="box-body">
                    <!-- users -->
                    <div class="user-block">
                        <a href="{{ url('assignment', $assign[0]['class_code'].'-'.$assign[0]['group_assign_code']) }}" class="btn btn-primary pull-right">View assignment</a>
                        
                        <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <span class="username" style="font-size: 15px;">{{$assign[0]['creator_name']}}</span>
                        <span class="description">{!! date('d M Y', strtotime($assign[0]['created_at'])) !!}</span>
                    </div>
                    <br>
                    <!-- post text -->
                    {!! html_entity_decode($assign[0]['assign_content']) !!}
                    <!-- Attachment -->
                    @foreach($assign as $items)
                    <div class="attachment-block clearfix">
                        <h4 class="attachment-heading">
                            <a href="#">{{$items->assign_file}}</a>
                        </h4>
                        <!-- /.attachment-pushed -->
                    </div>
                    @endforeach
                    <!-- /.attachment-block -->
                </div><!-- /.box-body -->
                <div class="box-footer box-comments">
                    <!-- /.box-comment -->
                    <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                            alt="User Image">
                        <div class="comment-text">
                            <span class="username">
                                Nora Havisham
                                <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                            The point of using Lorem Ipsum is that it has a more-or-less
                            normal distribution of letters, as opposed to using
                            'Content here, content here', making it look like readable English.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        <form action="#" method="post">
                            <img class="img-responsive img-circle img-sm"
                                src="{{asset('lte/dist/img/user4-128x128.jpg')}}" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                                <input type="text" class="form-control input-sm"
                                    placeholder="Press enter to post comment">
                            </div>
                        </form>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box-comment -->
            </div><!-- /.box -->
            @endforeach
            <!-- END BOX ASSIGNMENT -->
        </div>
        <!-- END FORUM -->

        <!-- CLASSWORK -->
        <div class="tab-pane tabcontent" id="Classwork">
            <div class="box box-solid">
                @if(Auth::user()->level_user == 2)
                <a href="{{url('assignment',$code.'create-assignment')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
                    Create
                    assignment</a>
                <br><br>
                @endif
                <!-- /.box-header -->
                @foreach($assignment->groupBy('assign_content') as $assign)
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> {{$assign[0]['assign_title']}}</h3>
                        <div class="box-tools pull-right">
                            <h5>Due {!! date('d M Y H:i', strtotime($assign[0]['assign_deadline'])) !!}</h5>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p class="pull-left" style="font-size:12px;">Posted {!! date('d M Y', strtotime($assign[0]['created_at'])) !!}</p>
                        <!-- Status: Handed in (Dikumpulkan); Assigned (Belum Dikumpulkan) -->
                        <!-- <p class="pull-right">Handed in</p> -->
                        <br><br>
                        <!-- post text -->
                        {!! html_entity_decode($assign[0]['assign_content']) !!}
                        <!-- Attachment -->
                        @foreach($assign as $items)
                        <div class="attachment-block clearfix">
                            <h4 class="attachment-heading">
                                <a href="#">{{$items->assign_file}}</a>
                            </h4>
                            <!-- /.attachment-pushed -->
                        </div>
                        @endforeach
                        <!-- /.attachment-block -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <!-- view-assignment-teacher (assignment guru) - view-assignment (assignment murid)- -->
                        <a href="{{ url('assignment', $assign[0]['class_code']) }}">
                            <h5>View assignment</h5>
                        </a>
                    </div>
                </div><!-- /.box -->
                @endforeach
            </div>
        </div>
        <!-- END CLASSWORK -->

        <!-- PEOPLE -->
        <div class="tab-pane tabcontent" id="People">
            <h1>Teachers</h1>
            <hr>
            <div class="user-block">
                <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                    alt="User Image">
                <span class="username" style="font-size: 15px; padding-top: 5px;">{{$datas->teacher_name}}</span>
            </div>
            <br><br>
            @if(Auth::user()->level_user == 1)
            <h1>Classmates</h1>
            @elseif(Auth::user()->level_user == 2)
            <h1>Students</h1>
            @endif
            <hr>
            <div class="user-block">
                <table>
                    @foreach($students_name as $name)
                    <tr>
                        <td width="1250">
                            <img class="img-responsive img-circle img-sm"
                                src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">
                            <span class="username" style="font-size: 15px; padding-top: 5px;">{{$name->student_name}}</span>
                        </td>
                        <td>
                            <a href="#" style="color: black; padding-left: 130px">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fa fa-trash-o fa fa-lg" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- END PEOPLE -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->

<!-- DELETE MODALS -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Student?</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure want to remove this student form class?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- DELETE MODALS -->

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

<!-- MULTIPLE FILE INPUT -->
<script>
    $('document').ready(function () {
        // $('#btn_upload').click(function () {
        //     var the_file = $('#file').val();
        //     if (the_file == "") {
        //         alert('Please select the file');
        //         return false;
        //     }
        // });
        $('#file').change(function () {
            FileDetails();
        });
        $('#btn_reset').click(function () {
            $('#file').val("");
            $('#span_file').css("display", "inline");
            $('#detail_file').css("display", "none");
        });
    });
</script>
<script>
    function FileDetails() {
        var fi = document.getElementById('file');
        if (fi.files.length > 0) {
            document.getElementById('detail_file').innerHTML =
                'Total Files: <b>' + fi.files.length + '</b></br >';
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var no_file = i + 1;
                var fname = fi.files.item(i).name;
                var fsize = fi.files.item(i).size;
                document.getElementById('detail_file').innerHTML =
                    document.getElementById('detail_file').innerHTML + no_file + ". " +
                    fname + ' (<b>' + bytesToSize(fsize) + '</b>)<br>';
            }
            document.getElementById('detail_file').style.display = "block";
            document.getElementById('span_file').style.display = "none";
        } else {
            alert('Please select a file.')
        }
    }

    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
</script>
<!-- MULTIPLE FILE INPUT -->

@endsection