<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Learning Management System | KP Project</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/style.css')}}">
    <!-- template css -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('lte/dist/css/skins/_all-skins.min.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{asset('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{asset('lte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

    <!-- CSS MULTIPLE FILE -->
    <style>
        #files-area {
            margin: 0 auto;
        }

        .file-block {
            border-radius: 10px;
            background-color: rgba(144, 163, 203, 0.2);
            margin: 5px;
            color: initial;
            display: inline-flex;

            &>span.name {
                padding-right: 10px;
                width: max-content;
                display: inline-flex;
                justify-content: center;
            }
        }

        .file-delete {
            display: flex;
            width: 24px;
            color: initial;
            background-color: #6eb4ff00;
            font-size: large;
            justify-content: center;
            margin-right: 3px;
            cursor: pointer;

            &:hover {
                background-color: rgba(144, 163, 203, 0.2);
                border-radius: 10px;
            }
        }
    </style>
    <!-- CSS MULTIPLE FILE -->

    @yield('css')
</head>

<body class="hold-transition skin-black-light sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header -->
        <!-- ============================================================== -->
        @include('component.topbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left side column. contains the sidebar -->
        <!-- ============================================================== -->
        @include('component.sidebar')
        <!-- ============================================================== -->
        <!-- End Left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Content Wrapper. Contains page content -->
        <!-- ============================================================== -->
        <div class="content-wrapper">
            <!-- ============================================================== -->
            <!-- Content Header (Page header) -->
            <!-- ============================================================== -->
            <!-- <section class="content-header">
              <h1>{{ $data['title'] }}</h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{ $data['title'] }}</li>
              </ol>
            </section> -->
            <!-- ============================================================== -->
            <!-- End Content Header (Page header) -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Main content -->
            <!-- ============================================================== -->
            <section class="content">
                <!-- *************************************************************** -->
                <!-- Start Content -->
                <!-- *************************************************************** -->
                @yield('content')
                <!-- *************************************************************** -->
                <!-- End Content -->
                <!-- *************************************************************** -->
            </section>
            <!-- ============================================================== -->
            <!-- End Main content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Content wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Footer -->
        <!-- ============================================================== -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.18
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
            reserved.
        </footer>
        <!-- ============================================================== -->
        <!-- End Footer -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All javascript -->
    <!-- ============================================================== -->
    <!-- jQuery 3 -->
    <script src="{{asset('lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('lte/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- datepicker -->
    <script src="{{asset('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{asset('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('lte/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
    <!-- CKEditor -->
    <script src="{{asset('lte/dist/js/ckeditor/ckeditor.js')}}"></script>
    <!-- bootstrap time picker -->
    <script src="{{asset('lte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- MULTIPLE FILE INPUT -->
    <script>
        $('document').ready(function () {
            $('#btn_reset').click(function () {
                $('#title').val("");
                $('#datetime').val("");
                $('#span_file').css("display", "inline");
                $('#files-area').css("display", "none");
            });
        });

        const dt = new DataTransfer(); // Permet de manipuler les fichiers de l'input file

        $("#attachment").on('change', function (e) {
            for (var i = 0; i < this.files.length; i++) {
                let fileBloc = $('<span/>', {
                        class: 'file-block'
                    }),
                    fileName = $('<span/>', {
                        class: 'name',
                        text: this.files.item(i).name
                    });
                fileBloc.append('<span class="file-delete"><span><i class="fa fa-times-circle"</span></span>')
                    .append(fileName);
                $("#filesList > #files-names").append(fileBloc);
            };
            // Ajout des fichiers dans l'objet DataTransfer
            for (let file of this.files) {
                dt.items.add(file);
            }
            // Mise à jour des fichiers de l'input file après ajout
            this.files = dt.files;

            // EventListener pour le bouton de suppression créé
            $('span.file-delete').click(function () {
                let name = $(this).next('span.name').text();
                // Supprimer l'affichage du nom de fichier
                $(this).parent().remove();
                for (let i = 0; i < dt.items.length; i++) {
                    // Correspondance du fichier et du nom
                    if (name === dt.items[i].getAsFile().name) {
                        // Suppression du fichier dans l'objet DataTransfer
                        dt.items.remove(i);
                        continue;
                    }
                }
                // Mise à jour des fichiers de l'input file après suppression
                document.getElementById('attachment').files = dt.files;
            });
        });
    </script>
    <!-- MULTIPLE FILE INPUT -->

    @yield('js')
</body>

</html>
