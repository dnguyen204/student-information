<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sroce_model extends CI_Model
{

    public function getAllSroceHKIStudent($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_diemhk1 dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getAllSroceHKIIStudent($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_diemhk2 dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getAllSroceCaNamStudent($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_tongketcanam dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}