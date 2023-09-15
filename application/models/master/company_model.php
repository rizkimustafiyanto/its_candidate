<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class company_model extends CI_Model
{
    function GetCompany($company_parameter)
    {
        $procedure = "call usp_gm_company_select(?, ?)";
        $sql_query = $this->db->query($procedure, $company_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
