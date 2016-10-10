<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewDatabase extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('admin/tenthanh_model', 'tmodel');
    }

    public function index()
    {
        if (in_array($this->uri->segments[1] . '/' . $this->uri->segments[2], $this->session->userdata['logged_in']['quyen']) == FALSE) {
            $data['subview'] = 'resultpage/no_permision';
            $this->load->view('admin/main', $data);
        } else {
            $data['result'] = $this->tmodel->getAll();
            $data['subview'] = 'admin/newdatabase';
            $this->load->view('admin/main', $data);
        }
    }

    function addDatabase()
    {
        if (isset($_POST["newTenThanh"])) {
            // do your newTenThanh code
            $this->tmodel->addNew();
        }
    }
}