<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sickleavereport_model extends CI_Model
{
    function GetSickLeaveReport($sickleavereport_parameter)
    {
        $procedure = "call usp_xt_sick_leave_report_select(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $sickleavereport_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
