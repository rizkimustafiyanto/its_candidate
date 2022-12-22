<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class attendance_history_model extends CI_Model
{
    function GetAttendanceHistory($attendance_history_parameter)
    {
        $procedure = "call usp_xt_attendance_history_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $attendance_history_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
