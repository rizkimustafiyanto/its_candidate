<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paidleave_model extends CI_Model
{
    function GetPaidLeave($paidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetPaidLeaveCount($paidleave_parameter)
    {

        $procedure = "call usp_xt_paid_leave_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetPaidLeave2($paidleave_parameter)
    {
        $procedure = "call usp_xt_cutting_leave_cabang_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
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

    function InsertPaidLeave($paidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $paidleave_parameter);
        return true;
    }

    function UpdatePaidLeave($paidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
        return true;
    }


    function DeletePaidLeave($paidleave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_delete(?)";
        $sql_query = $this->db->query($procedure, $paidleave_parameter);
        return true;
    }

    function RequestCanceled($paid_leave_parameter)
    {
        $procedure = "call usp_xt_paid_leave_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_parameter);
        return true;
    }

    function InsertCuttingPaidLeave($paidleave_parameter)
    {
        $procedure = "call usp_xt_cutting_paid_leave_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $paidleave_parameter);
        return true;
    }
}
