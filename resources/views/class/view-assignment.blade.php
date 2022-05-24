@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    @foreach($datas->groupBy('assign_content') as $assign)
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
                                <h5><b>100 poin</b></h5>
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
    @endforeach
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
                <!-- form start -->
                <div class="box-body">
                    <!-- Date -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- social buttons -->
                            <div class="box">
                                <div class="box-header">
                                    <h2 class="box-title">Your work</h2>
                                    <!-- Belum submit (Assigned), Submit (Handed in) -->
                                    <span class="pull-right">Assigned</span>
                                </div>
                                <div class="box-body">
                                    <div id='filename'></div>
                                </div>
                                <br>
                                <!-- File Input -->
                                <div>
                                    <label for="file" style="display: block;">
                                        <a class="btn btn-block btn-default" rel="nofollow">
                                            <span class='fa fa-plus'></span> Add file</a>
                                    </label>
                                    <input id="file" type="file" name="file[]" multiple style="display: none;">
                                    <p id="detail_file"></p>
                                </div>
                                <a href="#" class="btn btn-block btn-default btn-github">Submit</a>
                                <!-- File Input -->
                            </div>
                        </div>
                        <!-- /.box -->
                </div>
                <!-- /.form group -->
        </form>
    </div>
    <!-- /.box-body -->
</div>
<!--/.col (right) -->
</form>
</div>
</div>

@endsection

@section('js')

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
            $('#title').val("");
            $('#datetime').val("");
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