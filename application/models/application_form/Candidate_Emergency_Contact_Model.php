<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Emergency_Contact_Model extends CI_Model
{
    function GetCandidateEmergencyContact($candidate_emergency_contact_parameter)
    {
        $procedure = "call usp_gm_candidate_emergency_contact_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_emergency_contact_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateEmergencyContactFlagAccordion($candidate_emergency_contact_parameter)
    {
        $procedure = "call usp_gm_candidate_emergency_contact_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_emergency_contact_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateEmergencyContact($candidate_emergency_contact_parameter)
    {
        $procedure = "call usp_gm_candidate_emergency_contact_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_emergency_contact_parameter);

        return true;
    }

    function UpdateCandidateEmergencyContact($candidate_emergency_contact_parameter)
    {
        $procedure = "call usp_gm_candidate_emergency_contact_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_emergency_contact_parameter);
        return true;
    }

    function DeleteCandidateEmergencyContact($candidate_emergency_contact_parameter)
    {
        $procedure = "call usp_gm_candidate_emergency_contact_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_emergency_contact_parameter);
        return true;
    }
}
