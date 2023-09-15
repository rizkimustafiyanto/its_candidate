<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Social_Activity_Model extends CI_Model
{
    function GetCandidateSocialActivity($candidate_social_activity_parameter)
    {
        $procedure = "call usp_gm_candidate_social_activity_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_social_activity_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateSocialActivityFlagAccordion($candidate_social_activity_parameter)
    {
        $procedure = "call usp_gm_candidate_social_activity_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_social_activity_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateSocialActivity($candidate_social_activity_parameter)
    {
        $procedure = "call usp_gm_candidate_social_activity_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_social_activity_parameter);

        return true;
    }

    function UpdateCandidateSocialActivity($candidate_social_activity_parameter)
    {
        $procedure = "call usp_gm_candidate_social_activity_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_social_activity_parameter);
        return true;
    }

    function DeleteCandidateSocialActivity($candidate_social_activity_parameter)
    {
        $procedure = "call usp_gm_candidate_social_activity_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_social_activity_parameter);
        return true;
    }
}
