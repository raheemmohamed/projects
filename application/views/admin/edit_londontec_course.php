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

  <script type="text/javascript">
    
  </script>

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
          <?php foreach($course as $courses){

             $course_id = $courses['course_id'];
             $course_title = $courses['course_title'];
             $course_duration = $courses['course_duration']; 
             $course_fees = $courses['course_fees'];
             $course_description = $courses['course_description'];

          } ?>
          <!-- form start -->
          <form role="form" action="<?php echo base_url('Admin/update_londontec_course/'.$course_id); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="course_title">Course title</label>
                <input type="text" class="form-control" id="course_title" name="course_title" placeholder="Enter course Name"  value="<?php echo $course_title ?>" required>
              </div>

              <div class="form-group">
                <label>Course duration</label>
                <select class="form-control" id="duration" name="duration" required> 
                  <option value="">-Select Course Duration-</option>
                  <option value="1 Month">1 Month</option> 
                  <option value="2 Month">2 Month</option> 
                  <option value="3 Month">3 Month</option> 
                  <option value="4 Month">4 Month</option> 
                  <option value="6 Month">6 Month</option> 
                  <option value="7 Month">7 Month</option> 
                  <option value="8 Month">8 Month</option> 
                  <option value="12 Month">12 Month</option> 
                  <option value="16 Month">16 Month</option> 
                  <option value="24 Month">24 Month</option> 
                </select>
              </div> 

              <div class="form-group">
                <label for="fees">Course Fees</label>
                <input type="currency" class="form-control" id="fees" name="fees" placeholder="Enter Fees"  value="<?php echo $course_fees ?>" required>
              </div> 

              <div class="form-group">
                <label for="course_description">Course description</label>
                <textarea class="form-control" name="course_description" id="course_description" ><?php echo $course_description; ?></textarea>
              </div>  

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Update Course</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
