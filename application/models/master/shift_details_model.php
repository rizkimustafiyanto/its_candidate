<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class shift_details_model extends CI_Model
{
    function GetShiftDetails($shift_details_parameter)
    {
        $procedure = "call usp_gm_shift_details_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $shift_details_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertShiftDetails($shift_details_parameter)
    {
        $procedure = "call usp_gm_shift_details_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $shift_details_parameter);

        return true;
    }

    function UpdateShiftDetails($shift_details_parameter)
    {
        $procedure = "call usp_gm_shift_details_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $shift_details_parameter);
        return true;
    }


    function DeleteShiftDetails($shift_details_parameter)
    {
        $procedure = "call usp_gm_shift_details_delete(?)";
        $sql_query = $this->db->query($procedure, $shift_details_parameter);
        return true;
    }
}
