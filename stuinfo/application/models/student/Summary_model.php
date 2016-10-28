<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summary_model extends CI_Model
{
    // Lấy danh sách tổng kết đoàn sinh
    public function getListStudentForSummary($where)
    {
        $url = base_url();       
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds');
        $this->db->select('count(MaDoi)');
        $this->db->group_by('dslds.MaDoi');
        $result = $this->db->get()->num_rows();
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds')
            ->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');            
        $this->db->select('*');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
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
                        
                        $output_string .= '<tr class="show-summary" id="' . "{$r['MaDoanSinh']}" . '">';
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
            src="' . "{$url}" . 'public/backend/template/student/custom_js/summary_extend.js"></script>';
        } else {
            return 'Không có đoàn sinh';
        }
        return $output_string;
    }
}