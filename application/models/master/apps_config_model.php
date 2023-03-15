<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class apps_config_model extends CI_Model
{
    function GetAppsConfig($apps_config_parameter)
    {
        $procedure = "call usp_gm_apps_config_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $apps_config_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertAppsConfig($apps_config_parameter)
    {
        $procedure = "call usp_gm_apps_config_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $apps_config_parameter);
        return true;
    }

    function UpdateAppsConfig($apps_config_parameter)
    {
        $procedure = "call usp_gm_apps_config_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $apps_config_parameter);
        return true;
    }


    function DeleteAppsConfig($apps_config_parameter)
    {
        $procedure = "call usp_gm_apps_config_delete(?)";
        $sql_query = $this->db->query($procedure, $apps_config_parameter);
        return true;
    }
}
