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
          <form role="form" action="<?php echo base_url('Admin/create_knowledge_share'); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
              <div class="form-group">
                <label for="knowledge_share_title">Knowledge Title</label>
                <input type="text" class="form-control" id="knowledge_share_title" name="knowledge_share_title" placeholder="Enter Knwoledge Title" required>
              </div>

              <div class="form-group">
                <label> Share knowledge box Course</label>
                <select class="form-control" id="courses" name="course" required> 
                   <option value="">-Select Share knoledge Course-</option>
                  <?php foreach($courses_lists as $courses): ?>
                    <?php if(!empty($courses)){?>
                         <option value="<?php echo $courses['course_id']?>"><?php echo $courses['course_title']; ?></option>
                     <?php }else{?>
                         <option>No More course</option> 
                     <?php }?>
                  <?php  endforeach; ?>
                </select>
              </div> 

            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="submituser">Create Knowledge Share</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
