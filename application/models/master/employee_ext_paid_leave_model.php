<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_ext_paid_leave_model extends CI_Model
{
    function GetExtPaidLeave($ext_paid_leave_parameter)
    {
        $procedure = "call usp_xt_ext_paid_leave_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $ext_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertExtPaidLeave($ext_paid_leave_parameter)
    {
        $procedure = "call usp_xt_ext_paid_leave_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $ext_paid_leave_parameter);
        return true;
    }

    function DeleteExtPaidLeave($ext_paid_leave_parameter)
    {
        $procedure = "call usp_xt_ext_paid_leave_delete(?,?)";
        $sql_query = $this->db->query($procedure, $ext_paid_leave_parameter);
        return true;
    }
}
