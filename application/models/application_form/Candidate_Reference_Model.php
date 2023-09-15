<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Reference_Model extends CI_Model
{
    function GetCandidateReference($candidate_reference_parameter)
    {
        $procedure = "call usp_gm_candidate_reference_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_reference_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateReferenceFlagAccordion($candidate_reference_parameter)
    {
        $procedure = "call usp_gm_candidate_reference_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_reference_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateReference($candidate_reference_parameter)
    {
        $procedure = "call usp_gm_candidate_reference_insert(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_reference_parameter);

        return true;
    }

    function UpdateCandidateReference($candidate_reference_parameter)
    {
        $procedure = "call usp_gm_candidate_reference_update(?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_reference_parameter);
        return true;
    }

    function DeleteCandidateReference($candidate_reference_parameter)
    {
        $procedure = "call usp_gm_candidate_reference_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_reference_parameter);
        return true;
    }
}
