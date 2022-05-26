<!-- POST ANNOUNCEMENT -->
<div class="box box-default">
    <!-- /.box-header -->
    <div class="box box-default collapsed-box">
        <div class="box-header with-border" data-widget="collapse">
            <h5 class="box-title"> </h5>
            <div class="box-tools pull-left">
                <h5>Announce something to your class</h5>
            </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <form method="post" action="{{ route('store-announcement') }}" enctype="multipart/form-data">
                @csrf
                <textarea id="ckeditor" class="ckeditor @error('ckeditor') is-invalid @enderror" name="ckeditor"
                    required autofocus>{{ old('ckeditor') }}</textarea>
                <br>
                <!-- File Input -->
                <div>
                    <label for="attachment">
                        <a class="btn btn-info" role="button" aria-disabled="false">
                            <span class='glyphicon glyphicon-paperclip'></span> Input File</a>
                    </label>
                    <p id="files-area">
                        <span id="filesList">
                            <span id="files-names"></span>
                        </span>
                    </p>
                    <input type="file" name="file[]" id="attachment" style="visibility: hidden;" multiple>
                </div>
                <!-- File Input -->
                <button type="button" id="btn_reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Posting</button>
                <input type="hidden" name="class_id" value="{{$datas->id_class}}">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="creator_name"
                    value="{{Auth::user()->level_user == 2 ? $datas->teacher_name : $datas->student_name}}">
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<!-- END POST ANNOUNCEMENT -->