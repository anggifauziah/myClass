@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- MENU -->
<div class="row" style="padding-left: 7px;">
  <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8"><i class="fa fa-check-square-o fa-lg"></i>
  <span style="font-size: 17px; padding-left: 7px;">To do</span></button>
  <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;"><i class="fa fa-folder-o fa-lg"></i> 
  <span style="font-size: 17px; padding-left: 7px;">To be checked</span></button>
  <button type="button" class="btn bg-white btn-flat" style="color: #1a73e8; margin-left: 10px;"><i class="fa fa-calendar fa-lg"></i>
  <span style="font-size: 17px; padding-left: 7px;">Calendar</span></button>
</div><br>
<!-- MENU -->

<!-- CLASSES -->
<div class="row">
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
          <li><a href="#">Due date <span class="pull-right badge bg-red">Jumat</span></a></li>
          <li><a href="#">07.30 - Ujian Tengah Semester</li>
          <br><br>
          <br><br>
        </ul>
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <!-- CLASSES -->
</div>
@endsection

@section('js')

@endsection
