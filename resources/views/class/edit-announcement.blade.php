@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Assignment</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form method="post" action="" enctype="multipart/form-data">
            <textarea class="ckeditor" id="ckedtor"></textarea>
            <br>
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
            <button type="button" id="btn_reset" class="btn btn-default">Cancel</button>
            <button type="button" class="btn btn-primary">Posting</button>
        </form>
    </div><!-- /.box-body -->
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
