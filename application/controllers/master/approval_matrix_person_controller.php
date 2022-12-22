<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class approval_matrix_person_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/approval_matrix_model');
        $this->load->model('master/approval_matrix_person_model');
        $this->load->model('master/company_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Approval Matrix Person';
        $this->loadViews("master/approval_matrix_person_model", $this->global, NULL, NULL);
    }

    function GetApprovalMatrixPerson()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('master/approval_matrix_person_model');
            $approval_matrix_person_parameter = array('p_approval_matrix_person_id' => 0, 'p_flag' => 0);
            $data['ApprovalMatrixPersonRecords'] = $this->approval_matrix_person_model->GetApprovalMatrixPerson($approval_matrix_person_parameter);

            $company_id = $this->session->userdata('company_id');
            $employee_parameter = array('p_employee_id' => '0', 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 4);
            $data['EmployeeForLeaderRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $approval_matrix_parameter = array('p_approval_matrix_id' => 0, 'p_flag' => 0);
            $data['ApprovalMatrixRecords'] = $this->approval_matrix_model->GetApprovalMatrix($approval_matrix_parameter);

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

            $this->load->model('master/company_brand_model');
            $company_brand_parameter = array('p_company_brand_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyBrandRecords'] = $this->company_brand_model->GetCompanyBrand($company_brand_parameter);

            $this->load->model('master/employee_model');
            $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0);
            $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
            $this->loadViews("master/approval_matrix_person", $this->global, $data, NULL);
        }
    }

    function InsertApprovalMatrixPerson()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('approval_matrix', 'Approval', 'required|max_length[50]|xss_clean');

        $approval_matrix = $this->input->post('approval_matrix');
        $company_id = $this->input->post('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $approver_id = $this->input->post('approver_id');

        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $approver_matrix_person_parameter = array(
            $approval_matrix,
            $company_id,
            $company_brand_id,
            $approver_id,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $this->load->model('master/approval_matrix_person_model');
        $result = $this->approval_matrix_person_model->InsertApprovalMatrixPerson($approver_matrix_person_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Approval Matrix Person has been added !');
        } else {
            $this->session->set_flashdata('error', 'Approval Matrix Person cannot added !');
        }

        redirect('ApprovalMatrixPerson');
    }

    function UpdateApprovalMatrixPerson()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('approval_matrix', 'Approval', 'required|max_length[50]|xss_clean');

        $approval_matrix_person_id = $this->input->post('approval_matrix_person_id_update');
        $approval_matrix = $this->input->post('approval_matrix_update');
        $company_id = $this->input->post('company_id_update');
        $company_brand_id = $this->input->post('company_brand_id_update');
        $approver_id = $this->input->post('approver_id_update');

        $change_user_id = $this->session->userdata('employee_id_update');
        $record_status = "A";


        $approval_matrix_person_parameter = array($approval_matrix_person_id, $approval_matrix, $company_id, $company_brand_id, $approver_id, $change_user_id, $record_status);

        $this->load->model('master/approval_matrix_person_model');
        $result = $this->approval_matrix_person_model->UpdateApprovalMatrixPerson($approval_matrix_person_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Approval Matrix Person updated !');
        } else {
            $this->session->set_flashdata('error', 'Approval Matrix Person cannot update !');
        }

        redirect('ApprovalMatrixPerson');
    }


    function DeleteApprovalMatrixPerson($approval_matrix_person_id)
    {
        $approval_matrix_person_parameter = array($approval_matrix_person_id);

        $result = $this->approval_matrix_person_model->DeleteApprovalMatrixPerson($approval_matrix_person_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Approval Matrix Person has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Approval Matrix Person cannot deleted !');
        }

        redirect('ApprovalMatrixPerson');
    }
}
