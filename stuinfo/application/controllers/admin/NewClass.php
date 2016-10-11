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
        if (in_array($this->uri->segments[1] . '/' . $this->uri->segments[2], $this->session->userdata['logged_in']['quyen']) == FALSE) {
            $data['subview'] = 'resultpage/no_permision';
            $this->load->view('admin/main', $data);
        } else {
            $data['nganh'] = $this->cmodel->getNganh();
            $data['phandoan'] = $this->cmodel->getPhanDoan();            
            $data['class'] = $this->cmodel->getClassInYear($this->session->userdata['logged_in']['manamhoc']);
            $data['listglv'] = $this->cmodel->getAllHuynhTruong(4); //get danh sach huynh truong
            
            $data['subview'] = 'admin/newclass';
            $this->load->view('admin/main', $data);
        }
    }

    function addNew()
    {
        if ($_POST) {
            $add_class = array(
                'MaLop' => $_POST['malop'],
                'MaNganh' => $_POST['manganh'],
                'MaPhanDoan' => $_POST['maphandoan'],                
                'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
                'Username' => $_POST['mapdt']
            );
            
            $this->cmodel->addClass($add_class, $_POST['mapdt']);
        }
    }

    function remove()
    {
        $classcode = $_POST['malop'];
        $this->cmodel->deleteClass($classcode);
    }
}