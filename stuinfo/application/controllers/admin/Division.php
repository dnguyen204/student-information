<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Division extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/class_model', 'cmodel');
    }

    public function index()
    {
        $data['class_list'] = $this->cmodel->getClassInYear($this->session->userdata['logged_in']['manamhoc']);
        
        $data['subview'] = 'admin/division';
        $this->load->view('admin/main', $data);
    }

    function getPeopleInClass()
    {
        $manamhoc = $this->session->userdata['logged_in']['manamhoc'];
        $malop = $_POST['malop'];
        print_r($malop);
        die;
        $this->load->model('admin/glv_model', 'glvmodel');
        $result = $this->glvmodel->getGLVInClass($malop, $manamhoc);
        print_r($result);
        die;
    }
}