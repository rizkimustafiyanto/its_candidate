<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class leave_approval_model extends CI_Model
{
    function GetLeaveApproval($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetLeaveApproval1($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetLeaveApprovalEmail($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetLeaveRequesterEmail($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetLeaveRequesterName($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetToken($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->token;
        }
    }

    function GetTokenRequester($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->token;
        }
    }

    function GetLeaveApproverName($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->name_approver;
        }
    }

    function GetLeaveDetails($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function UpdateLeaveApproval($leave_approval_parameter)
    {
        $procedure = "call usp_xt_leave_approval_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_approval_parameter);
        return true;
    }
}
