<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class regional_model extends CI_Model
{
    function GetRegional($regional_parameter)
    {
        $procedure = "call usp_gm_regional_select(?, ?)";
        $sql_query = $this->db->query($procedure, $regional_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertRegional($regional_parameter)
    {
        $procedure = "call usp_gm_regional_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $regional_parameter);

        return true;
    }

    function UpdateRegional($regional_parameter)
    {
        $procedure = "call usp_gm_regional_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $regional_parameter);
        return true;
    }

    function DeleteRegional($regional_parameter)
    {
        $procedure = "call usp_gm_regional_delete(?)";
        $sql_query = $this->db->query($procedure, $regional_parameter);
        return true;
    }
}
