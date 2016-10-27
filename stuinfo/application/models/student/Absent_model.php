<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absent_model extends CI_Model
{
    // Lấy danh sách để điểm danh
    public function getListStudentForCheckAbsent($where)
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
	src="' . "{$url}" . 'public/backend/template/student/custom_js/check_absent_extend.js"></script>';
        } else {
            return 'Không có đoàn sinh';
        }
        return $output_string;
    }
    
    // lấy danh sách nghỉ lễ của Đoàn Sinh
    public function getAbsentForLe($where)
    {
        $this->db->where($where);
        $this->db->from('tbl_nghile');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $countCP = 0;
            $countKP = 0;
            
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= "<th>Có phép</th>";
            $output_string .= "<th>Không phép</th>";
            $output_string .= '<th></th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $stt = $key + 1;
                $url = base_url();
                $absentDate = date('d-m-Y', strtotime($row['NgayNL']));
                $malop = "'" . $row['MaLop'] . "'";
                
                $output_string .= '<tr>';
                $output_string .= "<td>{$stt}</td>";
                if ($row['CPKP'] == 1) {
                    $countCP ++;
                    $output_string .= "<td>{$absentDate}</td><td></td>";
                } else {
                    $countKP ++;
                    $output_string .= "<td></td><td>{$absentDate}</td>";
                }
                $output_string .= '<td><a title="Xóa"><i class="glyphicon glyphicon-remove" onclick="absentDelete(' . "{$row['MaDoanSinh']}, {$malop}, {$row['HocKy']}, {$row['MaNamHoc']}, {$row['CPKP']},'L'" . ')"></i></a></td>';
                $output_string .= '</tr>';
            }
            $output_string .= '<tr>';
            $output_string .= '<td>Tổng: </td>';
            $output_string .= "<td>{$countCP}</td>";
            $output_string .= "<td>{$countKP}</td>";
            $output_string .= "<td></td>";
            $output_string .= '</tr>';
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
        } else {
            return 'Chưa nghỉ ngày nào';
        }
        
        return $output_string;
    }
    // lấy danh sách nghỉ học của Đoàn Sinh
    public function getAbsentForHoc($where)
    {
        $this->db->where($where);
        $this->db->from('tbl_nghihoc');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $countCP = 0;
            $countKP = 0;
            
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= "<th>Có phép</th>";
            $output_string .= "<th>Không phép</th>";
            $output_string .= '<th></th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $stt = $key + 1;
                $url = base_url();
                $absentDate = date('d-m-Y', strtotime($row['NgayNH']));
                $malop = "'" . $row['MaLop'] . "'";
                
                $output_string .= '<tr>';
                $output_string .= "<td>{$stt}</td>";
                if ($row['CPKP'] == 1) {
                    $countCP ++;
                    $output_string .= "<td>{$absentDate}</td><td></td>";
                } else {
                    $countKP ++;
                    $output_string .= "<td></td><td>{$absentDate}</td>";
                }
                $output_string .= '<td><a title="Xóa"><i class="glyphicon glyphicon-remove" onclick="absentDelete(' . "{$row['MaDoanSinh']}, {$malop}, {$row['HocKy']}, {$row['MaNamHoc']}, {$row['CPKP']}, 'H'" . ')"></i></a></td>';
                $output_string .= '</tr>';
            }
            $output_string .= '<tr>';
            $output_string .= '<td>Tổng: </td>';
            $output_string .= "<td>{$countCP}</td>";
            $output_string .= "<td>{$countKP}</td>";
            $output_string .= '<td></td>';
            $output_string .= '</tr>';
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
        } else {
            return 'Chưa nghỉ ngày nào';
        }
        
        return $output_string;
    }
    // Thêm ngày nghỉ của đoàn sinh
    public function addAbsentForStudent($data, $type)
    {
        if ($type == 'L') {
            $this->db->insert('tbl_nghile', $data);
        } else {
            $this->db->insert('tbl_nghihoc', $data);
        }
    }
    // Xóa ngày nghỉ của Đoàn Sinh
    public function deleteAbsent($where, $type)
    {
        if ($type == 'L') {
            $this->db->where($where);
            $this->db->delete('tbl_nghile');
        } else {
            $this->db->where($where);
            $this->db->delete('tbl_nghihoc');
        }
    }
}