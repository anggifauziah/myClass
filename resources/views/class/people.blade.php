<!-- PEOPLE -->
<div class="tab-pane tabcontent" id="People">
    <h1>Teachers</h1>
    <hr>
    <div class="user-block">
        <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
            alt="User Image">
        <span class="username" style="font-size: 15px; padding-top: 5px;">{{$datas->teacher_name}}</span>
    </div>
    <br><br>
    @if(Auth::user()->level_user == 1)
    <h1>Classmates</h1>
    <hr>
    <div class="user-block">
        <table>
            @foreach($students_name as $name)
            <tr>
                <td width="1250">
                    <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                        alt="User Image">
                    <span class="username" style="font-size: 15px; padding-top: 5px;">{{$name->student_name}}</span>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    @elseif(Auth::user()->level_user == 2)
    <h1>Students</h1>
    <hr>
    <div class="user-block">
        <table>
            @foreach($students_name as $name)
            <tr>
                <td width="1250">
                    <img class="img-responsive img-circle img-sm" src="{{asset('lte/dist/img/user5-128x128.jpg')}}"
                        alt="User Image">
                    <span class="username" style="font-size: 15px; padding-top: 5px;">{{$name->student_name}}</span>
                </td>
                <td>
                    <a href="#" style="color: black; padding-left: 130px">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </a>
                </td>

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
                                <h4>Are you sure want to remove this student from class?</h4>
                            </div>
                            @if($students_name->count() > 0)
                            <div class="modal-footer">
                                <form method="get"
                                    action="{{ url('class', $students_name[0]['id_classOfStudents'] . '-deleteStudents') }}">
                                    <button type="button" class="btn btn-default pull-left"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- DELETE MODALS -->

            </tr>
            @endforeach
        </table>
    </div>
    @endif
</div>
<!-- END PEOPLE -->