<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Courses_Model extends CI_Model
{
    function GetCandidateCourses($candidate_courses_parameter)
    {
        $procedure = "call usp_gm_candidate_courses_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_courses_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCandidateCoursesFlagAccordion($candidate_courses_parameter)
    {
        $procedure = "call usp_gm_candidate_courses_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_courses_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->flag_accordion;
        }
    }

    function InsertCandidateCourses($candidate_courses_parameter)
    {
        $procedure = "call usp_gm_candidate_courses_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_courses_parameter);

        return true;
    }

    function UpdateCandidateCourses($candidate_courses_parameter)
    {
        $procedure = "call usp_gm_candidate_courses_update(?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $candidate_courses_parameter);
        return true;
    }

    function DeleteCandidateCourses($candidate_courses_parameter)
    {
        $procedure = "call usp_gm_candidate_courses_delete(?)";
        $sql_query = $this->db->query($procedure, $candidate_courses_parameter);
        return true;
    }
}
