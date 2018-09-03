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
          <form role="form" action="<?php echo base_url('Admin/add_instructions_files'); ?>" method="POST" enctype='multipart/form-data' novalidate>
            <div class="box-body">
              <?php echo $this->session->flashdata('successmessage'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="title">Instruction title</label>
                <input type="text" class="form-control" id="instuc_title" name="instuc_title" placeholder="Enter title" required>
              </div>

              <div class="form-group">
                <label for="description">Instruction description</label>
               <textarea class="form-control" name="Description" required></textarea>
              </div>

              <div class="form-group">
                <label>Course Type</label>
                <select class="form-control" id="courses" name="course" required> 
                   <option value="">-Select Course-</option>
                  <?php foreach($courselist as $courses): ?>
                    <?php if(!empty($courses)){?>
                         <option value="<?php echo $courses['course_id']?>"><?php echo $courses['course_title']; ?></option>
                     <?php }else{?>
                         <option>No More course</option> 
                     <?php }?>
                  <?php  endforeach; ?>
                </select>
              </div> 

              <div id="form-group" class="form-group overform-group">
                <label id="control-labeloption1" class="control-label col-sm-2 " for="">Upload files</label>
                <div class="col-sm-2"></div>
                <div class="col-sm-10 ">
                   <input type="file" name="userfile[]" id="image_file" class="form-control form-control2" accept=".png,.jpg,.jpeg,.gif,.zip,.pdf,.ppt,.pptx,.doc,.docx,.gzip,.tar,.rar" multiple>
                   <p class="help-block">Recomanded <strong>pdf/doc/ppt/JPG/JPEG/png </strong>can be uploaded.</p>
                </div>
             </div>       

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submitInstruction">Add Instruction</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
