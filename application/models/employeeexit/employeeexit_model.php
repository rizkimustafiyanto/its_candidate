<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employeeexit_model extends CI_Model
{
    function GetEmployeeExit($employee_exit_parameter)
    {
        $procedure = "call usp_gm_employee_exit_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $employee_exit_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeExit($employee_exit_parameter)
    {
        $procedure = "call usp_gm_employee_exit_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_exit_parameter);
        return true;
    }

    function UpdateEmployeeExit($employee_exit_parameter)
    {
        $procedure = "call usp_gm_employee_exit_update(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_exit_parameter);
        return true;
    }

    function DeleteEmployeeExit($employee_exit_parameter)
    {
        $procedure = "call usp_gm_employee_exit_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_exit_parameter);
        return true;
    }
}
