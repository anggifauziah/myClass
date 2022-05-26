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
        <div class="box-header">
            <h3 class="box-title">Announcement</h3>
            <!-- tools box -->
            @if(Auth::user()->id == $announce[0]['user_id'])
            <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                    <button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle"
                        data-toggle="dropdown">
                        <i class="fa fa-bars"></i></button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="{{url('announcement', $announce[0]['class_code'].'-'.$announce[0]['group_announce_code'].'-'.'edit-announcement')}}">Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-default">Delete</a></li>
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
                <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">
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
                    <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user4-128x128.jpg')}}"
                        alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
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
                        <li><a href="{{url('assignment', $assign[0]['class_code'].'-'.$assign[0]['group_assign_code'].'-'.'edit-assignment')}}">Edit</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-default">Delete</a></li>
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
                <a href="{{ url('assignment', $assign[0]['class_code'].'-'.$assign[0]['group_assign_code']) }}"
                    class="btn btn-primary pull-right">View assignment</a>
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
                <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">
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
                    <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user4-128x128.jpg')}}"
                        alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
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

<!-- DELETE MODALS -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete?</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure want to remove this from class?</h4>
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