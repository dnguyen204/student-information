<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Division extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/class_model', 'cmodel');
        $this->load->model('admin/glv_model', 'glvmodel');
    }

    public function index()
    {
        $data['class_list'] = $this->cmodel->getClassInYear($this->session->userdata['logged_in']['manamhoc']);
        $data['role'] = $this->glvmodel->getRole();
        $data['chidoan'] = $this->cmodel->getChiDoan();
        
        $data['subview'] = 'admin/division';
        $this->load->view('admin/main', $data);
    }
    
    // Get all GLV in Class
    function getPeopleInClass()
    {
        $manamhoc = $this->session->userdata['logged_in']['manamhoc'];
        $malop = $_POST['malop'];
        
        $result = $this->glvmodel->getGLVInClass($malop, $manamhoc);
        echo $result;
    }
    // Get list Cấp Bậc
    function getListGLVByRole()
    {
        $roleid = $_POST['maquyen'];
        
        $result = $this->glvmodel->getGLVByRole($roleid);
        echo $result;
    }
    // Add new GLV to Class
    function addGLVToClass()
    {
        $data = array(
            'MaLop' => $_POST['malop'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaHuynhTruong' => $_POST['mahuynhtruong']
        );
        
        $this->glvmodel->addGLVToClass($data, $_POST['mahuynhtruong']);
        
        $result = $this->glvmodel->getGLVInClass($_POST['malop'], $this->session->userdata['logged_in']['manamhoc']);
        echo $result;
    }
    // Remove Glv from Class
    function removeGLVFromClass()
    {
        $data = array(
            'MaLop' => $_POST['malop'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
            'MaHuynhTruong' => $_POST['mahuynhtruong']
        );
        
        $this->glvmodel->removeGLV($data);
        
        $this->getPeopleInClass($_POST['malop']);
    }
}