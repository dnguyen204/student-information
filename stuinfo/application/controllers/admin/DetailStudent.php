<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
  
    public function index()
    {
        $this->load->model('admin/Student_model', 'stumodel');
        $result = $this->stumodel->getStudentDetail(htmlspecialchars($_GET["code"]));
        
        $data['result'] = $result;
        $data['subview'] = 'admin/detailstudent';
        $this->load->view('admin/main', $data);
    }
}