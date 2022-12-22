<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class approval_matrix_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/approval_matrix_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Approval Matrix';
        $this->loadViews("master/approval_matrix_model", $this->global, NULL, NULL);
    }

    function GetApprovalMatrix()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('master/approval_matrix_model');
            $approval_matrix_parameter = array('p_approval_matrix_id' => 0, 'p_flag' => 0);
            $data['ApprovalMatrixRecords'] = $this->approval_matrix_model->GetApprovalMatrix($approval_matrix_parameter);

            $company_id = $this->session->userdata('company_id');
            $employee_parameter = array('p_employee_id' => '0', 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 4);
            $data['EmployeeForLeaderRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
            $this->loadViews("master/approval_matrix", $this->global, $data, NULL);
        }
    }

    function InsertApprovalMatrix()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('approval_matrix', 'Approval', 'required|max_length[50]|xss_clean');

            $approval_matrix = $this->input->post('approval_matrix');
            $approval_matrix_name = $this->input->post('approval_matrix_name');
            $change_no = 0;
            $creation_user_id = $this->session->userdata('employee_id');
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";

            $approver_matrix_parameter = array(
                $approval_matrix,
                $approval_matrix_name,
                $change_no,
                $creation_user_id,
                $change_user_id,
                $record_status
            );

            $this->load->model('master/approval_matrix_model');
            $result = $this->approval_matrix_model->InsertApprovalMatrix($approver_matrix_parameter);

            if ($result > 0) {

                $this->session->set_flashdata('success', 'Approval Matrix has been added !');
            } else {
                $this->session->set_flashdata('error', 'Approval Matrix cannot added !');
            }

            redirect('ApprovalMatrix');
        }
    }

    function UpdateApprovalMatrix()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('approval_matrix', 'Approval', 'required|max_length[50]|xss_clean');

            $approval_matrix_id = $this->input->post('approval_matrix_id_update');
            $approval_matrix = $this->input->post('approval_matrix_update');
            $approval_matrix_name = $this->input->post('approval_matrix_name_update');
            $change_user_id = $this->session->userdata('employee_id_update');
            $record_status = "A";


            $approval_matrix_parameter = array($approval_matrix_id, $approval_matrix, $approval_matrix_name, $change_user_id, $record_status);

            $this->load->model('master/approval_matrix_model');
            $result = $this->approval_matrix_model->UpdateApprovalMatrix($approval_matrix_parameter);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'Approval Matrix updated !');
            } else {
                $this->session->set_flashdata('error', 'Approval Matrix cannot update !');
            }

            redirect('ApprovalMatrix');
        }
    }


    function DeleteApprovalMatrix($approval_matrix_id)
    {
        $approval_matrix_parameter = array($approval_matrix_id);

        $result = $this->approval_matrix_model->DeleteApprovalMatrix($approval_matrix_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Approval Matrix has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Approval Matrix cannot deleted !');
        }

        redirect('ApprovalMatrix');
    }
}
