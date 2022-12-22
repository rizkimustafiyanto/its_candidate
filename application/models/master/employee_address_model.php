<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_address_model extends CI_Model
{
    function GetEmployeeAddress($employee_address_parameter)
    {
        $procedure = "call usp_gm_employee_address_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $employee_address_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeAddress($employee_address_parameter)
    {
        $procedure = "call usp_gm_employee_address_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_address_parameter);
        return true;
    }

    function UpdateEmployeeAddress($employee_address_parameter)
    {
        $procedure = "call usp_gm_employee_address_update(?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_address_parameter);
        return true;
    }

    function DeleteEmployeeAddress($employee_address_parameter)
    {
        $procedure = "call usp_gm_employee_address_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_address_parameter);
        return true;
    }
}
