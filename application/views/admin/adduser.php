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
          <form role="form" action="<?php echo base_url('Admin/insert_londontec_user'); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="user_name">Name of user</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name" required>
              </div>

             <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email" required>
              </div>

              <div class="form-group">
                <label>user type</label>
                <select class="form-control" id="usertype" name="usertype" required> 
                  <option value="">-Select User Type-</option>
                  <option value="1">Admin</option> <!-- user type 1 for admin -->
                  <option value="0">Lectures</option> <!-- user type 0 for lectures -->
                </select>
              </div> 
              
               <div class="form-group">
                <label> Gender Type</label>
                <select class="form-control" id="gendertype" name="gendertype" required> 
                  <option value="">-Select Gender Type-</option>
                  <option value="1">Male</option> <!-- user type 1 Male -->
                  <option value="2">Female</option> <!-- user type 2 Female -->
                </select>
              </div>                                               

              <div class="form-group">
                <label for="banner_title">Password</label>
                <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter User Password" required>
              </div>                  
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Add User</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
