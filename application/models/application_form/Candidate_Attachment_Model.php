<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Attachment_Model extends CI_Model
{
    function GetCandidateAttachment($candidate_attachment_parameter)
    {
        $procedure = "call usp_gm_candidate_attachment_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_attachment_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->attachment_file_url;
        }
    }

    function GetCandidateCompanyStructureFlagAccordion($candidate_company_structure_parameter)
    {
        $procedure = "call usp_gm_candidate_company_structure_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_company_structure_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateAttachment($candidate_attachment_parameter)
    {
        $procedure = "call usp_gm_candidate_attachment_insert(?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_attachment_parameter);

        return true;
    }

    function UpdateCandidateCompanyStructure($candidate_company_structure_parameter)
    {
        $procedure = "call usp_gm_candidate_company_structure_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_company_structure_parameter);
        return true;
    }

    function DeleteCandidateCompanyStructure($candidate_company_structure_parameter)
    {
        $procedure = "call usp_gm_candidate_company_structure_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_company_structure_parameter);
        return true;
    }
}
