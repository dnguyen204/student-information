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

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('tbl_tenthanh');        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function addNew()
    {
        $tenthanh = $_POST['TenThanhMoi'];
        
        $this->db->select('TenThanh');
        $this->db->from('tbl_tenthanh');
        $this->db->where('TenThanh' , $tenthanh);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) { // if return 1, email exist.            
            echo 'Tên Thánh ' . $tenthanh . ' đã có rồi!';
        } else { // else not, insert to the table
            $this->db->query("INSERT INTO tbl_tenthanh (TenThanh) VALUES('$tenthanh')");
        }
    }
}