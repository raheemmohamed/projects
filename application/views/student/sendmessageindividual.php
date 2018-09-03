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
            <h3 class="box-title"><?php //echo $pagetitle; ?></h3>
          </div><!-- /.box-header -->
            <!--Section: Team v.1-->
            <section class="section team-section pb-5">
              <!--Section heading-->
              <!-- Grid row -->

              <div class="row text-center">
                <h3><b>Londontec Admin</b></h3>
                <hr>
                  <!-- Grid column -->

               <?php foreach($londontec as $londontecusers):?>
                      <?php if($londontecusers['user_type'] == 1 ):?>
                  <div class="col-lg-3 col-md-6 mb-r">
                   
                      <div class="card card-body">
                        <?php if($londontecusers['gender']==1):?>
                          <div class="avatar mt-3">
                              <img src="<?php echo base_url('assets/frontend/img/adminmale.png');?>" class="rounded-circle" alt="First sample avatar image" style="width: 50%;height: 50%;">
                          </div>
                        <?php else: ?>
                          <div class="avatar mt-3">
                              <img src="<?php echo base_url('assets/frontend/img/adminfemale.png');?>" class="rounded-circle" alt="First sample avatar image" style="width: 50%;height: 50%;">
                          </div>
                          <?php endif; ?>
                          <h5 class="font-bold">
                              <strong><?php echo $londontecusers['username']; ?></strong>
                          </h5>
                          <p class="grey-text">Londontec Admin</p>
                            <p class="grey-email"><?php echo $londontecusers['email']; ?></p>

                          <ul class="list-unstyled">
                               <a href="<?php echo base_url('student/sendmessagesview/').$londontecusers['user_id']; ?>" class="label label-default"><span class="glyphicon glyphicon-envelope"></span> Send Message</a>
                          </ul>
                      </div>
                  
                  </div>
                  <!-- Grid column -->
                   <?php endif;?>
                  <?php endforeach;?>
              </div>
               <br><br>
          

              <div class="row text-center">
                <h3><b>Londontec Lectures</b></h3>
                  <hr>
                   <?php foreach($londontec as $londontecusers):?>
                      <?php if($londontecusers['user_type'] == 0 ):?>
                        <div class="col-lg-3 col-md-6 mb-r">
                          <div style="height: 20px;"></div>
                              <div class="card card-body">
                                <?php if($londontecusers['gender']==1):?>
                                  <div class="avatar mt-3">
                                      <img src="<?php echo base_url('assets/frontend/img/malelecture.png');?>" class="rounded-circle" alt="First sample avatar image" style="width: 50%;height: 50%;">
                                  </div>
                                <?php else: ?>
                                  <div class="avatar mt-3">
                                      <img src="<?php echo base_url('assets/frontend/img/lecturefemale.png');?>" class="rounded-circle" alt="First sample avatar image" style="width: 50%;height: 50%;">
                                  </div>
                                  <?php endif; ?>
                                  <h5 class="font-bold">
                                      <strong><?php echo $londontecusers['username']; ?></strong>
                                  </h5>
                                  <p class="grey-text">Lecture</p>
                                   <p class="grey-email"><?php echo $londontecusers['email']; ?></p>
                                  <ul class="list-unstyled">
                                        <a href="<?php echo base_url('student/sendmessagesview/').$londontecusers['user_id']; ?>" class="label label-default"><span class="glyphicon glyphicon-envelope"></span> Send Message</a>
                                  </ul>
                              </div>
                          </div>
                      <?php endif;?>
                  <?php endforeach;?>
                    </div>
                    <br>
              <!-- Grid row -->
          </section>
          <!--Section: Team v.1-->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
