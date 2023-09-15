<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Job_History_Model extends CI_Model
{
    function GetCandidateJobHistory($candidate_job_history_parameter)
    {
        $procedure = "call usp_gm_candidate_job_history_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_job_history_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateJobHistoryFlagAccordion($candidate_job_history_parameter)
    {
        $procedure = "call usp_gm_candidate_job_history_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_job_history_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateJobHistory($candidate_job_history_parameter)
    {
        $procedure = "call usp_gm_candidate_job_history_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_job_history_parameter);

        return true;
    }

    function UpdateCandidateJobHistory($candidate_job_history_parameter)
    {
        $procedure = "call usp_gm_candidate_job_history_update(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_job_history_parameter);
        return true;
    }

    function DeleteCandidateJobHistory($candidate_job_history_parameter)
    {
        $procedure = "call usp_gm_candidate_job_history_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_job_history_parameter);
        return true;
    }
}
