<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class apps_config_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/apps_config_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Apps Config';
        $this->loadViews("master/apps_config", $this->global, NULL, NULL);
    }

    function GetAppsConfig()
    {
        $apps_config_parameter = array('p_apps_config_id' => 0, 'p_apps_os' => 0, 'p_flag' => 0);
        $data['AppsConfigRecords'] = $this->apps_config_model->GetAppsConfig($apps_config_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Apps Config';
        $this->loadViews("master/apps_config", $this->global, $data, NULL);
    }

    function InsertAppsConfig()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('apps_config_id', 'Apps Config Id', 'required|max_length[50]|xss_clean');

        $apps_name = $this->input->post('apps_name');
        $apps_os = $this->input->post('apps_os');
        $apps_version = $this->input->post('apps_version');
        $apps_status = $this->input->post('apps_status');
        $apps_update_link = $this->input->post('apps_update_link');
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = NULL;

        $apps_config_parameter = array(
            $apps_name,
            $apps_os,
            $apps_version,
            $apps_status,
            $apps_update_link,
            $creation_user_id,
            $change_user_id
        );

        $result = $this->apps_config_model->InsertAppsConfig($apps_config_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Apps Config has been added !');
        } else {
            $this->session->set_flashdata('error', 'Apps Config cannot added, the data has been added !');
        }

        redirect('AppsConfig');
    }

    function UpdateAppsConfig()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('apps_config_id', 'Apps Config Id', 'required|max_length[50]|xss_clean');

        $apps_config_id = $this->input->post('apps_config_id_update');
        $apps_version = $this->input->post('apps_version_update');
        $apps_status = $this->input->post('apps_status_update');
        $apps_update_link = $this->input->post('apps_update_link_update');
        $change_user_id = $this->session->userdata('employee_id_update');
        $record_status = "A";

        $apps_config_parameter = array($apps_config_id, $apps_version, $apps_status, $apps_update_link, $change_user_id, $record_status);

        $result = $this->apps_config_model->UpdateAppsConfig($apps_config_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Apps Config updated !');
        } else {
            $this->session->set_flashdata('error', 'Apps Config cannot update, the data has been added !');
        }
        redirect('AppsConfig');
    }


    function DeleteAppsConfig($apps_config_id)
    {
        $apps_config_parameter = array($apps_config_id);

        $result = $this->apps_config_model->DeleteAppsConfig($apps_config_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Apps Config has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Apps Config cannot deleted !');
        }

        redirect('AppsConfig');
    }
}
