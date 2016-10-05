<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function login()
    {
        $us = $_POST['user'];
        $pass = md5($_POST['password']);
        
        $where = array(
            'Username' => $us,
            'Password' => $pass
        );
        $this->db->from('tbl_user');
        $this->db->where($where);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    public function get_user_infor($user)
    {
        $condition = "u.Username =" . "'" . $user . "'";
        $this->db->select('*');
        $this->db->from('tbl_user u')
            ->join('tbl_huynhtruong ht', 'u.Username = ht.Username')
            ->join('tbl_role r', 'r.MaQuyen = u.MaQuyen');
        $this->db->where($condition);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
}
