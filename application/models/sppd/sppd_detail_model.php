<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppd_detail_model extends CI_Model
{
    function GetSPPDDetail($sppd_detail_parameter)
    {
        $procedure = "call usp_xt_sppd_detail_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $sppd_detail_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSPPDDetail1($sppd_detail_parameter)
    {
        $procedure = "call usp_xt_sppd_detail_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $sppd_detail_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function InsertSPPDDetail($sppd_detail_parameter)
    {
        $procedure = "call usp_xt_sppd_detail_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppd_detail_parameter);
        return true;
    }

    function UpdateSPPDDetail($sppd_detail_parameter)
    {
        $procedure = "call usp_xt_sppd_detail_update(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppd_detail_parameter);
        return true;
    }

    function DeleteSPPDDetail($sppd_detail_parameter)
    {
        $procedure = "call usp_xt_sppd_detail_delete(?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_detail_parameter);
        return true;
    }
}
