<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class noticeletter_model extends CI_Model
{
    function GetNoticeLetter($employee_notice_letter_parameter)
    {
        $procedure = "call usp_gm_employee_notice_letter_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $employee_notice_letter_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertNoticeLetter($employee_notice_letter_parameter)
    {
        $procedure = "call usp_gm_employee_notice_letter_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_notice_letter_parameter);
        return true;
    }

    function DeleteNoticeLetter($employee_notice_letter_parameter)
    {
        $procedure = "call usp_gm_employee_notice_letter_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_notice_letter_parameter);
        return true;
    }
}
