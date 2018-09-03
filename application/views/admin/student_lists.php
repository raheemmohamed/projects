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
             Londontec Student list
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" id="userTbl">
              <div class="box-header">
                <h3 class="box-title">
                  <b>Londontec LMS student List</b>
                </h3>
                <div class="">
                  <label class="col-md-offset-9" for="search" style="margin-left: 80%; margin-top: 7px;">Search</label>
                  <div class="form-group pull-right">
                      <input type="text" class="search form-control" placeholder="Search Student details">
                  </div>
                </div>
             </div>
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 120px;">student name</th>
                <th style="width: 120px;">Gender</th>
                <th style="width: 120px;">NIC</th>
                <th style="width: 120px;">Email</th>
                <th style="width: 120px;">Register Date</th>
                <th style="width: 120px;">Course</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 100px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($Allstudents as $student):?>
                <?php foreach($Allcourse as $course):?>
                  <?php if($student['course_id'] == $course['course_id']):?>

                    <tr>
                      <td><?php echo ++$count; ?></td>
                      <td><?php echo $student['student_name']; ?></td>
                      <td><?php echo ($student['Gender'] == 1) ? "Male" : "Female" ?></td>
                      <td><?php echo $student['NIC'];  ?></td>
                      <td><?php echo $student['email']; ?></td>
                      <td><?php echo $student['Registered_date']; ?></td>
                      <td><?php echo $course['course_title']; ?></td>
                            
                     <td><?php echo ($student['verification_status'] == '1') ? '<span class="label label-success">Verified</span>' : '<span class="label label-warning">Not Verified</span>'; ?></td>
                      
                      <td>
                      <a href="<?php echo base_url('admin/editstudent/').$student['student_id']; ?>" class="label label-primary">
                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="" data-student-id="<?php echo $student['student_id']; ?>" class="label label-danger studentdelete">
                          <span class="glyphicon glyphicon-trash"></span> Delete</a>
                      </td>
                    </tr>
                  <?php endif;?>
              <?php endforeach; ?> 
              <?php endforeach; ?>

            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
  <?php echo $show_pagination;?>
</div><!-- /.content-wrapper -->
