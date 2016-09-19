<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

    public function searchStudent()
    {
        $searchType = $_POST['search-type'];
        $searchKey = $_POST['search-key'];
        
        switch ($searchType) {
            case 2:
                $this->db->where('MaDoanSinh', $searchKey);
                break;
            case 3:
                $this->db->where('Ten', $searchKey);
                break;
        }
        
        $this->db->select('*');
        $this->db->from('tbl_doansinh');
        $query = $this->db->get();
        
        return $result = $query->result_array();
    }
}