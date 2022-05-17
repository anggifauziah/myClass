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
            <span class="username" style="font-size: 15px; padding-top: 12px;">Anggi Nor Fauziah</span>
        </div>
        <br>
        <!-- CLASS CODE -->
        <form>
            <h4>Class code</h4>
            <p>Ask your teacher for the class code, then enter it here.</p>
            <div class=row>
                <div class="col-md-4">
                    <input type="text" class="form-control input-lg" placeholder="Class code">
                </div>
            </div>

            <br>
            <button type="button" class="btn btn-success">Join</button>
        </form>

        <!-- CLASS CODE -->
    </div>
</div>
<!-- JOIN CLASS -->

@endsection

@section('js')

@endsection