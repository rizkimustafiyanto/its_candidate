<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Question_Model extends CI_Model
{
    function GetCandidateQuestion($candidate_question_parameter)
    {
        $procedure = "call usp_gm_candidate_question_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_question_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCandidateQuestionFlagAccordion($candidate_question_parameter)
    {
        $procedure = "call usp_gm_candidate_question_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_question_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function GetCountCandidateQuestion($candidate_question_parameter)
    {
        $procedure = "call usp_gm_candidate_question_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_question_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_question_id;
        }
    }

    function InsertCandidateQuestion($candidate_question_parameter)
    {
        $procedure = "call usp_gm_candidate_question_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_question_parameter);

        return true;
    }
}
