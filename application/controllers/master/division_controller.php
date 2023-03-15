<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class division_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/division_model');
        $this->load->model('master/company_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Department';
        $this->loadViews("master/division", $this->global, NULL, NULL);
    }

    function GetDivision()
    {
        $this->load->model('master/division_model');
        $division_parameter = array('p_division_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['DivisionRecords'] = $this->division_model->GetDivision($division_parameter);
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Division Listing';
        $this->loadViews("master/division", $this->global, $data, NULL);
    }

    // function GetDivisionById($division_id, $flag)
    // {
    //     if ($this->isAdmin() == TRUE) {
    //         $this->loadThis();
    //     } else {
    //         $this->load->model('master/division_model');
    //         $division_parameter = array($division_id, $flag);
    //         $data['DivisionRecords'] = $this->division_model->GetDivision($division_parameter);
    //         $this->global['pageTitle'] = 'CodeInsect : division Listing';
    //         $this->loadViews("master/division", $this->global, $data, NULL);
    //     }
    // }

    function InsertDivision()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('division_name', 'division Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');

        $division_id = $this->input->post('division_id');
        $division_name = $this->input->post('division_name');
        $company_id = $this->input->post('company_id');

        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $division_parameter = array($division_id, $company_id, $division_name, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/division_model');
        $result = $this->division_model->InsertDivision($division_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Division has been added !');
        } else {
            $this->session->set_flashdata('error', 'Division cannot added !');
        }

        redirect('Division');
        // }
    }



    function UpdateDivision()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('division_name', 'Division Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('division_id', 'Division Id', 'required|max_length[50]|xss_clean');

        $division_id = $this->input->post('division_id_update');
        $division_name = $this->input->post('division_name_update');
        $company_id = $this->input->post('company_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $division_parameter = array($division_id, $division_name, $company_id, $change_user_id, $record_status);

        $this->load->model('master/division_model');
        $result = $this->division_model->UpdateDivision($division_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Division Updated');
        } else {
            $this->session->set_flashdata('error', 'Division Cannot Update');
        }

        redirect('Division');
    }

    function DeleteDivision($division_id)
    {
        $division_parameter = array($division_id);

        $result = $this->division_model->DeleteDivision($division_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Division has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Division cannot deleted !');
        }

        redirect('Division');
    }

    function GetDivisionByCompanyId()
    {

        $company_id = $this->input->post('company_id'); //receiving the ajax post from view

        $division_parameter =
            array('p_division_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 3);
        $records =  $this->division_model->GetDivision($division_parameter);

        echo json_encode($records);
    }

    function GetDivisionByCompanyId2()
    {

        $company_id = $this->input->post('company_id_update'); //receiving the ajax post from view

        $division_parameter =
            array('p_division_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 3);
        $records =  $this->division_model->GetDivision($division_parameter);

        echo json_encode($records);
    }


    function GetDivisionById($division_id, $flag)
    {
        $this->load->model('master/division_model');
        $division_parameter = array($division_id, '', $flag);
        $data['DivisionRecords'] = $this->division_model->GetVehicleType($division_parameter);
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Company Listing';
        $this->loadViews("master/division", $this->global, $data, NULL);
    }
}
