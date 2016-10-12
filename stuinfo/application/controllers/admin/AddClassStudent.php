<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddClassStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->model('admin/class_model', 'cmodel');
        $this->load->model('admin/student_model', 'smodel');
    }

    public function index()
    {
        $data['lop'] = $this->cmodel->getClassInYear($this->session->userdata['logged_in']['manamhoc']);
        
        $data['subview'] = 'admin/add_class_student';
        $this->load->view('admin/main', $data);
    }

    function getNewStudent()
    {
        echo $this->smodel->getListStudentByStatus(1);
    }

    function getListChiDoan()
    {
        echo $this->cmodel->getChiDoan('select');
    }

    function getStudentInClass()
    {
        $data = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->smodel->getStudentByClass($data);
    }

    function addStudent()
    {
        $data_insert = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaDoanSinh' => $_POST['madoansinh'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        $this->smodel->addStudentToClass($data_insert, $_POST['madoansinh']);
        
        $this->getStudentInClass();
    }
}