<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sick_leave_model extends CI_Model
{
    function GetSickLeave($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertSickLeave($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sick_leave_parameter);
        return true;
    }

    function UpdateSickLeave($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_update(?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_parameter);
        return true;
    }
    function DeleteSickLeave($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_delete(?)";
        $sql_query = $this->db->query($procedure, $sick_leave_parameter);
        return true;
    }
}
