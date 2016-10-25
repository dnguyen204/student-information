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

    function getAbsentHoc()
    {}

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
}