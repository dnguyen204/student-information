<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Glv_model extends CI_Model
{
    // xóa dấu tiếng việt
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
    
    // lấy kí tự đầu tiên
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
    // mã GLV tự động
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
    // thêm mới 1 GLV
    public function addNewGLV()
    {
        $maglv = $_POST['maglv'];
        $glvtenthanh = $_POST['glvTenThanh'];
        $glvhovadem = $_POST['glvLastName'];
        $glvten = $_POST['glvFirstName'];
        $glvgioitinh = $_POST['glvSex'];
        $glvngaysinh = date('Y-m-d', strtotime($_POST['glvDOB']));
        $glvbonmang = $_POST['glvBonMang'];
        
        $glvsdt = $_POST['SDT'];
        $glvemail = $_POST['Email'];
        
        $glvdiachi = $_POST['glvAddress'];
        $glvghichu = $_POST['glvNote'];
        
        $stutrangthai = ($_POST['maquyen'] === 4) ? 5 : 4; // trạng thái mới tạo
        
        $username = strtolower($this->vn_str_filter($glvten)) . '.' . $this->getFirstChar($glvhovadem) . date('dm', strtotime($_POST['glvDOB']));
        
        $user = array(
            'Username' => $username,
            'Password' => md5(date('dm', strtotime($_POST['glvDOB'])) . substr(date('Y', strtotime($_POST['glvDOB'])), 2, 2)),
            'MaQuyen' => $_POST['maquyen'],
            'Created' => date("Y-m-d"),
            'LastModified' => date("Y-m-d")
        );
        
        $this->db->insert('tbl_user', $user);
        
        $this->db->query("INSERT INTO tbl_huynhtruong (MaHuynhTruong,TenThanh,HovaDem,Ten,NgaySinh,
            NgayBonMang,GioiTinh,DienThoai,Email,DiaChi,GhiChu,TrangThai,Username) 
            VALUES('$maglv','$glvtenthanh','$glvhovadem','$glvten','$glvngaysinh',
            '$glvbonmang','$glvgioitinh','$glvsdt','$glvemail','$glvdiachi','$glvghichu','$stutrangthai','$username')") or die(mysqli_error());
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
    // Lấy danh sách GLV dạy của Đoàn sinh
    public function getGLVFromClass($code)
    {
        $this->db->select('dsl.MaLop, ht.TenThanh, ht.HovaDem, ht.Ten');
        
        $this->db->from('tbl_danhsachlopdoansinh dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        $this->db->join('tbl_phancong pc', 'dsl.MaLop = pc.MaLop')->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy danh sách chức vụ khi tạo mới GLV và phân công
    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('tbl_role');
        $this->db->where('MaQuyen != 1 AND MaQuyen !=2 AND MaQuyen !=3');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy Danh sách GLV Được phân công dạy trong lớp
    public function getGLVInClass($malop, $manamhoc)
    {
        $this->db->select('ht.MaHuynhTruong, ht.TenThanh, ht.HovaDem, ht.Ten, ht.DienThoai, cd.TenChiDoan');
        $this->db->from('tbl_phancong pc')
            ->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong')
            ->join('tbl_chidoan cd', 'cd.MaChiDoan = pc.MaChiDOan');
        $this->db->where('pc.MaLop', $malop);
        $this->db->where('pc.MaNamHoc', $manamhoc);
        $this->db->order_by('cd.TenChiDoan','ASC');
        
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Chi đoàn</th>';
            $output_string .= '<th>Tên Thánh</th>';
            $output_string .= '<th>Họ Tên</th>';
            $output_string .= '<th>SĐT</th>';
            $output_string .= '<th></th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                $index = $key + 1;
                $name = $row['HovaDem'] . ' ' . $row['Ten'];
                $url = base_url();
                
                $output_string .= '<tr class="row_glv" id="' . "{$row['MaHuynhTruong']}" . '">';
                $output_string .= "<td>{$index}</td>";
                $output_string .= "<td>{$row['TenChiDoan']}</td>";
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
            return 'Chưa có phân công cho phân đoàn này';
        }
        
        return $output_string;
    }
    // lấy danh sách GLV theo quyền -> trả về danh sách GLV
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
            return '<option>Không có anh chị nào!</option>';
        }
        
        return $output_string;
    }
    // Thêm GLV vào lớp dạy và update trạng thái của glv
    public function addGLVToClass($data)
    {
        $this->db->where($data);
        if($this->db->count_all_results('tbl_phancong') == 0){
            $this->db->insert('tbl_phancong', $data);
            
            $maht = $data[0]->MaHuynhTruong;
            // Trạng thái 7 là đang dạy
            $this->db->query("UPDATE tbl_huynhtruong
                SET TrangThai = 7,               
                WHERE MaHuynhTruong = '$maht'") or die(mysqli_error());
        }
    }
}