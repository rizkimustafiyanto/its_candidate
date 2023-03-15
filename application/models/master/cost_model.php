<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class cost_model extends CI_Model
{
    function GetCost($cost_parameter)
    {
        $procedure = "call usp_gm_cost_select(?, ?)";
        $sql_query = $this->db->query($procedure, $cost_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetNominalByCostLevelTujuan($cost_parameter)
    {
        $procedure = "call usp_gm_nominal_by_cost_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $cost_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertCost($cost_parameter)
    {
        $procedure = "call usp_gm_cost_insert(?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $cost_parameter);

        return true;
    }

    function UpdateCost($cost_parameter)
    {
        $procedure = "call usp_gm_cost_update(?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $cost_parameter);
        return true;
    }

    function DeleteCost($cost_parameter)
    {
        $procedure = "call usp_gm_cost_delete(?)";
        $sql_query = $this->db->query($procedure, $cost_parameter);
        return true;
    }
}
