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
                    required autofocus></textarea>
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
                <button type="submit" class="btn btn-primary">Posting</button>
            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
<!-- END POST ANNOUNCEMENT -->