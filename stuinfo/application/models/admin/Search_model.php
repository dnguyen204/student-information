<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_model extends CI_Model
{

    public function searchStudent()
    {
        $searchType = isset($_GET['type']) ? $_GET['type'] : '';
        $searchKey = isset($_GET['key']) ? $_GET['key'] : '';
        $searchId = $_GET['id'];
        switch ($searchType) {
            case 2:
                $this->db->where('MaDoanSinh', $searchKey);
                break;
            case 3:
                $this->db->where('Ten', $searchKey);
                break;
        }
        
        $this->db->select('*');
        if($searchId == 'GLV'){
            $this->db->from('tbl_huynhtruong');
        }
        else{
            $this->db->from('tbl_doansinh');
        }
        
        $this->db->limit(20,0);
        $query = $this->db->get();
        
        return $result = $query->result_array();
    }
}