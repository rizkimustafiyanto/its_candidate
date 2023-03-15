<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class employee_leader_model extends CI_Model
{
    function GetEmployeeLeader($employee_leader_parameter)
    {
        $procedure = "call usp_gm_employee_leader_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $employee_leader_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetEmployeeLeaderPerCabang($employee_leader_parameter)
    {
        $procedure = "call usp_gm_employee_leader_cabang_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_leader_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertEmployeeLeader($employee_leader_parameter)
    {
        $procedure = "call usp_gm_employee_leader_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $employee_leader_parameter);
        return true;
    }

    function UpdateEmployeeLeader($employee_leader_parameter)
    {
        $procedure = "call usp_gm_employee_leader_update(?,?,?,?)";
        $sql_query = $this->db->query($procedure, $employee_leader_parameter);
        return true;
    }

    function DeleteEmployeeLeader($employee_leader_parameter)
    {
        $procedure = "call usp_gm_employee_leader_delete(?,?)";
        $sql_query = $this->db->query($procedure, $employee_leader_parameter);
        return true;
    }
}
