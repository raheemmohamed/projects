      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url('admin')?>"><i class="fa fa-dashboard"></i> Londontec LMS dashboard </a>
            </li> 
            <?php if($this->session->userdata('user_type')== 1):?>               
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-user"></i> <span>Manage Users</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="<?php echo base_url('admin/create_londontec_users'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li><a href="<?php echo base_url('admin/all_londontec_users'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li>
             
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Manage Student</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/londontec_students'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li><a href="<?php echo base_url('admin/All_students'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li> 

              <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-education"></i> <span>Manage Courses</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Course
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/add_course_view'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?php echo base_url('admin/all_course_list'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="treeview-menu">
                <li>
                  <a href="#">
                    <i class="fa fa-circle-o"></i> Course Subjects
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('admin/add_course_subject'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                    <li><a href="<?php echo base_url('admin/Course_subjects_list'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-comment"></i> <span>Mange Knowlede share box</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/add_knowledge_share'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li><a href="<?php echo base_url('admin/knowledgeshareviewall'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
                <!--<li><a href="<?php echo base_url('admin/chat_share_knwoledge'); ?>"><i class="fa fa-circle-o"></i> Chat</a></li>-->
              </ul>
            </li>

            <?php endif; ?>

             <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-envelope"></i> <span>Messages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <!--<li><a href="<?php echo base_url('admin/sendmessageIndividual'); ?>"><i class="fa fa-circle-o"></i>Send message</a></li>-->
                 <li><a href="<?php echo base_url('admin/myMessages'); ?>"><i class="fa fa-circle-o"></i> My Message <span class="badge" style="width: 7px; height: 16px; margin-top: 0px; background: green;">&nbsp;</span></a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-book"></i> <span>Instructions</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if($this->session->userdata('user_type')==1): ?>
                <li><a href="<?php echo base_url('admin/view_adding_instruction'); ?>"><i class="fa fa-circle-o"></i> Add Instructions</a></li>
              <?php endif;?>
                <li><a href="<?php echo base_url('admin/view_all_instructions'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-time"></i> <span>Londontec Events</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php if($this->session->userdata('user_type')==1): ?>
                <li><a href="<?php echo base_url('admin/londontec_event'); ?>"><i class="fa fa-circle-o"></i> Add New Event</a></li>
              <?php endif?>
                <li><a href="<?php echo base_url('admin/view_londontec_events'); ?>"><i class="fa fa-circle-o"></i> View All events</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-cloud-upload"></i> <span>Upload Lectures</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/view_upload_lectures'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
                <li><a href="<?php echo base_url('admin/view_upload_lecture_notes'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li>
           
          <?php if($this->session->userdata('user_type')==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Activity Log</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('admin/activity_log'); ?>"><i class="fa fa-circle-o"></i> View Activity Log</a></li>
              </ul>
            </li>
          <?php endif;?>

            </ul>

          </section>
          <!-- /.sidebar -->
        </aside>