<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GLV_model extends CI_Model
{

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

    public function addNewGLV()
    {
        $maglv = $_POST['maglv'];
        $glvtenthanh = $_POST['glvTenThanh'];
        $glvhovadem = $_POST['glvLastName'];
        $glvten = $_POST['glvFirstName'];
        $glvgioitinh = $_POST['glvSex'];
        $glvngaysinh = date('Y-m-d', strtotime($_POST['glvDOB']));
        $glvbonmang = date('Y-m-d', strtotime($_POST['glvBonMang']));
        
        $glvsdt = $_POST['SDT'];
        $glvemail = $_POST['Email'];
        
        $glvdiachi = $_POST['glvAddress'];
        $glvghichu = $_POST['glvNote'];
        
        $stutrangthai = 1;
        
        $this->db->query("INSERT INTO tbl_huynhtruong (MaHuynhTruong,TenThanh,HovaDem,Ten,NgaySinh,
            NgayBonMang,GioiTinh,DienThoai,Email,DiaChi,GhiChu,TrangThai) 
            VALUES('$maglv','$glvtenthanh','$glvhovadem','$glvten','$glvngaysinh',
            '$glvbonmang','$glvgioitinh','$glvsdt','$glvemail','$glvdiachi','$glvghichu','$stutrangthai')") or die(mysqli_error());
    }

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
        }
        
        $this->db->select('*');
        $this->db->from('tbl_huynhtruong');
        $this->db->join('tbl_trangthai', 'tbl_huynhtruong.TrangThai = tbl_trangthai.ID', 'left');
        
        $this->db->limit(20, 0);
        $query = $this->db->get();
        
        return $result = $query->result_array();
    }

    public function getGLVFromClass($code)
    {
        $this->db->select('dsl.MaLop, ht.TenThanh, ht.HovaDem, ht.Ten');
        
        $this->db->from('tbl_danhsachlopdoansinh dsl');
        $this->db->where('dsl.MaDoanSinh', $code);
        $this->db->join('tbl_phancong pc', 'dsl.MaLop = pc.MaLop')->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
}