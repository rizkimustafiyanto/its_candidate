<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class announcement_model extends CI_Model
{
    function GetAnnouncement($announcement_parameter)
    {
        $procedure = "call usp_gm_announcement_select(?, ?)";
        $sql_query = $this->db->query($procedure, $announcement_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    function InsertAnnouncement($announcement_parameter)
    {
        $procedure = "call usp_gm_announcement_insert(?,?,?,?,?,?,?)";
        $result = $this->db->query($procedure, $announcement_parameter);

        return true;
    }

    function UpdateAnnouncement($announcement_parameter)
    {
        $procedure = "call usp_gm_announcement_update(?,?,?,?,?,?)";
        $sql_query = $this->db->query($procedure, $announcement_parameter);
        return true;
    }


    function DeleteAnnouncement($announcement_parameter)
    {
        $procedure = "call usp_gm_announcement_delete(?)";
        $sql_query = $this->db->query($procedure, $announcement_parameter);
        return true;
    }
}
