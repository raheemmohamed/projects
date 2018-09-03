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
          <!-- form start -->
          <form role="form" action="<?php echo base_url('Admin/create_course_subject'); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label> Course Type</label>
                <select class="form-control" id="courses" name="course" required> 
                   <option value="">-Select Course-</option>
                  <?php foreach($courses_lists as $courses): ?>
                    <?php if(!empty($courses)){?>
                         <option value="<?php echo $courses['course_id']?>"><?php echo $courses['course_title']; ?></option>
                     <?php }else{?>
                         <option>No More course</option> 
                     <?php }?>
                  <?php  endforeach; ?>
                </select>
              </div> 

             <div class="form-group col-md-5">
              <label for="course_description" style="margin-left: -13px;">Course Modules</label>
              <div class="row">
                <div id="dynamicInput" class="form-group">
                   Course Module 1<input class="form-control" type="text" name="myInputs[]">
                </div>
                <div class="form-group" >
                   <input type="button" class="btn btn-default" value="Add more field ++" onClick="addInput('dynamicInput');" >
                </div>
              </div>
              </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Add Course Subjects</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
