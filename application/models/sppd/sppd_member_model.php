<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppd_member_model extends CI_Model
{
    function GetSPPDMember($sppd_member_parameter)
    {
        $procedure = "call usp_xt_sppd_member_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $sppd_member_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertSPPDMember($sppd_member_parameter)
    {
        $procedure = "call usp_xt_sppd_member_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppd_member_parameter);
        return true;
    }

    function DeleteSPPDMember($sppd_member_parameter)
    {
        $procedure = "call usp_xt_sppd_member_delete(?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_member_parameter);
        return true;
    }
}
