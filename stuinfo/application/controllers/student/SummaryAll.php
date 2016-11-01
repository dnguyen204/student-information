<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SummaryAll extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/glv_model', 'gmodel');
        $this->load->model('student/summary_model', 'smodel');
    }

    public function index()
    {
        $data_where = array(
            'pc.MaHuynhTruong' => $this->session->userdata['logged_in']['mahuynhtruong'],
            'pc.MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $data['list_class'] = $this->gmodel->getClassOfGLV($data_where);
        
        $data['subview'] = 'student/summary_all';
        $this->load->view('admin/main', $data);
    }

    function getListStudent()
    {
        $data_where = array(
            'dslds.MaLop' => $_POST['malop'],
            'dslds.MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->smodel->getListStudentForSummary($data_where);
    }

    function getListGLV()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->gmodel->getListGLVInClass($data_where);
    }

    function countAbsentOfStudent()
    {
        $option = $_POST['option'];
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'HocKy' => $_POST['hk'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        echo $this->smodel->countAbsent($data_where, $option);
    }

    function getSummaryInHK()
    {
        $hk = $_POST['hk'];
        $data_where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        echo $this->smodel->getSummaryInHKForStudent($data_where, $hk);
    }

    function updateSummary()
    {
        $hk = $_POST['hk'];
        
        $where = array(
            'MaDoanSinh' => $_POST['mads'],
            'MaLop' => $_POST['malop'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        $update = array(
            'HKHK' . $hk => $_POST['hanhkiem'],
            'NhanXetHK' . $hk => $_POST['nhanxet']
        );
        
        $this->smodel->updateSummaryForStudent($update, $where, $hk);
    }
}