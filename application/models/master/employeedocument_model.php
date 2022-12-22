<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employeedocument_model extends CI_Model
{
    function GetEmployeeDocument($employee_document_parameter)
    {
        $procedure = "call usp_gm_employee_document_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $employee_document_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeDocument($employee_document_parameter)
    {
        $procedure = "call usp_gm_employee_document_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_document_parameter);
        return true;
    }

    function DeleteEmployeeDocument($employee_document_parameter)
    {
        $procedure = "call usp_gm_employee_document_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_document_parameter);
        return true;
    }
}
