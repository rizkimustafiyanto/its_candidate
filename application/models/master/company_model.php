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

    function InsertCompany($company_parameter)
    {
        $procedure = "call usp_gm_company_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $company_parameter);

        return true;
    }

    function UpdateCompany($company_parameter)
    {
        $procedure = "call usp_gm_company_update(?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $company_parameter);
        return true;
    }

    function DeleteCompany($company_parameter)
    {
        $procedure = "call usp_gm_company_delete(?)";
        $sql_query = $this->db->query($procedure, $company_parameter);
        return true;
    }
}
