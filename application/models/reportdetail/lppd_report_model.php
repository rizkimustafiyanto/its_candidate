<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lppd_report_model extends CI_Model
{
    function GetLPPDReport($lppd_report_parameter)
    {
        $procedure = "call usp_xt_lppd_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_report_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetLPPDReport2($lppd_report_parameter)
    {
        $procedure = "call usp_xt_lppd_report_cabang_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $lppd_report_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
