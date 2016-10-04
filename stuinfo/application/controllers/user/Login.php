<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('user/user_model', 'umodel');
    }

    public function index()
    {
        if ($this->umodel->login()) {
            $user = $_POST['user'];
            $this->umodel->get_user_infor($user);
            
            
        } else {
            $this->load->view('resultpage/login_fail');
        }
    }
}