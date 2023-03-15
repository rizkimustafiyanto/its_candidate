<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sppd_report_model extends CI_Model
{
    function GetSPPDReport($sppd_report_parameter)
    {
        $procedure = "call usp_xt_sppd_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_report_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSPPDReport2($sppd_report_parameter)
    {
        $procedure = "call usp_xt_sppd_report_cabang_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sppd_report_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
