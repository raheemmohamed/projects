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
           <?php foreach ($londontec_users as $users) {
                $user_id = $users['user_id'];
                $user_name = $users['username'];
                $user_email = $users['email'];
                $user_type=$users['user_type'];
                $gender = $users['gender'];
                $verify_status =$users['verification_status'];
            } ?>
          <form role="form" action="<?php echo base_url('Admin/update_londontec_users/'.$user_id); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="user_name">Name of user</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" value="<?php echo $user_name; ?>" required>
              </div>

             <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email" value="<?php echo $user_email; ?>" required>
              </div>

              <div class="form-group">
                <label>user type</label>
                <select class="form-control" id="usertype" name="usertype" required> 
                  <?php for($x=0; $x<=1; $x++) : ?>
                  <option value="<?php echo $x; ?>" <?php echo ($x == $user_type) ? 'selected' : ''; ?>><?php echo ($x == '1') ? 'Admin' : 'Lectures'; ?></option>
                <?php endfor; ?>

                </select>
              </div> 
              
               <div class="form-group">
                <label> Gender Type</label>
                <select class="form-control" id="gendertype" name="gendertype" required> 
                  <option value="">-Select Gender Type-</option>
                   <?php for($y=1; $y<=2; $y++) : ?>
                  <option value="<?php echo $y; ?>" <?php echo ($y == $gender) ? 'selected' : ''; ?>><?php echo ($y == '1') ? 'Male' : 'Female'; ?></option>
                <?php endfor; ?>

                </select>
              </div>      
              
               <div class="form-group">
                <label for="verify">Manual Verify</label>
                <select class="form-control" id="verify" name="verify"> 
                  <option value="">-Verify User-</option>
                   <?php for($y=0; $y<=1; $y++) : ?>
                  <option value="<?php echo $y; ?>" <?php echo ($y == $verify_status) ? 'selected' : ''; ?>><?php echo ($y == '1') ? 'Verified' : 'Not Verified'; ?></option>
                <?php endfor; ?>

                </select>
              </div>
              

              <div class="form-group">
                <label for="banner_title">Password</label>
                <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter User Password (Leave this if you don't want to change the password)" disabled>
                <input type="checkbox" id="changePasswordcheckbox" /> I want to change the password
              </div>                  
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Update User</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
