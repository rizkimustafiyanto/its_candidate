<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_cost_model extends CI_Model
{
    function GetLPPDCost($lppd_cost_parameter)
    {
        $procedure = "call usp_xt_lppd_cost_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $lppd_cost_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetTotalLPPDCost($lppd_cost_parameter)
    {
        $procedure = "call usp_xt_lppd_cost_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $lppd_cost_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->jumlah;
        }
    }

    function InsertLPPDCost($lppd_cost_parameter)
    {
        $procedure = "call usp_xt_lppd_cost_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_cost_parameter);
        return true;
    }

    function UpdateLPPDCost($lppd_cost_parameter)
    {
        $procedure = "call usp_xt_lppd_cost_update(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_cost_parameter);
        return true;
    }

    function DeleteLPPDCost($lppd_cost_parameter)
    {
        $procedure = "call usp_xt_lppd_cost_delete(?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_cost_parameter);
        return true;
    }
}
