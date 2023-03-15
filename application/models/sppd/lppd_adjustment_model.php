<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_adjustment_model extends CI_Model
{
    function GetLPPDAdjustment($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_select(?, ?, ?,?, ?,?)";
        $sql_query = $this->db->query($procedure, $lppd_adjustment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetTotalLPPDAdjustment($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_select(?, ?, ?,?, ?,?)";
        $sql_query = $this->db->query($procedure, $lppd_adjustment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->jumlah;
        }
    }

    function GetFinalLPPD($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_select(?, ?, ?,?, ?,?)";
        $sql_query = $this->db->query($procedure, $lppd_adjustment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->total;
        }
    }

    function GetFinalLPPD1($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_select(?, ?, ?,?, ?,?)";
        $sql_query = $this->db->query($procedure, $lppd_adjustment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->aa;
        }
    }


    function InsertLPPDAdjustment($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_adjustment_parameter);
        return true;
    }

    function UpdateLPPDAdjustment($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_update(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $lppd_adjustment_parameter);
        return true;
    }

    function DeleteLPPDAdjustment($lppd_adjustment_parameter)
    {
        $procedure = "call usp_xt_lppd_adjustment_delete(?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_adjustment_parameter);
        return true;
    }
}
