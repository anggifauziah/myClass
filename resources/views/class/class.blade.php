@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right box-header with-border bg-blue">
        <li>
            <a class="tablinks" onclick="openCity(event, 'Anggota')" style="color: white;">People</a>
        </li>
        <li>
            <a class="tablinks " onclick="openCity(event, 'Tugas Kelas')" style="color: white;">Classwork
                <!-- <span class="badge bg-red">3</span> -->
            </a>
        </li>
        <li>
            <a class="tablinks" onclick="openCity(event, 'Forum')" style="color: white;">Forum</a>
        </li>
        <li class="pull-left">
            <div class="user-block">
                <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username" style="font-size: 21px; color: white;">{{$datas->class_name}}</span>
                <span class="description" style="color: white;">{{$datas->teacher_name}}</span>
            </div>
        </li>
    </ul>

    <!-- /.tab-content -->
    <div class="tab-content">
        <!-- FORUM -->
        <div class="tab-pane active tabcontent" id="Forum">
            <!-- BOX CLASS DETAILS -->
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h1 class="box-title" style="padding-top: 10px"><b>Class Details</b></h1>
                    <div class="box-tools pull-right">
                        <button class="btn btn-lg" data-widget="collapse" title="Information">
                            <i class="fa fa-info-circle"></i>
                        </button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table>
                        <tr>
                            <td width="90"><b>Class Code</b></td>
                            <td width="10">:</td>
                            <td width="170">{{$datas->class_code}}</td>
                        </tr>
                        <tr>
                            <td><b>Subject</b></td>
                            <td>:</td>
                            <td>{{$datas->class_subject}}</td>
                        </tr>
                        <tr>
                            <td><b>Room</b></td>
                            <td>:</td>
                            <td>{{$datas->class_room}}</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p>
                                    {{$datas->class_desc}}
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- END BOX CLASS DETAILS -->

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
                        <form method="post" action="" enctype="multipart/form-data">
                            <textarea class="ckeditor" id="ckedtor"></textarea>
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
                            <button type="button" class="btn btn-primary">Posting</button>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <!-- END POST ANNOUNCEMENT -->

            <!-- BOX ANNOUNCEMENT -->
            <div class="box box-solid box-default">
                <!-- /.box-header -->
                <div class="box-header">
                    <h3 class="box-title">Announcement Example</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- users -->
                    <div class="user-block">
                        <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <span class="username" style="font-size: 15px;">Eka Mala Sari</span>
                        <span class="description">30 Des 2021</span>
                    </div>
                    <br>
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at
                        the coast of the Semantics, a large language ocean.
                        A small river named Duden flows by their place and supplies
                        it with the necessary regelialia. It is a paradisematic
                        country, in which roasted parts of sentences fly into
                        your mouth.</p>
                    <!-- Attachment -->
                    <div class="attachment-block clearfix">
                        <img class="attachment-img" src="{{asset('lte/dist/img/photo1.png')}}" alt="Attachment Image">
                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text
                                    generator</a>
                            </h4>
                            <div class="attachment-text">
                                Description about the attachment can be placed here.
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a
                                    href="#">more</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                        <!-- /.attachment-pushed -->
                    </div>
                    <!-- /.attachment-block -->
                </div>
                <!-- /.box-body -->
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
            <!-- END BOX ANNOUNCEMENT -->

            <!-- BOX ASSIGNMENT -->
            <div class="box box-solid box-default">
                <!-- /.box-header -->
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-file-text"></i> Assignment Example</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i></button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Edit</a></li>
                                <li><a href="#">Delete</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /. tools -->
                </div><!-- /.box-header -->
                <!-- /.box-body -->
                <div class="box-body">
                    <!-- users -->
                    <div class="user-block">
                        <!-- view-assignment-teacher (assignment guru) - view-assignment (assignment murid)- -->
                        <a href="{{ route('view-assignment') }}" class="btn btn-primary pull-right">View assignment</a>
                        <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                        <span class="username" style="font-size: 15px;">Eka Mala Sari</span>
                        <span class="description">30 Des 2021</span>
                    </div>
                    <br>
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                        countries Vokalia and Consonantia, there live the blind
                        texts. Separated they live in Bookmarksgrove right at
                        the coast of the Semantics, a large language ocean.
                        A small river named Duden flows by their place and supplies
                        it with the necessary regelialia. It is a paradisematic
                        country, in which roasted parts of sentences fly into
                        your mouth.
                    </p>
                </div><!-- /.box-body -->
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
            </div><!-- /.box -->
            <!-- END BOX ASSIGNMENT -->
        </div>
        <!-- END FORUM -->

        <!-- TUGAS KELAS -->
        <div class="tab-pane tabcontent" id="Tugas Kelas">
            <div class="box box-solid">
                <a href="{{ route('assignment') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create
                    assignment</a>
                <br><br>
                <!-- /.box-header -->
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Expandable</h3>
                        <div class="box-tools pull-right">
                            <h5>Due 29 Apr 07.30</h5>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <p class="pull-left">Posted 6 Apr</p>
                        <!-- Status: Handed in (Dikumpulkan); Assigned (Belum Dikumpulkan) -->
                        <p class="pull-right">Handed in</p>
                        <br><br>
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
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <!-- view-assignment-teacher (assignment guru) - view-assignment (assignment murid)- -->
                        <a href="{{ route('view-assignment') }}" style="color: black;">
                            <h5>View assignment</h5>
                        </a>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
        <!-- END TUGAS KELAS -->

        <!-- ANGGOTA -->
        <div class="tab-pane tabcontent" id="Anggota">
            <h1>Teachers</h1>
            <hr>
            <div class="user-block">
                <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                    alt="User Image">
                <span class="username" style="font-size: 15px; padding-top: 5px;">Eka Mala Sari</span>
            </div>
            <br><br>
            <h1>Classmates</h1>
            <hr>
            <div class="user-block">
                <table>
                    <tr>
                        <td width="1250">
                            <img class="img-responsive img-circle img-sm"
                                src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">
                            <span class="username" style="font-size: 15px; padding-top: 5px;">Anggi Nor Fauziah</span>
                        </td>
                        <td>
                            <a href="#" style="color: black; padding-left: 130px">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fa fa-trash-o fa fa-lg" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END ANGGOTA -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- nav-tabs-custom -->

