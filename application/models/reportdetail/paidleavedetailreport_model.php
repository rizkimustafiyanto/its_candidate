<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paidleavedetailreport_model extends CI_Model
{
    function GetPaidLeaveReport($paidleavereport_parameter)
    {
        $procedure = "call usp_xt_paid_leave_detail_report_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetPaidLeaveReport2($paidleavereport_parameter)
    {
        $procedure = "call usp_xt_paid_leave_detail_report_cabang_select(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paidleavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
