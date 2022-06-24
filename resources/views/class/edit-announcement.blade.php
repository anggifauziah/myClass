@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit announcement</h3>
    </div>
    <!-- /.box-header -->
    @foreach($edit_announce->groupBy('id_announce') as $announce)
    <div class="box-body">
        <form method="post" action="" enctype="multipart/form-data">
            <textarea class="ckeditor" id="ckedtor">{{$announce[0]['announce_content']}}</textarea>
            <br>
            <!-- File Input -->
            <div>
                <label for="file-input">
                    <a class="btn btn-info" role="button" aria-disabled="false">
                        <span class='glyphicon glyphicon-paperclip'></span> Input File</a>
                </label>
                <input type="file" name="file[]" id="file-input" style="visibility: hidden;" multiple>
                @foreach($announce as $item)
                <p id="files-area">
                    <span id="files-list">
                        <span id="files-names">{{$item->filename}}</span>
                    </span>
                </p>
                @endforeach
            </div><br>
            <!-- File Input -->
            <div class="box-footer pull-left">
                <a href="{{ url()->previous() }}" type="button" id="btn_reset" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Posting</button>
            </div>
        </form>
    </div><!-- /.box-body -->
    @endforeach
</div>

@endsection
@section('js')

@endsection
