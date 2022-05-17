@extends('component.app')
@section('css')

@endsection
@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Hover Data Table</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Students Name</th>
                    <th>Files</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Anggi Nor Fauziah</td>
                    <td>Internet
                        Explorer 4.0
                    </td>
                    <td>0</td>
                    <td>
                      <a href="">
                        <button type="button" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                      </a>
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Students Name</th>
                    <th>Files</th>
                    <th>Score</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection
@section('js')

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
</script>

@endsection