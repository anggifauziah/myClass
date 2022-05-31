<!-- CLASSWORK -->
<div class="tab-pane tabcontent" id="Classwork">
    <div class="box box-solid">
        @if(Auth::user()->level_user == 2)
        <a href="{{url('assignment',$code.'-'.'create-assignment')}}" class="btn btn-primary"><i class="fa fa-plus"></i>
            Create assignment</a>
        <br><br>
        @endif
        <!-- /.box-header -->
        @foreach($assignment->groupBy('id_assign') as $assign)
        <div class="box box-default collapsed-box">
            <div class="box-header with-border" data-widget="collapse">
                <h3 class="box-title"><i class="fa fa-file-text"></i> {{$assign[0]['assign_title']}}</h3>
                <div class="box-tools pull-right">
                    <h5>Due {!! date('d M Y H:i', strtotime($assign[0]['assign_deadline'])) !!}</h5>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                <p class="pull-left" style="font-size:12px;">Posted {!! date('d M Y',
                    strtotime($assign[0]['created_at'])) !!}</p>
                <!-- Status: Handed in (Dikumpulkan); Assigned (Belum Dikumpulkan) -->
                <!-- <p class="pull-right">Handed in</p> -->
                <br><br>
                <!-- post text -->
                {!! html_entity_decode($assign[0]['assign_content']) !!}
                <!-- Attachment -->
                @foreach($assign->groupBy('id_file_assign') as $items)
                <div class="attachment-block clearfix">
                    <h4 class="attachment-heading">
                        <a href="#">{{$items[0]['filename']}}</a>
                    </h4>
                    <!-- /.attachment-pushed -->
                </div>
                @endforeach
                <!-- /.attachment-block -->
            </div><!-- /.box-body -->
            <div class="box-footer">
                <!-- view-assignment-teacher (assignment guru) - view-assignment (assignment murid)- -->
                <a href="{{ url('assignment', $assign[0]['class_code'].'-'.$assign[0]['id_assign']) }}">
                    <h5>View assignment</h5>
                </a>
            </div>
        </div><!-- /.box -->
        @endforeach
    </div>
</div>
<!-- END CLASSWORK -->