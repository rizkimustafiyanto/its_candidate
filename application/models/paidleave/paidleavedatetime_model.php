<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paidleavedatetime_model extends CI_Model
{
    function GetPaidLeaveDateTime($paid_leave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_datetime_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertPaidLeaveDateTime($paid_leave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_datetime_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $paid_leave_parameter);
        return true;
    }

    function DeletePaidLeaveDateTime($paid_leave_datetime_parameter)
    {
        $procedure = "call usp_xt_paid_leave_datetime_delete(?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_datetime_parameter);
        return true;
    }
}
