@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- CREATE CLASS -->
<div class="box box-solid box-default">
    <!-- /.box-header -->
    <div class="box-header">
        <h3 class="box-title">Create class</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- users -->
        <div class="user-block">
            <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
            <span class="username" style="font-size: 15px; padding-top: 12px;">{{$datas->teacher_name}}</span>
        </div>
        <br>
        <!-- FORM CREATE CLASS -->
        <form method="POST" action="{{ route('store-class') }}">
            @csrf
            <h4>Create class</h4>
            <div class="form-group">
                <label>Class Name</label>
                <input id="class_name" type="text" class="form-control @error('class_name') is-invalid @enderror"
                    name="class_name" value="{{ old('class_name') }}" required autocomplete="class_name" autofocus
                    placeholder="{{ __('Class Name') }}">
            </div>
            @error('class_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label>Subject</label>
                <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror"
                    name="subject" value="{{ old('subject') }}" required autocomplete="subject" autofocus
                    placeholder="{{ __('Subject') }}">
            </div>
            @error('subject')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label>Description</label>
                <input id="desc" type="text" class="form-control @error('desc') is-invalid @enderror" name="desc"
                    value="{{ old('desc') }}" required autocomplete="desc" autofocus
                    placeholder="{{ __('Description') }}">
            </div>
            @error('desc')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label>Room</label>
                <input id="room" type="text" class="form-control @error('room') is-invalid @enderror" name="room"
                    value="{{ old('room') }}" required autocomplete="room" autofocus placeholder="{{ __('Room') }}">
            </div>
            @error('room')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

        <!-- FORM CREATE CLASS -->
    </div>
</div>
<!-- CREATE CLASS -->

@endsection

@section('js')

@endsection