<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{
    // Tìm kiếm Đoàn sinh trong search
    public function searchStudent()
    {
        $searchType = isset($_GET['type']) ? $_GET['type'] : '';
        $searchKey = isset($_GET['key']) ? $_GET['key'] : '';
        $searchId = $_GET['id'];
        
        switch ($searchType) {
            case 2:
                $this->db->where('MaDoanSinh', $searchKey);
                break;
            case 3:
                $this->db->where('Ten', $searchKey);
                break;
            default:
                $this->db->where('tbl_doansinh.TrangThai', 1);
                break;
        }
        
        $this->db->select('*');
        $this->db->from('tbl_doansinh');
        $this->db->join('tbl_trangthai', 'tbl_doansinh.TrangThai = tbl_trangthai.ID', 'left');
        $this->db->limit(50, 0);
        $this->db->order_by('tbl_doansinh.ID', 'DESC');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Tạo mã đoàn sinh khi tạo mới
    public function createNewCode()
    {
        $currentYear = date('y');
        
        $this->db->select('*');
        $this->db->from('tbl_doansinh');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $tmp = strval($query->num_rows() + 1);
            while (strlen($tmp) < 4) {
                $tmp = '0' . $tmp;
            }
            return $result = $currentYear . $tmp;
        } else {
            return $result = $currentYear . '0001';
        }
    }
    // Thêm ĐS mới vào hệ thống
    public function addNew()
    {
        // Nếu ĐS đó được thêm vào lớp
        $isAddClass = $_POST['isClass'];
        if ($isAddClass === 'checked') {
            $stutrangthai = 2;
            $addStuToClass = array(
                'MaLop' => $_POST['malop'],
                'MaChiDoan' => $_POST['machidoan'],
                'MaDoi' => $_POST['madoi'],
                'MaDoanSinh' => $_POST['stuMa'],
                'MaNamHoc' => $this->session->userdata['logged_in']['manamhoc']
            );
            
            $this->db->insert('tbl_danhsachlopdoansinh', $addStuToClass);
        } else {
            $stutrangthai = 1;
        }
        
        $newStudent = array(
            'HinhDoanSinh' => $_POST['stuImage'],
            'MaDoanSinh' => $_POST['stuMa'],
            'TenThanh' => $_POST['stuTenThanh'],
            'HovaDem' => $_POST['stuLastName'],
            'Ten' => $_POST['stuFirstName'],
            'GioiTinh' => $_POST['stuSex'],
            'NgaySinh' => date('Y-m-d', strtotime($_POST['stuDOB'])),
            'NgayRuaToi' => date('Y-m-d', strtotime($_POST['stuNgayRuaToi'])),
            'GXRuaToi' => $_POST['stuGXRuaToi'],
            'NgayRuocLe' => date('Y-m-d', strtotime($_POST['stuNgayRuocLe'])),
            'GXRuocLe' => $_POST['stuGXRuocLe'],
            'NgayThemSuc' => date('Y-m-d', strtotime($_POST['stuNgayThemSuc'])),
            'GXThemSuc' => $_POST['stuGXThemSuc'],
            
            'TenThanhCha' => $_POST['TenThanhCha'],
            'HoTenCha' => $_POST['HoTenCha'],
            'SDTCha' => $_POST['SDTCha'],
            'TenThanhMe' => $_POST['TenThanhMe'],
            'HoTenMe' => $_POST['HoTenMe'],
            'SDTMe' => $_POST['SDTMe'],
            
            'DiaChi' => $_POST['stuAddress'],
            'GhiChu' => $_POST['stuNote'],
            'TrangThai' => $stutrangthai
        );
        
        $this->db->insert('tbl_doansinh', $newStudent);
    }
    // cập nhật thông tin cho ĐS
    public function updateStudent()
    {
        $stuImage = $_POST['stuImage'];
        $stumadoansinh = $_POST['stuMa'];
        $stutenthanh = $_POST['stuTenThanh'];
        $stuhovadem = $_POST['stuLastName'];
        $stuten = $_POST['stuFirstName'];
        $stugioitinh = $_POST['stuSex'];
        $stungaysinh = date('Y-m-d', strtotime($_POST['stuDOB']));
        $sturuatoi = date('Y-m-d', strtotime($_POST['stuNgayRuaToi']));
        $stugxruatoi = $_POST['stuGXRuaToi'];
        $sturuocle = date('Y-m-d', strtotime($_POST['stuNgayRuocLe']));
        $stugxruocle = $_POST['stuGXRuocLe'];
        $stuthemsuc = date('Y-m-d', strtotime($_POST['stuNgayThemSuc']));
        $stugxthemsuc = $_POST['stuGXThemSuc'];
        
        $tenthanhcha = $_POST['TenThanhCha'];
        $hotencha = $_POST['HoTenCha'];
        $sdtcha = $_POST['SDTCha'];
        $tenthanhme = $_POST['TenThanhMe'];
        $hotenme = $_POST['HoTenMe'];
        $sdtme = $_POST['SDTMe'];
        
        $studiachi = $_POST['stuAddress'];
        $stughichu = $_POST['stuNote'];
        
        $this->db->query("UPDATE tbl_doansinh
            SET HinhDoanSinh = '$stuImage',
                MaDoanSinh = '$stumadoansinh',
                TenThanh = '$stutenthanh',
                HovaDem = '$stuhovadem',
                Ten = '$stuten',
                NgaySinh = '$stungaysinh',
                GioiTinh = '$stugioitinh',
                NgayRuaToi = '$sturuatoi',
                GXRuaToi = '$stugxruatoi',
                NgayRuocLe = '$sturuocle',
                GXRuocLe = '$stugxruocle',
                NgayThemSuc = '$stuthemsuc',
                GXThemSuc = '$stugxthemsuc',
                TenThanhCha = '$tenthanhcha',
                HoTenCha = '$hotencha',
                SDTCha = '$sdtcha',
                TenThanhMe = '$tenthanhme',
                HoTenMe = '$hotenme',
                SDTMe = '$sdtme',
                DiaChi = '$studiachi',
                GhiChu = '$stughichu'
            WHERE MaDoanSinh = '$stumadoansinh'") or die(mysqli_error());
    }
    // Lấy thông tin chi tiết cho ĐS theo Mã
    public function getStudentDetail($code)
    {
        $this->db->select('*');
        $this->db->from('tbl_doansinh ds');
        $this->db->where('ds.MaDoanSinh', $code);
        $this->db->join('tbl_trangthai tt', 'tt.ID = ds.TrangThai');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // lấy quá trình học của ĐS
    public function getStudentProcess($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_danhsachlopdoansinh dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        $this->db->join('tbl_lop l', 'dsl.MaLop = l.MaLop')
            ->join('tbl_phandoan pd', 'l.MaPhanDoan = pd.MaPhanDoan')
            ->join('tbl_nganh n', 'l.MaNganh = n.MaNganh')
            ->join('tbl_chidoan cd', 'dsl.MaChiDoan = cd.MaChiDoan')
            ->join('tbl_namhoc nh', 'dsl.MaNamHoc = nh.MaNamHoc')
            ->join('tbl_doi d', 'dsl.MaDoi = d.MaDoi');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy danh sách ĐS theo trạng thái mới or đang học
    public function getListStudentByStatus($status)
    {
        $this->db->select('*');
        $this->db->from('tbl_doansinh');
        $this->db->where('TrangThai', $status);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaDoanSinh']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= '<td><a title="Thêm vào chi đoàn này"><i class="glyphicon glyphicon-chevron-right add-to-class"></i></a></td>';
                $output_string .= '</tr>';
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            // $output_string .= '<script type="text/javascript"
            // src="' . "{$url}" . 'public/backend/template/admin/custom_js/addclass-student-extend.js"></script>';
        } else {
            return 'Không có học sinh mới nào';
        }
        
        return $output_string;
    }
    // Lấy danh sách ĐS theo lớp và chi đoàn
    public function getStudentByClass($data)
    {
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaDoanSinh']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= '<td><a title="Xóa khỏi chi đoàn này"><i class="glyphicon glyphicon-remove remove-in-class"></i></a></td>';
                $output_string .= '</tr>';
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            $output_string .= '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/addclass-student-extend.js"></script>';
        } else {
            $url = base_url();
            return 'Không có đoàn sinh nào trong lớp' . '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/addclass-student-extend.js"></script>';
        }
        return $output_string;
    }
    // Thêm đoàn sinh vào lớp và cập nhật trạng thái
    public function addStudentToClass($data, $mads)
    {
        $this->db->insert('tbl_danhsachlopdoansinh', $data); // thêm ĐS vào lớp
        
        $this->db->where('MaDoanSinh', $mads);
        $this->db->update('tbl_doansinh', array(
            'TrangThai' => 2
        )); // Trạng thái đang học
    }
    // Xóa Đoàn sinh khỏi lớp
    public function removeStudentInClass($data, $mads)
    {
        $this->db->where($data);
        $this->db->delete('tbl_danhsachlopdoansinh'); // Xóa ĐS trong lớp
        
        $this->db->where('MaDoanSinh', $mads);
        $this->db->update('tbl_doansinh', array(
            'TrangThai' => 1
        )); // Trạng thái đang học
    }
    // Lấy danh sách đoàn sinh trong chi đoàn của GLV
    public function getListStudentInChiDoan($data)
    {
        $this->db->where($data);
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
        $this->db->select('*');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaDoanSinh']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= '<td><a title="Thêm vào đội này"><i class="glyphicon glyphicon-chevron-right add-to-team"></i></a></td>';
                $output_string .= '</tr>';
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
        } else {
            return 'Không có đoàn sinh nào';
        }
        return $output_string;
    }
    // Lấy danh sách đoàn sinh theo từng đội của GLV
    public function getListStudentInTeam($data)
    {
        $this->db->where($data);
        $this->db->from('tbl_danhsachlopdoansinh dslds')->join('tbl_doansinh ds', 'ds.MaDoanSinh = dslds.MaDoanSinh');
        $this->db->select('*');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>Tổng: ' . "{$query->num_rows()}" . '</th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaDoanSinh']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= '<td><a title="Xóa đội này"><i class="glyphicon glyphicon-remove remove-in-team"></i></a></td>';
                $output_string .= '</tr>';
            }
            
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            $output_string .= '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/addteam-student-extend.js"></script>';
        } else {
            $url = base_url();
            return $this->getListStudentInChiDoan($data) . '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/addteam-student-extend.js"></script>';
        }
        return $output_string;
    }
    // Thêm ĐS từ Chi đoàn vào Đội
    public function addStudentToTeam($data_where, $madoi)
    {
        $this->db->where($data_where);
        $this->db->update('tbl_danhsachlopdoansinh', array(
            'MaDoi' => $madoi
        ));
        // add record vào bảng điểm hk 1 và 2
        $data_add= array(
            'MaLop' => array_values($data_where)[0],
            'MaDoanSinh' => array_values($data_where)[2],
            'MaNamHoc' => array_values($data_where)[3]
        );
        $this->db->insert('tbl_diemhk1', $data_add);
        
        $this->db->insert('tbl_diemhk2', $data_add);        
    }
    // Xóa ĐS ra khỏi đội
    public function removeStudentInTeam($data_where)
    {
        $this->db->where($data_where);
        $this->db->update('tbl_danhsachlopdoansinh', array(
            'MaDoi' => 0
        ));
        // xóa bảng điểm 1 và 2
        $data_remove = array(
            'MaDoanSinh' => array_values($data_where)[2],
            'MaLop' => array_values($data_where)[0],
            'MaNamHoc' => array_values($data_where)[3],
        );
        $this->db->where($data_remove);
        $this->db->delete('tbl_diemhk1');
        
        $this->db->where($data_remove);
        $this->db->delete('tbl_diemhk2');
    }
}