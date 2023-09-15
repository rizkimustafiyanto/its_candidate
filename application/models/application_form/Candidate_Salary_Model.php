<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Salary_Model extends CI_Model
{
    function GetCandidateSalary($candidate_salary_parameter)
    {
        $procedure = "call usp_gm_candidate_salary_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_salary_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCandidateSalaryFlagAccordion($candidate_salary_parameter)
    {
        $procedure = "call usp_gm_candidate_salary_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_salary_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->flag_accordion;
        }
    }


    function GetCountCandidateSalary($candidate_salary_parameter)
    {
        $procedure = "call usp_gm_candidate_salary_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_salary_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_salary_id;
        }
    }

    function InsertCandidateSalary($candidate_salary_parameter)
    {
        $procedure = "call usp_gm_candidate_salary_insert(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_salary_parameter);

        return true;
    }
}
