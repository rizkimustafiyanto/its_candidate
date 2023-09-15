<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Understanding_Position_Model extends CI_Model
{
    function GetCandidateUnderstandingPosition($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_understanding_position_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCandidateUnderstandingPositionFlagAccordion($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_understanding_position_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function GetCountCandidateUnderstandingPosition($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_understanding_position_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_understanding_position_id;
        }
    }

    function InsertCandidateUnderstandingPosition($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_understanding_position_parameter);

        return true;
    }

    function UpdateCandidateUnderstandingPosition($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_understanding_position_parameter);
        return true;
    }

    function DeleteCandidateUnderstandingPosition($candidate_understanding_position_parameter)
    {
        $procedure = "call usp_gm_candidate_understanding_position_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_understanding_position_parameter);
        return true;
    }
}
