<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LMS | Registration</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/lte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/lte/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/lte/plugins/iCheck/square/blue.css')}}">

    <!-- HTML5 Shim and Respond.js')}} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js')}} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="#"><b>My Class</b></a>
        </div>

        <div class="register-box-body" style="width: 800px; position: absolute; top: 50%;
 left: 50%;
 transform: translate(-50%, -50%);">
            <p class="login-box-msg">Register to access all features</p>
            <div class="row">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="{{ __('Name') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option selected disabled>Gender</option>
                                <option value="1">Female</option>
                                <option value="2">Male</option>
                            </select>
                        </div>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="date"
                                class="col-md-4 col-form-label text-md-end">{{ __('Birth Of Date') }}</label>
                            <input id="date" type="date" class="form-control" name="date" required autocomplete="date"
                                placeholder="{{ __('Date') }}">
                            <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="level" class="col-md-4 col-form-label text-md-end">{{ __('Roles') }}</label>
                            <select class="form-control" name="level" id="level" required>
                                <option selected disabled>Roles</option>
                                <option value="1">Student</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div>
                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="photo"
                                class="col-md-8 col-form-label text-md-end">{{ __('User Photo Max. 2 MB') }}</label>
                            <input id="photo" type="file" name="photo" required>
                        </div>
                        @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-feedback">
                            <label for="username"
                                class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus
                                placeholder="{{ __('Username') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="{{ __('Email Address') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="{{ __('Password 8 Characters') }}">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="form-group has-feedback">
                            <label for="password-confirm"
                                class="col-md-6 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="{{ __('Confirm Password 8 Characters') }}">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                        <div style="text-align:center;">
                            <a href="{{ route('login') }}" class="text-center">I already a member</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="{{asset('public/lte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('public/lte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('public/lte/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>