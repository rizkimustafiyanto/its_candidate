<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class approval_matrix_person_model extends CI_Model
{
    function GetApprovalMatrixPerson($approval_matrix_person_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_person_select(?, ?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_person_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertApprovalMatrixPerson($approval_matrix_person_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_person_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $approval_matrix_person_parameter);

        return true;
    }

    function UpdateApprovalMatrixPerson($approval_matrix_person_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_person_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_person_parameter);
        return true;
    }


    function DeleteApprovalMatrixPerson($approval_matrix_person_parameter)
    {
        $procedure = "call usp_gm_approval_matrix_person_delete(?)";
        $sql_query = $this->db->query($procedure, $approval_matrix_person_parameter);
        return true;
    }
}
