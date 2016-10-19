<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Student_model', 'stumodel');
        $this->load->model('admin/Sroce_model', 'smodel');
        $this->load->model('admin/glv_model', 'glvmodel');
    }

    public function index()
    {
        $result = $this->stumodel->getStudentDetail(htmlspecialchars($_GET["code"]));
        $result_process = $this->stumodel->getStudentProcess(htmlspecialchars($_GET["code"]));
        $result_hk1 = $this->smodel->getAllSroceHKIStudent(htmlspecialchars($_GET["code"]), '');
        $result_hk2 = $this->smodel->getAllSroceHKIIStudent(htmlspecialchars($_GET["code"]), '');
        $result_cn = $this->smodel->getAllSroceCaNamStudent(htmlspecialchars($_GET["code"]));
        $result_glv = $this->glvmodel->getGLVFromClass(htmlspecialchars($_GET["code"]));
        
        $data['result_stuinfo'] = $result;
        $data['result_process'] = $result_process;
        $data['hk1'] = $result_hk1;
        $data['hk2'] = $result_hk2;
        $data['canam'] = $result_cn;
        $data['glv'] = $result_glv;
        $data['subview'] = 'admin/detailstudent';
        
        $this->load->view('admin/main', $data);
    }
}