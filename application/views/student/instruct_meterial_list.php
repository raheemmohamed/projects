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

  .images{
    border: solid #c3c3c3;
    width: 21%;
    height: 169px;
    text-align: center;
     background: url(../../assets/frontend/img/book.jpg);
    background-size: cover;
    //font-size: 217%;
    //line-height: 56px;
    
    font-size: 23px;
    line-height: 159px;
  }

  .images:hover{
     box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);
  }
  
  .demo-card-square > .mdl-card__title {
    color: #fff;
    background: rgba(0, 0, 0, 0.79);
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
          <div class="box-body no-padding" style="padding :29px !important;">
          <?php echo $this->session->flashdata('msg'); ?>
           <div class="row">
           <!-- Square card -->

            <?php $id =$this->uri->segment(3)?>
            <?php foreach($instruction_list_images as $instruction_meterial):?>
            <?php if($instruction_meterial['instruction_id'] == $id):?>
            <img type="hidden" id="largeImage"  onclick="window.open(this.src)"  src="<?php echo base_url('upload/instructions/'); ?>/<?php echo $instruction_meterial['image'];?>" class="images demo-card-square.mdl-card" alt="Click to Download the File" style="width: 23%">
            <?php endif;?> 
          <?php endforeach;?>
       
          </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

  <!-- Material Design Lite -->
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.min.js"></script>
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.2/material.blue-orange.min.css">

