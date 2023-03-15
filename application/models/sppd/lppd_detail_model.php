<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_detail_model extends CI_Model
{
    function GetLPPDDetail($lppd_detail_parameter)
    {
        $procedure = "call usp_xt_lppd_detail_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $lppd_detail_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertLPPDDetail($lppd_detail_parameter)
    {
        $procedure = "call usp_xt_lppd_detail_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_detail_parameter);
        return true;
    }

    function UpdateLPPDDetail($lppd_detail_parameter)
    {
        $procedure = "call usp_xt_lppd_detail_update(?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_detail_parameter);
        return true;
    }

    function DeleteLPPDDetail($lppd_detail_parameter)
    {
        $procedure = "call usp_xt_lppd_detail_delete(?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_detail_parameter);
        return true;
    }
}
