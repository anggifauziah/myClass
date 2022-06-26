<!-- BOX ANNOUNCEMENT -->
@foreach($announcement->groupBy('id_announce') as $announce)
<div class="box box-solid box-default">
    <div class="box-header">
        <h3 class="box-title">Announcement</h3>
        <!-- tools box -->
        @if(Auth::user()->id == $announce[0]['announce_user_id'])
        <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-flat btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="{{ url('announcement', $announce[0]['id_announce'] . '-editAnnouncement')}}">Edit</a>
                    </li>
                    <li><a href="#" data-toggle="modal"
                            data-target="#modal-announce-{{$announce[0]['id_announce']}}">Delete</a></li>
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
            <img class="img-circle" src="{{ url('public/files/user_photo/'.$announce[0]['user_photo']) }}"
                alt="User Image">
            <span class="username" style="font-size: 15px;">{{$announce[0]['creator_name']}}</span>
            <span class="description">{!! date('d M Y', strtotime($announce[0]['created_announce'])) !!}</span>
        </div>
        <br>
        <!-- post text -->
        {!! html_entity_decode($announce[0]['announce_content']) !!}
        <!-- Attachment -->
        @foreach($announce->groupBy('id_file_announce') as $item)
        @if($item[0]['filename'] != null)
        <div class="attachment-block clearfix">
            <h4 class="attachment-heading">
                <a href="{{ url('/files/announcement/'.$item[0]['filename']) }}">{{$item[0]['filename']}}</a>
            </h4>
            <!-- /.attachment-pushed -->
        </div>
        @endif
        @endforeach
        <!-- /.attachment-block -->
    </div>
    <!-- /.box-body -->
    <div class="box-footer box-comments">
        <!-- /.box-comment -->
        @foreach($announce->groupBy('id_comment_announce') as $comment)
        @if($comment[0]['id_comment_announce'] != null)
        <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="{{ url('public/files/user_photo/'.$comment[0]['user_photo_comment']) }}"
                alt="User Image" style="margin-top: 4px;">
            <div class="comment-text">
                <span class="username">
                    {{$comment[0]['creator_comment_announce']}}
                    <span class="text-muted pull-right">{!! date('d M Y', strtotime($comment[0]['created_comment']))
                        !!}</span>
                </span><!-- /.username -->
                {{$comment[0]['comment_announce']}}
            </div>
            <!-- /.comment-text -->
        </div>
        @endif
        @endforeach
        <!-- /.box-comment -->
        <!-- /.box-footer -->
        <div class="box-footer">
            <form action="{{ route('comment-announcement') }}" method="post">
                @csrf
                <img class="img-responsive img-circle img-sm"
                    src="{{ url('public/files/user_photo/'.Auth::user()->user_photo) }}" alt="Alt Text">
                <!-- .img-push is used to add margin to elements next to floating images -->
                <div class="img-push input-group margin">
                    <input id="comment" type="text"
                        class="form-control input-sm  @error('comment') is-invalid @enderror" name="comment"
                        value="{{ old('comment') }}" required autocomplete="comment"
                        placeholder="{{ __('Click send to post comment') }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat btn-sm">
                            <i class="fa fa-send"></i> Send
                        </button>
                    </span>
                    <input type="hidden" name="announce_id" value="{{$announce[0]['id_announce']}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="creator_name"
                        value="{{Auth::user()->level_user == 2 ? $datas->teacher_name : $datas->student_name}}">
                </div>
            </form>
        </div>

        <!-- DELETE ANNOUNCEMENT MODALS -->
        <div class="modal fade" id="modal-announce-{{$announce[0]['id_announce']}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Delete announcement?</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure want to remove this announcement from class?</h4>
                    </div>
                    @if($announcement->count() > 0)
                    <div class="modal-footer">
                        <form method="post" action="{{ route('deleteAnnouncement') }}">
                            @csrf
                            <input type="hidden" name="id_announce" value="{{$announce[0]['id_announce']}}">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- DELETE ANNOUNCEMENT MODALS -->
        <!-- /.box-footer -->
    </div>
    <!-- /.box-comment -->
</div>
@endforeach
<!-- END BOX ANNOUNCEMENT -->