<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppum_model extends CI_Model
{
    function GetSPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_select(?, ?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppum_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetTotalSPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_select(?, ?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppum_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->total;
        }
    }

    function Get75SPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_select(?, ?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $sppum_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->total75;
        }
    }

    function UpdateSPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_update(?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppum_parameter);
        return true;
    }

    function InsertSPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_2_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sppum_parameter);
        return true;
    }

    function DeleteSPPUM($sppum_parameter)
    {
        $procedure = "call usp_xt_sppum_delete(?,?,?)";
        $sql_query = $this->db->query($procedure, $sppum_parameter);
        return true;
    }
}
