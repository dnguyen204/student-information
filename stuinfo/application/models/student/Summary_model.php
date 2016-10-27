<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Summary_model extends CI_Model
{
    // Lấy danh sách tổng kết đoàn sinh
    public function getListStudentForSummary($where, $hk)
    {
        $url = base_url();
        $hk == 1 ? $table = 'tbl_tongkethk1 tk' : $table = 'tbl_tongkethk2 tk';
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds');
        $this->db->select('count(MaDoi)');
        $this->db->group_by('dslds.MaDoi');
        $result = $this->db->get()->num_rows();
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds')
            ->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh')
            ->join($table, 'tk.MaDoanSinh = dslds.MaDoanSinh');
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
            $output_string .= '<th>TBHK</th>';
            $output_string .= '<th>Xếp loại</th>';
            $output_string .= '<th>Hạnh kiểm</th>';
            $output_string .= '<th>Nhận xét</th>';
            $output_string .= '</tr>';
            $output_string .= '</thead>';
            $output_string .= '<tbody>';
            
            for ($i = 1; $i <= $result; $i ++) {
                $output_string .= "<tr><td>Đội: {$i}</td><td></td><td></td><td></td></tr>";
                $index = 1;
                foreach ($query->result_array() as $r) {
                    if ($r['MaDoi'] == $i) {
                        $name = $r['HovaDem'] . ' ' . $r['Ten'];
                        
                        $output_string .= '<tr id="' . "{$r['MaDoanSinh']}" . '>';
                        $output_string .= "<td>{$index}</td>";
                        $output_string .= "<td>{$r['MaDoanSinh']}</td>";
                        $output_string .= "<td>{$r['TenThanh']}</td>";
                        $output_string .= "<td>{$name}</td>";                      
                        if ($hk == 1) {
                            $output_string .= "<td>{$r['TBHK1']}</td>";
                            $output_string .= "<td>{$r['NhanXetHK1']}</td>";
                        } else {
                            $output_string .= "<td>{$r['TBHK2']}</td>";
                            $output_string .= "<td>{$r['NhanXetHK2']}</td>";
                        }
                        $output_string .= "<td></td>";
                        $output_string .= "<td></td>";                        
                        $output_string .= '</tr>';
                        $index += 1; // tăng số
                    }
                }
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            // $output_string .= '<script type="text/javascript"
            // src="' . "{$url}" . 'public/backend/template/student/custom_js/check_absent_extend.js"></script>';
        } else {
            return 'Không có đoàn sinh';
        }
        return $output_string;
    }
}