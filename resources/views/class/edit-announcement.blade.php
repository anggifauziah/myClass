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

@endsection
