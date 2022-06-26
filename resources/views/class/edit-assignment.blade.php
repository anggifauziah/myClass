@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit assignment</h3>
    </div>
    <!-- /.box-header -->
    @foreach($edit_assign->groupBy('id_assign') as $assign)
    <div class="row">
        <form method="post" action="{{route('updateAssignment')}}" enctype="multipart/form-data">
            @csrf
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                            name="title" value="{{$assign[0]['assign_title']}}" required autocomplete="title" autofocus
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
                            required autofocus>{{$assign[0]['assign_content']}}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
                <!-- form start -->
                <div class="box-body">
                    <!-- Old Deadline -->
                    <div class="form-group">
                        <label for="currdate">Current Due date</label>
                        <input type="text" class="form-control" name="currdate" value="{!! date('d M Y H:i',
                                    strtotime($assign[0]['assign_deadline'])) !!}" readonly>
                    </div>
                    <!-- End Old Deadline -->
                    <!-- Date -->
                    <div class="form-group">
                        <label>Change due date</label>
                        <small style="color: red;">(Kosongkan jika tidak ingin mengubah)</small>
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
                        @foreach($assign as $item)
                        @if($item->filename != null)
                        <p><b>File tidak dapat diubah!</b></p>
                        @endif
                        <p id="files-area">
                            <span id="files-list">
                                <table border=1>
                                    <tr>
                                        <td><span id="files-names">{{$item->filename}}</span></td>
                                    </tr>
                                </table>
                            </span>
                        </p>
                        @endforeach
                    </div>
                    <input type="hidden" name="id_assign" value="{{$assign[0]['id_assign']}}">
                    <!-- File Input -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer pull-right">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary">Posting</button>
                </div>
            </div>
            <!--/.col (right) -->
        </form>
    </div>
    @endforeach
</div>

@endsection
@section('js')

@endsection
