<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class leavedetailreport_model extends CI_Model
{
    function GetLeaveReport($leavereport_parameter)
    {
        $procedure = "call usp_xt_leave_detail_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetLeaveReport2($leavereport_parameter)
    {
        $procedure = "call usp_xt_leave_detail_report_cabang_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
