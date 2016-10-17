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
    
    // Lấy danh sách
    public function getListStudentForTypeSroce($where)
    {
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
        $this->db->select('*');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information" id="student">';
            $output_string .= '<thead>';
            $output_string .= '<tr>';
            $output_string .= '<th>Mã ĐS</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>Đội</th>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '</tr>';
            $output_string .= '</thead>';
            $output_string .= '<tbody>';
            
            foreach ($query->result_array() as $key => $row) {                
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaDoanSinh']}" . '">';
                $output_string .= "<td>{$row['MaDoanSinh']}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= "<td>{$row['MaDoi']}</td>";
                $output_string .= '<td class="add-sroce"><a title="Nhập điểm"><i class="glyphicon glyphicon-chevron-right"></i></a></td>';
                $output_string .= '</tr>';
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            $output_string .= '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/type-sroce-extend.js"></script>';            
        } else {
            return '';
        }
        return $output_string;
    }
}