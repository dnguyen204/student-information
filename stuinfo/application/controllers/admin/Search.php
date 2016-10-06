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
        $stu_mode = in_array($this->uri->segments[1] . '/' . $this->uri->segments[2] . '?id=đoàn%20sinh', $this->session->userdata['logged_in']['quyen']);
        $glv_mode = in_array($this->uri->segments[1] . '/' . $this->uri->segments[2] . '?id=GLV', $this->session->userdata['logged_in']['quyen']);
        
        if (htmlspecialchars($_GET["id"]) != 'GLV') {
            if ($stu_mode) {
                $this->load->model('admin/Student_model', 'stumodel');
                $result = $this->stumodel->searchStudent();
                
                $data['result'] = $result;
                $data['subview'] = 'admin/search';
                $this->load->view('admin/main', isset($data) ? $data : NULL);
            } else {
                $data['subview'] = 'resultpage/no_permision';
                $this->load->view('admin/main', $data);
            }
        } else {
            if ($glv_mode) {
                $this->load->model('admin/GLV_model', 'glvmodel');
                $result = $this->glvmodel->searchGLV();
                
                $data['result'] = $result;
                $data['subview'] = 'admin/search';
                $this->load->view('admin/main', isset($data) ? $data : NULL);
            } else {
                $data['subview'] = 'resultpage/no_permision';
                $this->load->view('admin/main', $data);
            }
        }
    }
}
