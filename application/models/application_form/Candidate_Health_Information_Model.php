<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Health_Information_Model extends CI_Model
{
    function GetCandidateHealthInformation($candidate_health_information_parameter)
    {
        $procedure = "call usp_gm_candidate_health_information_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_health_information_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCandidateHealthInformationFlagAccordion($candidate_health_information_parameter)
    {
        $procedure = "call usp_gm_candidate_health_information_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_health_information_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function GetCountCandidateHealthInformation($candidate_health_information_parameter)
    {
        $procedure = "call usp_gm_candidate_health_information_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_health_information_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_health_information_id;
        }
    }

    function InsertCandidateHealthInformation($candidate_health_information_parameter)
    {
        $procedure = "call usp_gm_candidate_health_information_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_health_information_parameter);

        return true;
    }
}
