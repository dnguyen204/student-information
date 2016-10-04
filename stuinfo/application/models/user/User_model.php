<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login(){
        $us = $_POST['user'];
        $pass = md5($_POST['password']);        
        
        $where = array('Username' => $us, 'Password' => $pass);
        $this->db->from('tbl_user');
        $this->db->where($where);
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {            
            return true;
        }
        return false;        
    }
    
    public function get_user_infor($user){
        $this->db->select('*');
        $this->db->from('tbl_huynhtruong ht');
        $this->db->where('ht.Username', $user);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}