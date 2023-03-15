<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class massiveleave_model extends CI_Model
{
    function GetMassiveLeave($massiveleave_parameter)
    {
        $procedure = "call usp_xt_massive_leave_select(?, ?)";
        $sql_query = $this->db->query($procedure, $massiveleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function GetMassiveLeave2($massiveleave_parameter)
    {
        $procedure = "call usp_xt_massive_leave_cabang_select(?, ?,?,?)";
        $sql_query = $this->db->query($procedure, $massiveleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    // function GetEmployeeCompany($paidleave_parameter)
    // {
    //     $procedure = "call usp_xt_paid_leave_select(?, ?,?,?)";
    //     $sql_query = $this->db->query($procedure, $paidleave_parameter);
    //     mysqli_next_result($this->db->conn_id);
    //     if ($sql_query->num_rows() > 0) {
    //         $ret = $sql_query->row();
    //         return $ret->company_id;
    //     }
    // }

    function InsertMassiveLeave($massiveleave_parameter)
    {
        $procedure = "call usp_xt_massive_leave_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $massiveleave_parameter);
        return true;
    }

    function DeleteMassiveLeave($massiveleave_parameter)
    {
        $procedure = "call usp_xt_massive_leave_delete(?)";
        $sql_query = $this->db->query($procedure, $massiveleave_parameter);
        return true;
    }


    function DeleteMassiveLeaveAllDateTemp($massiveleave_parameter)
    {
        $procedure = "call usp_xt_massive_leave_all_date_delete()";
        $sql_query = $this->db->query($procedure, $massiveleave_parameter);
        return true;
    }

    function InserttoEmployeeTemp2($employee_parameter)
    {
        $procedure = "call usp_xt_employee_temp_insert(?,?)";
        $result = $this->db->query($procedure, $employee_parameter);
        return true;
    }

    function GetEmployeeTemp($massiveleave_parameter)
    {
        $procedure = "call usp_xt_employee_temp_select(?,?)";
        $sql_query = $this->db->query($procedure, $massiveleave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function DeleteEmployeeTemp($employee_parameter)
    {
        $procedure = "call usp_xt_employee_temp_delete(?)";
        $sql_query = $this->db->query($procedure, $employee_parameter);
        return true;
    }
}
