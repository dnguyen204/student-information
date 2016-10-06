<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Xác thực đăng nhập
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
    // Lấy thông tin user sau khi đăng nhập thành công
    // Param: Username
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
    // Lấy thông tin Permision của User đăng nhập
    // Param: MaQuyen
    public function get_role($ma_role)
    {
        $this->db->select('Permision');
        $this->db->from('tbl_permision');
        $this->db->where('MaQuyen', $ma_role);
        
        $permision = $this->db->get()->result_array();
        
        if (isset($permision) && count($permision)) {
            $tmp = NULL;
            foreach ($permision as $key => $val) {
                $tmp[] = $val['Permision'];
            }
            return $tmp;
        }
        return NULL;
    }
    // Lấy thông tin user đăng nhập và các lớp dạy
    // Param: Username
    public function getProfile($user)
    {
        $this->db->select('*');
        $this->db->from('tbl_huynhtruong ht');
        $this->db->where('ht.Username', $user);
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    
    
}
