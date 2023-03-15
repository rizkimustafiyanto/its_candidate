<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppd_model extends CI_Model
{
    function GetSPPD($sppd_parameter)
    {
        $procedure = "call usp_xt_sppd_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSPPDLevelCompany($sppd_parameter)
    {
        $procedure = "call usp_xt_sppd_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function InsertSPPD($sppd_parameter)
    {
        $procedure = "call usp_xt_sppd_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppd_parameter);
        return true;
    }

    function UpdateSPPD($sppd_parameter)
    {
        $procedure = "call usp_xt_sppd_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_parameter);
        return true;
    }
    function DeleteSPPD($sppd_parameter)
    {
        $procedure = "call usp_xt_sppd_delete(?)";
        $sql_query = $this->db->query($procedure, $sppd_parameter);
        return true;
    }
}
