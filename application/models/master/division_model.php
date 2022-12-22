<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class division_model extends CI_Model
{
    function GetDivision($division_parameter)
    {
        $procedure = "call usp_gm_division_select(?,?,?)";
        $sql_query = $this->db->query($procedure, $division_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertDivision($division_parameter)
    {
        $procedure = "call usp_gm_division_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $division_parameter);

        return true;
    }

    function UpdateDivision($division_parameter)
    {
        $procedure = "call usp_gm_division_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $division_parameter);
        return true;
    }

    function DeleteDivision($division_parameter)
    {
        $procedure = "call usp_gm_division_delete(?)";
        $sql_query = $this->db->query($procedure, $division_parameter);
        return true;
    }
}
