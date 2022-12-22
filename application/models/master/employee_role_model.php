<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_role_model extends CI_Model
{
    function GetEmployeeRole($employee_role_parameter)
    {
        $procedure = "call usp_gm_employee_role_select(?, ?)";
        $sql_query = $this->db->query($procedure, $employee_role_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeRole($employee_role_parameter)
    {
        $procedure = "call usp_gm_employee_role_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_role_parameter);

        return true;
    }

    function UpdateEmployeeRole($employee_role_parameter)
    {
        $procedure = "call usp_gm_employee_role_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_role_parameter);
        return true;
    }


    function DeleteEmployeeRole($employee_role_parameter)
    {
        $procedure = "call usp_gm_employee_role_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_role_parameter);
        return true;
    }
}
