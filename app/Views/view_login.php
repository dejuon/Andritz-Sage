<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Kontrol Admin - Order Tracking Prototype | Log in</title>
  <link rel="shorcut icon" href="<?php echo base_url(); ?>/assets/images/logo/favicon.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bootstrap/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() . '/assets/plugins/iCheck/square/blue.css'; ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="hold-transition login-page" style="background-image: url(assets/images/loginbg.jpg);">

  <script language="JavaScript" type="text/javascript">
    function cursor() {
      if (document.form.sLogin.value == "") {
        document.form.sLogin.focus();
      } else {
        document.form.sPass.focus();
      }
    }
    window.onload = cursor;
  </script>


  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url(); ?>"><b>Login Page </b><br>Order Tracking Prototype</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
        <div class="alert alert-warning">
          <?php echo session()->getFlashdata('gagal');
          ?>
        </div>
      <?php } ?>
      <form action="<?php echo base_url(); ?>login/login" method="post" name="login">

        <div class="form-group has-feedback">
          <input type="text" name="username" class="form-control" placeholder="Enter Username" required="" autofocus="" maxlength="15" style="text-transform: uppercase">
          <?php //echo form_error('username');

          ?>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Enter Password" required="" autofocus="" style="text-transform: uppercase">
          <?php //echo form_error('password');
          ?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <!--<div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
            
          </div>-->
            <button type="reset" class="btn btn-primary btn-block btn-flat" data-style="zoom-in" onclick="<?php echo base_url(); ?>">Reset</button>
          </div>
          <!-- /.col -->
          <div class="col-xs-6">

            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
        <?php
        //$message = $this->session->flashdata('message');
        //echo $message == '' ? '' : '<p>' . $message . '</p>';
        ?>
      </form>

      <div class="social-auth-links text-center">


      </div>
      <!-- /.social-auth-links -->

      <!--<a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>-->

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?= base_url() ?>/assets/bootstrap/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url() ?>/assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url() . '/assets/plugins/iCheck/icheck.min.js'; ?>"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>

</html>