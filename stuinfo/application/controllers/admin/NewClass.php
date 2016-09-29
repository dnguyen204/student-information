<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewClass extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/Class_model', 'cmodel');
    }

    public function index()
    {
        $data['nganh'] = $this->cmodel->getNganh();
        $data['phandoan'] = $this->cmodel->getPhanDoan();
        $data['chidoan'] = $this->cmodel->getChiDoan();
        
        $data['subview'] = 'admin/newclass';
        $this->load->view('admin/main', $data);
    }

    function addNew()
    {
        if ($_POST) {
            $add_class = array(
                'MaLop' => $_POST['malop'],
                'MaNganh' => $_POST['manganh'],
                'MaPhanDoan' => $_POST['maphandoan'],
                'MaChiDoan' => $_POST['machidoan'],
                'MaNamHoc' => 1
            );
            
            $this->cmodel->addClass($add_class);
        }
        else{
            $this->load->view('resultpage/new_stu_success');
        }
    }
}