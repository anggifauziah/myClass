@extends('component.app')
@section('css')

@endsection
@section('content')
<div class="row" style="padding-left: 7px;">
  <button type="button" class="btn bg-purple btn-flat margin"><i class="fa fa-check-square-o"></i> To do</button>
  <button type="button" class="btn bg-purple btn-flat margin"><i class="fa fa-folder-o"></i> To be checked</button>
  <button type="button" class="btn bg-purple btn-flat margin"><i class="fa fa-calendar"></i> Calendar</button>
</div><br>
<div class="row">
  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-yellow">
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username"><a href="{{ route('class') }}" style="color: white;">Kecerdasan Bisnis</a></h3>
        <h5 class="widget-user-desc">Eka Mala Sari</h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a href="#">Tenggat: <span class="pull-right badge bg-red">Jumat</span></a></li>
          <li><a href="#">07.30 - Ujian Tengah Semester</li>
          <br><br>
          <br><br>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-blue">
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username"><a href="{{ route('class') }}" style="color: white;">Kecerdasan Bisnis</a></h3>
        <h5 class="widget-user-desc">Eka Mala Sari</h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a href="#">Tenggat: <span class="pull-right badge bg-red">Jumat</span></a></li>
          <li><a href="#">07.30 - Ujian Tengah Semester</li>
          <br><br>
          <br><br>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <div class="col-md-4">
    <!-- Widget: user widget style 1 -->
    <div class="box box-widget widget-user-2">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-red">
        <div class="widget-user-image">
          <img class="img-circle" src="{{asset('lte/dist/img/user7-128x128.jpg')}}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username"><a href="{{ route('class') }}" style="color: white;">Kecerdasan Bisnis</a></h3>
        <h5 class="widget-user-desc">Eka Mala Sari</h5>
      </div>
      <div class="box-footer no-padding">
        <ul class="nav nav-stacked">
          <li><a href="#">Tenggat: <span class="pull-right badge bg-red">Jumat</span></a></li>
          <li><a href="#">07.30 - Ujian Tengah Semester</li>
          <br><br>
          <br><br>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
</div>
  <!-- <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Title</h3>
    </div>
    <div class="box-body">
      Start creating your amazing application!
      
    <div class="box-footer">
      Footer
    </div>
  </div> -->
@endsection

@section('js')

@endsection
