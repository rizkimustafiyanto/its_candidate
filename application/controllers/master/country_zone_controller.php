<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class country_zone_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/country_zone_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/regional_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Country Zone';
        $this->loadViews("master/country_zone", $this->global, NULL, NULL);
    }

    function GetCountryZone()
    {
        $country_zone_parameter = array('p_country_zone_id' => 0, 'p_flag' => 0);
        $data['CountryZoneRecords'] = $this->country_zone_model->GetCountryZone($country_zone_parameter);

        //variable
        $variable_zone_type_parameter = array('p_variable_type' => 'zone_type', 'p_flag' => 0);
        $data['ZoneTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //regional
        $regional_parameter = array('p_regional_id' => 0, 'p_flag' => 0);
        $data['RegionalRecords'] = $this->regional_model->GetRegional($regional_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Country Zone Listing';
        $this->loadViews("master/country_zone", $this->global, $data, NULL);
    }

    function GetCountryZoneById($country_zone_id, $flag)
    {
        $country_zone_parameter = array($country_zone_id, $flag);
        $data['CountryZoneRecords'] = $this->country_zone_model->GetCountryZone($country_zone_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Country Zone Listing';
        $this->loadViews("master/country_zone", $this->global, $data, NULL);
    }

    function InsertCountryZone()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_name', 'Country Name', 'required|xss_clean');
        $this->form_validation->set_rules('zone_type_id', 'Zone Type Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('regional_id', 'Regional Id', 'required|max_length[50]|xss_clean');

        $country_name = $this->input->post('country_name');
        $zone_type_id = 'ZT-002';
        $regional_id = $this->input->post('regional_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $country_zone_parameter = array($country_name, $zone_type_id, $regional_id, $change_no, $creation_user_id, $change_user_id, $record_status);

        $result = $this->country_zone_model->InsertCountryZone($country_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Country Zone has been added !');
        } else {
            $this->session->set_flashdata('error', 'Country Zone cannot added !');
        }

        redirect('CountryZone');
    }


    function UpdateCountryZone()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('country_name', 'Country Name', 'required|xss_clean');
        $this->form_validation->set_rules('zone_type_id', 'Zone Type Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('regional_id', 'Regional Id', 'required|max_length[50]|xss_clean');

        $country_zone_id = $this->input->post('country_zone_id_update');
        $country_name = $this->input->post('country_name_update');
        $zone_type_id = 'ZT-002';
        $regional_id = $this->input->post('regional_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $country_zone_parameter = array($country_zone_id, $country_name, $zone_type_id, $regional_id, $change_user_id, $record_status);

        $result = $this->country_zone_model->UpdateCountryZone($country_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Country Zone updated !');
        } else {
            $this->session->set_flashdata('error', 'Country Zone cannot update !');
        }

        redirect('CountryZone');
    }

    function DeleteCountryZone($country_zone_id)
    {
        $country_zone_parameter = array($country_zone_id);

        $result = $this->country_zone_model->DeleteCountryZone($country_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Country Zone has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Country Zone cannot deleted !');
        }

        redirect('CountryZone');
    }
}
