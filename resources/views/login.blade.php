<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }} | {{ config('app.subtitle') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/blue.css') }}">
  <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
<style>
.login-page,
.register-page {
  background: url('img/log-back.jpg');
}
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page"  style="height:auto;">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body"  style=" box-shadow: 4px 8px 20px #999;">
    <div class="login-logo">

     <img src="{{ asset('img/logo.png') }}" style=" width: 145px; height: 147px; ">
     <h3 style=" text-align: center; ">{{ config('app.subtitle') }}</h3>
    </div>
   <!-- <p class="login-box-msg">Masukkan Password dan Username</p>-->
    @if(Session::has('failed'))
      <span class=" login-box-msg text-red">
          <strong>{{ Session::get('failed') }}</strong>
      </span>
    @endif
    <form action="{{ action('LoginController@login') }}" method="post">
       {{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('username'))
              <span class="text-red">
                  <strong>{{ $errors->first('username') }}</strong>
              </span>
          @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
         @if ($errors->has('password'))
              <span class="text-red">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
</body>
</html>