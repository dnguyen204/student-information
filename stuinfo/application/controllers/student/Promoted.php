<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promoted extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('student/summary_model', 'smodel');
    }

    public function index()
    {
        $data_where_class = array(
            'Username' => $this->session->userdata['logged_in']['username'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $malop = $this->smodel->getClassOfPhanDoanTruong($data_where_class);
        
        $data_where_count = array(
            'dsl.MaLop' => $malop[0]['MaLop'],
            'dsl.MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $data['count'] = $this->smodel->countChiDoanInClass($data_where_count);
        $data['doansinh'] = $this->smodel->getStudent($data_where_count);        
        
        $data['subview'] = 'student/promoted';
        $this->load->view('admin/main', $data);
    }
}