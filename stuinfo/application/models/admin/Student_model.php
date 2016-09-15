<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function addNew()
    {
        $stumadoansinh = '100000';
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
        
        $this->db->query("INSERT INTO tbl_doansinh (MaDoanSinh,TenThanh,HovaDem,Ten,NgaySinh,GioiTinh) 
            VALUES('$stumadoansinh','$stutenthanh','$stuhovadem','$stuten','$stungaysinh','$stugioitinh')") or die(mysqli_error());
    }
}