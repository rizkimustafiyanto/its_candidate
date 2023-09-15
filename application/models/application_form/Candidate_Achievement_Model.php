<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Achievement_Model extends CI_Model
{
    function GetCandidateAchievement($candidate_achievement_parameter)
    {
        $procedure = "call usp_gm_candidate_achievement_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_achievement_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateAchievementFlagAccordion($candidate_achievement_parameter)
    {
        $procedure = "call usp_gm_candidate_achievement_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_achievement_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateAchievement($candidate_achievement_parameter)
    {
        $procedure = "call usp_gm_candidate_achievement_insert(?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_achievement_parameter);

        return true;
    }

    function UpdateCandidateAchievement($candidate_achievement_parameter)
    {
        $procedure = "call usp_gm_candidate_achievement_update(?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_achievement_parameter);
        return true;
    }

    function DeleteCandidateAchievement($candidate_achievement_parameter)
    {
        $procedure = "call usp_gm_candidate_achievement_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_achievement_parameter);
        return true;
    }
}
