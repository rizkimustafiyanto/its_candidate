<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppd_approval_model extends CI_Model
{
    function GetSPPDApproval($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSPPDApprover($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->approver_id;
        }
    }

    function GetSPPDApprovalEmail($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_approver;
        }
    }

    function GetSPPDRequesterEmail($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->email_requester;
        }
    }

    function GetSPPDRequesterName($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->employeename;
        }
    }

    function GetSPPDApproverName($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->name_approver;
        }
    }

    function GetSPPDDetails($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret;
        }
    }

    function UpdateSPPDApproval($sppd_approval_parameter)
    {
        $procedure = "call usp_xt_sppd_approval_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_approval_parameter);
        return true;
    }
}
