<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class overtime_approval_model extends CI_Model
{
    function GetOvertimeApproval($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetOvertimeDetails2($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->last_approver;
        }
    }

    function GetOvertimeDetails($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret;
        }
    }

    function GetOvertimeApproval1($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetOvertimeApprovalEmail($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetOvertimeRequesterEmail($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetOvertimeRequesterName($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetOvertimeApproverName($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->name_approver;
        }
    }



    function UpdateOvertimeApproval($overtime_approval_parameter)
    {
        $procedure = "call usp_xt_overtime_approval_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_approval_parameter);
        return true;
    }
}
