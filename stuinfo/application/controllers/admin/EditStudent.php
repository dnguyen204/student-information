<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Student_model', 'stumodel');
    }

    public function index()
    {
        $result = $this->stumodel->getStudentDetail(htmlspecialchars($_GET["code"]));
        
        $data['result_stuinfo'] = $result;
        
        $data['subview'] = 'admin/editstudent';
        $this->load->view('admin/main', $data);
    }

    function UpdateStu()
    {
        $this->stumodel->updateStudent();      
        $this->load->view('resultpage/update_stu_success');
    }
}