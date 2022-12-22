<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class overtime_model extends CI_Model
{
    function GetOvertime($overtime_parameter)
    {
        $procedure = "call usp_xt_overtime_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $overtime_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertOvertime($overtime_parameter)
    {
        $procedure = "call usp_xt_overtime_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $overtime_parameter);
        return true;
    }

    function UpdateOvertime($overtime_parameter)
    {
        $procedure = "call usp_xt_overtime_update(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_parameter);
        return true;
    }
    function DeleteOvertime($overtime_parameter)
    {
        $procedure = "call usp_xt_overtime_delete(?)";
        $sql_query = $this->db->query($procedure, $overtime_parameter);
        return true;
    }
}
