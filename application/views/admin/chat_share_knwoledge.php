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
          <form role="form" action="<?php echo base_url('Admin/sendknowledgesharechat'); ?>" method="POST" enctype='multipart/form-data'>
            <div class="box-body">
              <?php echo $this->session->flashdata('msg'); ?>
              <?php echo validation_errors('<p style="color: rgb(243, 103, 103)">', '</p>'); ?>
              
            <div class="form-group" id="chater">
              <div class="chat-box" id="chat-box">
                <div>
                <?php foreach($knowledge_box_main as $main_Message_box):?>
                  <?php foreach($knowledge_box as $message_box):?>
                     <?php $messagetime = $message_box['message_date']; ?>
                    <?php if($message_box['course_id'] == $main_Message_box['course_id']):?>
                       <?php if($message_box['users_id']== $this->session->userdata('student_id')):?>
                      <div class="container darker">
                      <img src="<?php echo base_url('assets/admin/dist/img/'); ?>avatar3.png" alt="Avatar" class="right">
                      <p style="text-align: right;"><?php echo $message_box['message']; ?></p>
                      <span class="time-right"><?php echo $messagetime; ?></span>
                    </div>
                        
                  <?php else:?>
                
                     <div class="container">
                        <img src="<?php echo base_url('assets/admin/dist/img/'); ?>avatar.png" alt="Avatar">
                        <p><?php echo $message_box['message']; ?></p>
                        <span class="time-right"><?php echo $messagetime; ?></span>
                      </div>
                  <?php endif?>

                    <?php endif;?>
                  <?php endforeach;?>
                  <?php endforeach;?>
                 </div>
              </div>
          </div>
            
            <div class="form-group">
              <div class="form-group">
                <label for="knwoledge_message">Chat</label>
                <textarea class="form-control" name="knwoledge_message" id="knwoledge_message"></textarea>
              </div>  
              <button type="submit" class="btn btn-primary" id="submituser">Send</button>
            </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              <a class="btn btn-default" href="<?php echo base_url('admin');?>">Cancel</a>
            </div>
            <div style="clear: right;"></div>
          </form>
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- page auto refresh div -->
<script language="javascript" type="text/javascript">

var timeout = setTimeout(reloadChat, 7000);
var baseurl = 'http://www.londonteclms.tk/londontec/';
function reloadChat () {
  $('#chater').load(baseurl + 'admin/chat_share_knwoledge #chater',function () {
          //$(this).unwrap();
        var elem = document.getElementById('chat-box');
        elem.scrollTop = elem.scrollHeight;
        timeout = setTimeout(reloadChat, 7000);
  });
}

</script>

