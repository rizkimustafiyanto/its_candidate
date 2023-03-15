<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class overtimereport_model extends CI_Model
{
    function GetOvertimeReport($overtimereport_parameter)
    {
        $procedure = "call usp_xt_overtime_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtimereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetOvertimeReport2($overtimereport_parameter)
    {
        $procedure = "call usp_xt_overtime_report_cabang_select(?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtimereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