<!-- DELETE MODALS -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Student?</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure want to remove this student form class?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- DELETE MODALS -->

@endsection
@section('js')

<!-- TAB PANE -->
<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" activated", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " activated";
    }
</script>
<!-- TAB PANE -->

<!-- MULTIPLE FILE INPUT -->
<script>
    $('document').ready(function () {
        // $('#btn_upload').click(function () {
        //     var the_file = $('#file').val();
        //     if (the_file == "") {
        //         alert('Please select the file');
        //         return false;
        //     }
        // });
        $('#file').change(function () {
            FileDetails();
        });
        $('#btn_reset').click(function () {
            $('#file').val("");
            $('#span_file').css("display", "inline");
            $('#detail_file').css("display", "none");
        });
    });
</script>
<script>
    function FileDetails() {
        var fi = document.getElementById('file');
        if (fi.files.length > 0) {
            document.getElementById('detail_file').innerHTML =
                'Total Files: <b>' + fi.files.length + '</b></br >';
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var no_file = i + 1;
                var fname = fi.files.item(i).name;
                var fsize = fi.files.item(i).size;
                document.getElementById('detail_file').innerHTML =
                    document.getElementById('detail_file').innerHTML + no_file + ". " +
                    fname + ' (<b>' + bytesToSize(fsize) + '</b>)<br>';
            }
            document.getElementById('detail_file').style.display = "block";
            document.getElementById('span_file').style.display = "none";
        } else {
            alert('Please select a file.')
        }
    }

    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Byte';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }
</script>
<!-- MULTIPLE FILE INPUT -->

@endsection