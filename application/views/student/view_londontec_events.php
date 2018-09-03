<style type="text/css">
    .card {
      font-size: 1em;
      overflow: hidden;
      padding: 0;
      border: none;
      border-radius: .28571429rem;
      box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
  }

  .card-block {
      font-size: 1em;
      position: relative;
      margin: 0;
      padding: 1em;
      border: none;
      border-top: 1px solid rgba(34, 36, 38, .1);
      box-shadow: none;
  }

  .card-img-top {
      display: block;
      width: 100%;
      height: auto;
  }

  .card-title {
      font-size: 1.28571429em;
      font-weight: 700;
      line-height: 1.2857em;
  }

  .card-text {
      clear: both;
      margin-top: .5em;
      color: rgba(0, 0, 0, .68);
  }

  .card-footer {
      font-size: 1em;
      position: static;
      top: 0;
      left: 0;
      max-width: 100%;
      padding: .75em 1em;
      color: rgba(0, 0, 0, .4);
      border-top: 1px solid rgba(0, 0, 0, .05) !important;
      background: #fff;
  }

  .card-inverse .btn {
      border: 1px solid rgba(0, 0, 0, .05);
  }

  .profile {
      position: absolute;
      top: -12px;
      display: inline-block;
      overflow: hidden;
      box-sizing: border-box;
      width: 25px;
      height: 25px;
      margin: 0;
      border: 1px solid #fff;
      border-radius: 50%;
  }

  .profile-avatar {
      display: block;
      width: 100%;
      height: auto;
      border-radius: 50%;
  }

  .profile-inline {
      position: relative;
      top: 0;
      display: inline-block;
  }

  .profile-inline ~ .card-title {
      display: inline-block;
      margin-left: 4px;
      vertical-align: top;
  }
</style>
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
             Londontec events
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body">
          <?php echo $this->session->flashdata('msg'); ?>
           <!-- Square card -->
           <?php foreach($events as $londontec_events):?>
              <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title"><?php echo $londontec_events['event_title']; ?></h4>
                        <div class="card-text">
                            <?php echo $londontec_events['event_description'];?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-right"><?php echo $londontec_events['event_date'];?></span>
                    </div>
                    <div style="text-align: center;">
                      <?php if($this->session->userdata('user_type')==1):?>
                       <a href="" data-event-id="<?php echo $londontec_events['event_id']; ?>" class="label label-danger deleteevents" ><span class="glyphicon glyphicon-trash"></span> Delete</a>
                      <?php endif;?>

                    </div>
                </div>
            </div>
          <?php endforeach;?>
                <div style="height: 60px"></div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
