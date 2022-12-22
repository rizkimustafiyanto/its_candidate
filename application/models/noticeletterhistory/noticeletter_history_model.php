<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class noticeletter_history_model extends CI_Model
{
    function GetNoticeLetterHistory($employee_noticeletter_parameter)
    {
        $procedure = "call usp_gm_notice_letter_history_select(?)";
        $sql_query = $this->db->query($procedure, $employee_noticeletter_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }
}
