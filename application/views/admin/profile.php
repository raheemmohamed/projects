<style>
  /* Chat containers */
.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    width: 100% !important;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #ddd;
}

/* Clear floats */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #aaa;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
}
.chat-box{
  height:500px !important;
  width:100%;
  border:1px solid #ccc;
  font:16px/26px Georgia, Garamond, Serif;
  overflow: scroll;
}

body{
  background-color: #000 !important;
}


</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $pagetitle; ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?php echo $pagetitle; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-offset-1 col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $pagetitle; ?></h3>
          </div><!-- /.box-header -->

          <?php foreach($londontec_users as $usersprofile){
              $profile_id = $usersprofile['user_id'];
              $profile_name = $usersprofile['username'];
              $profile_email = $usersprofile['email'];
              $profile_type = $usersprofile['user_type'];
              $profilegeneder =$usersprofile['gender'];

              if($profile_type == 1){
                  $profile_user_type = "Admin";
              }else{
                  $profile_user_type = "Lecture";
              }
          }?>
          <!-- form start -->
          <form role="form" action="<?php echo base_url('Admin/updateprofile/'.$profile_id); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('successmessage'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
  
            <div class="form-group">

              <div class="form-group" style="text-align: center;">
                <?php if($this->session->userdata('gender') == 1):?>
                      <img src="<?php echo base_url('assets/frontend/img'); ?>/malelecture.png" class="user-image" alt="admin" style="width: 10%; ">
                     <?php else:?>
                       <img src="<?php echo base_url('assets/frontend/img'); ?>/lecturefemale.png" class="user-image" alt="admin" style="width: 10%; ">
                    <?php endif;?>
              </div>

              <div class="form-group">
                <label for="user_name">Your Name</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" required value="<?php echo $profile_name ?>">
              </div>

             <div class="form-group">
                <label for="username">Your Email</label>
                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email" required value="<?php echo $profile_email ?>">
              </div>

              <div class="form-group">
                <label for="username">User Type</label>
                <input type="text" class="form-control" id="usertype" name="user_type" placeholder="Enter User Email" required value="<?php echo $profile_user_type ?>" readonly >
                <input type="hidden" name="hiddemusertype" value="<?php echo $profile_type;?>">
              </div>

              <div class="form-group">
                <label for="banner_title">Password</label>
                <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter User Password (leave it if not want to update password)" disabled>
                <input type="checkbox" id="changePasswordcheckbox" /> change password

              </div>   
              <input type="hidden" name="profilegender" value="<?php echo $profilegeneder; ?>">

              <button type="submit" class="btn btn-primary" id="submituser">Update</button>
               <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
             
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


