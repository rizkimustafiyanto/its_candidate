<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class position_detail_model extends CI_Model
{
    function GetPositionDetail($position_detail_parameter)
    {
        $procedure = "call usp_gm_position_detail_select(?, ?)";
        $sql_query = $this->db->query($procedure, $position_detail_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
