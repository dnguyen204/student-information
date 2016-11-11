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
            ->join('tbl_diemhk2 dhk2', 'dhk2.MaDoanSinh = dslds.MaDoanSinh AND dhk2.MaLop = dslds.MaLop')
            ->join('tbl_tongkethk1 tkhk1', 'tkhk1.MaDoanSinh = dslds.MaDoanSinh AND tkhk1.MaLop = dslds.MaLop')
            ->join('tbl_tongkethk2 tkhk2', 'tkhk2.MaDoanSinh = dslds.MaDoanSinh AND tkhk2.MaLop = dslds.MaLop');
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
                        $childIndex = $i . '-' . $index;
                        $name = $r['HovaDem'] . ' ' . $r['Ten'];
                        $TBCN = round(($r['TBHK1'] + $r['TBHK2']) / 3, 1);
                        $HLCN = $this->reviewAcademic($TBCN);
                        
                        $output_string .= '<tr onclick="getTongKet(' . "{$r['MaDoanSinh']}" . ',' . "'" . "{$childIndex}" . "'" . ');" id="' . "{$r['MaDoanSinh']}" . '" data-toggle="collapse" data-target="#' . "{$childIndex}" . '">';
                        $output_string .= "<td></td>";
                        $output_string .= "<td>{$index}</td>";
                        $output_string .= "<td>{$r['MaDoanSinh']}</td>";
                        $output_string .= "<td>{$r['TenThanh']}</td>";
                        $output_string .= "<td>{$name}</td>";
                        
                        $output_string .= '</tr>';
                        
                        $output_string .= "<tr><td colspan='5' class='hiddenRow' style='padding: 0px !important;'><div id='{$childIndex}' class='accordian-body collapse'><form class='form' id='form-{$childIndex}'><table class='table table-user-information'>";
                        $output_string .= '<thead>';
                        $output_string .= '<tr>';
                        $output_string .= '<th></th>';
                        $output_string .= '<th>KT Miệng</th>';
                        $output_string .= '<th>KT 15 phút</th>';
                        $output_string .= '<th>KT 1 tiết</th>';
                        $output_string .= '<th>KT Học Kỳ</th>';
                        $output_string .= '<th>Điểm TB</th>';
                        $output_string .= '<th>Học Lực</th>';
                        $output_string .= '<th>Hạnh kiểm</th>';
                        $output_string .= '<th>Nhận xét</th>';
                        $output_string .= '</tr>';
                        $output_string .= '</thead>';
                        $output_string .= "<tbody>";
                        $output_string .= '<tr>';
                        $output_string .= '<td>HKI</td>';
                        $output_string .= "<td>{$r['MiengHK1']}</td>";
                        $output_string .= "<td>{$r['KT15PhutHK1']}</td>";
                        $output_string .= "<td>{$r['KT1TietHK1']}</td>";
                        $output_string .= "<td>{$r['KTHK1']}</td>";
                        $output_string .= "<td>{$r['TBHK1']}</td>";
                        $output_string .= "<td>{$r['HLHK1']}</td>";
                        $output_string .= "<td>{$r['HKHK1']}</td>";
                        $output_string .= "<td>{$r['NhanXetHK1']}</td>";
                        $output_string .= '</tr>';
                        $output_string .= '<tr>';
                        $output_string .= '<td>HKII</td>';
                        $output_string .= "<td>{$r['MiengHK2']}</td>";
                        $output_string .= "<td>{$r['KT15PhutHK2']}</td>";
                        $output_string .= "<td>{$r['KT1TietHK2']}</td>";
                        $output_string .= "<td>{$r['KTHK2']}</td>";
                        $output_string .= "<td>{$r['TBHK2']}</td>";
                        $output_string .= "<td>{$r['HLHK2']}</td>";
                        $output_string .= "<td>{$r['HKHK2']}</td>";
                        $output_string .= "<td>{$r['NhanXetHK2']}</td>";
                        $output_string .= '</tr>';
                        $output_string .= '<tr>';
                        $output_string .= '<td>Cả năm</td>';
                        $output_string .= "<td colspan='2'>Trung bình:</td>";
                        $output_string .= "<td><label class='control-label summary-all'>{$TBCN}</label><input type='hidden' name='TBCN' value='{$TBCN}'></td>";
                        $output_string .= "<td colspan='2'>Học lực:</td>";
                        $output_string .= "<td><label class='control-label summary-all'>{$HLCN}</label><input type='hidden' name='HLCN' value='{$HLCN}'></td>";
                        $output_string .= "<td colspan='2'><div class='radio' id='radio-{$childIndex}'></div></td>";
                        $output_string .= '</tr>';
                        $output_string .= '<tr>';
                        $output_string .= '<td>Hạnh kiểm:</td>';
                        $output_string .= "<td colspan='2'><select class='selectpicker form-control' name='HKCN' id='{$childIndex}HKCN'><option>Tốt</option><option>Khá</option><option>Trung Bình</option><option>Yếu</option><option>Kém</option></select></td>";
                        $output_string .= "<td>Nhận xét:</td>";
                        $output_string .= "<td colspan='4'><textarea class='form-control' name='NXCN' id='{$childIndex}NXCN'></textarea></td>";
                        $output_string .= '<td><input type="button" value="Lưu lại" class="btn btn-info" onClick="saveSummary(' . "'#form-" . "{$childIndex}" . "'" . ',' . "{$r['MaDoanSinh']}" . ');"></td>';
                        $output_string .= '</tr>';
                        $output_string .= '</form>';
                        $output_string .= "</tbody></table></form></div></td></tr>";
                        
                        $index += 1; // tăng STT trong từng đội
                    }
                }
                $output_string .= "</tbody></table></div></td></tr>";
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
        } else {
            return 'Không có đoàn sinh';
        }
        return $output_string;
    }
    // insert tổng kết cuối năm
    public function insertSummaryAllForStudent($data)
    {
        $data_where = array(
            'MaDoanSinh' => array_values($data)[0],
            'MaLop' => array_values($data)[1],
            'MaNamHoc' => array_values($data)[2]
        );
        $this->db->from('tbl_tongketcanam');
        if ($this->db->where($data_where)
            ->get()
            ->num_rows() > 0) {
            $this->db->where($data_where)->update('tbl_tongketcanam', $data);
        } else {
            $this->db->insert('tbl_tongketcanam', $data);
        }
    }
    // lấy Tổng kết của đoàn sinh đang chọn
    public function getCurrentStudentSummary($where)
    {
        $result = $this->db->where($where)
            ->from('tbl_tongketcanam')
            ->get()
            ->result_array();
        
        return json_encode($result);
    }
    // Lấy lớp của phân đoàn trưởng
    public function getClassOfPhanDoanTruong($where)
    {
        return $this->db->where($where)
            ->from('tbl_lop')
            ->get()
            ->result_array();
    }
    // Đếm số chi đoàn trong Lớp và số đội trong từng chi đoàn
    public function countChiDoanInClass($where)
    {
        return $this->db->where($where)
            ->from('tbl_danhsachlopdoansinh dsl')
            ->select('dsl.MaChiDoan, COUNT(distinct MaDoi) result')
            ->group_by('dsl.MaChiDoan')
            ->get()
            ->result_array();
    }
    // Lấy danh sách đoàn sinh trong phân đoàn
    public function getStudent($where)
    {
        return $this->db->where($where)
            ->from('tbl_danhsachlopdoansinh dsl')
            ->join('tbl_doansinh ds', 'ds.MaDoanSinh = dsl.MaDoanSinh')
            ->join('tbl_tongketcanam cn', 'cn.MaDoanSinh = dsl.MaDoanSinh')
            ->join('tbl_tongkethk1 hk1', 'hk1.MaDoanSinh = dsl.MaDoanSinh')
            ->join('tbl_tongkethk2 hk2', 'hk2.MaDoanSinh = dsl.MaDoanSinh')
            ->get()
            ->result_array();
    }
    
    
}