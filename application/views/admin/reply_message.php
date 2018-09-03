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
       <?php
       foreach ($messages as $message) {
        foreach ($londontec_users as $londontec_user){
             if($message['user_id'] == $londontec_user['user_id']){
                  $londontec_users_email = $londontec_user['email'];
                   $londontec_usersname = $londontec_user['username'];
                   $message_id=$message['message_id'];
             }
        }break;
      } ?>
      
          <form role="form" action="<?php echo base_url('admin/replymessage/'.$message_id); ?>" method="POST" enctype='multipart/form-data' novalidate>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>

              <div class="row">

                <input type="hidden" name="londontec_user_email" value="<?php echo $londontec_users_email; ?>">
                <input type="hidden" name="londontec_username" value="<?php echo $londontec_usersname; ?>">  
                
                <div class="form-group col-md-3" style="margin-left: 14px;">
                  <label for="email">Student Email</label>

                  <?php foreach($messages as $mess):?>
                    <?php foreach ($student as $students):?>
                      <?php if($mess['student_id'] == $students['student_id']):?>
                    <input type="text" class="form-control" id="email" name="student_email" value="<?php echo $students['email']; ?>" readonly />
                      <?php endif; ?>
                   <?php endforeach;?>
                  <?php endforeach; ?>
                </div>

                <div class="form-group col-md-4">
                  <label for="message_title">Message title</label>
                  <input type="text" class="form-control" id="message_title" name="message_title" placeholder="Enter Message title" required />
                </div>

              </div>

                <div class="form-group col-md-12">
                   <label for="message_description">Message description</label>
                  <textarea type="text" class="form-control"  name="message_description" required></textarea>
                </div>                 
              <div class="box-footer">
              <button type="submit" class="btn btn-primary submit">Send Message</button>
              <a class="btn btn-default" href="<?php echo base_url('admin'); ?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
