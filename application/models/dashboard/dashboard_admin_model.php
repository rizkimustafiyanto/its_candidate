<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_admin_model extends CI_Model
{
    function GetCountPaidLeave($count_paid_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_admin_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_paid_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountSickLeave($count_sick_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_admin_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_sick_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountLeave($count_leave_parameter)
    {
        $procedure = "call usp_xt_dashboard_admin_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetCountOvertime($count_overtime_parameter)
    {
        $procedure = "call usp_xt_dashboard_admin_select(?,?)";
        $sql_query = $this->db->query($procedure, $count_overtime_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }

    function GetDataGrafikAdmin($grafik_admin_parameter)
    {
        $procedure = "call usp_xt_dashboard_admin_select(?,?)";
        $sql_query = $this->db->query($procedure, $grafik_admin_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            $ret =  $sql_query->num_rows();
            return $ret;
        }
    }
}
