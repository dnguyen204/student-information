<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        if(htmlspecialchars($_GET["id"]) != 'GLV'){
            $this->load->model('admin/Student_model', 'stumodel');
            $result = $this->stumodel->searchStudent();
        }
        else{
            $this->load->model('admin/GLV_model', 'glvmodel');
            $result = $this->glvmodel->searchGLV();
        }
        
        $data['result'] = $result;
        $data['subview'] = 'admin/search';
        $this->load->view('admin/main', isset($data) ? $data : NULL);
    }
}