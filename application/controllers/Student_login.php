<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Author: Raheem
 * Description: Login controller class
 */
class Student_login extends CI_Controller {

    public function index($msg = NULL) {
        // Load our view to be displayed
        $data['msg'] = $msg;
        $this->load->view('login',$data);
    }

    public function process() {

        if ($_POST) {

            $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
            );

            $result = $this->slogin_model->is_user_exist($data);
           // var_dump($result);
            if (!empty($result)) {

                $verification = $result->verification_status;

                if($verification==1){

                    $data = array(
                        'student_id' => $result->student_id,
                        'student_name' => $result->student_name,
                        'course_id'=> $result->course_id,
                        'NIC' => $result->NIC, 
                        'email'=>$result->email,
                        'Gender' => $result->Gender,
                        'validated' => true,
                        'timestamp' => time()
                    ); 

                    $this->session->set_userdata($data);
                   
                    redirect('student');
                }

                else{
                   $this->session->set_flashdata('msg','<div class="alert alert-warning">Your email & password is not verified<br/>Please check your email for verification mail</div>');
                      redirect('student_login');
                }
            } 

            else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">Incorrect email or password!</div>');
                 redirect('student_login');

            }
        }
    
    }

    public function logout() {

        $data = ['student_id', 'student_name', 'email', 'validated'];

        $this->session->unset_userdata($data);

        redirect('student_login');
    }
}