<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class message_model extends CI_Model
{
    function GetMessage($message_parameter)
    {
        $procedure = "call usp_gm_message_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $message_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertMessage($message_parameter)
    {
        $procedure = "call usp_gm_message_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $message_parameter);

        return true;
    }

    function UpdateMessage($message_parameter)
    {
        $procedure = "call usp_gm_message_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $message_parameter);
        return true;
    }


    function DeleteMessage($message_parameter)
    {
        $procedure = "call usp_gm_message_delete(?)";
        $sql_query = $this->db->query($procedure, $message_parameter);
        return true;
    }
}
