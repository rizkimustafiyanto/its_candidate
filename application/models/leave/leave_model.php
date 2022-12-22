<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class leave_model extends CI_Model
{
    function GetLeave($leave_parameter)
    {
        $procedure = "call usp_xt_leave_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $leave_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertLeave($leave_parameter)
    {
        $procedure = "call usp_xt_leave_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $leave_parameter);
        return true;
    }

    function UpdateLeave($leave_parameter)
    {
        $procedure = "call usp_xt_leave_update(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $leave_parameter);
        return true;
    }
    function DeleteLeave($leave_parameter)
    {
        $procedure = "call usp_xt_leave_delete(?)";
        $sql_query = $this->db->query($procedure, $leave_parameter);
        return true;
    }

    public function kode_leave()
    {
        $this->db->select('RIGHT(xt_leave.leave_id,3) as kode', FALSE);
        $this->db->order_by('leave_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('xt_leave');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $code = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $id = "L" . "-";
        $customid = $id . $code;
        return $customid;
    }
}
