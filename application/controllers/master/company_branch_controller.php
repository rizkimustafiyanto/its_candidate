<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class company_branch_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/company_branch_model');
        $this->load->model('master/company_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Company Branch';
        $this->loadViews("master/company_branch", $this->global, NULL, NULL);
    }

    function GetCompanyBranch()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->model('master/company_branch_model');
        $company_branch_parameter = array('p_company_branch_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyBranchRecords'] = $this->company_branch_model->GetCompanyBranch($company_branch_parameter);
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Company Branch Listing';
        $this->loadViews("master/company_branch", $this->global, $data, NULL);
        // }
    }



    function InsertCompanyBranch()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_branch_name', 'Company Branch Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');

        $company_branch_id = $this->input->post('company_branch_id');
        $company_branch_name = $this->input->post('company_branch_name');
        $company_id = $this->input->post('company_id');

        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $company_branch_parameter = array($company_branch_id, $company_id, $company_branch_name, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/company_branch_model');
        $result = $this->company_branch_model->InsertCompanyBranch($company_branch_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Branch has been added !');
        } else {
            $this->session->set_flashdata('error', 'Company Branch cannot added !');
        }

        redirect('CompanyBranch');
        // }
    }

    function UpdateCompanyBranch()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_branch_name', 'Company Branch Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_branch_id', 'Company Branch Id', 'required|max_length[50]|xss_clean');

        $company_branch_id = $this->input->post('company_branch_id_update');
        $company_branch_name = $this->input->post('company_branch_name_update');
        $company_id = $this->input->post('company_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $company_branch_parameter = array($company_branch_id, $company_branch_name, $company_id, $change_user_id, $record_status);

        $this->load->model('master/company_branch_model');
        $result = $this->company_branch_model->UpdateCompanyBranch($company_branch_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Branch Updated');
        } else {
            $this->session->set_flashdata('error', 'Company Branch Cannot Update');
        }

        redirect('CompanyBranch');
        // }
    }

    function DeleteCompanyBranch($company_branch_id)
    {
        $company_branch_parameter = array($company_branch_id);

        $result = $this->company_branch_model->DeleteCompanyBranch($company_branch_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Branch has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Company Branch cannot deleted !');
        }

        redirect('CompanyBranch');
    }

    function GetCompanyBranchByCompanyId()
    {

        $company_id = $this->input->post('company_id'); //receiving the ajax post from view

        $company_branch_parameter =
            array('p_company_branch_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 2);
        $records =  $this->company_branch_model->GetCompanyBranch($company_branch_parameter);

        echo json_encode($records);
    }

    function GetCompanyBranchByCompanyId2()
    {

        $company_id = $this->input->post('company_id_update'); //receiving the ajax post from view

        $company_branch_parameter =
            array('p_company_branch_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 2);
        $records =  $this->company_branch_model->GetCompanyBranch($company_branch_parameter);

        echo json_encode($records);
    }
}
