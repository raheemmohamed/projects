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
            LMS Activity Logs
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" id="userTbl">
              <div class="box-header">
                <h3 class="box-title">
                  <b>LMS System Generated Activity Logs</b>
                </h3>
                <div class="">
                  <label class="col-md-offset-9" for="search" style="margin-left: 80%; margin-top: 7px;">Search</label>
                  <div class="form-group pull-right">
                      <input type="text" class="search form-control" placeholder="Search system users">
                  </div>
                </div>
             </div>
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 120px;">Activity Name</th>
                <th style="width: 120px;">Activity Date</th>
                <th style="width: 60px;">User</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($activity_log as $activity):?>
                <?php foreach($londontec_users as $users):?>
                  <?php if($activity['user_id'] == $users['user_id']):?>

                    <tr>
                    <!--   <td><?php //echo ++$count; ?></td> -->
                      <td><?php echo $activity['activity_log_id'];?></td>
                      <td><?php echo $activity['activity_log_activity']; ?></td>
                      <td><?php echo $activity['activity_date'];  ?></td>
                      <td><?php echo $users['username']; ?></td>
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
