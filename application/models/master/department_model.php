<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class department_model extends CI_Model
{
    function GetDepartment($department_parameter)
    {
        $procedure = "call usp_gm_department_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $department_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertDepartment($department_parameter)
    {
        $procedure = "call usp_gm_department_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $department_parameter);

        return true;
    }

    function UpdateDepartment($department_parameter)
    {
        $procedure = "call usp_gm_department_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $department_parameter);
        return true;
    }

    function DeleteDepartment($department_parameter)
    {
        $procedure = "call usp_gm_department_delete(?)";
        $sql_query = $this->db->query($procedure, $department_parameter);
        return true;
    }
}
