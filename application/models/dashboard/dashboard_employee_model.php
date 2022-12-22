<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_employee_model extends CI_Model
{
    function GetCountPaidLeave($count_paid_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountSickLeave($count_sick_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_sick_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountLeave($count_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountOvertime($count_overtime_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_overtime_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetDataGrafikEmployee($grafik_employee_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $grafik_employee_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetAmountPaidLeave($amount_paid_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $amount_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->amountpaidleaveandextpaidleave;
        }
    }

    function GetTakenPaidLeave($taken_paid_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $taken_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->takenpaidleave;
        }
    }

    function GetRemainingPaidLeave($remaining_paid_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_employee_select(?,?)";
        $sql_query = $this->db->query($procedure, $remaining_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret = $sql_query->row();
            return $ret->remainingpaidleave;
        }
    }
}
