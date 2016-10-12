<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Class_model extends CI_Model
{

    public function getNganh()
    {
        $this->db->select('*');
        $this->db->from('tbl_nganh');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function getPhanDoan()
    {
        $this->db->select('*');
        $this->db->from('tbl_phandoan');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // lấy danh sách chi đoàn với params loại là kiểu select hay array
    public function getChiDoan($type)
    {
        $this->db->select('*');
        $this->db->from('tbl_chidoan');
        $query = $this->db->get();
        
        if ($type != 'select') {
            return $result = $query->result_array();
        }
        
        if ($query->num_rows() > 0) {
            $output_string = '';
            $output_string .= '<option value="0">- Chọn chi đoàn -</option>';
            foreach ($query->result_array() as $key => $row) {
                $output_string .= "<option value" . "{$row['MaChiDoan']}" . ">{$row['TenChiDoan']}</option>";
            }
            return $output_string;
        }
    }

    public function getDoi()
    {
        $this->db->select('*');
        $this->db->from('tbl_doi');
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Lấy danh sách lớp có trong năm học này
    public function getClassInYear($manamhoc)
    {
        $this->db->select('*');
        $this->db->from('tbl_lop l')
            ->join('tbl_nganh n', 'l.MaNganh = n.MaNganh')
            ->join('tbl_phandoan pd', 'l.MaPhanDoan = pd.MaPhanDoan')
            ->join('tbl_namhoc nh', 'l.MaNamHoc = nh.MaNamHoc')
            ->join('tbl_huynhtruong ht', 'ht.Username = l.Username');
        $this->db->where('l.MaNamHoc', $manamhoc);
        
        $query = $this->db->get();
        return $result = $query->result_array();
    }
    // Xóa lớp
    public function deleteClass($malop)
    {
        // Xóa anh chị được phân công trong lớp update lại trạng thái
        $this->db->select('*');
        $this->db->where('pc.MaLop', $malop);
        $this->db->from('tbl_phancong pc')->join('tbl_huynhtruong ht', 'ht.MaHuynhTruong = pc.MaHuynhTruong');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $row) {
                $where = array(
                    'MaLop' => $row['MaLop'],
                    'MaHuynhTruong' => $row['MaHuynhTruong']
                );
                $this->db->where($where);
                $this->db->delete('tbl_phancong');
                
                $this->db->where('MaHuynhTruong', $row['MaHuynhTruong']);
                $this->db->update('tbl_huynhtruong', array(
                    'TrangThai' => ($row['MaQuyen'] == 4) ? 5 : 6
                ));
            }
        }
        
        // Xóa lớp và update phan đoàn trưởng
        $this->db->select('*');
        $this->db->where('l.MaLop', $malop);
        $this->db->from('tbl_lop l')
            ->join('tbl_huynhtruong ht', 'ht.Username = l.Username')
            ->join('tbl_user u', 'u.Username = l.Username');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $key => $row) {
                $this->db->where('MaLop', $row['MaLop']);
                $this->db->delete('tbl_lop');
                
                $this->db->where('Username', $row['Username']);
                $this->db->update('tbl_huynhtruong', array(
                    'MaQuyen' => 4, // chuyển thành Huynh Trưởng
                    'TrangThai' => 5
                )); // chuyển thành Huynh Trưởng mới
                
                $this->db->where('Username', $row['Username']);
                $this->db->update('tbl_user', array(
                    'MaQuyen' => 4, // chuyển thành Huynh Trưởng
                    'LastModified' => date("Y-m-d")
                ));
            }
        }
    }
    // Thêm một lớp mới
    public function addClass($data, $mapdt)
    {
        $this->db->insert('tbl_lop', $data);
        
        // update quyền lại cho huynh trưởng
        $this->db->where('Username', $mapdt);
        $this->db->update('tbl_huynhtruong', array(
            'MaQuyen' => 3,
            'TrangThai' => 7
        ));
        
        // update quyền bảng user
        $this->db->where('Username', $mapdt);
        $this->db->update('tbl_user', array(
            'MaQuyen' => 3,
            'LastModified' => date("Y-m-d")
        ));
    }
    // Lấy danh sách huynh trưởng để bổ nhiệm phân đoàn trưởng
    public function getAllHuynhTruong($roleid)
    {
        $this->db->select('ht.MaHuynhTruong, ht.TenThanh, ht.HovaDem, ht.Ten, ht.Username');
        $this->db->from('tbl_user u')->join('tbl_huynhtruong ht', 'ht.Username = u.Username');
        $this->db->where('u.MaQuyen', $roleid);
        
        $query = $this->db->get();
        return $query->result_array();
    }
}