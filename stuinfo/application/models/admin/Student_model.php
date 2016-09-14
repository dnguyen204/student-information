<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function addNewStudent()
    {
        $stumadoansinh = '100000';
        $stutenthanh = $_POST['stuTenThanh'];
        $stuhovadem = $_POST['stuLastName'];
        $stuten = $_POST['stuFirstName'];
        $stugioitinh = $_POST['stuSex'];
        $stungaysinh = $_POST['stuDOB'];
        $sturuatoi = $_POST['stuNgayRuaToi'];
        $stugxruatoi = $_POST['stuGXRuaToi'];
        $sturuocle = $_POST['stuNgayRuocLe'];
        $stugxruocle = $_POST['stuGXRuocLe'];
        $stuthemsuc = $_POST['stuNgayThemSuc'];
        $stugxthemsuc = $_POST['stuGXThemSuc'];
        
        $tenthanhcha = $_POST['TenThanhCha'];
        $hotencha = $_POST['HoTenCha'];
        $sdtcha = $_POST['SDTCha'];
        $tenthanhme = $_POST['TenThanhMe'];
        $hotenme = $_POST['HoTenMe'];
        $sdtme = $_POST['SDTMe'];
        
        $studiachi = $_POST['stuAddress'];
        $stughichu = $_POST['stuNote'];
        
        $this->db->query("INSERT INTO tbl_doansinh VALUES('$stumadoansinh','$stutenthanh'
            ,'$stuhovadem','$stuten','$stugioitinh','$stungaysinh','$sturuatoi')");
    }
}