<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class city_model extends CI_Model
{
    function GetCity($city_parameter)
    {
        $procedure = "call usp_gm_city_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $city_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
