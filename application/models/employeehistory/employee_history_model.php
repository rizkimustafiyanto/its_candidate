<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_history_model extends CI_Model
{
    function GetEmployeeHistory($employee_history_parameter)
    {
        $procedure = "call usp_xt_employee_history_select(?)";
        $sql_query = $this->db->query($procedure, $employee_history_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
