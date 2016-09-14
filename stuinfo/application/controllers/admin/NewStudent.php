<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();        
    }

    public function index()
    {        
        $data['subview'] = 'admin/newstudent';
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
    
    function addNewStudent()
    {
        $this->load->model('admin/Student_model', 'model');
        $this->model->addNew();
    }
       
}
