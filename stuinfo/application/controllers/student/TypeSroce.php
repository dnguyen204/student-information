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

    function addSroce()
    {
        $hk = $_POST['hk'];
        $data_update = array(
            'MiengHK' . $hk => $_POST['diem_mieng'],
            'KT15PhutHK' . $hk => $_POST['diem_15phut'],
            'KT1TietHK' . $hk => $_POST['diem_1tiet'],
            'KTHK' . $hk => $_POST['diem_hocki'],
            'TBHK' . $hk => $_POST['diem_tb']
        );
        
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        $this->smodel->addSroceForStudent($data_where, $data_update, $hk);
    }
}