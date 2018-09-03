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
             Courses Knowledge chat room list
            </h3>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
          <?php echo $this->session->flashdata('msg'); ?>
            <table class="table table-condensed" >
              <tr style="background: #101010; color:white;">
                <th style="width: 10px;">#</th>
                <th style="width: 110px;">Title</th>
                <th style="width: 120px;">Created date</th>
                 <th style="width: 120px;">Course</th>
                <th style="width: 120px;">Options</th>
              </tr>
              <?php
                $count = 0 + $this->uri->segment(3);
                foreach($course as $courselist):
              ?>
              <?php foreach ($knowledge_box_main as $knowledge_main):?>
                <?php if($knowledge_main['course_id'] == $courselist['course_id']):?>
              <tr>
                <td><?php echo ++$count; ?></td>
                <td><?php echo $knowledge_main['title']; ?></td>
                <td><?php echo $knowledge_main['created_date']; ?></td>
               <td><?php echo $courselist['course_title']; ?></td>
                <td>
                  <a href="" data-knowledgeshare-id="<?php echo $knowledge_main['knowledge_box_main_id']; ?>" class="label label-danger sharelist">
                    <span class="glyphicon glyphicon-trash"></span> Delete</a>
                </td>
              </tr> 
                <?php endif; ?>
               <?php endforeach;?>
              <?php endforeach; ?>                                  
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!--/.col (full) -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
