<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Hobby_Model extends CI_Model
{
    function GetCandidateHobby($candidate_hobby_parameter)
    {
        $procedure = "call usp_gm_candidate_hobby_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_hobby_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateHobbyFlagAccordion($candidate_hobby_parameter)
    {
        $procedure = "call usp_gm_candidate_hobby_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_hobby_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateHobby($candidate_hobby_parameter)
    {
        $procedure = "call usp_gm_candidate_hobby_insert(?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_hobby_parameter);

        return true;
    }

    function UpdateCandidateHobby($candidate_hobby_parameter)
    {
        $procedure = "call usp_gm_candidate_hobby_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_hobby_parameter);
        return true;
    }

    function DeleteCandidateHobby($candidate_hobby_parameter)
    {
        $procedure = "call usp_gm_candidate_hobby_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_hobby_parameter);
        return true;
    }
}
