<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('admin/Student_model', 'stumodel');
        $this->load->model('admin/Class_model', 'classmodel');
    }

    public function index()
    {
        if (in_array($this->uri->segments[1] . '/' . $this->uri->segments[2], $this->session->userdata['logged_in']['quyen']) == FALSE) {
            $data['subview'] = 'resultpage/no_permision';
            $this->load->view('admin/main', $data);
        } else {            
            $data['newcode'] = $this->stumodel->createNewCode();
            $data['chidoan'] = $this->classmodel->getChiDoan('');
            $data['doi'] = $this->classmodel->getDoi('');
            $data['lop'] = $this->classmodel->getClassInYear($this->session->userdata['logged_in']['manamhoc']);
            
            $data['subview'] = 'admin/newstudent';
            $this->load->view('admin/main', $data);
        }
    }

    function get_List()
    {
        $this->load->model('admin/TenThanh_model', 'model');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->model->getList($q);
        }
    }

    function addNewStudent()
    {
        $this->stumodel->addNew();        
        $this->load->view('resultpage/new_stu_success');
    }
}
