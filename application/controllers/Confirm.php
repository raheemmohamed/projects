<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {

	function __construct(){
		parent::__construct();
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

}