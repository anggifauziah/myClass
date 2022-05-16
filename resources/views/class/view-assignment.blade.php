@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box box-primary">
    <div class="box-header with-border">
        <h1 class="box-title"><i class="fa fa-file-text"></i> Assignment Example</h1>
    </div>
    <!-- /.box-header -->
    <div class="row">
        <form method="post" action="" enctype="multipart/form-data">
            <!-- left column -->
            <div class="col-md-8">
                <!-- form start -->
                <div class="box-body">
                    <!--  -->
                    <div class="user-block">
                        <span style="font-size: 15px;"><b>Eka Mala Sari • </b></span>
                        <span>30 Des 2021</span>
                        <span>
                            <h5 class="pull-right" style="margin-top: 35px"><b>Due 29 Apr 07.30</b></h5>
                        </span>
                        <span><b>
                                <h5><b>100 poin</b></h5>
                            </b></span>
                        <hr>
                    </div>
                    <p>
                        Studi Kasus: Data Tips Restaurant
                        Sebuah dataset dari suatu Restaurant memuat variabel-variabel berikut:
                        total_bill: Total bill (cost of the meal), including tax, in US dollars
                        tip: Tip (gratuity) in US dollars
                        sex: Sex of person paying for the meal (0=male, 1=female)
                        smoker: Smoker in party? (0=No, 1=Yes)
                        day: 3=Thur, 4=Fri, 5=Sat, 6=Sun
                        time: 0=Day, 1=Night
                        size: Size of the party
                        Sumber Data: https://www.kaggle.com/ranjeetjain3/seaborn-tips-dataset
                    </p>
                    <div class="box-footer box-comments">
                        <!-- /.box-comment -->
                        <div class="box-comment">
                            <!-- User image -->
                            <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                                alt="User Image">
                            <div class="comment-text">
                                <span class="username">
                                    Nora Havisham
                                    <span class="text-muted pull-right">8:03 PM Today</span>
                                </span><!-- /.username -->
                                The point of using Lorem Ipsum is that it has a more-or-less
                                normal distribution of letters, as opposed to using
                                'Content here, content here', making it look like readable English.
                            </div>
                            <!-- /.comment-text -->
                        </div>
                        <!-- /.box-comment -->
                        <!-- /.box-footer -->
                        <div class="box-footer">
                            <form action="#" method="post">
                                <img class="img-responsive img-circle img-sm"
                                    src="{{asset('lte/dist/img/user4-128x128.jpg')}}" alt="Alt Text">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <input type="text" class="form-control input-sm"
                                        placeholder="Press enter to post comment">
                                </div>
                            </form>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box-comment -->
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.col (left) -->

            <!-- right column -->
            <div class="col-md-4">
                <!-- form start -->
                <div class="box-body">
                    <!-- Date -->
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <!-- social buttons -->
                            <div class="box">
                                <div class="box-header">
                                    <h2 class="box-title">Your work</h2>
                                </div>
                                <div class="box-body">
                                    <a class="btn btn-block btn-social btn-default">Nama file upload
                                    </a>
                                    <br>
                                    <!-- File Input -->
                                    <div>
                                        <label for="file" style="display: block;">
                                            <a class="btn btn-block btn-default" rel="nofollow">
                                                <span class='fa fa-plus'></span> Add file</a>
                                        </label>
                                        <input id="file" type="file" name="file[]" multiple style="display: none;">
                                    </div>
                                    <a href="#" class="btn btn-block btn-default btn-github">Submit</a>
                                    <!-- File Input -->
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.form group -->
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!--/.col (right) -->
        </form>
    </div>
</div>

@endsection

@section('js')

@endsection