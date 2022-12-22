<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class sickleaveattachment_model extends CI_Model
{
    function GetSickLeaveAttachment($sick_leave_attachment_parameter)
    {
        $procedure = "call usp_xt_sick_leave_attachment_select(?, ?, ?)";
        $sql_query = $this->db->query($procedure, $sick_leave_attachment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertSickLeaveAttachment($sick_leave_attachment_parameter)
    {
        $procedure = "call usp_xt_sick_leave_attachment_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $sick_leave_attachment_parameter);
        return true;
    }

    function DeleteSickLeaveAttachment($sick_leave_attachment_parameter)
    {
        $procedure = "call usp_xt_sick_leave_attachment_delete(?)";
        $sql_query = $this->db->query($procedure, $sick_leave_attachment_parameter);
        return true;
    }
}
