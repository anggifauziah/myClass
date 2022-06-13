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
        <form method="post" action="{{ route('store-assignment') }}" enctype="multipart/form-data">
            @csrf
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{ old('title') }}" required autocomplete="title" autofocus
                            placeholder="{{ __('Title') }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="ckeditor" class="ckeditor @error('ckeditor') is-invalid @enderror" name="ckeditor"
                            required autofocus>{{ old('ckeditor') }}</textarea>
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
                            <input type="datetime-local" class="form-control pull-right" id="datetime" name="datetime">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- File Input -->
                    <div>
                        <label for="file-input">
                            <a class="btn btn-info" role="button" aria-disabled="false">
                                <span class='glyphicon glyphicon-paperclip'></span> Input File</a>
                            <span id="span_file">File size max. 5 MB</span>
                        </label>
                        <input type="file" name="file[]" id="file-input" style="visibility: hidden;" multiple>
                        <p id="files-area">
                            <span id="files-list">
                                <span id="files-names"></span>
                            </span>
                        </p>
                        <input type="hidden" name="class_id" value="{{$datas->id_class}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="creator_name" value="{{$datas->teacher_name}}">
                    </div>
                    <!-- File Input -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer pull-right">
                    <button type="button" id="btn_reset" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Posting</button>
                </div>
            </div>
            <!--/.col (right) -->
        </form>
    </div>
</div>

@endsection
@section('js')

@endsection
