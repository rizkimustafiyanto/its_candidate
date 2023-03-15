<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class province_zone_model extends CI_Model
{
    function GetProvinceZone($province_zone_parameter)
    {
        $procedure = "call usp_gm_province_zone_select(?, ?)";
        $sql_query = $this->db->query($procedure, $province_zone_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertProvinceZone($province_zone_parameter)
    {
        $procedure = "call usp_gm_province_zone_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $province_zone_parameter);

        return true;
    }

    function UpdateProvinceZone($province_zone_parameter)
    {
        $procedure = "call usp_gm_province_zone_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $province_zone_parameter);
        return true;
    }

    function DeleteProvinceZone($province_zone_parameter)
    {
        $procedure = "call usp_gm_province_zone_delete(?)";
        $sql_query = $this->db->query($procedure, $province_zone_parameter);
        return true;
    }
}
