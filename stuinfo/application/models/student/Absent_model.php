<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absent_model extends CI_Model
{
    // lấy danh sách nghỉ lễ của Đoàn Sinh
    public function getAbsentForLe($where)
    {
        $this->db->where($where);
        $this->db->from('tbl_nghile');
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            $countCP = 0;
            $countKP = 0;
            
            $output_string = '';
            $output_string .= '<table class="table table-user-information">';
            $output_string .= '<tbody>';
            $output_string .= '<tr>';
            $output_string .= '<th>STT</th>';
            $output_string .= '<th>Có phép</th>';
            $output_string .= '<th>Không phép</th>';
            $output_string .= '<th></th>';
            $output_string .= '</tr>';
            
            foreach ($query->result_array() as $key => $row) {
                
            }
            
        } else {
            return 'Chưa nghỉ ngày nào';
        }        
    }
}