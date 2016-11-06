<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Glv_model extends CI_Model
{
    // Xóa Tiếng Việt
    function vn_str_filter($str)
    {
        $unicode = array(
            'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            
            'd' => 'đ',
            
            'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            
            'i' => 'í|ì|ỉ|ĩ|ị',
            
            'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            
            'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            
            'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
            
            'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            
            'D' => 'Đ',
            
            'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            
            'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
            
            'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            
            'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            
            'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
        );
        
        foreach ($unicode as $nonUnicode => $uni) {
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        return $str;
    }
    
    // Lấy kí tự đầu tiên để tạo username
    function getFirstChar($input)
    {
        $result = '';
        $input = strtolower($input);
        $str_tmp = explode(' ', $input);
        foreach ($str_tmp as $tmp) {
            $result = $result . substr($tmp, 0, 1);
        }
        return $result;
    }
    // tạo mã GLV mới
    public function createNewCode()
    {
        $currentYear = date('y');
        
        $this->db->select('*');
        $this->db->from('tbl_huynhtruong');
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
    // Thêm mới 1 GLV
    public function addNewGLV()
    {
        $glvhovadem = $_POST['glvLastName'];
        $glvten = $_POST['glvFirstName'];
        $username = strtolower($this->vn_str_filter($glvten)) . '.' . $this->getFirstChar($glvhovadem) . date('dm', strtotime($_POST['glvDOB']));
        
        $newGLV = array(
            'MaHuynhTruong' => $_POST['maglv'],
            'TenThanh' => $_POST['glvTenThanh'],
            'HovaDem' => $glvhovadem,
            'Ten' => $glvten,
            'NgaySinh' => date('Y-m-d', strtotime($_POST['glvDOB'])),
            'NgayBonMang' => $_POST['glvBonMang'],
            'GioiTinh' => $_POST['glvSex'],
            'DienThoai' => $_POST['SDT'],
            'Email' => $_POST['Email'],
            'DiaChi' => $_POST['glvAddress'],
            'GhiChu' => $_POST['glvNote'],
            'TrangThai' => ($_POST['maquyen'] === 4) ? 5 : 6, // 5 lÃ  huynh trÆ°á»Ÿng má»›i, 6 lÃ  dá»± trÆ°á»Ÿng má»›i
            'MaQuyen' => $_POST['maquyen'],
            'Username' => $username
        );
        $this->db->insert('tbl_huynhtruong', $newGLV);
        
        $user = array(
            'Username' => $username,
            'Password' => md5(date('dm', strtotime($_POST['glvDOB'])) . substr(date('Y', strtotime($_POST['glvDOB'])), 2, 2)),
            'MaQuyen' => $_POST['maquyen'],
            'Created' => date("Y-m-d"),
            'LastModified' => date("Y-m-d")
        );
        $this->db->insert('tbl_user', $user);
    }
    // Tìm kiếm GLV trong trang search
    public function searchGLV()
    {
        $searchType = isset($_GET['type']) ? $_GET['type'] : '';
        $searchKey = isset($_GET['key']) ? $_GET['key'] : '';
        $searchId = $_GET['id'];
        
        switch ($searchType) {
            case 2:
                $this->db->where('MaHuynhTruong', $searchKey);
                break;
            case 3:
                $this->db->where('Ten', $searchKey);
                break;
            default:
                $this->db->where('tbl_huynhtruong.TrangThai', 5);
                break;
        }
        
        $this->db->select('*');
        $this->db->from('tbl_huynhtruong');
        $this->db->join('tbl_trangthai', 'tbl_huynhtruong.TrangThai = tbl_trangthai.ID', 'left');
        $this->db->order_by('tbl_huynhtruong.ID', 'DESC');
        
        $this->db->limit(20, 0);
        $query = $this->db->get();
        
        return $result = $query->result_array();
    }
    // Lấy danh sách GLV đã dạy theo mã đoàn sinh
    public function getGLVFromClass($code)
    {
        $this->db->select('dsl.MaLop, ht.TenThanh, ht.HovaDem, ht.Ten');
        
        $this->db->from('tbl_danhsachlopdoansinh dsl')
            ->join('tbl_phancong pc', 'dsl.MaLop = pc.MaLop')
            ->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong');
        $this->db->where('dsl.MaDoanSinh', $code);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy danh sách quyền khi tạo mới GLV
    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('MaQuyen != 1 AND MaQuyen !=2 AND MaQuyen !=3');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy Tên Phân đoàn trưởng
    public function getPhanDoanTruong($malop)
    {
        $this->db->select('ht.TenThanh, ht.HovaDem, ht.Ten');
        $this->db->from('tbl_lop l')->join('tbl_huynhtruong ht', 'ht.Username = l.Username');
        $this->db->where('l.MaLop', $malop);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $row) {
                $name = $row['TenThanh'] . ' ' . $row['HovaDem'] . ' ' . $row['Ten'];
                $output_string = '<h3>' . $name . '</h3>';
            }
        }
        return $output_string;
    }
    
    // LẤy danh sách GLV phân công trong lớp
    public function getGLVInClass($malop, $manamhoc)
    {
        $this->db->select('ht.MaHuynhTruong, ht.TenThanh, ht.HovaDem, ht.Ten, ht.DienThoai, cd.TenChiDoan, cd.MaChiDoan');
        $this->db->from('tbl_phancong pc')
            ->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong')
            ->join('tbl_chidoan cd', 'cd.MaChiDoan = pc.MaChiDOan');
        $this->db->where('pc.MaLop', $malop);
        $this->db->where('pc.MaNamHoc', $manamhoc);
        $this->db->order_by('cd.TenChiDoan', 'ASC');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Chi Đoàn</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ và Tên</th>';
            $output_string .= '<th>SĐT</th>';
            $output_string .= '<th></th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr id="' . "{$row['MaHuynhTruong']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= '<td class="id_cd" id="' . "{$row['MaChiDoan']}" . '">' . "{$row['TenChiDoan']}</td>";
                $output_string .= "<td>{$row['TenThanh']}</td>";
                $output_string .= "<td>{$name}</td>";
                $output_string .= "<td>{$row['DienThoai']}</td>";
                $output_string .= '<td><a title="Xóa"><i class="glyphicon glyphicon-remove"></i></a></td>';
                $output_string .= '</tr>';
            }
            $output_string .= '</tbody>';
            $output_string .= '</table>';
            $output_string .= '<script type="text/javascript"
	src="' . "{$url}" . 'public/backend/template/admin/custom_js/division-extend.js"></script>';
        } else {
            return 'Chưa phân công cho phân đoàn này';
        }
        
        return $output_string;
    }
    // Lấy danh sách GLV theo cấp bậc trên form phân công
    public function getGLVByRole($roleid)
    {
        $this->db->select('ht.MaHuynhTruong, ht.TenThanh, ht.HovaDem, ht.Ten');
        $this->db->from('tbl_user u')->join('tbl_huynhtruong ht', 'ht.Username = u.Username');
        $this->db->where('u.MaQuyen', $roleid);
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<option value="0">Chọn . .</option>';
            foreach ($query->result_array() as $key => $row) {
                $output = $row['TenThanh'] . ' ' . $row['HovaDem'] . ' ' . $row['Ten'];
                $output_string .= "<option value='{$row['MaHuynhTruong']}'>{$output}</option>";
            }
        } else {
            return '<option>Không có anh chị nào</option>';
        }
        
        return $output_string;
    }
    // Thêm GLV vào lớp và update trạng thái
    public function addGLVToClass($data, $maht)
    {
        $this->db->where($data);
        if ($this->db->count_all_results('tbl_phancong') == 0) {
            $this->db->insert('tbl_phancong', $data);
            
            // Trạng thái 7 là đang dạy
            $this->db->where('MaHuynhTruong', $maht);
            $this->db->update('tbl_huynhtruong', array(
                'TrangThai' => '7'
            ));
        }
    }
    // Xóa GLV theo lớp và update trạng thái
    public function removeGLV($data, $maht)
    {
        $this->db->where($data);
        $this->db->delete('tbl_phancong');
        
        // Trạng thái 5 là huynh trưởng mới
        $this->db->where('MaHuynhTruong', $maht);
        $this->db->update('tbl_huynhtruong', array(
            'TrangThai' => '5'
        ));
    }
    // Lấy danh sách lớp mà GLV này đang dạy
    public function getClassOfGLV($data)
    {
        $this->db->where($data);
        $this->db->from('tbl_phancong pc')
            ->join('tbl_lop l', 'l.MaLop = pc.MaLop')
            ->join('tbl_phandoan pd', 'pd.MaPhanDoan = l.MaPhanDoan');
        $this->db->select('l.MaLop, pd.TenPhanDoan');
        $this->db->order_by('pc.MaLop');
        
        $query = $this->db->get();
        return $query->result_array();
    }
    // Lấy danh sách chi đoàn đang dạy của GLV theo mã lớp
    public function getListChiDoanOfGLV($data)
    {
        $this->db->where($data);
        $this->db->from('tbl_phancong pc')->join('tbl_chidoan cd', 'pc.MaChiDoan = cd.MaChiDoan');
        $this->db->select('*');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<option value="0">Chọn chi đoàn. .</option>';
            foreach ($query->result_array() as $key => $row) {
                $output_string .= "<option value='{$row['MaChiDoan']}'>{$row['TenChiDoan']}</option>";
            }
        } else {
            return '<option>Chưa có</option>';
        }
        
        return $output_string;
    }
    
    // Lấy danh sách GLV dạy theo từng chi đoàn
    public function getListGLVInClass($where)
    {
        $this->db->where($where);
        $this->db->from('tbl_phancong pc')->join('tbl_huynhtruong ht', 'pc.MaHuynhTruong = ht.MaHuynhTruong');
        $this->db->select('*');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            foreach ($query->result_array() as $key => $row) {
                $name = $row['TenThanh'] . ' ' . $row['HovaDem'] . ' ' . $row['Ten'];
                $output_string .= "<h4>{$name}</h4>";
            }
        } else {
            return '';
        }
        
        return $output_string;
    }
    
    // Cập nhật thông tin của GLV
    public function updateGLVInfo($code, $data)
    {
        $this->db->where('MaHuynhTruong', $code);
        $this->db->update('tbl_huynhtruong', $data);
    }
}