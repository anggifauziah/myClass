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
            <span class="username" style="font-size: 15px; padding-top: 12px;">Eka Mala Sari</span>
        </div>
        <br>
        <!-- FORM CREATE CLASS -->
        <form>
            <h4>Create class</h4>
            <div class="form-group">
                <label>Class name</label>
                <input type="text" class="form-control input-md" placeholder="Class name">
            </div>
            <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control input-md" placeholder="Subject">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control input-md" placeholder="Description">
            </div>
            <div class="form-group">
                <label>Room</label>
                <input type="text" class="form-control input-md" placeholder="Room">
            </div>
            <button type="button" class="btn btn-primary">Create</button>
        </form>

        <!-- FORM CREATE CLASS -->
    </div>
</div>
<!-- CREATE CLASS -->

@endsection

@section('js')

@endsection