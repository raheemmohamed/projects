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
       foreach ($londontec as $londontecuser) {
         $londontec_user_id = $londontecuser['user_id'];
         $londontec_user_email = $londontecuser['email'];
         $londontec_user_username = $londontecuser['username'];
       } ?>
      
          <form role="form" action="<?php echo base_url('admin/sendmessage/'.$londontec_user_id); ?>" method="POST" enctype='multipart/form-data' novalidate>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>

              <div class="row">
                <div class="form-group col-md-4" style="margin-left: 14px;">
                  <label for="lecture">Lecture name</label>
                    <input type="text" class="form-control" id="lecture" name="lecture_name" value="<?php echo $londontec_user_username; ?>" readonly />
                </div>

                <div class="form-group col-md-3">
                  <label for="email">Lecture Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $londontec_user_email; ?>" readonly />
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
