<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sroce_model extends CI_Model
{
    // Lấy toàn bộ điểm hk1 của đoàn sinh
    // nếu có mã lớp thì sẽ lấy chính xác không thì sẽ lấy toàn bộ
    public function getAllSroceHKIStudent($code, $malop)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_diemhk1');
        if (empty($malop)) {
            $this->db->where('MaDoanSinh', $code);
            
            $query = $this->db->get();
            return $result = $query->result_array();
        } else {
            $this->db->where('MaDoanSinh', $code);
            $this->db->where('MaLop', $malop);
            
            return json_encode($this->db->get()->result_array());
        }
    }    
    // Lấy toàn bộ điểm hk2 của đoàn sinh
    // nếu có mã lớp thì sẽ lấy chính xác không thì sẽ lấy toàn bộ
    public function getAllSroceHKIIStudent($code, $malop)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_diemhk2');
        
        if (empty($malop)) {
            $this->db->where('MaDoanSinh', $code);
            
            $query = $this->db->get();
            return $result = $query->result_array();
        } else {
            $this->db->where('MaDoanSinh', $code);
            $this->db->where('MaLop', $malop);
            
            return json_encode($this->db->get()->result_array());
        }
    }
    // lấy tổng kết cả năm cho đoàn sinh
    public function getAllSroceCaNamStudent($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_tongketcanam dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }    
    // xét học lực
    function reviewAcademic($sroce)
    {
        if ($sroce <= 3.5) {
            $result = 'Kém';
        } elseif (3.5 < $sroce && $sroce <= 5) {
            $result = 'Yếu';
        } elseif (5 < $sroce && $sroce <= 6.5) {
            $result = 'Trung Bình';
        } elseif (6.5 < $sroce && $sroce <= 8.5) {
            $result = 'Khá';
        } elseif (8.5 < $sroce && $sroce <= 9.2) {
            $result = 'Giỏi';
        } else {
            $result = 'Xuất Sắc';
        }
        
        return $result;
    }
    
    // Lấy danh sách đoàn sinh để nhập điểm
    public function getListStudentForTypeSroce($where)
    {
        $url = base_url();
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh');
        $this->db->select('count(MaDoi)');
        $this->db->group_by('MaDoi');
        $result = $this->db->get()->num_rows();
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
        $this->db->select('*');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information" id="student">';
            $output_string .= '<thead>';
            $output_string .= '<tr>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '<th>Mã ĐS</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '</tr>';
            $output_string .= '</thead>';
            $output_string .= '<tbody>';
            
            for ($i = 1; $i <= $result; $i ++) {
                $output_string .= "<tr><td>Đội: {$i}</td><td></td><td></td><td></td></tr>";
                $index = 1;
                foreach ($query->result_array() as $r) {
                    if ($r['MaDoi'] == $i) {
                        $name = $r['HovaDem'] . ' ' . $r['Ten'];
                        
                        $output_string .= '<tr id="' . "{$r['MaDoanSinh']}" . '" class="add-score">';
                        $output_string .= "<td>{$index}</td>";
                        $output_string .= "<td>{$r['MaDoanSinh']}</td>";
                        $output_string .= "<td>{$r['TenThanh']}</td>";
                        $output_string .= "<td>{$name}</td>";
                        $output_string .= '</tr>';
                        $index += 1; // tăng số
                    }
                }
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            $output_string .= '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/type-sroce-extend.js"></script>';
        } else {
            return 'Không có đoàn sinh';
        }
        return $output_string;
    }
    
    // Add điểm cho Đoàn sinh
    public function addSroceForStudent($where, $data, $hk)
    {
        $this->db->where($where);
        $this->db->update('tbl_diemhk' . $hk, $data);
        
        $data_update = array(
            'TBHK' . $hk => array_values($data)[4],
            'HLHK' . $hk => $this->reviewAcademic(array_values($data)[4])
        );
        $this->db->where($where);
        $this->db->update('tbl_tongkethk' . $hk, $data_update);
    }
}