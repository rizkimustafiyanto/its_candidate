<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class company_branch_model extends CI_Model
{
    function GetCompanyBranch($company_branch_parameter)
    {
        $procedure = "call usp_gm_company_branch_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $company_branch_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertCompanyBranch($company_branch_parameter)
    {
        $procedure = "call usp_gm_company_branch_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $company_branch_parameter);

        return true;
    }

    function UpdateCompanyBranch($company_branch_parameter)
    {
        $procedure = "call usp_gm_company_branch_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $company_branch_parameter);
        return true;
    }

    function DeleteCompanyBranch($company_branch_parameter)
    {
        $procedure = "call usp_gm_company_branch_delete(?)";
        $sql_query = $this->db->query($procedure, $company_branch_parameter);
        return true;
    }
}
