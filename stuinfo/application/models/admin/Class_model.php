<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Class_model extends CI_Model
{

    public function getNganh()
    {
        $this->db->select('*');
        $this->db->from('tbl_nganh');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getPhanDoan()
    {
        $this->db->select('*');
        $this->db->from('tbl_phandoan');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getChiDoan()
    {
        $this->db->select('*');
        $this->db->from('tbl_chidoan');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    
    public function getDoi()
    {
        $this->db->select('*');
        $this->db->from('tbl_doi');
    
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getClassInYear($manamhoc)
    {
        $this->db->select('*');
        $this->db->from('tbl_lop l')
            ->join('tbl_nganh n', 'l.MaNganh = n.MaNganh')
            ->join('tbl_phandoan pd', 'l.MaPhanDoan = pd.MaPhanDoan')           
            ->join('tbl_namhoc nh', 'l.MaNamHoc = nh.MaNamHoc');
        $this->db->where('l.MaNamHoc', $manamhoc);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function deleteClass($malop)
    {
        $this->db->where('MaLop', $malop);
        $this->db->delete('tbl_lop');
    }

    public function addClass($data)
    {
        $this->db->insert('tbl_lop', $data);        
    }   
    
}