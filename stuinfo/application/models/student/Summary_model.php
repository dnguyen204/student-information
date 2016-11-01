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
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
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
                $output_string .= "<tr data-toggle='collapse' data-target='#{$i}'><td>Đội: {$i}</td><td></td><td></td><td></td></tr>";
                $index = 1;
                $output_string .= "<tr><td colspan='4' class='hiddenRow' style='padding: 0px !important;'><div id='{$i}' class='accordian-body collapse'><table class='table table-user-information'><tbody>";
                foreach ($query->result_array() as $r) {
                    if ($r['MaDoi'] == $i) {
                        $name = $r['HovaDem'] . ' ' . $r['Ten'];
                        
                        $output_string .= '<tr class="show-summary" id="' . "{$r['MaDoanSinh']}" . '">';
                        $output_string .= "<td></td>";
                        $output_string .= "<td>{$index}</td>";
                        $output_string .= "<td>{$r['MaDoanSinh']}</td>";
                        $output_string .= "<td>{$r['TenThanh']}</td>";
                        $output_string .= "<td>{$name}</td>";
                        
                        $output_string .= '</tr>';
                        $index += 1; // tăng số
                    }
                }
                $output_string .= "</tbody></table></td></tr>";
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
    // lấy số ngày nghỉ của đoàn sinh vừa lễ vừa học
    // $option = 1 là nghỉ lễ, 2 là nghỉ học
    public function countAbsent($where, $option)
    {
        $this->db->where($where);
        $this->db->select('count(CPKP) result');
        $this->db->group_by('CPKP');
        if ($option == 1)
            $this->db->from('tbl_nghile');
        if ($option == 2)
            $this->db->from('tbl_nghihoc');
        
        $result = $this->db->get()->result_array();
        
        return json_encode($result);
    }
    // lấy tổng kết hk cho đoàn sinh
    public function getSummaryInHKForStudent($where, $hk)
    {
        $this->db->where($where);
        $this->db->select('*');
        if ($hk == 1)
            $this->db->from('tbl_tongkethk1');
        if ($hk == 2)
            $this->db->from('tbl_tongkethk2');
        
        $result = $this->db->get()->result_array();
        
        return json_encode($result);
    }
    // Cập nhật thông tin tổng kết cho đoàn sinh
    public function updateSummaryForStudent($update, $where, $hk)
    {
        $this->db->where($where);
        if ($hk == 1)
            $this->db->update('tbl_tongkethk1', $update);
        if ($hk == 2)
            $this->db->update('tbl_tongkethk2', $update);
    }
    // Lấy danh sách đoàn sinh tổng kết năm học
    // $mode = 1 xem của huynh trưởng, 2 của phân đoàn trưởng
    public function getSummaryAll($where, $mode)
    {
        if ($mode == 1) {
            $this->db->where($where);
            $this->db->from('tbl_danhsachlopdoansinh dslds');
            $this->db->select('count(MaDoi)');
            $this->db->group_by('dslds.MaDoi');
            $result = $this->db->get()->num_rows();
        }
        
        $this->db->where($where);
        $this->db->from('tbl_danhsachlopdoansinh dslds')
            ->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh')
            ->join('tbl_diemhk1 dhk1', 'dhk1.MaDoanSinh = dslds.MaDoanSinh AND dhk1.MaLop = dslds.MaLop')
            ->join('tbl_diemhk2 dhk2', 'dhk2.MaDoanSinh = dslds.MaDoanSinh AND dhk2.MaLop = dslds.MaLop');
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
                $output_string .= "<tr data-toggle='collapse' data-target='#{$i}'><td>Đội: {$i}</td><td></td><td></td><td></td></tr>";
                $index = 1;
                $output_string .= "<tr><td colspan='4' class='hiddenRow' style='padding: 0px !important;'><div id='{$i}' class='accordian-body collapse'><table class='table table-user-information'><tbody>";
                foreach ($query->result_array() as $r) {
                    if ($r['MaDoi'] == $i) {
                        $name = $r['HovaDem'] . ' ' . $r['Ten'];
                        
                        $output_string .= '<tr class="show-summary" id="' . "{$r['MaDoanSinh']}" . '">';
                        $output_string .= "<td></td>";
                        $output_string .= "<td>{$index}</td>";
                        $output_string .= "<td>{$r['MaDoanSinh']}</td>";
                        $output_string .= "<td>{$r['TenThanh']}</td>";
                        $output_string .= "<td>{$name}</td>";
                        
                        $output_string .= '</tr>';
                        $index += 1; // tăng số
                    }
                }
                $output_string .= "</tbody></table></td></tr>";
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