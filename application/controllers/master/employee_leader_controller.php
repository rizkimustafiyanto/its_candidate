<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_leader_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_leader_model');
        $this->load->model('master/company_model');
        $this->load->model('master/company_brand_model');
        $this->load->model('master/employee_model');


        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Leader';
        $this->loadViews("employee/employee", $this->global, NULL, NULL);
    }

    function GetEmployeeLeader()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $this->load->model('master/employee_leader_model');
            $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_employee_id' => 0, 'p_flag' => 4);
            $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeader($employee_leader_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $company_id = $this->session->userdata('company_id');

            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            //get company_brand_id
            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 15);
            $data['companybrandid'] = $this->employee_model->GetCompanyBrandId($employee_parameter);

            $this->load->model('master/employee_leader_model');
            $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_company_id' => $company_id, 'p_company_brand_id' => $data['companybrandid'], 'p_flag' => 1);
            $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeaderPerCabang($employee_leader_parameter);
        }

        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 4);
        $data['EmployeeForLeaderRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee_leader", $this->global, $data, NULL);
    }

    function GetEmployeeLeaderFilter()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $companypusat = $this->input->post('companypusat');
            $company_brand_id_pusat = $this->input->post('company_brand_id_pusat');

            $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_company_id' => $companypusat, 'p_company_brand_id' => $company_brand_id_pusat, 'p_flag' => 1);
            $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeaderPerCabang($employee_leader_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');


            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $company = $this->input->post('company');
            $company_brand_id_cabang = $this->input->post('company_brand_id_cabang');

            $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_company_id' => $company, 'p_company_brand_id' => $company_brand_id_cabang, 'p_flag' => 1);
            $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeaderPerCabang($employee_leader_parameter);
        }

        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 4);
        $data['EmployeeForLeaderRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee_leader", $this->global, $data, NULL);
    }

    function InsertEmployeeLeader()
    {
        $this->load->library('form_validation');
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
    }

    function UpdateEmployeeLeader()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('approver_id_update', 'Approver Id', 'required|max_length[50]|xss_clean');

        $employee_leader_id = $this->input->post('employee_leader_id_update');
        $approver_id = $this->input->post('approver_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_leader_parameter = array(
            $employee_leader_id,
            $approver_id,
            $change_user_id,
            $record_status
        );

        $result = $this->employee_leader_model->UpdateEmployeeLeader($employee_leader_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Leader has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Employee Leader cannot updated!');
        }

        redirect('EmployeeLeader');
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
