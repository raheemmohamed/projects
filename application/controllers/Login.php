<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* Author: Raheem Mohamed
 * Description: Login controller class
 */
class Login extends CI_Controller {

    public function index($msg = NULL) {
        // Load our view to be displayed
        // to the user
        $data['msg'] = $msg;
        $this->load->view('admin/login',$data);
    }

    public function process() {

        if ($_POST) {

            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            $result = $this->login_model->is_user_exist($data);
           // var_dump($result);
            if (!empty($result)) {

                $verification = $result->verification_status;

                if($verification==1){

                    $data = array(
                        'user_id' => $result->user_id,
                        'username' => $result->username,
                        'user_type' => $result->user_type, // 1-admin 2-Lectures
                        'email'=> $result->email,
                        'gender'=> $result->gender,
                        'validated' => true,
                        'timestamp' => time()
                    ); 

                    $this->session->set_userdata($data);
                   
                    redirect('admin');
                }

                else{
                   $this->session->set_flashdata('msg','<div class="alert alert-warning">Your email & password is not verified<br/>Please check your email for verification mail</div>');
                      redirect('login');
                }
            } 

            else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">Incorrect email or password!</div>');
                 redirect('login');

            }
        }
    
    }

    public function logout() {


        $data = ['username', 'user_id', 'validated'];

        $this->session->unset_userdata($data);
        $this->session->sess_destroy();

        redirect('admin/login');
    }
}