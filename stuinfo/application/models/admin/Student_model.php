<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

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
}