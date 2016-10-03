<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewGLV extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('admin/GLV_model', 'glvmodel');
    }

    public function index()
    {        
        $data['newcode'] = $this->glvmodel->createNewCode();
        $data['role'] = $this->glvmodel->getRole();
        $data['subview'] = 'admin/newglv';
        $this->load->view('admin/main', $data);
    }

    function get_List()
    {
        $this->load->model('admin/TenThanh_model', 'model');
        if (isset($_GET['term'])) {
            $q = strtolower($_GET['term']);
            $this->model->getList($q);
        }
    }

    function addNewGLV()
    {
        $this->glvmodel->addNewGLV();
        $this->load->view('resultpage/new_glv_success');
    }
}
