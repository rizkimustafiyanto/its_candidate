<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class province_zone_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/province_zone_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/regional_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Province Zone';
        $this->loadViews("master/province_zone", $this->global, NULL, NULL);
    }

    function GetProvinceZone()
    {
        $province_zone_parameter = array('p_province_zone_id' => 0, 'p_flag' => 0);
        $data['ProvinceZoneRecords'] = $this->province_zone_model->GetProvinceZone($province_zone_parameter);

        //variable
        $variable_zone_type_parameter = array('p_variable_type' => 'zone_type', 'p_flag' => 0);
        $data['ZoneTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //regional
        $regional_parameter = array('p_regional_id' => 0, 'p_flag' => 0);
        $data['RegionalRecords'] = $this->regional_model->GetRegional($regional_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Province Zone Listing';
        $this->loadViews("master/province_zone", $this->global, $data, NULL);
    }

    function GetProvinceZoneById($province_zone_id, $flag)
    {
        $province_zone_parameter = array($province_zone_id, $flag);
        $data['ProvinceZoneRecords'] = $this->province_zone_model->GetProvinceZone($province_zone_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Province Zone Listing';
        $this->loadViews("master/province_zone", $this->global, $data, NULL);
    }

    function InsertProvinceZone()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('province_name', 'Province Name', 'required|xss_clean');
        $this->form_validation->set_rules('zone_type_id', 'Zone Type Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('regional_id', 'Regional Id', 'required|max_length[50]|xss_clean');

        $province_name = $this->input->post('province_name');
        $zone_type_id = 'ZT-001';
        $regional_id = $this->input->post('regional_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $province_zone_parameter = array($province_name, $zone_type_id, $regional_id, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/province_zone_model');
        $result = $this->province_zone_model->InsertProvinceZone($province_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Province Zone has been added !');
        } else {
            $this->session->set_flashdata('error', 'Province Zone cannot added !');
        }

        redirect('ProvinceZone');
    }


    function UpdateProvinceZone()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('province_name', 'Province Name', 'required|xss_clean');
        $this->form_validation->set_rules('zone_type_id', 'Zone Type Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('regional_id', 'Regional Id', 'required|max_length[50]|xss_clean');

        $province_zone_id = $this->input->post('province_zone_id_update');
        $province_name = $this->input->post('province_name_update');
        $zone_type_id = 'ZT-001';
        $regional_id = $this->input->post('regional_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $province_zone_parameter = array($province_zone_id, $province_name, $zone_type_id, $regional_id, $change_user_id, $record_status);

        $this->load->model('master/province_zone_model');
        $result = $this->province_zone_model->UpdateProvinceZone($province_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Province Zone updated !');
        } else {
            $this->session->set_flashdata('error', 'Province Zone cannot update !');
        }

        redirect('ProvinceZone');
    }

    function DeleteProvinceZone($province_zone_id)
    {
        $province_zone_parameter = array($province_zone_id);

        $result = $this->province_zone_model->DeleteProvinceZone($province_zone_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Province Zone has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Province Zone cannot deleted !');
        }

        redirect('ProvinceZone');
    }
}
