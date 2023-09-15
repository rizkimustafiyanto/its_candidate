<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Language_Skill_Model extends CI_Model
{
    function GetCandidateLanguageSkill($candidate_language_skill_parameter)
    {
        $procedure = "call usp_gm_candidate_language_skill_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_language_skill_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateLanguageSkillFlagAccordion($candidate_language_skill_parameter)
    {
        $procedure = "call usp_gm_candidate_language_skill_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_language_skill_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateLanguageSkill($candidate_language_skill_parameter)
    {
        $procedure = "call usp_gm_candidate_language_skill_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_language_skill_parameter);

        return true;
    }

    function UpdateCandidateLanguageSkill($candidate_language_skill_parameter)
    {
        $procedure = "call usp_gm_candidate_language_skill_update(?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_language_skill_parameter);
        return true;
    }

    function DeleteCandidateLanguageSkill($candidate_language_skill_parameter)
    {
        $procedure = "call usp_gm_candidate_language_skill_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_language_skill_parameter);
        return true;
    }
}
