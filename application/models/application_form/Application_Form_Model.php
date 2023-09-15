<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Application_Form_Model extends CI_Model
{
    function GetApplicationForm($application_form_parameter)
    {
        $procedure = "call usp_gm_candidate_header_select(?, ?,?)";
        $sql_query = $this->db->query($procedure, $application_form_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    // function GetDynamicMenu()
    // {
    //     $this->load->model('menu_model');
    // }

    // function InsertMenu($menu_parameter)
    // {
    //     $procedure = "call usp_gm_menu_insert(?,?,?,?,?,?,?)";
    //     $result = $this->db->query($procedure, $menu_parameter);

    //     return true;
    // }

    // function UpdateMenu($menu_parameter)
    // {
    //     $procedure = "call usp_gm_menu_update(?,?,?,?,?,?)";
    //     $sql_query = $this->db->query($procedure, $menu_parameter);
    //     return true;
    // }

    // function DeleteMenu($menu_parameter)
    // {
    //     $procedure = "call usp_gm_menu_delete(?)";
    //     $sql_query = $this->db->query($procedure, $menu_parameter);
    //     return true;
    // }
}
