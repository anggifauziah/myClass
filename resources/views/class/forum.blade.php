<!-- FORUM -->
<div class="tab-pane {{ session('tabs') == null ? 'active' : '' }} tabcontent" id="Forum">
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
    @include('class.create-announcement')
    <!-- END POST ANNOUNCEMENT -->

    <!-- BOX ANNOUNCEMENT -->
    @include('class.announcement')
    <!-- END BOX ANNOUNCEMENT -->

    <!-- BOX ASSIGNMENT -->
    @include('class.assignment')
    <!-- END BOX ASSIGNMENT -->
</div>
<!-- END FORUM -->