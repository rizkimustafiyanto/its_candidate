<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_leader_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_leader_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Leader';
        $this->loadViews("employee/employee", $this->global, NULL, NULL);
    }

    function GetEmployeeLeader()
    {

        $this->load->model('master/employee_leader_model');
        $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_flag' => 0);
        $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeader($employee_leader_parameter);
    }

    function InsertEmployeeLeader()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('amount', 'Amount', 'required|max_length[50]|xss_clean');
        // $company_id = $this->input->post('company_id');
        $employee_id = $this->input->post('employee_id');
        $approver_id = $this->input->post('approver_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $employee_leader_parameter = array($employee_id, $approver_id, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/employee_leader_model');
        $this->employee_leader_model->InsertEmployeeLeader($employee_leader_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Leader created successfully');
        } else {
            $this->session->set_flashdata('error', 'Employee Leader creation failed, the data has been added');
        }
        redirect('EmployeeDetail/' . $employee_id);
        // }
    }

    function DeleteEmployeeLeader($employee_leader_id, $employee_id)
    {

        $employee_leader_parameter = array($employee_leader_id, $employee_id);
        $result = $this->employee_leader_model->DeleteEmployeeLeader($employee_leader_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Leader has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Employee Leader cannot deleted !');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }
}
