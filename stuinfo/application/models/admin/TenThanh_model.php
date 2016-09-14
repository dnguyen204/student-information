<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TenThanh_model extends CI_Model
{

    public function getList($q)
    {
        $this->db->select('TenThanh');
        $this->db->like('TenThanh', $q);
        $query = $this->db->get('tbl_tenthanh');        
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $row_set[] = htmlentities(stripslashes($row['TenThanh'])); // build an array
            }
            echo json_encode($row_set); // format the array into json data
        }
    }
}