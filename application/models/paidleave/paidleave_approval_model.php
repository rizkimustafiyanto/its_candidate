<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paidleave_approval_model extends CI_Model
{
    function GetPaidLeaveApproval($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetPaidLeaveApproval1($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetPaidLeaveApprovalEmail($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetPaidLeaveRequesterEmail($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetPaidLeaveRequesterName($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetPaidLeaveApproverName($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->name_approver;
        }
    }

    function GetPaidLeaveDetails($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret;
        }
    }

    function UpdatePaidLeaveApproval($paid_leave_approval_parameter)
    {
        $procedure = "call usp_xt_paid_leave_approval_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_approval_parameter);
        return true;
    }
}
