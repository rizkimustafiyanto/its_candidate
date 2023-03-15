<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class country_zone_model extends CI_Model
{
    function GetCountryZone($country_zone_parameter)
    {
        $procedure = "call usp_gm_country_zone_select(?, ?)";
        $sql_query = $this->db->query($procedure, $country_zone_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertCountryZone($country_zone_parameter)
    {
        $procedure = "call usp_gm_country_zone_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $country_zone_parameter);

        return true;
    }

    function UpdateCountryZone($country_zone_parameter)
    {
        $procedure = "call usp_gm_country_zone_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $country_zone_parameter);
        return true;
    }

    function DeleteCountryZone($country_zone_parameter)
    {
        $procedure = "call usp_gm_country_zone_delete(?)";
        $sql_query = $this->db->query($procedure, $country_zone_parameter);
        return true;
    }
}
