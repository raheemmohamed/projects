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
        <!-- table box -->
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
             Londontec LMS Course List
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" id="system_log">
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 120px;">course name</th>
                <th style="width: 120px;">course duration</th>
                <th style="width: 120px;">course fees</th>
                <th style="width: 100px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($course_list as $course) {
              ?>
              <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $course['course_title']; ?></td>
                <td><?php echo $course['course_duration'];?></td>
               <td><?php echo $course['course_fees']; ?></td>
                <td>
                <a href="<?php echo base_url('admin/editCourse/').$course['course_id']; ?>" class="label label-primary">
                  <span class="glyphicon glyphicon-edit"></span> Edit</a>
                  <a href="" data-course-id="<?php echo $course['course_id']; ?>" class="label label-danger londonteccourse" >
                    <span class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
              </tr> 
              <?php } ?>                                  
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
