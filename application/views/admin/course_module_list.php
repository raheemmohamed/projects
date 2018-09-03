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
             Londontec Course Module List
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" id="system_log">
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 110px;">course name</th>
                <th style="width: 120px;">Course Subjects</th>
                <th style="width: 120px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($course_list as $course):
              ?>
              <?php foreach ($course_subjects as $course_module):?>
                <?php if($course_module['course_id'] == $course['course_id']):?>
                  <?php $course_sub = explode(' ', $course_module['module_subjects']);?>
              <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $course['course_title']; ?></td>
               <td><?php 
                    foreach($course_sub as $subject){
                       echo $subject.'<br>';  
                      }
                  ?></td>
                <td>

                  <a href="" data-module-id="<?php echo $course_module['module_id']; ?>" class="label label-danger moudledelete">
                    <span class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
              </tr> 
                <?php endif; ?>
               <?php endforeach;?>
              <?php endforeach; ?>                                  
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
