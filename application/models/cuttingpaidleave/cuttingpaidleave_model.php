<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cuttingpaidleave_model extends CI_Model
{
    function GetCuttingPaidLeave($cuttingpaidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $cuttingpaidleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetEmployeeCompany($paidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->company_id;
        }
    }

    function InsertCuttingPaidLeave($cuttingpaidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $cuttingpaidleave_parameter);
        return true;
    }

    function UpdateCuttingPaidLeave($cuttingpaidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $cuttingpaidleave_parameter);
        return true;
    }
    function DeleteCuttingPaidLeave($cuttingpaidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_delete(?)";
        $sql_query = $this->db->query($procedure, $cuttingpaidleave_parameter);
        return true;
    }
}
