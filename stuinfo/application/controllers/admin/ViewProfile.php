<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ViewProfile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('user/user_model', 'umodel');
    }

    public function index()
    {
        $data['subview'] = 'user/view_profile';
        $data['profile'] = $this->umodel->getProfile($this->session->userdata['logged_in']['username']);
        
        $this->load->view('admin/main', $data);
    }

    function updateInfo()
    {
        $data_update = array(
            'HinhHuynhTruong' => $_POST['glvImage'],
            'TenThanh' => $_POST['glvTenThanh'],
            'HovaDem' => $_POST['glvLastName'],
            'Ten' => $_POST['glvFirstName'],
            'GioiTinh' => $_POST['glvSex'],
            'NgaySinh' => date('d-m-Y', strtotime($_POST['glvNgaySinh'])),
            'NgayBonMang' => $_POST['glvBonMang'],
            'DienThoai' => $_POST['glvSDT'],
            'Email' => $_POST['glvEmail'],
            'DiaChi' => $_POST['glvDiaChi']
        );
        
        $magt = $_POST['glvcode'];       
        
        $this->load->model('admin/glv_model', 'gmodel');
        $this->gmodel->updateGLVInfo($magt, $data_update);
    }
}