<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class company_brand_model extends CI_Model
{
    function GetCompanyBrand($company_brand_parameter)
    {
        $procedure = "call usp_gm_company_brand_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $company_brand_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertCompanyBrand($company_brand_parameter)
    {
        $procedure = "call usp_gm_company_brand_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $company_brand_parameter);

        return true;
    }

    function UpdateCompanyBrand($company_brand_parameter)
    {
        $procedure = "call usp_gm_company_brand_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $company_brand_parameter);
        return true;
    }

    function DeleteCompanyBrand($company_brand_parameter)
    {
        $procedure = "call usp_gm_company_brand_delete(?)";
        $sql_query = $this->db->query($procedure, $company_brand_parameter);
        return true;
    }
}
