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
            Message List
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed">
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 200px;">Message title</th>
                <th style="width: 300px;">Message </th>
                <th style="width: 120px;">Message date</th>
                <th style="width: 120px;">Student name</th>
                <th style="width: 100px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($message as $messages): ?>
                <?php foreach ($londontec as $londontecusers):?>
                  <?php if($messages['user_id']== $this->session->userdata['user_id']):?>
                  <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $messages['message_subject']; ?></td>
                    <td><?php echo $messages['message_description'];?></td>
                    <td><?php echo $messages['message_date'];?></td>
                    <?php foreach($student as $studentlist):?>
                       <?php if($messages['student_id']== $studentlist['student_id']):?>
                     <td>
                        <?php echo $studentlist['student_name']; break; ?>
                      </td>
                    
                       <?php endif;?>
                       
                     
                    <?php  endforeach; ?>
                    <td>
                     <a href="<?php echo base_url('admin/ReplyMessages/').$messages['message_id']; ?>" class="label label-primary"><span class="glyphicon glyphicon-share"></span> Reply message</a>

                      <a href="" data-messagelist-id="<?php echo $messages['message_id']; ?>" class="label label-danger deletemessagelist">
                        <span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </td>
                  </tr> 
                <?php endif; break;?>
            <?php  endforeach; ?>
              <?php endforeach; ?>                                  
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
