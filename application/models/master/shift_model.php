<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class shift_model extends CI_Model
{
    function GetShift($shift_parameter)
    {
        $procedure = "call usp_gm_shift_select(?, ?)";
        $sql_query = $this->db->query($procedure, $shift_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetShift2($shift_parameter)
    {
        $procedure = "call usp_gm_shift_by_company_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $shift_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }


    function InsertShift($shift_parameter)
    {
        $procedure = "call usp_gm_shift_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $shift_parameter);

        return true;
    }

    function UpdateShift($shift_parameter)
    {
        $procedure = "call usp_gm_shift_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $shift_parameter);
        return true;
    }


    function DeleteShift($shift_parameter)
    {
        $procedure = "call usp_gm_shift_delete(?)";
        $sql_query = $this->db->query($procedure, $shift_parameter);
        return true;
    }
}
