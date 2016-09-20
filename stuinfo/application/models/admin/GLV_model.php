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
}