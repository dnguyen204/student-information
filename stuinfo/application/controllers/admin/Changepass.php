<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changepass extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');        
        $this->load->model('user/user_model', 'umodel');
    }

    public function index()
    {
        $data['subview'] = 'user/change_pass';
        $this->load->view('admin/main', $data);
    }
    
    function checkPass(){
        $us = $this->session->userdata['logged_in']['username'];
        $mk = md5($_POST['mk']);
        echo $this->umodel->getPassByUser($us, $mk);
    }
    
    function updatePass(){
        $us = $this->session->userdata['logged_in']['username'];
        $mk = md5($_POST['mk']);
        $this->umodel->updatePassByUser($us, $mk);
    }
    
}