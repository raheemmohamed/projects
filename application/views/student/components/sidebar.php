      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="<?php echo base_url('student')?>"><i class="fa fa-dashboard"></i> Londontec LMS dashboard </a>
            </li> 
            
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-comment"></i> <span> Knowlede share box</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('student/chat_share_knwoledge'); ?>"><i class="fa fa-circle-o"></i>Chat Box</a></li>
              </ul>
            </li>

             <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-envelope"></i> <span>Messages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('student/sendmessageIndividual'); ?>"><i class="fa fa-circle-o"></i>Send message</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-book"></i> <span>Instructions</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('student/view_all_instructions'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-time"></i> <span>Londontec Events</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('student/view_londontec_events'); ?>"><i class="fa fa-circle-o"></i> View All events</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-cloud-upload"></i> <span>Lectures Notes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('student/view_upload_lecture_notes'); ?>"><i class="fa fa-circle-o"></i> View All</a></li>
              </ul>
            </li>
          

            </ul>

          </section>
          <!-- /.sidebar -->
        </aside>