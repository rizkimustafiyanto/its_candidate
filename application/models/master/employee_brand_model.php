<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_brand_model extends CI_Model
{
    function GetEmployeeBrand($employee_brand_parameter)
    {
        $procedure = "call usp_gm_employee_brand_select(?, ?)";
        $sql_query = $this->db->query($procedure, $employee_brand_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeBrand($employee_brand_parameter)
    {
        $procedure = "call usp_gm_employee_brand_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_brand_parameter);

        return true;
    }

    function UpdateEmployeeBrand($employee_brand_parameter)
    {
        $procedure = "call usp_gm_employee_brand_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_brand_parameter);
        return true;
    }


    function DeleteEmployeeBrand($employee_brand_parameter)
    {
        $procedure = "call usp_gm_employee_brand_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_brand_parameter);
        return true;
    }
}
