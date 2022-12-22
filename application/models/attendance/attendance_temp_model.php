<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class attendance_temp_model extends CI_Model
{

    function GetAttendance($attendance_parameter)
    {
        $procedure = "call usp_xt_attendance_temp_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $attendance_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    public function InsertImportAttendance($attendance_parameter)
    {
        $procedure = "call usp_xt_import_attendance_temp_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $attendance_parameter);
        return true;
    }

    function DeleteAttendanceTemp()
    {
        $procedure = "call usp_xt_attendance_temp_delete()";
        $sql_query = $this->db->query($procedure);
        return true;
    }
}
