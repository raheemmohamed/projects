<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lodontec LMS Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Londontec LMS Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Total Admin & Lectures</strong></span>
            <span class="info-box-number"><?php echo $admin; ?></small></span>
          <br><br>
          </div><!-- /.info-box-content -->
          <?php if($this->session->userdata('user_type')==1):?>
          <a href=<?php echo base_url(); ?>admin/all_londontec_users>
                <div class='panel-footer' >
                    <span class='pull-left'><strong>View Details</strong></span>
                   <span class='pull-right'><i class='glyphicon glyphicon-arrow-right'></i></span>
                   <div class='clearfix'></div>
                </div>
            </a>
          <?php endif;?>
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-education"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Londontec Courses</strong></span>
            <span class="info-box-number"><?php echo $course; ?></span>
            <br><br>
          </div><!-- /.info-box-content -->
          <?php if($this->session->userdata('user_type')==1):?>
          <a href=<?php echo base_url(); ?>admin/all_course_list>
                <div class='panel-footer' >
                    <span class='pull-left'><strong>View Details</strong></span>
                   <span class='pull-right'><i class='glyphicon glyphicon-arrow-right'></i></span>
                   <div class='clearfix'></div>
                </div>
            </a>
          <?php endif;?>
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-time"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Londontec Events</strong></span>
            <span class="info-box-number"><?php echo $londontec_events; ?></span>
            <br><br>
          </div><!-- /.info-box-content -->
          <?php if($this->session->userdata('user_type')==1):?>
          <a href=<?php echo base_url(); ?>admin/view_londontec_events>
                <div class='panel-footer' >
                    <span class='pull-left'><strong>View Details</strong></span>
                   <span class='pull-right'><i class='glyphicon glyphicon-arrow-right'></i></span>
                   <div class='clearfix'></div>
                </div>
            </a>
          <?php endif;?>
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Londontec Students</strong></span>
            <span class="info-box-number">
            <?php  echo $londontec_students;  ?>
           </span>
           <br><br>
          </div><!-- /.info-box-content -->
          <?php if($this->session->userdata('user_type')==1):?>
          <a href=<?php echo base_url(); ?>admin/All_students>
                <div class='panel-footer' >
                    <span class='pull-left'><strong>View Details</strong></span>
                   <span class='pull-right'><i class='glyphicon glyphicon-arrow-right'></i></span>
                   <div class='clearfix'></div>
                </div>
            </a>
          <?php endif;?>
        </div><!-- /.info-box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <div class="col-md-12">
        
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Recently Registered Students</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr style="text-align: center;">
                    <th>#</th>
                    <th>Student name</th>
                    <th>Student Email</th>
                    <th>Courses</th>
                    <th>Register Date & Time</th>
                    <th>Verify Status</th>
                  </tr>
                </thead>
            <?php $count = 1; ?>
             <?php foreach ($courses as $course):?>
              <?php foreach($Allstudents as $Students):?>
                <?php if($Students['course_id'] == $course['course_id']):?>
                  <tbody>
                  <tr>
                    <td><a><?php echo  $count++; ?></a></td>
                    <td  width="10%"><?php  echo  $Students['student_name']; ?></span></td>
                    <td><?php echo $Students['email']; ?></td>
                    <td><?php echo $course['course_title']; ?></td>
                    <td><?php echo $Students['Registered_date']; ?></td>
                     <td><?php echo ($Students['verification_status'] == '1') ? '<span class="label label-success">Verified</span>' : '<span class="label label-warning">Not Verified</span>'; ?></td>
                  </tr>
                  </tbody>
                  <?php endif;?>
                <?php endforeach;?>
              <?php endforeach;?> 
          
             
              </table>

            </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
          </div><!-- /.box-footer -->
            <!-- <div style="margin-top: 10px;">
              <?php echo $show_pagination; ?>
            </div> -->
        </div><!-- /.box -->

      </div><!-- /.col -->
      <?php echo $show_pagination; ?>
    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
 