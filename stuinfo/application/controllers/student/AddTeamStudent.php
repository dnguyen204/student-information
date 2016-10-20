<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddTeamStudent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('admin/glv_model', 'gmodel');
        $this->load->model('admin/student_model', 'smodel');
    }

    public function index()
    {
        if (in_array($this->uri->segments[1] . '/' . $this->uri->segments[2], $this->session->userdata['logged_in']['quyen']) == FALSE) {
            $data['subview'] = 'resultpage/no_permision';
            $this->load->view('admin/main', $data);
        } else {            
            $data_where = array(
                'pc.MaHuynhTruong' => $this->session->userdata['logged_in']['mahuynhtruong'],
                'pc.MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
            );
            
            $data['list_class'] = $this->gmodel->getClassOfGLV($data_where);
            
            $data['subview'] = 'student/add_team_student';
            $this->load->view('admin/main', $data);
        }
    }

    function getChiDoanOfGLV()
    {
        $data = array(
            'pc.MaLop' => $_POST['malop'],
            'pc.MaHuynhTruong' => $this->session->userdata['logged_in']['mahuynhtruong']
        );
        echo $this->gmodel->getListChiDoanOfGLV($data);
    }

    function getListDoi()
    {
        $this->load->model('admin/class_model', 'cmodel');
        echo $this->cmodel->getDoi('select');
    }

    function getListStudentOfClass()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
            'MaDoi' => 0
        ) // Không tính các em có đội rồi
;
        
        echo $this->smodel->getListStudentInChiDoan($data_where);
    }

    function getListStudentTeam()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc'],
            'MaDoi' => $_POST['madoi']
        );
        
        echo $this->smodel->getListStudentInTeam($data_where);
    }

    function addToTeam()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaDoanSinh' => $_POST['madoansinh'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        $madoi = $_POST['madoi'];
        $this->smodel->addStudentToTeam($data_where, $madoi);
        
        $this->getListStudentTeam();
    }

    function removeInTeam()
    {
        $data_where = array(
            'MaLop' => $_POST['malop'],
            'MaChiDoan' => $_POST['machidoan'],
            'MaDoanSinh' => $_POST['madoansinh'],
            'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
        );
        
        $this->smodel->removeStudentInTeam($data_where);
        
        $this->getListStudentTeam();
    }
}