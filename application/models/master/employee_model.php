<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_model extends CI_Model
{
    function GetEmployee($employee_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetEmployeePerCabang($employee_parameter)
    {
        $procedure = "call usp_gm_employee_cabang_select(?, ?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetEmployee2($employee_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetEmployeePhoto($employee_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->photo_url;
        }
    }

    function GetEmployee1($employee_parameter)
    {
        $procedure = "call usp_gm_employee(?, ?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetCompanyEmployee($company_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $company_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->company_id;
        }
    }

    function InsertEmployee($employee_parameter)
    {
        $procedure = "call usp_gm_employee_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_parameter);
        return true;
    }

    function UpdateEmployee($employee_parameter)
    {
        $procedure = "call usp_gm_employee_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        return true;
    }

    function DeleteEmployee($employee_parameter)
    {
        $procedure = "call usp_gm_employee_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        return true;
    }

    function GetEmployeeShiftStart($employee_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->shift_time_start;
        }
    }

    function GetCompanyBrandId($employee_parameter)
    {
        $procedure = "call usp_gm_employee_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->row();
            return $ret->company_brand_id;
        }
    }

    function GetEmployee3($employee_parameter)
    {
        $procedure = "call usp_gm_employee_in_brand_select(?, ?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
