<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->check_is_validated();
	}

	
	//validate session
	private function check_is_validated(){

		$idletime = 900;//after 60 seconds the user gets logged out

		$londontecstudent =$this->setting_model->Get_All('students');

		foreach($londontecstudent as $student){

			if($this->session->userdata('Gender') == 1 || $this->session->userdata('Gender') == 2){

				if(!$this->session->userdata('validated')){
					redirect('student_login');
				}elseif (time() - $this->session->userdata('timestamp') > $idletime){
				    session_destroy();
				    session_unset();
				    redirect('student_login');
				}else{
				    $this->session->set_userdata('timestamp', time());
				     break;
				}	
			}else{
				
				session_destroy();
				session_unset();
				//$this->session->sess_destroy();
				redirect('student_login');
			}
		}	
	}



	public function template($headerData, $sidebarData, $page, $mainData, $footerData) {
		$this->load->view('student/components/header', $headerData);
		$this->load->view('student/components/sidebar', $sidebarData);
		$this->load->view($page, $mainData);
		$this->load->view('student/components/footer', $footerData);
	}	

	public function index() {
		$headerData = null;
		$sidebarData = null;
		$page = 'student/home';
		$mainData = array(
		   'course' =>$this->setting_model->Get_All_DESCENDING('course', 'course_id'),
		   'course_module_subject' => $this->setting_model->Get_All_DESCENDING('course_module_subject', 'module_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}


	public function login() {

		$this->load->view('login');

	}

	//chat or share with knowledge
	public function chat_share_knwoledge(){

		$headerData = null;
		$sidebarData = null;
		$page = 'student/chat_share_knwoledge';
		$mainData = array(
			'pagetitle'=> 'Chat or Share your knwoledge',
			'knowledge_box'=> $this->setting_model->Get_All('knowledge_box'),
			'knowledge_box_main' => $this->setting_model->Get_All('knowledge_box_main'),
			'student' => $this->setting_model->Get_All('students'),
			'course'=> $this->setting_model->Get_All('course')
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

		redirect('student/chat_share_knwoledge');
	}

	//view Send message individually
	public function sendmessageIndividual(){
		$headerData = null;
		$sidebarData = null;
		$page = 'student/sendmessageindividual';
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
		$page = 'student/sendmessage';
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
                
                $Email_message = '<table>
                                    <tr>
                                    <h3 style="text-align:center; background:red;">Message From Londontec LMS System</h3>
                                    <hr>
                                    </tr>
                                  </table>
                                   <p>Message by : '.$this->session->userdata('student_name').'<br> '.$this->session->userdata('email').'</td> <br>
                                   <p>Send message : '. $message_description .'</td>';
                                
                   


		$sendmessage = array(
			'message_subject' => $this->input->post('message_title'),
			'message_description' => $this->input->post('message_description'),
			'student_id'=> $this->session->userdata('student_id'),
			'user_id'=> $id,
			'message_date'=> date("F j, Y, g:i a"),

			);
                        
                        

		 $from_email = $this->session->userdata('email');
		 $from_name = $this->session->userdata('student_name');
         
         $to_email = $this->input->post('email'); 
         
         $config = array(
			
             'protocol'  => 'smtp',
             'smtp_host' => 'smtp.gmail.com',
             'smtp_port' => '465',
             'smtp_user' =>  $from_email,
             'smtp_pass' => 'password',
             'mailtype'  => 'HTML',
             'wordwrap'=> 'TRUE',
             'newline'   => "\r\n"
     
    
        );
        
        $this->load->library('email', $config);
        $this->email->set_mailtype("html");
   
         $this->email->from($from_email, $from_name); 
         $this->email->to($to_email);
         $this->email->subject($message_title); 
         $this->email->message($Email_message ); 
   
         //Send mail 
        if($this->email->send()) {
        	$this->session->set_flashdata('msg',"<div class='alert alert-success'>".$lecture_email." Message Sent Successfully!</div>");
        	$this->setting_model->insert($sendmessage,'message');
        	redirect('student/sendmessagesview/'.$id);
        }else{
        	$this->session->set_flashdata('msg',"<div class='alert alert-danger'>".$lecture_email." Message Not Send !</div>"); 
        	redirect('student/sendmessagesview/'.$id);
        } 
        
	}

	//view all instructions
	public function view_all_instructions(){

		$headerData = null;
		$sidebarData = null;
		$page = 'student/viewallinstruction';
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
		$page = 'student/instruct_meterial_list';
		$mainData = array(
			'pagetitle' => 'Instruction Meterial',
			'instructionlist' =>$this->setting_model->Get_All('instructions'),
			'instruction_list_images' =>$this->setting_model->Get_All('instruction_image'),
			
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
        
	}

	//view events admin
	public function view_londontec_events(){
		$id = $this->uri->segment(3);
		$headerData = null;
		$sidebarData = null;
		$page = 'student/view_londontec_events';
		$mainData = array(
			'pagetitle' => 'Events List',
		    'events' =>$this->setting_model->Get_All_DESCENDING('londontec_events', 'event_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//uploading lectures to database
	function view_upload_lecture_notes(){

		$headerData = null;
		$sidebarData = null;
		$page = 'student/upload_lectures_meterials';
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
		$page = 'student/view_lectures_meterials';
		$mainData = array(
			'pagetitle'=> 'Lecture uploaded Meterials',
			'courselist' => $this->setting_model->Get_All_DESCENDING('course','course_id'),
			'course_upload_notes' =>$this->setting_model->Get_All_DESCENDING('course_meterials','meterial_id'),
			'course_meterial_upload_list' =>$this->setting_model->Get_All_DESCENDING('course_meterial_upload','meterial_upload_id'),
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	
	}

	//manage profile
	public function profile(){

		$profile_id = $this->uri->segment(3);

		$headerData = null;
		$sidebarData = null;
		$page = 'student/profile';
		$mainData = array(
			'pagetitle'=> 'Manage Profile',	
			'student' => $this->setting_model->Get_Single('students','student_id',$profile_id),
			'course'=>$this->setting_model->Get_All('course')
		);
		$footerData = null;

		$this->template($headerData, $sidebarData, $page, $mainData, $footerData);
	}

	//update profile
	function updateprofile(){
		$profile_id = $this->uri->segment(3);

		$profile_name = $this->input->post('username');
		$profile_NIC = $this->input->post('NIC');
		$profile_register = $this->input->post('register_date');
		$profile_email = $this->input->post('studnet_email');
		$profile_course = $this->input->post('course');
		$profile_password = $this->input->post('student_password');
		$profile_gender = $this->input->post('profilegender');
		$profile_phone =$this->input->post('phone_no');
		$profile_course_id = $this->input->post('course_id');


		$profile = $this->setting_model->Get_Single('students','student_id',$profile_id);

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

				'student_name' => $profile_name,
				'email'  => $profile_email,
				'password' => md5($profile_password),
				'Registered_date' => $profile_register,
				'verification_status' => $verification_status, 
				'Gender' => $profile_gender,
				'NIC' => $profile_NIC,
				'phone' => $profile_phone,
				'course_id' => $profile_course_id

			);

			$this->setting_model->update($londontec_profile_data,'students','student_id',$profile_id);
		}

		else{

			$londontec_profiletdata = array(
			
				'student_name' => $profile_name,
				'email'  => $profile_email,
				'Registered_date' => $profile_register,
				'verification_status' => $verification_status, 
				'Gender' => $profile_gender,
				'NIC' => $profile_NIC,
				'phone' => $profile_phone,
				'course_id' => $profile_course_id
			);

			$this->setting_model->update($londontec_profiletdata,'students','student_id',$profile_id);

		}

		$this->session->set_flashdata('successmessage','<div class="alert alert-success"> Your Profile Updated Successfully!</div>');

		redirect('student/profile/'.$profile_id);

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



}
