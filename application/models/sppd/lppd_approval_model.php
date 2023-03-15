<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_approval_model extends CI_Model
{
    function GetLPPDApproval($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetLPPDApprover($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetLPPDApproverFAD($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetLPPDApproverHRD($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetLPPDLineNoApproverHRD($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->line_no;
        }
    }

    function GetLPPDApprovalEmail($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetLPPDRequesterEmail($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetLPPDRequesterName($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetLPPDApproverName($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->name_approver;
        }
    }

    function GetLPPDDetails($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret;
        }
    }

    function UpdateLPPDApproval($lppd_approval_parameter)
    {
        $procedure = "call usp_xt_lppd_approval_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_approval_parameter);
        return true;
    }
}
