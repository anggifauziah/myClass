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
    <div class="row">
        <form>
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <!--  -->
                    <div class="user-block">
                        <span style="font-size: 15px;"><b>{{$assign[0]['creator_name']}} • </b></span>
                        <span>{!! date('d M Y', strtotime($assign[0]['created_at'])) !!}</span>
                        <span>
                            <h5 class="pull-right" style="margin-top: 35px"><b>Due {!! date('d M Y H:i',
                                    strtotime($assign[0]['assign_deadline'])) !!}</b></h5>
                        </span>
                        <span><b>
                                <h5><b>{{$assign[0]['student_assign_score']}} poin</b></h5>
                            </b></span>
                        <hr>
                    </div>
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
                                    @foreach($student_assign->groupBy('group_assign_code') as $assign)
                                    @foreach($assign as $items)
                                    <div class="attachment-block clearfix">
                                        <h4 class="attachment-heading">
                                            <a href="#">{{$items->student_assign_file}}</a>
                                        </h4>
                                        <!-- /.attachment-pushed -->
                                    </div>
                                    @endforeach
                                    @endforeach
                                    <p id="files-area">
                                        <span id="filesList">
                                            <span id="files-names"></span>
                                        </span>
                                    </p>
                                </div>
                                <br>
                                <!-- File Input -->
                                <div>
                                    @if($expired->count() > 0)
                                    <label for="attachment" style="display: block;">
                                        <a class="btn btn-block btn-default" role="button" aria-disabled="false">
                                            <span class='fa fa-plus'></span> Add file</a>
                                    </label>
                                    <button type="submit" class="btn btn-block btn-default btn-github">Submit</button>
                                    <input type="file" name="file[]" id="attachment" style="visibility: hidden;"
                                        multiple>
                                    @endif
                                </div>
                                <!-- File Input -->
                                <input type="hidden" name="group_assign_code"
                                    value="{{$assign[0]['group_assign_code']}}">
                            </div>
                        </div>
                        <!-- /.box -->
                    </form>
                    <!-- /.form group -->
                </div>
            </div>
        </form>

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
                            <th>Files</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student_assign->groupBy('group_assign_code') as $assign)
                        <tr>
                            <td>{{$assign[0]['student_name']}}</td>
                            <td>@foreach($assign as $items){{$items->student_assign_file}}<br>@endforeach</td>
                            <td>{{$assign[0]['student_assign_score']}}</td>
                            <td>
                                <a href="">
                                    <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i>
                                        Edit</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Students Name</th>
                            <th>Files</th>
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