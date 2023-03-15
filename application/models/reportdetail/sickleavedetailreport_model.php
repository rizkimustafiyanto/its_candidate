<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sickleavedetailreport_model extends CI_Model
{
    function GetSickLeaveReport($sickleavereport_parameter)
    {
        $procedure = "call usp_xt_sick_leave_detail_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sickleavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetSickLeaveReport2($sickleavereport_parameter)
    {
        $procedure = "call usp_xt_sick_leave_detail_report_cabang_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sickleavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
