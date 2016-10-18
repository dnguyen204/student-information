<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TypeSroce extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/glv_model', 'gmodel');
        $this->load->model('admin/sroce_model', 'smodel');
    }

    public function index()
    {
        $data_where = array(
            'pc.MaHuynhTruong' => $this->session->userdata['logged_in']['mahuynhtruong'],
            'pc.MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $data['list_class'] = $this->gmodel->getClassOfGLV($data_where);
        
        $data['subview'] = 'student/typesroce';
        $this->load->view('admin/main', $data);
    }

    function getListStudent()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->smodel->getListStudentForTypeSroce($data_where);
    }

    function getListGLV()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->gmodel->getListGLVInClass($data_where);
    }

    function getSroce()
    {
        $hk = $_POST['hk'];
        $malop = $_POST['malop'];
        $mads = $_POST['mads'];
        
        if ($hk == 1) {
            print_r($this->smodel->getAllSroceHKIStudent($mads, $malop));
        } elseif ($hk == 2) {}
    }
}