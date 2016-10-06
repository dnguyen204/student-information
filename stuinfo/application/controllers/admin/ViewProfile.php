<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewProfile extends CI_Controller
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
        $data['subview'] = 'user/view_profile';
        $data['profile'] = $this->umodel->getProfile($this->session->userdata['logged_in']['username']);
        
        $this->load->view('admin/main', $data);
    }
}