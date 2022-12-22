<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class attendance_model extends CI_Model
{
    function GetAttendance($attendance_parameter)
    {
        $procedure = "call usp_xt_attendance_select(?, ?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $attendance_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    // public function InsertImportAttendance($attendance_parameter)
    // {
    //     $procedure = "call usp_xt_import_attendance_insert(?,?,?,?,?,?,?,?,?)";
    //     $result = $this->db->query($procedure, $attendance_parameter);
    //     return true;
    // }

    function InsertAttendance($attendance_parameter)
    {
        $procedure = "call usp_xt_attendance_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $attendance_parameter);
        return true;
    }

    function UpdateAttendance($attendance_parameter)
    {
        $procedure = "call usp_xt_attendance_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $attendance_parameter);
        return true;
    }
}
