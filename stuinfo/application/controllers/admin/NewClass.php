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
}