<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Character_Model extends CI_Model
{
    function GetCandidateCharacter($candidate_character_parameter)
    {
        $procedure = "call usp_gm_candidate_character_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_character_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCandidateCharacterFlagAccordion($candidate_character_parameter)
    {
        $procedure = "call usp_gm_candidate_character_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_character_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function GetCountCandidateCharacter($candidate_character_parameter)
    {
        $procedure = "call usp_gm_candidate_character_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_character_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_character_id;
        }
    }

    function InsertCandidateCharacter($candidate_character_parameter)
    {
        $procedure = "call usp_gm_candidate_character_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_character_parameter);

        return true;
    }
}
