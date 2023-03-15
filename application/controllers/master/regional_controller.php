<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class regional_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/regional_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Regional';
        $this->loadViews("master/regional", $this->global, NULL, NULL);
    }

    function GetRegional()
    {
        $this->load->model('master/regional_model');
        $regional_parameter = array('p_regional_id' => 0, 'p_flag' => 0);
        $data['RegionalRecords'] = $this->regional_model->GetRegional($regional_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Regional Listing';
        $this->loadViews("master/regional", $this->global, $data, NULL);
    }

    function GetRegionalById($regional_id, $flag)
    {
        $this->load->model('master/regional_model');
        $regional_parameter = array($regional_id, $flag);
        $data['RegionalRecords'] = $this->regional_model->GetRegional($regional_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Regional Listing';
        $this->loadViews("master/regional", $this->global, $data, NULL);
    }

    function InsertRegional()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('regional_name', 'Regional Name', 'required|xss_clean');
        $this->form_validation->set_rules('currency', 'Currency', 'required|max_length[50]|xss_clean');

        $regional_name = $this->input->post('regional_name');
        $currency = $this->input->post('currency');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $regional_parameter = array($regional_name, $currency, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/regional_model');
        $result = $this->regional_model->InsertRegional($regional_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Regional has been added !');
        } else {
            $this->session->set_flashdata('error', 'Regional cannot added !');
        }

        redirect('Regional');
    }


    function UpdateRegional()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('regional_id', 'Regional Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('regional_name', 'Regional Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('currency', 'Currency', 'required|max_length[50]|xss_clean');

        $regional_id = $this->input->post('regional_id_update');
        $regional_name = $this->input->post('regional_name_update');
        $currency = $this->input->post('currency_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $regional_parameter = array($regional_id, $regional_name, $currency, $change_user_id, $record_status);

        $this->load->model('master/regional_model');
        $result = $this->regional_model->UpdateRegional($regional_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Regional updated !');
        } else {
            $this->session->set_flashdata('error', 'Regional cannot update !');
        }

        redirect('Regional');
    }

    function DeleteRegional($regional_id)
    {
        $regional_parameter = array($regional_id);

        $result = $this->regional_model->DeleteRegional($regional_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Regional has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Regional cannot deleted !');
        }

        redirect('Regional');
    }
}
