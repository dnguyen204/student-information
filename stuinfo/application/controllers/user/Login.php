<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user/user_model', 'umodel');
    }

    public function index()
    {
        if ($this->umodel->login()) {
            $user = $_POST['user'];
            $manamhoc = $_POST['manamhoc'];
            
            $result = $this->umodel->get_user_infor($user);
            if ($result != false) {
                $session_data = array(
                    'username' => $result[0]->Username,
                    'tenthanh' => $result[0]->TenThanh,
                    'hovadem' =>  $result[0]->HovaDem,
                    'ten' => $result[0]->Ten,
                    'chucvu' => $result[0]->TenQuyen,
                    'manamhoc' => $manamhoc
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);    
                $this->load->view('resultpage/login_success');
            }else{
                $this->load->view('resultpage/login_fail');
            }                        
        } else {
            $this->load->view('resultpage/login_fail');
        }
    }    
}