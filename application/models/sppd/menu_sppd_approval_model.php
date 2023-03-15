<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class menu_sppd_approval_model extends CI_Model
{
    function GetMenuSPPDApproval($menu_sppd_approval_parameter)
    {
        $procedure = "call usp_xt_menu_sppd_approval_select(?)";
        $sql_query = $this->db->query($procedure, $menu_sppd_approval_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
