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
                    <label for="attachment">
                        <a class="btn btn-info" role="button" aria-disabled="false">
                            <span class='glyphicon glyphicon-paperclip'></span> Input File</a>
                    </label>
                    @foreach($announce as $item)
                    <p id="files-area">
                        <span id="filesList">
                            <span id="files-names">{{$item->filename}}</span>
                        </span>
                    </p>
                    @endforeach
                    <input type="file" name="file[]" id="attachment" style="visibility: hidden;" multiple>
                </div>
                <!-- File Input -->
                <button type="button" id="btn_reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Posting</button>
                
        </form>
    </div><!-- /.box-body -->
    @endforeach
</div>

@endsection

@section('js')

@endsection
