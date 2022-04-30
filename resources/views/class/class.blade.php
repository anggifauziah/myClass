@extends('component.app')
@section('css')

@endsection
@section('content')

<!-- Custom Tabs (Pulled to the right) -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs pull-right box-header with-border bg-blue">
        <li><a class="tablinks" onclick="openCity(event, 'Forum')">Forum</a></li>
        <li><a class="tablinks " onclick="openCity(event, 'Tugas Kelas')">Tugas Kelas<span class="badge">3</span></a></li>
        <li><a class="tablinks" onclick="openCity(event, 'Anggota')">Anggota</a></li>
        <li><a class="tablinks" onclick="openCity(event, 'Anggota')">Anggota</a></li>
        {{-- <li><a href="{{ url('tab1') }}" class="{{ request()->is('tab2') ? "activated" : null }}">Nilai</a></li> --}}
        <li class="pull-left">
            <div class="user-block">
                <img class="img-circle" src="{{asset('lte/dist/img/user1-128x128.jpg')}}" alt="User Image">
                <span class="username" style="font-size: 21px;">Kecerdasan Bisnis</span>
                <span class="description" style="color: white;">Eka Mala Sari</span>
            </div>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active tabcontent" id="Forum">
        <div class="box-body">
        <!-- post text -->
        <p>Far far away, behind the word mountains, far from the
        countries Vokalia and Consonantia, there live the blind
        texts. Separated they live in Bookmarksgrove right at</p>

        <p>the coast of the Semantics, a large language ocean.
        A small river named Duden flows by their place and supplies
        it with the necessary regelialia. It is a paradisematic
        country, in which roasted parts of sentences fly into
        your mouth.</p>

        <!-- Attachment -->
        <div class="attachment-block clearfix">
        <img class="attachment-img" src="{{asset('lte/dist/img/photo1.png')}}" alt="Attachment Image">

        <div class="attachment-pushed">
            <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

            <div class="attachment-text">
            Description about the attachment can be placed here.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
            </div>
            <!-- /.attachment-text -->
        </div>
        <!-- /.attachment-pushed -->
        </div>
        <!-- /.attachment-block -->

        <!-- Social sharing buttons -->
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
        <span class="pull-right text-muted">45 likes - 2 comments</span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer box-comments">
            <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="{{asset('lte/dist/img/user3-128x128.jpg')}}" alt="User Image">

            <div class="comment-text">
                    <span class="username">
                    Maria Gonzales
                    <span class="text-muted pull-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                It is a long established fact that a reader will be distracted
                by the readable content of a page when looking at its layout.
            </div>
            <!-- /.comment-text -->
            </div>
            <!-- /.box-comment -->
            <div class="box-comment">
            <!-- User image -->
            <img class="img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}" alt="User Image">

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
        </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane tabcontent" id="Tugas Kelas">
            <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Tugas 3. Studi kasus EDA</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary">
                      <div class="box-header with-border">
                        <h4 class="box-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Tugas 3. Studi kasus EDA
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
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
                            Sumber Data:  https://www.kaggle.com/ranjeetjain3/seaborn-tips-dataset 
                            
                            
                            
                            Latihan:Silahkan Latihan untuk menjawab pertanyaan-pertanyaan berikut:
                            1. Adakah tipe variabel yang kurang tepat di data tersebut?
                            2. Apakah data numeriknya cenderung berdistribusi normal?
                            3. Apakah ada outlier, noise, missing values, dan-atau duplikasi data?
                            4. Apakah pelanggan pria dan wanita cenderung proporsional (balance)?
                            5. Dari data yang ada apakah Pria atau wanita ada kecenderungan memberi tips lebih besar?
                            6. Dari data yang ada apakah ada kecenderungan tips lebih besar di hari-hari tertentu?
                            7. Dari data yang ada apakah customer perokok cenderung memberi tips lebih besar?
                            8. Apakah pola di nomer 5 dan 7 dipengaruhi hari?
                            9. Pola apalagi yang dapat anda temukan? (misal, bisakah anda menyarankan tata letak kursi/meja restaurant dari data ini?)
                            10. dari hasil EDA anda saran apa saja yang akan anda berikan ke pemilik restaurant?
                            11. Skills/kompetensi apa yang terasa sangat diperlukan dari latihan ini?
                            
                            
                            Kerjakan dalam kelompok 4 orang
                            </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane tabcontent" id="Anggota">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        It has survived not only five centuries, but also the leap into electronic typesetting,
        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <!-- /.tab-pane -->
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