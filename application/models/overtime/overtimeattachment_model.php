<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class overtimeattachment_model extends CI_Model
{
    function GetOvertimeAttachment($overtime_attachment_parameter)
    {
        $procedure = "call usp_xt_overtime_attachment_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $overtime_attachment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertOvertimeAttachment($overtime_attachment_parameter)
    {
        $procedure = "call usp_xt_overtime_attachment_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $overtime_attachment_parameter);
        return true;
    }

    function DeleteOvertimeAttachment($overtime_attachment_parameter)
    {
        $procedure = "call usp_xt_overtime_attachment_delete(?)";
        $sql_query = $this->db->query($procedure, $overtime_attachment_parameter);
        return true;
    }
}
