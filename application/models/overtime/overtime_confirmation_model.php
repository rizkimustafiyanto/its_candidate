<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class overtime_confirmation_model extends CI_Model
{

    function UpdateOvertimeConfirmation($overtime_confirmation_parameter)
    {
        $procedure = "call usp_xt_overtime_confirmation_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $overtime_confirmation_parameter);
        return true;
    }

    function GetConfirmation($confirmation_parameter)
    {
        $procedure = "call usp_xt_confirmation_select(?)";
        $sql_query = $this->db->query($procedure, $confirmation_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
