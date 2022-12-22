<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sickleave_approval_model extends CI_Model
{
    function GetSickLeaveApproval($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSickLeaveApproval1($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetSickLeaveApprovalEmail($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetSickLeaveRequesterEmail($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetSickLeaveRequesterName($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetSickLeaveApproverName($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->name_approver;
        }
    }

    function GetSickLeaveDetails($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function UpdateSickLeaveApproval($sick_leave_approval_parameter)
    {
        $procedure = "call usp_xt_sick_leave_approval_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sick_leave_approval_parameter);
        return true;
    }
}
