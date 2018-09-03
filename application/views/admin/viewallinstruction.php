<style type="text/css">
    .demo-card-square.mdl-card {
    width: 301px;
    height: 320px;
    float: left;
    margin: 1rem;
    position: relative;
  }
  
  .demo-card-square.mdl-card:hover {
    box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
  }
  
  .demo-card-square > .mdl-card__title {
    color: #fff;
    /*background: rgba(0, 0, 0, 0.79);*/
    /*background: url(https://media.npr.org/assets/img/2015/11/18/book-awards-istock_wide-a4a7c12ac40b55e1ca11447536309bdee14841ac.jpg?s=1400);*/
    background: url(../assets/frontend/img/book.jpg);
    color: black;
    background-size: cover;
  }
  
  .demo-card-square > .mdl-card__accent {
    background: #ff9800;
  }
  .mdl-card__actions {
    font-size: 16px;
    line-height: normal;
    width: 100%;
    background-color: transparent;
    padding: 8px;
    box-sizing: border-box;
    text-align: center;
  }
  .mdl-button--accent.mdl-button--accent {
    color: rgb(41, 39, 36) !important;
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
             Instructions
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
           <!-- Square card -->
           <?php foreach($instructionlist as $instructure):?>
            <?php foreach($courselist as $courses):?>
              <?php foreach($instruction_list_images as $instruction_meterial):?>
                <?php if($instructure['course_id']== $courses['course_id']):?> <!-- this course will comming session with studen -->
                <div class="mdl-card mdl-shadow--2dp demo-card-square">
                  <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><?php echo $instructure['Instruc_title']; ?></h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                    <?php echo $instructure['description']; ?>
                    <hr>
                    <p><?php echo '<strong>Instruction for </strong><b>'.$courses['course_title'].'</b>'?></p>
                  </div>
                  <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url('admin/instruction_meterials/').$instructure['instruct_id']; ?>" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" >
                        Open
                      </a>
                      <?php if($this->session->userdata('user_type')== 1):?>
                      <a href="<?php echo base_url('admin/deleteInstructions/').$instructure['instruct_id']; ?>" class="mdl-button mdl-button--accent mdl-js-button mdl-js-ripple-effect" >
                        Delete
                      </a>
                    <?php endif;?>
                  </div>
                </div>
               

                 <?php endif;  break;?>
              <?php endforeach;?>
            <?php endforeach;?>
          <?php endforeach;?>
  
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

  <!-- Material Design Lite -->
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue-orange.min.css">

