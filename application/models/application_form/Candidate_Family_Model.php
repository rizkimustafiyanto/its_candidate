<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Family_Model extends CI_Model
{
    function GetCandidateFamily($candidate_family_parameter)
    {
        $procedure = "call usp_gm_candidate_family_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_family_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateFamilyFlagAccordion($candidate_family_parameter)
    {
        $procedure = "call usp_gm_candidate_family_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_family_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateFamily($candidate_family_parameter)
    {
        $procedure = "call usp_gm_candidate_family_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_family_parameter);

        return true;
    }

    function UpdateCandidateFamily($candidate_family_parameter)
    {
        $procedure = "call usp_gm_candidate_family_update(?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_family_parameter);
        return true;
    }

    function DeleteCandidateFamily($candidate_family_parameter)
    {
        $procedure = "call usp_gm_candidate_family_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_family_parameter);
        return true;
    }
}
