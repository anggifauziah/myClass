@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- JOIN CLASS -->
<div class="box box-solid box-default" style="width:500px;">
    <!-- /.box-header -->
    <div class="box-header">
        <h3 class="box-title">Join class</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <!-- users -->
        <div class="user-block">
            <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
            <span class="username" style="font-size: 15px; padding-top: 12px;">{{$datas->student_name}}</span>
        </div>
        <br>
        <!-- CLASS CODE -->
        <form method="POST" action="{{ route('store-class') }}">
            @csrf
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <h4>Class code</h4>
            <p>Ask your teacher for the class code, then enter it here.</p>
            <div class=row>
                <div class="col-md-4">
                    <div class="form-group">
                        <input id="class_code" type="text"
                            class="form-control @error('class_code') is-invalid @enderror" name="class_code" required
                            autocomplete="class_code" autofocus placeholder="{{ __('Class code') }}">
                    </div>
                    <!-- @error('class_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
                </div>
            </div>
            <button type="submit" class="btn btn-success">Join</button>
        </form>

        <!-- CLASS CODE -->
    </div>
</div>
<!-- JOIN CLASS -->

@endsection

@section('js')

@endsection