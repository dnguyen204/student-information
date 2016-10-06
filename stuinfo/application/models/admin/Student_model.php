<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

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

    public function addNew()
    {
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

    public function updateStudent()
    {
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
            SET MaDoanSinh = '$stumadoansinh',
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

    public function getStudentDetail($code)
    {
        $this->db->select('*');
        $this->db->from('tbl_doansinh ds');
        $this->db->where('ds.MaDoanSinh', $code);
        $this->db->join('tbl_trangthai tt', 'tt.ID = ds.TrangThai');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getStudentProcess($code)
    {
        $this->db->select('*');
        
        $this->db->from('tbl_danhsachlopdoansinh dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        $this->db->join('tbl_lop l', 'dsl.MaLop = l.MaLop')
            ->join('tbl_phandoan pd', 'l.MaPhanDoan = pd.MaPhanDoan')
            ->join('tbl_nganh n', 'l.MaNganh = n.MaNganh')
            ->join('tbl_chidoan cd', 'dsl.MaChiDoan = cd.MaChiDoan');
        $this->db->join('tbl_namhoc nh', 'dsl.MaNamHoc = nh.MaNamHoc');
        $this->db->join('tbl_doi d', 'dsl.MaDoi = d.MaDoi');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}