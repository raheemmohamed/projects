<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Londontec LMS | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/dist/css/custom.css">
    <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/'); ?>londontec.gif">

    <style>
      .terms-box {
        max-width: 760px; 
        margin: 0 auto;
      }
      .login-page, .register-page {
       background: #ffffff;
      }
      .login-logo, .register-logo {
        font-size: 26px;
        text-align: center;
        margin-bottom: 11px;
        font-weight: 300;
      }

      @media (max-width: 760px) {
        .terms-box {
          margin: 0 10px;
        }
      }
    </style>
  </head>
  <body class="hold-transition login-page">
    <div class="londontec"></div>

      <div class="row">
           <div class="col-md-8">
             <img src="<?php echo base_url('assets/frontend/img/londontec.jpg');?>" alt="background" style="width: 102%;height: 101% !important;">
           </div>
        <div class="col-md-4">
          <div class="login">
            <div class="login-box">
              <img src="<?php echo base_url('assets/frontend/img/londontec.gif');?>" alt="background" style="width: 50%;text-align: center; margin-left: 22%;">
              <div class="login-logo">
                <a href="#"><b>Londontec Student LMS</b></a>
              </div><!-- /.login-logo -->
              <div class="login-box-body">
                <p class="login-box-msg">Student Login to Londontec LMS</p>
              <form action='<?php echo base_url();?>student_login/process' method='post' name='process'>
                <?php echo $this->session->flashdata('msg'); ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                  <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <div class="row">
                    <div class="col-xs-8">
                        <a href="http://www.londonteclms.tk/login" style="text-align: center;">Instructures Login</a>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div><!-- /.col -->
                      <br>
                  </div>

                </form>
                   <div class="bottom-footer">
                    <br><br>
                    <p style="text-align: center;"><strong>&copy; 2018 Londontec LMS || Developed by Mohamed Raheem ||Bsc(Hons) in Computing</strong></p>
                  </div>

              </div><!-- /.login-box-body -->
            </div><!-- /.login-box -->
          </div>
      </div>
    </div>


        
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/admin'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url('assets/admin'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/admin'); ?>/plugins/iCheck/icheck.min.js"></script>
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
