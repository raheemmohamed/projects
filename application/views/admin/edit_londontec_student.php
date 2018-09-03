<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $pagetitle; ?></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <?php foreach($students as $student){

               $student_id = $student['student_id'];
               $student_name = $student['student_name'];
               $gender_type = $student['Gender'];
               $register_date = $student['Registered_date'];
               $email = $student['email'];
               $NIC = $student['NIC'];
               $phone = $student['phone'];
               $course_id = $student['course_id'];
               $verify_status =$student['verification_status'];

          }?>
          <form role="form" action="<?php echo base_url('Admin/update_londontec_students/'.$student_id); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('successmessage'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="user_name">student name</label>
                <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter Student Name" value="<?php echo  $student_name; ?>" required>
              </div>

              <div class="form-group">
                <label for="NIC">NIC (National ID card)</label>
                <input type="text" class="form-control" id="NIC" name="NIC" placeholder="Enter NIC ex: XXXXXXXXX X" required value="<?php echo  $NIC; ?>" >
              </div>  

              <div class="row">
                <div class="form-group col-md-7">
                  <label for="Phone">Phone No</label>
                  <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo  $phone; ?>" required>
                </div> 

                <div class="form-group col-md-5" >
                    <label for="date">Register date</label>
                    <input type='text' class="form-control" name="date_of_register" id='datepicker1' value='<?php echo $register_date;?>'/>
                </div>
              </div>

              <div class="form-group">
                <label> Gender Type</label>
                <select class="form-control" id="gendertype" name="gendertype" required> 
                  <option value="">-Select Gender Type-</option>
                   <?php for($y=1; $y<=2; $y++) : ?>
                  <option value="<?php echo $y; ?>" <?php echo ($y == $gender_type) ? 'selected' : ''; ?>><?php echo ($y == '1') ? 'Male' : 'Female'; ?></option>
                <?php endfor; ?>

                </select>
              </div>           

              <div class="form-group">
                <label> Course Type</label>
                <select class="form-control" id="courses" name="course" required> 
                   <option value="">-Select Course-</option>
                  <?php foreach($courselist as $courses): ?>
                    <?php if(!empty($courses)){?>
                         <option value="<?php echo $courses['course_id']?>" <?php echo ($courses['course_id'] == $course_id) ? 'selected' : ''; ?>><?php echo $courses['course_title']; ?></option>
                     <?php }else{?>
                         <option>No More course</option> 
                     <?php }?>
                  <?php  endforeach; ?>
                </select>
                
              </div>         

             <div class="form-group">
                <label for="username">student Email</label>
                <input type="email" class="form-control" id="student_email" name="student_email" placeholder="Enter student Email" value="<?php echo  $email; ?>" required>
              </div>

              <div class="form-group">
                <label for="verify">Manual Verify</label>
                <select class="form-control" id="verify" name="verify"> 
                  <option value="">-Verify student-</option>
                   <?php for($y=0; $y<=1; $y++) : ?>
                  <option value="<?php echo $y; ?>" <?php echo ($y == $verify_status) ? 'selected' : ''; ?>><?php echo ($y == '1') ? 'Verified' : 'Not Verified'; ?></option>
                <?php endfor; ?>

                </select>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="student_password" name="student_password" placeholder="Enter Password (Leave this if you don't want to change the password)" disabled>

                <input type="checkbox" id="changePasswordcheckbox" /> I want to change the password
              </div>  

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Update Student</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
