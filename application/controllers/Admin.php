<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_isvalidated();
	}

	//validate session
	public function check_isvalidated(){

		$idletime = 900;//after 60 seconds the user gets logged out

		$londontecusers =$this->setting_model->Get_All('londontec_users');

		foreach($londontecusers as $londontec){
			
			if($this->session->userdata('gender') == 1 || $this->session->userdata('gender') == 2){
				if(!$this->session->userdata('validated')){

					redirect('login');

				} elseif (time() - $this->session->userdata('timestamp') > $idletime){
				    session_destroy();
				    session_unset();
				    redirect('login');
				}else{
				    $this->session->set_userdata('timestamp', time());
				    break;
				}	
			}else{
				session_destroy();
				session_unset();
				//$this->session->sess_destroy();
				redirect('login');
				  
			}
			
		}	
	}
	public function template($headerData, $sidebarData, $page, $mainData, $footerData) {
		$this->load->view('admin/components/header', $headerData);
		$this->load->view('admin/components/sidebar', $sidebarData);
		$this->load->view($page, $mainData);
		$this->load->view('admin/components/footer', $footerData);
	}	


	public function index() {
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/index';

		//pagination configuration
		$base_url = $this->config->base_url();

		//setting up the variables for pagination
		$config['base_url'] = $base_url. 'admin/index'; //full path of the pagination controller
		$config['total_rows'] = count($this->setting_model->Get_All('students')) ;//total number of rows
		$config['per_page'] = 10; // per page shown data rate
		
		$config['full_tag_open'] = '<div style="text-align:center;"><ul class="pagination" style="margin: 0; position: absolute; margin-top: -30px;margin-left: -80px;">';
		$config['full_tag_close'] = '</ul></div>';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &gt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		

		//initialize the pagination
		$this->pagination->initialize($config);

		//set limit of the data gathered by db
		$limit = $config['per_page'];

		$offset = $this->uri->segment(3);

		$mainData = array(
			'course' => $this->setting_model->Get_Count('course'),
			'londontec_events' =>$this->setting_model->Get_Count('londontec_events'),
			'londontec_students'=>$this->setting_model->Get_Count('students'),
			'admin' =>$this->setting_model->Get_Count('londontec_users'),
			'courses'=>$this->setting_model->Get_All_DESCENDING('course','course_id'),
			'Allstudents' => $this->setting_model->Get_All_DESCENDING('students','student_id'),
			'show_pagination' => $this->pagination->create_links(),

		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}
	

	public function login() {

		$this->load->view('admin/login');

	}

	// create a new londontec user 
	public function create_londontec_users(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/adduser';
		$mainData = array(
			'pagetitle'=> 'Create Londontec New users',
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}
	//insert new londontec user to the lms
	public function insert_londontec_user(){

		$useremail = $this->input->post('useremail');
		$username = $this->input->post('username');
		$userpassword = $this->input->post('userpassword');

		$insertusers = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('useremail'),
			'password' =>  md5($this->input->post('userpassword')),
			'user_type' => $this->input->post('usertype'),
			'gender'=> $this->input->post('gendertype'),
			//'verification_status' => 0,
		);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new londontec user ".$username; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//


		if($this->setting_model->insert($insertusers,'londontec_users')){
			if($this->setting_model->sendEmail($useremail,$userpassword)){

				$this->session->set_flashdata('msg',"<div class='alert alert-success'> ".$username." Londontec users Added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
				
				redirect('admin/create_londontec_users');
			}
		}else{
			$this->session->set_flashdata('msg',"<div class='alert alert-danger'> ".$username." Londontec New user Not added please check!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
		} 
	}

	//londontec lms admin and lecture email verification
	function confirmEmail($hashcode){
        if($this->setting_model->verifyEmail($hashcode)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
            redirect('login');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not confirmed. Please contact Londontec City Campus Admin.</div>');
            redirect('login');
        }
	}

	// All londontec admin and lecture users list
	public function all_londontec_users(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/viewusers';
		$mainData = array(
			'pagetitle'=> 'londontec LMS users lists',
			'userslist' => $this->setting_model->Get_All('londontec_users'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	// Londontec Add user View page
	public function londontec_students(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_students';
		$mainData = array(
			'pagetitle'=> 'Add Students',
			'courselist'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}
	
	// Add new Student to the LMS
	public function create_students(){

		$student_email = $this->input->post('student_email');
		$student_name = $this->input->post('student_name');
		$student_password = $this->input->post('student_password');

		$insertstudent = array(
			'student_name' => $this->input->post('student_name'),
			'email' => $this->input->post('student_email'),
			'password' =>  md5($this->input->post('student_password')),
			'course_id' => $this->input->post('course'),
			'gender'=> $this->input->post('gendertype'),
			'phone'=>$this->input->post('phone'),
			'NIC'=>$this->input->post('NIC'),
			'Registered_date' =>$this->input->post('date_of_register')
			//'verification_status' => 0,
		);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Student".$student_name ; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		if($this->setting_model->insert($insertstudent,'students')){

			if($this->setting_model->sendEmailstudent($student_email,$student_password)){

				$this->session->set_flashdata('successmessage',"<div class='alert alert-success'> ".$student_name." Londontec Student Added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
				redirect('admin/londontec_students');
			}

			// This is for temperary once upload to server remove the code -- Testing without email-->
			$this->session->set_flashdata('successmessage',"<div class='alert alert-success'> ".$student_name." Londontec Student Added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
			redirect('admin/londontec_students');

		}else{
			$this->session->set_flashdata('successmessage',"<div class='alert alert-danger'> ".$student_name." Londontec student Not added please check!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
		} 

		
	}
	// all student Records
	public function All_students(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/student_lists';
		//pagination configuration
		$base_url = $this->config->base_url();

		//setting up the variables for pagination
		$config['base_url'] = $base_url. 'admin/All_students'; //full path of the pagination controller
		$config['total_rows'] = count($this->setting_model->Get_All('students')) ;//total number of rows
		$config['per_page'] = 10; // per page shown data rate
		
		$config['full_tag_open'] = '<div style="text-align:center;"><ul class="pagination" style="margin: 0; position: absolute; margin-top: -30px;margin-left: -80px;">';
		$config['full_tag_close'] = '</ul></div>';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &gt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		

		//initialize the pagination
		$this->pagination->initialize($config);

		//set limit of the data gathered by db
		$limit = $config['per_page'];

		$offset = $this->uri->segment(3);

		$mainData = array(
			'pagetitle'=> 'Add Students',
			'Allstudents' => $this->setting_model->Get_All_DESCENDING('students','student_id'),
			'Allcourse'=> $this->setting_model->Get_All('course'),
			'show_pagination' => $this->pagination->create_links(), //make array and send to the view
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	// student Email Confirmation with update
	function studnetconfirmEmail($hashcode){
        if($this->setting_model->studentverifyEmail($hashcode)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
            redirect('student_login');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not confirmed. Please contact Londontec City Campus Admin.</div>');
            redirect('student_login');
        }
	}

	//course adding page view
	public function add_course_view(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_course';
		$mainData = array(
			'pagetitle'=> 'Add course',
			'course_list'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//add course with modules
	function add_course(){

		$course_title =$this->input->post('course_title');

		$courses = array(
			'course_title' => $this->input->post('course_title'),
			'course_duration' => $this->input->post('duration'),
			'course_fees'=> $this->input->post('fees'),
			'course_description'=> $this->input->post('course_description'),
		);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Courses ".$course_title ; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		$this->setting_model->insert($courses,'course');

		$this->session->set_flashdata('msg',"<div class='alert alert-success'><strong>". $course_title ."</strong> Added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");

		redirect('admin/add_course_view');
		
	}

	//View Course Details list
	public function all_course_list(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/course_list';
		$mainData = array(
			'pagetitle'=> 'Lodnontec course List',
			'course_list'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//add course module view
	public function add_course_subject(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_course_module';
		$mainData = array(
			'pagetitle'=> 'Add courses Modules (Subjects)',
			'courses_lists'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//add course module to the table
	function create_course_subject(){

		$Input_course_id =$this->input->post('course');

		$course_data =$this->setting_model->Get_All('course');

		foreach ($course_data as $data) {
			if($data['course_id'] == $Input_course_id){
				$course_title =$data['course_title'];
			}
		}
		
		$courses_modules= array(
			'module_subjects' => implode(" ", $this->input->post('myInputs')),
			'course_id' => $this->input->post('course'),
		);	

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Courses subjects for".$course_title; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//


		$this->setting_model->insert($courses_modules,'course_module_subject');

		$this->session->set_flashdata('msg',"<div class='alert alert-success'><strong>". $course_title ."</strong> Course Subjects Added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");

		redirect('admin/add_course_subject');
	}

	//course module list view
	public function Course_subjects_list(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/course_module_list';
		$mainData = array(
			'pagetitle'=> 'Lodnontec course Subject List',
			'course_list'=> $this->setting_model->Get_All('course'),
			'course_subjects' =>$this->setting_model->Get_All('course_module_subject'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//add knowledge share box view
	public function add_knowledge_share(){
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_knowledge_share';
		$mainData = array(
			'pagetitle'=> 'Create Knowledge share Box',
			'courses_lists'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//create knowledge share box view
	public function create_knowledge_share(){

		$Input_course_id =$this->input->post('course');

		$course_data =$this->setting_model->Get_All('course');

		foreach ($course_data as $data) {
			if($data['course_id'] == $Input_course_id){
				$course_title =$data['course_title'];
			}
		}
		
		$knowledge_box_main= array(
			'title' => $this->input->post('knowledge_share_title'),
			'created_date' => date("Y/m/d") ,
			'course_id' => $this->input->post('course'),
		);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Knowledge box for ".$course_title; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		$this->setting_model->insert($knowledge_box_main,'knowledge_box_main');

		$this->session->set_flashdata('msg',"<div class='alert alert-success'><strong>". $course_title ."</strong> course Knwoledge sharing Box created Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");
		redirect('admin/add_knowledge_share');
	}

	//chat or share with knowledge
	public function chat_share_knwoledge(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/chat_share_knwoledge';
		$mainData = array(
			'pagetitle'=> 'Chat or Share your knwoledge',
			'knowledge_box'=> $this->setting_model->Get_All('knowledge_box'),
			'knowledge_box_main' => $this->setting_model->Get_All('knowledge_box_main'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//send chat message
	public function sendknowledgesharechat(){

		$sendmessage = array(
			'message' => $this->input->post('knwoledge_message'),
			'users_id' => $this->session->userdata('student_id'),
			'course_id' => $this->session->userdata('course_id'),
		    'message_date' => date("F j, Y, g:i a"),
		);
		$this->setting_model->insert($sendmessage,'knowledge_box');

		redirect('admin/chat_share_knwoledge');
	}

	//view all knowledge box 
	public function knowledgeshareviewall(){
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/knowledgesharelist';
		$mainData = array(
			'pagetitle'=> 'Courses Knowledge chat room list',
			'knowledge_box'=> $this->setting_model->Get_All('knowledge_box'),
			'knowledge_box_main' => $this->setting_model->Get_All('knowledge_box_main'),
			'course' => $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//view Send message individually
	public function sendmessageIndividual(){
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/sendmessageindividual';
		$mainData = array(
			'pagetitle'=> 'Londontec Lectures',
			'course' => $this->setting_model->Get_All('course'),
			'londontec' => $this->setting_model->Get_All('londontec_users'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//Send message individually
	public function sendmessagesview(){

		$id = $this->uri->segment(3);
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/sendmessage';
		$mainData = array(
			'pagetitle' => 'Send message',
			'londontec' => $this->setting_model->Get_Single('londontec_users','user_id',$id),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//inserting a message and sending 
	function sendmessage(){
	     //Load email library 
        $this->load->library('email'); 

		$id = $this->uri->segment(3);

		$lecture_email =$this->input->post('email');
		$lecture_name =$this->input->post('lecture_name');
		$message_title =$this->input->post('message_title');
		$message_description =$this->input->post('message_description');

		$sendmessage = array(
			'message_subject' => $this->input->post('message_title'),
			'message_description' => $this->input->post('message_description'),
			'student_id'=> $this->session->userdata('student_id'),
			'user_id'=> $id,
			'message_date'=> date("F j, Y, g:i a"),

			);

		 $from_email = $lecture_email; 
         $to_email = $this->input->post('email'); 
   
         $this->email->from($from_email, $lecture_name); 
         $this->email->to($to_email);
         $this->email->subject($message_title); 
         $this->email->message($message_description); 
   
         //Send mail 
        if($this->email->send()) {
        	$this->session->set_flashdata('msg',"<div class='alert alert-success'>".$lecture_email." Message Sent Successfully!</div>");
        	$this->setting_model->insert($sendmessage,'message');
        	redirect('admin/sendmessagesview/'.$id);
        }else{
        	$this->session->set_flashdata('msg',"<div class='alert alert-danger'>".$lecture_email." Message Not Send !</div>"); 
        	redirect('admin/sendmessagesview/'.$id);
        } 
        
	}

	//view my sent messages
	public function MyMessages(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/myMessage';
		$mainData = array(
			'pagetitle'=> 'Messages',
			'londontec' => $this->setting_model->Get_All('londontec_users'),
			'student' => $this->setting_model->Get_All('students'),
			'message' => $this->setting_model->Get_All_DESCENDING('message','message_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//view of adding instruction
	public function view_adding_instruction(){
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_instructions';
		$mainData = array(
			'pagetitle'=> 'Add Instructions',
			'courselist' => $this->setting_model->Get_All('course'),

		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//add instructions
	public function add_instructions_files(){

		$instruct_title =$this->input->post('instuc_title');
		$inputdata= array(
			'Instruc_title' => $this->input->post('instuc_title'),
			'description' => $this->input->post('Description'),
			'course_id' => $this->input->post('course'),
		);

		$files = $_FILES;
		$path = "instructions"; //file path name
		$fileName = $this->setting_model->multi_image_upload($files,$path);
	
		$this->setting_model->add_instruction($inputdata,$fileName);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Instructions ".$instruct_title; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		//once update it will be shown the message
		$this->session->set_flashdata('successmessage', '<div class="alert alert-success">Instructions Added Successfully!</div>');
		redirect('admin/view_adding_instruction');
	}
	//view all instructions
	public function view_all_instructions(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/viewallinstruction';
		$mainData = array(
			'pagetitle'=> 'Instructions',
			'courselist' => $this->setting_model->Get_All('course'),
			'instructionlist' =>$this->setting_model->Get_All('instructions'),
			'instruction_list_images' =>$this->setting_model->Get_All('instruction_image'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//instruct meterial list
	function instruction_meterials(){
	 
		$id = $this->uri->segment(3);
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/instruct_meterial_list';
		$mainData = array(
			'pagetitle' => 'Instruction Meterial',
			'instructionlist' =>$this->setting_model->Get_All('instructions'),
			'instruction_list_images' =>$this->setting_model->Get_All('instruction_image'),
			
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
        
	}

	//view londontec event creating
	public function londontec_event(){
	 
		$id = $this->uri->segment(3);
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/add_londontec_event';
		$mainData = array(
			'pagetitle' => 'Create londotec event',
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
        
	}

	//create event function
	function create_events(){
	 
		$event_title =$this->input->post('event_title');

		$event = array(
			'event_title' => $this->input->post('event_title'),
			'event_date' => $this->input->post('event_date'),
			'event_description'=> $this->input->post('event_description'),
		);


		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Add new Events ".$event_title; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		$this->setting_model->insert($event,'londontec_events');

		$this->session->set_flashdata('msg',"<div class='alert alert-success'><strong>". $event_title ."</strong> Event added Successfully!</div><style>.table>tbody>tr:nth-child(2){ background:#d9ff66; }</style>");

		redirect('admin/londontec_event');
        
	}

	//view events admin
	public function view_londontec_events(){
		$id = $this->uri->segment(3);
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/view_londontec_events';
		$mainData = array(
			'pagetitle' => 'Events List',
		    'events' =>$this->setting_model->Get_All_DESCENDING('londontec_events', 'event_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//view of uploading lectures
	public function view_upload_lectures(){
		$headerData = null;
		$sidebarData = null;
		$page = 'admin/upload_lectures';
		$mainData = array(
			'pagetitle'=> 'Upload course lectures',
			'courselist' => $this->setting_model->Get_All('course'),


		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//uploading lectures to database
	function add_upload_lectures(){

		$meterial_title =$this->input->post('meterial_title');
		$meterial_video_url = $this->input->post('inputfields');
		$upload_lecture_data= array(
			'meterial_title' => $this->input->post('meterial_title'),
			'meterial_description' => $this->input->post('meterial_description'),
			'course_id' => $this->input->post('course'),
			'meterial_year'=>date("Y"),
			'upload_date'=> date("F j, Y, g:i a"),
		);

		$files = $_FILES;
		$path = "course_meterials"; //file path name
		$fileName = $this->setting_model->multi_meterial_upload($files,$path);
	
		$this->setting_model->add_course_meterial($upload_lecture_data,$fileName);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "Lecture Meterials ".$meterial_title." Uploaded"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//

		//once update it will be shown the message
		$this->session->set_flashdata('successmessage', '<div class="alert alert-success">Course Meterial upload Successfully!</div>');

		redirect('admin/view_upload_lectures');
	
	}

	//uploading lectures to database
	function view_upload_lecture_notes(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/upload_lectures_meterials';
		$mainData = array(
			'pagetitle'=> 'Lecture Upload Meterials',
			'courselist' => $this->setting_model->Get_All('course'),
			'course_upload_notes' =>$this->setting_model->Get_All('course_meterials'),
			'course_meterial_upload_list' =>$this->setting_model->Get_All('course_meterial_upload'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	
	}

	//view lecture course upload meterails
	public function course_meterial_items(){
		$meterial_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/view_lectures_meterials';
		$mainData = array(
			'pagetitle'=> 'Lecture uploaded Meterials',
			'courselist' => $this->setting_model->Get_All_DESCENDING('course','course_id'),
			'course_upload_notes' =>$this->setting_model->Get_All_DESCENDING('course_meterials','meterial_id'),
			'course_meterial_upload_list' =>$this->setting_model->Get_All_DESCENDING('course_meterial_upload','meterial_upload_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	
	}

	public function activity_log(){

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/activity_log';

		//pagination configuration
		$base_url = $this->config->base_url();

		//setting up the variables for pagination
		$config['base_url'] = $base_url. 'admin/activity_log'; //full path of the pagination controller
		$config['total_rows'] = count($this->setting_model->Get_All('activity_log')) ;//total number of rows
		$config['per_page'] = 10; // per page shown data rate
		
		$config['full_tag_open'] = '<div style="text-align:center;"><ul class="pagination" style="margin: 0; position: absolute; margin-top: -30px;margin-left: -80px;">';
		$config['full_tag_close'] = '</ul></div>';
		$config['prev_link'] = '&lt;';
		$config['first_link'] = '&lt; First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last &gt;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="#" class="current">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';		

		//initialize the pagination
		$this->pagination->initialize($config);

		//set limit of the data gathered by db
		$limit = $config['per_page'];

		$offset = $this->uri->segment(3);


		$mainData = array(
			'pagetitle'=> 'Londontec LMS Activity Logs',
			'activity_log' => $this->setting_model->Get_All_DESCENDING('activity_log','activity_log_id'),
			'londontec_users' =>$this->setting_model->Get_All_DESCENDING('londontec_users','user_id'),
			'show_pagination' => $this->pagination->create_links(), //make array and send to the view
			
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	/*==========================This LMS All  Delete Function Start Here =================*/

	//delete user from database
	function deleteuser(){

		$id = $this->input->post('id');

		$this->setting_model->delete('londontec_users','user_id',$id);
	
	}
	//delete londontec student
	function deletestudent(){

		$student_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('students','student_id',$student_id);
	}

	// delete courses with the course subjects
	function course_delete(){

		$id = $this->input->post('id');
		$field = $this->input->post('field');
		$table = $this->input->post('table');
	
		if($this->setting_model->deleteData($table, $field, $id)) {
			$this->setting_model->delete('course_module_subject','course_id',$id);
			return true;
		} else {
			return false;
		}
	}

	//delete Course Module subjects
	function deletecouse_subjects(){

		$course_Module_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('course_module_subject','module_id',$course_Module_id);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "One of course deleted"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//
	}

	//delete Knwoledge share 
	function deleteknowledgesharelist(){

		$knwoledgeshared = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('knowledge_box_main','knowledge_box_main_id',$knwoledgeshared);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "One knowledge share box deleted"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//
	}

	//delete messages recieved
	function deleteMessage(){
		$message_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('message','message_id',$message_id);
	}

	//delete messages recieved
	function deleteInstructions(){
		$Instruction_id = $this->uri->segment(3);
		// $message_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('instructions','instruct_id',$Instruction_id);
		$this->setting_model->delete('instruction_image', 'instruction_id', $Instruction_id);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "One Instruction deleted"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//
		
		$this->session->set_flashdata('msg','<div class="alert alert-success">Instructions Deleted Successfully!</div>');
		redirect('admin/view_all_instructions');
	}

	//delete Londontec events
	function deleteLondontecevents(){

		$event_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('londontec_events','event_id',$event_id);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "One Event deleted"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//
	}


	//delete Upload lecture meterials
	function deleteLectureuploads(){
		$meterial_id = $this->uri->segment(3);
		// $message_id = $this->input->post('id'); // this input post came on custom js

		$this->setting_model->delete('course_meterials','meterial_id',$meterial_id);
		$this->setting_model->delete('course_meterial_upload', 'meterial_id', $meterial_id);

		//================= Activity Log Monitoring==========================//
            $activity_log_activity = "One Lecture uploaded deleted"; 

            $activitylogs = array( 
                'activity_log_activity' =>$activity_log_activity, 
                'activity_date'=>  date('Y-m-d h:i:s:a') ,
                'user_id'=> $this->session->userdata('user_id')
            ); 

            $this->setting_model->insert($activitylogs , 'activity_log');

        //==================== Activity Log Monitoring End=====================//
		
		$this->session->set_flashdata('msg','<div class="alert alert-success">Instructions Deleted Successfully!</div>');
		redirect('admin/view_upload_lecture_notes');
	}


	/*==========================This LMS All Functions Delete Function End Here ====================*/

	/*========================== This LMS Edit and Update Function start Here ======================*/

	//edit Londontec Users
	public function edituser(){
		$id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/edit_londontec_users';
		$mainData = array(
			'pagetitle' => 'Edit Londontec users',
			'londontec_users' => $this->setting_model->Get_Single('londontec_users','user_id',$id)
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//Update Londontec users
	public function update_londontec_users(){
		$id = $this->uri->segment(3);

		$user_name = $this->input->post('username');
		$user_email = $this->input->post('useremail');
		$user_password = $this->input->post('userpassword');
		$user_type = $this->input->post('usertype'); //1-admin 0-editor
		$gender = $this->input->post('gendertype');
                $manual_verify = $this->input->post('verify');

		$userlist = $this->setting_model->Get_Single('londontec_users','user_id',$id);

		foreach($userlist as $users){
			$old_email = $users['email'];
			$is_verified = $users['verification_status'];
		}

		if($old_email==$user_email && $is_verified==1){
			$verification_status = 1;
		}

		else{
			$verification_status = 0;
		}

		if(!empty($user_password )){

			$londontec_user_data = array(
				'username' => $user_name,
				'email' => $user_email,
				'password' => md5($user_password),
				'user_type' => $user_type, // 1-admin , 0-editor
				'gender'=>$gender,
				'verification_status' => $manual_verify
			);

			$this->setting_model->update($londontec_user_data,'londontec_users','user_id',$id);
		}

		else{

			$londontec_userdata = array(
				'username' => $user_name,
				'email' => $user_email,
				'user_type' => $user_type, // 0-admin , 1-editor
				'gender' => $gender,
				'verification_status' => $manual_verify
			);

			$this->setting_model->update($londontec_userdata,'londontec_users','user_id',$id);

		}

		$this->session->set_flashdata('msg','<div class="alert alert-success">'.$user_name .' User Updated Successfully!</div>');

		redirect('admin/edituser/'.$id);
	}

	//edit Londontec Students
	public function editstudent(){
		$student_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/edit_londontec_student';
		$mainData = array(
			'pagetitle' => 'Edit Londontec Student',
			'students' => $this->setting_model->Get_Single('students','student_id',$student_id),
			'courselist'=> $this->setting_model->Get_All('course'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//Update Londontec students
	public function update_londontec_students(){
		$student_id = $this->uri->segment(3);

		$student_name = $this->input->post('student_name');
		$email = $this->input->post('student_email');
		$student_password = $this->input->post('student_password');
		$register_date = $this->input->post('date_of_register'); 
		$gender = $this->input->post('gendertype');
		$NIC = $this->input->post('NIC');
		$phone = $this->input->post('phone');
		$course = $this->input->post('course');
		$manual_verify = $this->input->post('verify');


		$student_list = $this->setting_model->Get_Single('students','student_id',$student_id);

		foreach($student_list as $students){
			$old_email = $students['email'];
			$is_verified = $students['verification_status'];
		}

		if($old_email==$email && $is_verified==1){
			$verification_status = 1;
		}

		else{
			$verification_status = 0;
		}

		if(!empty($student_password )){

			$londontec_student_data = array(
				'student_name' => $student_name,
				'email' => $email,
				'password' => md5($student_password),
				'Gender'=>$gender,
				'Registered_date'=> $register_date,
				'NIC'=> $NIC ,
				'phone' => $phone, 
				'course_id' => $course, 
				'verification_status' => $manual_verify,
			);

			$this->setting_model->update($londontec_student_data,'students','student_id',$student_id);
		}

		else{

			$londontec_studentdata = array(
				'student_name' => $student_name,
				'email' => $email,
				'Gender'=>$gender,
				'Registered_date'=> $register_date,
				'NIC'=> $NIC ,
				'phone' => $phone, 
				'course_id' => $course, 
				'verification_status' => $manual_verify,
			);

			$this->setting_model->update($londontec_studentdata,'students','student_id',$student_id);

		}

		$this->session->set_flashdata('successmessage','<div class="alert alert-success">'.$student_name .' student Updated Successfully!</div>');

		redirect('admin/editstudent/'.$student_id);
	}

	//edit Londontec Students
	public function editCourse(){
		$course_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/edit_londontec_course';
		$mainData = array(
			'pagetitle' => 'Edit Londontec course',
			'course' => $this->setting_model->Get_Single('course','course_id',$course_id),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	// updated londontec courses
	function update_londontec_course(){

		$course_id = $this->uri->segment(3);
		$course_title = $this->input->post('course_title');
		$londontec_course_data = array(
				'course_title' => $this->input->post('course_title'),
				'course_duration' => $this->input->post('duration'),
				'course_fees' => $this->input->post('fees'),
				'course_description'=>$this->input->post('course_description'),
				
		);

		$this->setting_model->update($londontec_course_data,'course','course_id',$course_id);

		$this->session->set_flashdata('msg','<div class="alert alert-success">'.$course_title .' Course Updated Successfully!</div>');

		redirect('admin/editCourse/'.$course_id);
	}


	/*========================== This LMS Edit and Update Function End Here ========================*/

	//Reply Message
	public function ReplyMessages(){

		$message_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/reply_message';
		$mainData = array(
			'pagetitle'=> 'Reply Message',
			'student' => $this->setting_model->Get_All('students'),
			'londontec_users' => $this->setting_model->Get_All('londontec_users'),
			'messages' => $this->setting_model->Get_Single('message','message_id',$message_id)
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//reply message sending to gmail
	function replymessage(){

		$message_id = $this->uri->segment(3);

		$reply_by =$this->input->post('londontec_users_email');
		$reply_user = $this->input->post('londontec_usersname');
		$send_to = $this->input->post('student_email');
		$send_message_title = $this->input->post('message_title');
		$send_email_description = $this->input->post('message_description');
                
                $senderEmail =$this->session->userdata('email');
                $senderUsername = $this->session->userdata('username');
                
                $message = '<table>
                            <tr>
                            <h3 style="text-align:center">Message From Londontec LMS System</h3>
                            <hr>
                            </tr>
                            </table>
                            <p>Message by : '.$this->session->userdata('username').'<br> '.$this->session->userdata('email').'</td> <br>
                            <p>Send message : '. $send_email_description .'</td>';

		//SMTP & mail configuration
		$config = array(
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com', 
			'smtp_port' => '465',
			'smtp_user' =>  $senderEmail,
			'smtp_pass' => 'password',
			'mailtype'  => 'HTML',
			'charset'   => 'utf-8',
                        'newline'   => "\r\n"
		);
	
		$this->load->library('email',$config);
                $this->email->set_mailtype("html");

		$this->email->from($senderEmail, $senderUsername);
		$this->email->to($send_to);
		$this->email->subject($send_message_title);
		$this->email->message($message);

		if($this->email->send()){
			$this->session->set_flashdata('msg','<div class="alert alert-success">'.$send_to .' email sent successfully!</div>');
			redirect('admin/ReplyMessages/'.$message_id);
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">'.$send_to .' email Not sent!</div>');
			redirect('admin/ReplyMessages/'.$message_id);
		}
	}

	//manage profile
	public function profile(){

		$profile_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'admin/profile';
		$mainData = array(
			'pagetitle'=> 'Manage Profile',	
			'londontec_users' => $this->setting_model->Get_Single('londontec_users','user_id',$profile_id)
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//update profile
	function updateprofile(){
		$profile_id = $this->uri->segment(3);

		$profile_name = $this->input->post('username');
		$profile_email = $this->input->post('useremail');
		$profile_type = $this->input->post('hiddemusertype');
		$profile_password = $this->input->post('userpassword');
		$profile_gender = $this->input->post('profilegender');


		$profile = $this->setting_model->Get_Single('londontec_users','user_id',$profile_id);

		foreach($profile as $user_profile){
			$old_email = $user_profile['email'];
			$is_verified = $user_profile['verification_status'];
		}

		if($old_email==$profile_email && $is_verified==1){
			$verification_status = 1;
		}

		else{
			$verification_status = 0;
		}

		if(!empty($profile_password)){

			$londontec_profile_data = array(

				'username' => $profile_name,
				'email' => $profile_email,
				'password' => md5($profile_password),
				'user_type' => $profile_type, // 1-admin , 0-lecture
				'gender'=>$profile_gender,
				'verification_status' => $verification_status
			);

			$this->setting_model->update($londontec_profile_data,'londontec_users','user_id',$profile_id);
		}

		else{

			$londontec_profiletdata = array(
				'username' => $profile_name,
				'email' => $profile_email,
				'user_type' => $profile_type, // 0-admin , 1-editor
				'gender' => $profile_gender,
				'verification_status' => $verification_status
			);

			$this->setting_model->update($londontec_profiletdata,'londontec_users','user_id',$profile_id);

		}

		$this->session->set_flashdata('successmessage','<div class="alert alert-success"> Your Profile Updated Successfully!</div>');

		redirect('admin/profile/'.$profile_id);

	}


}