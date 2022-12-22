<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class paid_leave_level_model extends CI_Model
{
    function GetPaidLeaveLevel($paid_leave_level_parameter)
    {
        $procedure = "call usp_gm_paid_leave_level_select(?, ?)";
        $sql_query = $this->db->query($procedure, $paid_leave_level_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertPaidLeaveLevel($paid_leave_level_parameter)
    {
        $procedure = "call usp_gm_paid_leave_level_insert(?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $paid_leave_level_parameter);

        return true;
    }

    function UpdatePaidLeaveLevel($paid_leave_level_parameter)
    {
        $procedure = "call usp_gm_paid_leave_level_update(?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $paid_leave_level_parameter);
        return true;
    }


    function DeletePaidLeaveLevel($paid_leave_level_parameter)
    {
        $procedure = "call usp_gm_paid_leave_level_delete(?)";
        $sql_query = $this->db->query($procedure, $paid_leave_level_parameter);
        return true;
    }

    public function kode()
    {
        $this->db->select('RIGHT(gm_paid_leave_level.paid_leave_level_id,3) as kode', FALSE);
        $this->db->order_by('paid_leave_level_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('gm_paid_leave_level');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $code = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $id = "AM" . "-";
        $customid = $id . $code;
        return $customid;
    }
}
