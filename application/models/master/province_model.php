<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class province_model extends CI_Model
{

    function GetProvince($province_parameter)
    {
        $procedure = "call usp_gm_province_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $province_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
