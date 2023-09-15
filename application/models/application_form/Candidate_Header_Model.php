<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Header_Model extends CI_Model
{
    function GetCandidateHeader($candidate_header_parameter)
    {
        $procedure = "call usp_gm_candidate_header_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_header_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret;
        }
    }

    function GetCountCandidateHeader($candidate_header_parameter)
    {
        $procedure = "call usp_gm_candidate_header_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $candidate_header_parameter);
        mysqli_next_result($this->db->conn_id);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->count_candidate_header_id;
        }
    }

    function InsertCandidateHeader($candidate_header_parameter)
    {
        $procedure = "call usp_gm_candidate_header_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $candidate_header_parameter);

        return true;
    }
}
