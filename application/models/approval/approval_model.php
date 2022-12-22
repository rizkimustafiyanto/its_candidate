<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class approval_model extends CI_Model
{
    function GetApproval($approval_parameter)
    {
        $procedure = "call usp_xt_approval_select(?)";
        $sql_query = $this->db->query($procedure, $approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetApprovalCancelRequest($approval_parameter)
    {
        $procedure = "call usp_xt_approval_cancel_select(?)";
        $sql_query = $this->db->query($procedure, $approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function MultipleApproval($approval_parameter)
    {
        $procedure = "call usp_xt_multiple_approval_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $approval_parameter);
        return true;
    }
}
