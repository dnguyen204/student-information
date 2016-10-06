<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changepass extends CI_Controller
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
        $data['subview'] = 'user/change_pass';
        $this->load->view('admin/main', $data);
    }
}