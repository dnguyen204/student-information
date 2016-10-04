<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('index_model', 'imodel');
    }

    public function index()
    {
        $data['namhoc'] = $this->imodel->getYear();
        $this->load->view('index', $data);
    }
}