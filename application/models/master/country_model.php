<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class country_model extends CI_Model
{
    function GetCountry($country_parameter)
    {
        $procedure = "call usp_gm_country_select(?, ?)";
        $sql_query = $this->db->query($procedure, $country_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
