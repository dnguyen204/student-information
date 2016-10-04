<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_model extends CI_Model
{

    public function getYear()
    {
        $this->db->select('*');
        $this->db->from('tbl_namhoc');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_user_infor()
    {}
}