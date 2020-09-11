<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Brevet | Log in</title>
    <link rel="icon" type="image/png" href="<?=base_url('assets');?>/image/icon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url('assets/backend');?>/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
    .login-page, .register-page {
        background: url('<?php echo base_url(); ?>assets/image/aaa.jpg') no-repeat fixed center center;
    }
    .login-logo a, .register-logo a{
        color:#f4f4f4;
    }
  </style>
  <body class="hold-transition login-page">
	<div style="padding-top:10px; padding-left:10px;">
	<a type="button" class="btn btn-default btn-circle btn-lg" href="http://taxcenter.gunadarma.ac.id"><i class="fa fa-home"></i></a>
	</div>
    <div class="login-box">
      <div class="login-logo">
        <a style="font-size:25px;">Brevet Terpadu A&B</a> </br>
		<a style="font-size:25px;">Tax Center Universitas Gunadarma</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">
          <?php echo $this->session->flashdata('message');?>
        </p>
        <form action="<?=base_url();?>login/cek_login" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
                <a href="<?=base_url();?>registrasi/konfirmasi">Konfirmasi Pembayaran</a><br>
                <a href="<?=base_url();?>registrasi" class="text-center">Registrasi Pendaftaran Kursus</a>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
		  <br />
		  <div class="row">
            <div class="col-xs-6">
              <img src="<?=base_url('assets/image/Logo UG.png'); ?>" width='150' align='center' height='50' alt='User Image'>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <img src="<?=base_url('assets/image/Logo TC.png'); ?>" width='150' height='50' alt='User Image'>
            </div><!-- /.col -->
          </div>
        </form>
    </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url('assets/backend');?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=base_url('assets/backend');?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/backend');?>/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>