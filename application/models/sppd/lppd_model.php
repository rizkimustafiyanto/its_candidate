<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_model extends CI_Model
{
    function GetLPPD($lppd_parameter)
    {
        $procedure = "call usp_xt_lppd_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function UpdateLPPD($lppd_parameter)
    {
        $procedure = "call usp_xt_lppd_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_parameter);
        return true;
    }

    function UpdateLPPD2($lppd_parameter)
    {
        $procedure = "call usp_xt_attendance_insert_sppd(?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_parameter);
        return true;
    }
}
