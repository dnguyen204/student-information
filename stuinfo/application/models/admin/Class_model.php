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

    public function addClass($data)
    {
        $this->db->insert('tbl_lop', $data);        
        // $this->db->query("INSERT INTO tbl_lop (MaLop,MaNganh,MaPhanDoan,MaChiDoan,MaNamHoc) VALUES('$maLop','$maNganh','$maPhanDoan','$maChiDoan','1')");
    }
}