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

          <?php foreach($student as $students){
               $profile_id = $students['student_id'];
               $profile_name = $students['student_name'];
              $profile_gender = $students['Gender'];
              $profile_register = $students['Registered_date'];
              $profile_email = $students['email'];
              $profileNIC =$students['NIC'];
              $profilephone =$students['phone'];
              $profilecourse_id =$students['course_id'];
          }?>


          <!-- form start -->
          <form role="form" action="<?php echo base_url('student/updateprofile/'.$profile_id); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('successmessage'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
  
            <div class="form-group">

              <div class="form-group" style="text-align: center;">
                <?php if($this->session->userdata('Gender') == 1):?>
                      <img src="<?php echo base_url('assets/frontend/img'); ?>/malestudent.png" class="user-image" alt="male student" style="width: 10%; ">
                     <?php else:?>
                       <img src="<?php echo base_url('assets/frontend/img'); ?>/femalestudent.png" class="user-image" alt="female student" style="width: 10%; ">
                    <?php endif;?>
              </div>
              <div class="row">
                <div class="form-group col-md-4">
                  <label for="user_name">Your Name</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" required value="<?php echo $profile_name ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                  <label for="NIC">NIC</label>
                  <input type="text" class="form-control" id="NIC" name="NIC" placeholder="Enter User Name" required value="<?php echo $profileNIC ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                  <label for="register">Registered date</label>
                  <input type="text" class="form-control" id="register" name="register_date" required value="<?php echo $profile_register ?>" readonly>
                </div>
             </div>

             <div class="row">
               <div class="form-group col-md-6">
                  <label for="username">Your Email</label>
                  <input type="email" class="form-control" id="studnet_email" name="studnet_email" placeholder="Your Email" required value="<?php echo $profile_email ?>" readonly>
                </div>

                <div class="form-group col-md-4">
                    <label for="phone_no">Phone No</label>
                    <input type="text" class="form-control" id="phone_no" name="phone_no" required value="<?php echo $profilephone ?>" readonly>
                </div>
              </div>

              <div class="form-group">
                <label for="course">Registered Course</label>
                <?php foreach($course as $courses):?>
                  <?php if($courses['course_id'] == $this->session->userdata('course_id')):?>
                     <?php $course_title =$courses['course_title']; ?>
                   <input type="text" class="form-control" id="course" name="course" placeholder="Enter User Name" required value="<?php echo $course_title ?>" readonly>
                   <?php endif;?>
                <?php endforeach;?>
              </div>

              

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="student_password" name="student_password" placeholder="Enter Password (Leave this if you don't want to change the password)" disabled>

                <input type="checkbox" id="changePasswordcheckbox" /> change the password
              </div>  

              <input type="hidden" name="profilegender" value="<?php echo $profile_gender; ?>">
              <input type="hidden" name="course_id" value="<?php echo $profilecourse_id; ?>">

              <button type="submit" class="btn btn-primary" id="submituser">Update</button>
               <a class="btn btn-default" href="<?php echo base_url('student');?>">Cancel</a>
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


