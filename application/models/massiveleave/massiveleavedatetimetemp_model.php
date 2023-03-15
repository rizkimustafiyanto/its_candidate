<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class massiveleavedatetimetemp_model extends CI_Model
{
    function GetMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter)
    {
        $procedure = "call usp_xt_massive_leave_datetime_temp_select(?)";
        $sql_query = $this->db->query($procedure, $massive_leave_datetime_temp_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter)
    {
        $procedure = "call usp_xt_massive_leave_datetime_temp_insert(?)";
        $result = $this->db->query($procedure, $massive_leave_datetime_temp_parameter);
        return true;
    }

    function DeleteMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter)
    {
        $procedure = "call usp_xt_massive_leave_datetime_temp_delete(?)";
        $sql_query = $this->db->query($procedure, $massive_leave_datetime_temp_parameter);
        return true;
    }
}
