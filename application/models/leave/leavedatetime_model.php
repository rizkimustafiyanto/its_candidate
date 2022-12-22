<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class leavedatetime_model extends CI_Model
{
    function GetLeaveDateTime($leave_parameter)
    {
        $procedure = "call usp_xt_leave_datetime_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertLeaveDateTime($leave_parameter)
    {
        $procedure = "call usp_xt_leave_datetime_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $leave_parameter);
        return true;
    }

    function DeleteLeaveDateTime($leave_datetime_parameter)
    {
        $procedure = "call usp_xt_leave_datetime_delete(?)";
        $sql_query = $this->db->query($procedure, $leave_datetime_parameter);
        return true;
    }
}
