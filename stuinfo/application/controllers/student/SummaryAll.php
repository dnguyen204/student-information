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
        $mode = 1;
        $data_where = array(
            'dslds.MaLop' => $_POST['malop'],
            'dslds.MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->smodel->getSummaryAll($data_where, $mode);
    }

    function getListGLV()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan']
        );
        
        echo $this->gmodel->getListGLVInClass($data_where);
    }
    
    
}