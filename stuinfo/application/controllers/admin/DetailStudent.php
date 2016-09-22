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
        $result_process = $this->stumodel->getStudentProcess(htmlspecialchars($_GET["code"]));
        
        $data['result_stuinfo'] = $result;
        $data['result_process'] = $result_process;
        $data['subview'] = 'admin/detailstudent';
        $this->load->view('admin/main', $data);
    }
}