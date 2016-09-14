<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewDatabase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('admin/TenThanh_model', 'model');
    }

    public function index()
    {
        $data['result'] = $this->model->getAll();
        $data['subview'] = 'admin/newdatabase';
        $this->load->view('admin/main', $data);
    }

    function addNewTenThanh()
    {        
        $this->model->addNew();
    }
}