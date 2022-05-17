@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Assignment</h3>
    </div>
    <!-- /.box-header -->
    <div class="row">
        <form method="post" action="" enctype="multipart/form-data">
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="ckeditor" id="ckedtor" placeholder="Description"></textarea>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
                <!-- form start -->
                <div class="box-body">
                    <!-- Date -->
                    <div class="form-group">
                        <label>Due date</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="datetime-local" class="form-control pull-right" id="datetime">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- File Input -->
                    <div>
                        <label for="file">
                            <a class="btn btn-info" rel="nofollow">
                                <span class='glyphicon glyphicon-paperclip'></span> Input File</a>
                            <span id="span_file">No file selected</span>
                        </label>
                        <input id="file" type="file" name="file[]" multiple style="display: none;"><br>
                        <p id="detail_file"></p>
                    </div>
                    <!-- File Input -->

                </div>
                <!-- /.box-body -->
                <div class="box-footer pull-right">
                    <button type="button" id="btn_reset" class="btn btn-default">Cancel</button>
                    <button type="button" class="btn btn-primary">Posting</button>
                </div>
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
