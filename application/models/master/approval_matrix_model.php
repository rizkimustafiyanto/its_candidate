<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class approval_matrix_model extends CI_Model
{
    function GetApprovalMatrix($approval_matrix_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_select(?, ?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertApprovalMatrix($approval_matrix_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $approval_matrix_parameter);

        return true;
    }

    function UpdateApprovalMatrix($approval_matrix_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_parameter);
        return true;
    }


    function DeleteApprovalMatrix($approval_matrix_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_delete(?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_parameter);
        return true;
    }
}
