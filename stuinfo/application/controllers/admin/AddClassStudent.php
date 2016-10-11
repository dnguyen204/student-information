<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddClassStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('admin/student_model', 'smodel');
    }

    public function index()
    {
        $data['list_new_stu'] = $this->smodel->getListStudentByStatus(1);
        
        $data['subview'] = 'admin/add_class_student';
        $this->load->view('admin/main', $data);
    }
    
    
}