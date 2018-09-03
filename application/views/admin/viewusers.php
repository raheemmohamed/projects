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
             Londontec LMS user lists
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" id="system_log">
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 120px;">Name</th>
                <th style="width: 120px;">Gender</th>
                <th style="width: 120px;">user type</th>
                <th style="width: 120px;">Email</th>
                <th style="width: 60px;">Status</th>
                <th style="width: 100px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($userslist as $lmsusers) {
              ?>
              <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $lmsusers['username']; ?></td>
                <td><?php echo ($lmsusers['gender'] == 1) ? "Male" : "Female" ?></td>
               <td><?php 
                    if($lmsusers['user_type'] == 1){
                        echo "Londontec Admin";
                    }else{
                      echo "lecture";
                    }
                ?>
                 
               </td>
                <td><?php echo $lmsusers['email']; ?></td>
                <td><?php echo ($lmsusers['verification_status'] == '1') ? '<span class="label label-success">Verified</span>' : '<span class="label label-warning">Not Verified</span>'; ?></td>
               
                <td>
                <a href="<?php echo base_url('admin/edituser/').$lmsusers['user_id']; ?>" class="label label-primary">
                  <span class="glyphicon glyphicon-edit"></span> Edit</a>
                  <a href="" data-londontecuser-id="<?php echo $lmsusers['user_id']; ?>" class="label label-danger londontecuser">
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
