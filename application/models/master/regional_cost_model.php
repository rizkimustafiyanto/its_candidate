<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class regional_cost_model extends CI_Model
{
    function GetRegionalCost($regional_cost_parameter)
    {
        $procedure = "call usp_gm_regional_cost_select(?, ?)";
        $sql_query = $this->db->query($procedure, $regional_cost_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertRegionalCost($regional_cost_parameter)
    {
        $procedure = "call usp_gm_regional_cost_insert(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $regional_cost_parameter);

        return true;
    }

    function UpdateRegionalCost($regional_cost_parameter)
    {
        $procedure = "call usp_gm_regional_cost_update(?,?,?,?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $regional_cost_parameter);
        return true;
    }


    function DeleteRegionalCost($regional_cost_parameter)
    {
        $procedure = "call usp_gm_regional_cost_delete(?)";
        $sql_query = $this->db->query($procedure, $regional_cost_parameter);
        return true;
    }

    public function kode()
    {
        $this->db->select('RIGHT(gm_regional_cost.regional_cost_id,3) as kode', FALSE);
        $this->db->order_by('regional_cost_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('gm_regional_cost');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $code = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $id = "RC" . "-";
        $customid = $id . $code;
        return $customid;
    }
}
