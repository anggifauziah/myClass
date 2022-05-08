@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right box-header with-border bg-blue">
        <li>
            <a class="tablinks" onclick="openCity(event, 'Anggota')" style="color: white;">Anggota</a>
        </li>
        <li>
            <a class="tablinks " onclick="openCity(event, 'Tugas Kelas')" style="color: white;">Tugas Kelas
                <span class="badge">3</span></a>
        </li>
        <li>
            <a class="tablinks" onclick="openCity(event, 'Forum')" style="color: white;">Forum</a>
        </li>
        <!-- <li><a class="tablinks" onclick="openCity(event, 'Anggota')">Anggota</a></li> -->
        {{-- <li><a href="{{ url('tab1') }}" class="{{ request()->is('tab2') ? "activated" : null }}">Nilai</a></li>
        --}}
        <li class="pull-left">
            <div class="user-block">
                <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username" style="font-size: 21px; color: white;">Kecerdasan Bisnis</span>
                <span class="description" style="color: white;">Eka Mala Sari</span>
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
                            <td width="170">lehnqvs</td>
                        </tr>
                        <tr>
                            <td><b>Class Name</b></td>
                            <td>:</td>
                            <td>TIF-6A</td>
                        </tr>
                        <tr>
                            <td><b>Subject</b></td>
                            <td>:</td>
                            <td>Kecerdasan Bisnis</td>
                        </tr>
                        <tr>
                            <td><b>Room</b></td>
                            <td>:</td>
                            <td>F304</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <p>
                                    Far far away, behind the word mountains, far from the
                                    countries Vokalia and Consonantia, there live the blind
                                    texts. Separated they live in Bookmarksgrove right at
                                    the coast of the Semantics, a large language ocean.
                                    A small river named Duden flows by their place and supplies
                                    it with the necessary regelialia. It is a paradisematic
                                    country, in which roasted parts of sentences fly into
                                    your mouth.
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
                        <textarea class="ckeditor" id="ckedtor"></textarea>
                        <br>
                        <button type="button" class="btn btn-default">Cancel</button>
                        <button type="button" class="btn btn-primary">Posting</button>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
            <!-- END POST ANNOUNCEMENT -->

            <!-- BOX ANNOUNCEMENT -->
            <div class="box box-solid box-default">
                <!-- /.box-header -->
                <div class="box-header">
                    <h3 class="box-title">Announcement Example</h3>
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
            <div class="box box-default box-solid collapsed-box">
                <!-- /.box-header -->
                <div class="box-header" data-widget="collapse">
                    <h3 class="box-title"><i class="fa fa-file-text"></i> Assignment Example</h3>
                </div><!-- /.box-header -->
                <!-- /.box-body -->
                <div class="box-body" style="">
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
                        your mouth.
                    </p>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <!-- END BOX ASSIGNMENT -->
        </div>
        <!-- END FORUM -->

        <!-- TUGAS KELAS -->
        <div class="tab-pane tabcontent" id="Tugas Kelas">
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border" data-widget="collapse">
                        <h3 class="box-title"><i class="fa fa-file-text"></i> Expandable</h3>
                        <div class="box-tools pull-right">
                            <h5>Tenggat: 29 Apr 07.30</h5>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <span class="pull-left">Diposting 6 Apr (Diedit 6 Apr)</span>
                        <span class="pull-right">Diserahkan</span>
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
                        <!-- <td width="50">
                    <input type=checkbox>
                  </td> -->
                        <td width="1250">
                            <img class="img-responsive img-circle img-sm"
                                src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">
                            <span class="username" style="font-size: 15px; padding-top: 5px;">Anggi Nor Fauziah</span>
                        </td>
                        <td>
                            <i class="fa fa-ellipsis-v fa fa-lg" aria-hidden="true"></i>
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
@endsection

@section('js')

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

@endsection