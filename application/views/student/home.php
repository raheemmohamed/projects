<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Lodontec LMS Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Londontec LMS Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

  <!-- CALENDER SECTION START HERE-->
  <div class="row">
  <div class="col-md-12">
     <div class="box box-dark" style="background: #e4e2e2;">
      <div class="col-md-9">
<?php 
  $hour  = date('H');
  if ($hour >= 20) {
      $greetings = "You still not sleep?";
  } elseif ($hour > 17) {
     $greetings = "Good Evening";
  } elseif ($hour > 11) {
      $greetings = "Good Afternoon";
  } elseif ($hour < 12) {
     $greetings = "Good Morning";
  }
  

 ?>     <h1 style="text-align: center; font-weight: bold;">Hello</h1>
        <h3 style="text-align: center; font-weight: bold;"><?php echo $greetings;?> <span style="font-style: italic;color: #a2405a;"><?php echo $this->session->userdata('student_name');?></span> </h3>
        
      </div>
      <div class="col-md-offset-9">
       <table id="calendar">
            <tr id="monthrow">
                <th colspan="7">
                    <button id="prev" onclick="prevMonth()">&#10094;</button>
                    <span id="month"></span>
                    <button id="next" onclick="nextMonth()">&#10095;</button>
                </th>
            </tr>
            <tr class="daysoftheweek">
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </table>
      </div>
   </div>
</div>
</div>

  <!-- CALENDER SECTION END HERE-->


  
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <div class="col-md-12">
        
        <div class="box box-dark">
          <div class="box-header with-border" style="background: grey;color: white;">
            <h3 class="box-title">Your Course Subject Table</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body" style="background: #fff ;color: black;">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr style="text-align: center;">
                    <th>#</th>
                    <th>Your Course</th>
                    <th>Course Modules</th>
                  </tr>
                </thead>
               <tbody>
             <?php $count = 1; ?>
             <?php foreach ($course as $courses):?>
              <?php foreach ($course_module_subject as $module):?>
                <?php if($courses['course_id'] == $module['course_id']):?>
                    <?php  $course_title =$courses['course_title']; ?>
                  <?php if($module['course_id'] == $this->session->userdata('course_id')):?>
                    <?php 
                      $explodemodule =$module['module_subjects'];
                      $modules = explode(' ',$explodemodule);
                    ?>
              
                      <?php 
                       // echo '<tbody>';
                        foreach($modules as $row){

                            echo '<tr>';
                            $row = explode(' ',$row);
                            foreach($row as $cell){
                                echo '<td>';
                                echo $count++;;
                                echo '</td>';

                                echo '<td>';
                                echo  $course_title;
                                echo '</td>';

                                echo '<td>';
                                echo $cell;
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                        //echo '</tbody>';

                      ?>
                <?php endif;?>
                <?php endif; ?>
                <?php endforeach; ?>
              <?php endforeach;?> 
              </tbody>
             
              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->


      <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <div class="col-md-12">
        
        <div class="box box-dark">
          <div class="box-header with-border" >
            <h3 class="box-title">Londontec Other Courses Details</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr style="text-align: center;">
                    <th>#</th>
                    <th>Course Title</th>
                    <th>Duration</th>
                    <th>Course description</th>
                    <th>Course Fees</th>
                  </tr>
                </thead>

              <?php $count = 1; ?>
             <?php foreach ($course as $course):?>
                  <tbody>
                  <tr>
                    <td><a><?php echo  $count++; ?></a></td>
                    <td><?php echo $course['course_title']; ?></td>
                    <td><?php echo $course['course_duration']; ?></td>
                    <td><?php echo $course['course_description']; ?></td>
                    <td><?php echo $course['course_fees']; ?></td>
                  </tr>
                  </tbody>
              <?php endforeach;?> 
             
              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->

    </div><!-- /.row -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


