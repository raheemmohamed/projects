<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lodnontec LMS | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>bootstrap/css/bootstrap.min.css">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/js/jqueryUI.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/'); ?>dist/css/skins/_all-skins.min.css">
    <!-- jquery confirm css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/common/css/'); ?>jquery-confirm.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/'); ?>custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?php echo base_url('assets/frontend/img/'); ?>londontec.gif">
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo base_url('admin'); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels --> 
          <span class="logo-mini"><b>LMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>LMS</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning" id="label label-warning">0</span>
                </a> -->
                
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($this->session->userdata('gender') == 1):?>
                    <img src="<?php echo base_url('assets/frontend/img'); ?>/malelecture.png" class="user-image" alt="admin">
                  
                   <?php else:?>
                     <img src="<?php echo base_url('assets/frontend/img'); ?>/lecturefemale.png" class="user-image" alt="admin">
                  <?php endif;?>
                  <span class="hidden-xs"></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <?php if($this->session->userdata('gender') == 1):?>
                      <img src="<?php echo base_url('assets/frontend/img'); ?>/malelecture.png" class="user-image" alt="admin">
                     <?php else:?>
                       <img src="<?php echo base_url('assets/frontend/img'); ?>/lecturefemale.png" class="user-image" alt="admin">
                    <?php endif;?>

                    <p>
                      <?php echo $this->session->userdata('username');?>
                      <?php if($this->session->userdata('user_type')==1){
                          echo "Admin";
                      }else{
                        echo "Lecture";
                      }?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <?php $user_id =$this->session->userdata('user_id');?>
                    <div class="pull-left">
                      <a href="<?php echo base_url('admin/profile/'.$user_id)?>" class="btn btn-default btn-flat">Profile Settings</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo base_url('login/logout')?>" class="btn btn-danger btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>

        </nav>
      </header>