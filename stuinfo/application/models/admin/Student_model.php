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
        
        $this->db->limit(20, 0);
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
        
        $stutrangthai = 1;
        
        $this->db->query("INSERT INTO tbl_doansinh (MaDoanSinh,TenThanh,HovaDem,Ten,NgaySinh,GioiTinh,
            NgayRuaToi,GXRuaToi,NgayRuocLe,GXRuocLe,NgayThemSuc,GXThemSuc,TenThanhCha,HoTenCha,SDTCha,TenThanhMe,HoTenMe,SDTMe,DiaChi,GhiChu,TrangThai) 
            VALUES('$stumadoansinh','$stutenthanh','$stuhovadem','$stuten','$stungaysinh','$stugioitinh',
            '$sturuatoi','$stugxruatoi','$sturuocle','$stugxruocle','$stuthemsuc','$stugxthemsuc','$tenthanhcha','$hotencha',
            '$sdtcha','$tenthanhme','$hotenme','$sdtme','$studiachi','$stughichu','$stutrangthai')") or die(mysqli_error());
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
            ->join('tbl_chidoan cd', 'l.MaChiDoan = cd.MaChiDoan')
            ->join('tbl_diemhk1 hk1', 'dsl.MaDoanSinh = hk1.MaDoanSinh AND dsl.MaNamHoc = hk1.MaNamHoc AND dsl.MaLop = hk1.MaLop')
            ->join('tbl_diemhk2 hk2', 'dsl.MaDoanSinh = hk2.MaDoanSinh AND dsl.MaNamHoc = hk2.MaNamHoc AND dsl.MaLop = hk2.MaLop')
            ->join('tbl_tongketcanam tk', 'dsl.MaDoanSinh = tk.MaDoanSinh AND dsl.MaNamHoc = tk.MaNamHoc AND dsl.MaLop = tk.MaLop');
        $this->db->join('tbl_namhoc nh', 'dsl.MaNamHoc = nh.MaNamHoc');
        $this->db->join('tbl_doi d', 'dsl.MaDoi = d.MaDoi');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}