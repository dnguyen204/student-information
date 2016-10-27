<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckAbsent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/glv_model', 'gmodel');
        $this->load->model('student/absent_model', 'amodel');
    }

    public function index()
    {
        $data_where = array(
            'pc.MaHuynhTruong' => $this->session->userdata['logged_in']['mahuynhtruong'],
            'pc.MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $data['list_class'] = $this->gmodel->getClassOfGLV($data_where);
        
        $data['subview'] = 'student/check_absent';
        $this->load->view('admin/main', $data);
    }

    function getListForCheckAbsent()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->amodel->getListStudentForCheckAbsent($data_where);
    }

    function getAbsentHoc()
    {
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'HocKy' => $_POST['hk'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        echo $this->amodel->getAbsentForHoc($data_where);
    }

    function getAbsentLe()
    {
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'HocKy' => $_POST['hk'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        echo $this->amodel->getAbsentForLe($data_where);
    }

    function addAbsent()
    {
        $btn = $_POST['btn-select'];
        $data_insert = array(
            'MaDoanSinh' => $_POST['mads'],
            'NgayN' . $btn => date('Y-m-d', strtotime($_POST['absentDate'])),
            'MaLop' => $_POST['malop'],
            'HocKy' => $_POST['hk'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
            'CPKP' => $_POST['absentType'],
            'GhiChu' => $_POST['absentReason']
        );
        $this->amodel->addAbsentForStudent($data_insert, $btn);
    }

    function deleteAbsent()
    {
        $type = $_POST['type'];
        
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'HocKy' => $_POST['hk'],
            'MaNamHoc' => $_POST['manamhoc'],
            'CPKP' => $_POST['cpkp']
        );
        $this->amodel->deleteAbsent($data_where, $type);        
    }
}