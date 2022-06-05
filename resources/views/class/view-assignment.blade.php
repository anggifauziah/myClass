@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    @if(Auth::user()->level_user == 1)
    <div class="box-header with-border">
        <h1 class="box-title"><i class="fa fa-file-text"></i> {{$assign[0]['assign_title']}}</h1>
    </div>
    <!-- /.box-header -->
    <!-- STUDENT ASSIGNMENT -->
    <div class="row">
        <form>
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <div class="user-block">
                        <span style="font-size: 15px;"><b>{{$assign[0]['creator_name']}} • </b></span>
                        <span>{!! date('d M Y', strtotime($assign[0]['created_date'])) !!}</span>
                        <span>
                            <h5 class="pull-right" style="margin-top: 35px"><b>Due {!! date('d M Y H:i',
                                    strtotime($assign[0]['assign_deadline'])) !!}</b></h5>
                        </span>
                        <span><b>
                                <h5><b>{{$student_assign[0]['student_assign_score']}} poin</b></h5>
                            </b></span>
                        <hr>
                    </div>
                    {!! html_entity_decode($assign[0]['assign_content']) !!}
                    <!-- Attachment -->
                    @foreach($assign as $items)
                    <div class="attachment-block clearfix">
                        <h4 class="attachment-heading">
                            <a href="#">{{$items->filename}}</a>
                        </h4>
                    </div>
                    @endforeach
                    <!-- /.attachment-block -->
                    <!-- /.box-body -->
                    <div class="box-footer box-comments">
                        <!-- /.box-comment -->
                        @foreach($comment_assign as $comment)
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                                alt="User Image" style="margin-top: 4px;">
                            <div class="comment-text">
                                <span class="username">
                                    {{$comment->creator_comment_assign}}
                                    <span class="text-muted pull-right">{!! date('d M Y',
                                        strtotime($comment->created_comment_assign)) !!}</span>
                                </span><!-- /.username -->
                                {{$comment->comment_assign}}
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        @endforeach
                        <!-- /.box-comment -->
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            <form action="{{ route('comment-assignment') }}" method="post">
                                @csrf
                                <img class="img-responsive img-circle img-sm"
                                    src="{{asset('lte/dist/img/user4-128x128.jpg')}}" alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push input-group margin">
                                    <input id="comment" type="text"
                                        class="form-control input-sm  @error('comment') is-invalid @enderror"
                                        name="comment" value="{{ old('comment') }}" required autocomplete="comment"
                                        placeholder="{{ __('Press enter to post comment') }}">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat btn-sm">
                                            <i class="fa fa-send"></i> Send
                                        </button>
                                    </span>
                                    <input type="hidden" name="assign_id" value="{{$assign[0]['id_assign']}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="creator_name"
                                        value="{{Auth::user()->level_user == 2 ? $datas->teacher_name : $datas->student_name}}">
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box-comment -->
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
                <!-- form start -->
                <div class="box-body">
                    <!-- Date -->
                    <form method="post" action="{{ route('submit-assignment') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <!-- social buttons -->
                            <div class="box">
                                <div class="box-header">
                                    <h2 class="box-title">Your work</h2>
                                    <!-- Belum submit (Assigned), Submit (Handed in) -->
                                    <!-- <span class="pull-right">Assigned</span> -->
                                </div>
                                <div class="box-body">
                                    @foreach($student_assign->groupBy('assign_id') as $assign)
                                    @foreach($assign as $items)
                                    <div class="attachment-block clearfix">
                                        <h4 class="attachment-heading">
                                            <a href="#">{{$items->filename_student_assign}}</a>
                                        </h4>
                                    </div>
                                    @endforeach
                                    @endforeach
                                    <p id="files-area">
                                        <span id="files-list">
                                            <span id="files-names"></span>
                                        </span>
                                    </p>
                                </div>
                                <br>
                                <!-- File Input -->
                                <div>
                                    @if($assign[0]['assign_deadline'] >= Carbon\Carbon::now())
                                    <label for="file-input" style="display: block;">
                                        <a class="btn btn-block btn-default" role="button" aria-disabled="false">
                                            <span class='fa fa-plus'></span> Add file</a>
                                    </label>
                                    <button type="submit" class="btn btn-block btn-default btn-github">Submit</button>
                                    <input type="file" name="file[]" id="file-input" style="visibility: hidden;"
                                        multiple>
                                    @endif
                                </div>
                                <!-- File Input -->
                                <input type="hidden" name="id_assign" value="{{$assign[0]['id_assign']}}">
                            </div>
                        </div>
                        <!-- /.box -->
                    </form>
                    <!-- /.form group -->
                </div>
            </div>
        </form>
        <!-- END STUDENT ASSIGNMENT -->

        <!-- TEACHER ASSIGNMENT -->
        @elseif(Auth::user()->level_user == 2)
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{{$assign[0]['assign_title']}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Students Name</th>
                            <th>Files Assignment</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student_assign->groupBy('student_assign_id') as $assign)
                        <tr>
                            <td>{{$assign[0]['student_name']}}</td>
                            <td>
                                @foreach($assign as $items)
                                <div class="attachment-block clearfix">
                                    <h5 class="attachment-heading">
                                        <a href="#">{{$items->filename_student_assign}}<br></a>
                                    </h5>
                                </div>
                                @endforeach
                            </td>
                            <td>{{$assign[0]['student_assign_score']}}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modal-score" name="score"
                                    class="btn btn-warning">
                                    <i class="fa fa-edit"></i> Score
                                </a>
                            </td>

                            <!-- EDIT SCORE MODALS -->
                            <div class="modal fade" id="modal-score">
                                <div class="modal-dialog">
                                    <form method="post" action="{{ route('editScoreAssignment') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Score</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="score">Score</label>
                                                    <input id="score" type="number"
                                                        class="form-control @error('score') is-invalid @enderror"
                                                        name="score" value="{{ old('score') }}" required
                                                        autocomplete="score" autofocus placeholder="{{ __('Score') }}">
                                                    @error('score')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <input type="hidden" name="assign_id" value="{{$assign[0]['assign_id']}}">
                                                <input type="hidden" name="student_id" value="{{$assign[0]['student_id']}}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- EDIT SCORE MODALS -->

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Students Name</th>
                            <th>Files Assignment</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        @endif
        <!-- END TEACHER ASSIGNMENT -->
        <!-- /.box-body -->
    </div>
    <!--/.col (right) -->
</div>
</div>



@endsection
@section('js')

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

@endsection