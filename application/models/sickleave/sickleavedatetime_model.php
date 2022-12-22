<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sickleavedatetime_model extends CI_Model
{
    function GetSickLeaveDateTime($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_datetime_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $sick_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertSickLeaveDateTime($sick_leave_parameter)
    {
        $procedure = "call usp_xt_sick_leave_datetime_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sick_leave_parameter);
        return true;
    }

    function DeleteSickLeaveDateTime($sick_leave_datetime_parameter)
    {
        $procedure = "call usp_xt_sick_leave_datetime_delete(?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_datetime_parameter);
        return true;
    }
}
