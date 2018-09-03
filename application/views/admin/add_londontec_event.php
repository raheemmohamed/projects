<style>
  /* Chat containers */
.container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    width: 100% !important;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #ddd;
}

/* Clear floats */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #aaa;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
}
.chat-box{
  height:500px !important;
  width:100%;
  border:1px solid #ccc;
  font:16px/26px Georgia, Garamond, Serif;
  overflow: scroll;
}

body{
  background-color: #000 !important;
}


</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" >
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
      <div class="col-md-offset-1 col-md-10">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $pagetitle; ?></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="<?php echo base_url('Admin/create_events'); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
            
            <div class="form-group col-md-12">
              <div class="row">
              <div class="form-group col-md-7 ">
                <label for="event_title">Event Title</label>
                <input type="text" class="form-control" name="event_title" id="event_title" placeholder="Enter event title" required>
              </div>  
              <div class="form-group col-md-5 ">
                <label for="dateofevent">Event date</label>
                 <input type='text' class="form-control" name="event_date" id='datepicker1' value='<?php echo date('m/d/Y');?>'/>
              </div>
            </div>

              <div class="form-group ">
                <label for="event_description">Event descritpion</label>
                <textarea class="form-control" name="event_description" id="event_description"></textarea>
              </div>  

               <button type="submit" class="btn btn-primary" id="AddEvent">Add Event</button>
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

