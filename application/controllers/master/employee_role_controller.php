<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_role_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_model');
        $this->load->model('master/role_model');
        $this->load->model('master/employee_role_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Role';
        $this->loadViews("master/employee_role", $this->global, NULL, NULL);
    }

    function GetEmployeeRole()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('master/employee_role_model');
            $employee_role_parameter = array('p_employee_role_id' => 0, 'p_flag' => 0);
            $data['EmployeeRoleRecords'] = $this->employee_role_model->GetEmployeeRole($employee_role_parameter);

            $role_parameter = array('p_role_id' => 0, 'p_flag' => 0);
            $data['RoleRecords'] = $this->role_model->GetRole($role_parameter);

            $employee_parameter = array(
                'p_employee_id' => 0, 'p_company_id' => 0,
                'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0
            );
            $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
            $this->loadViews("master/employee_role", $this->global, $data, NULL);
        }
    }

    function GetEmployeeRoleById($employee_role_id, $flag)
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('master/employee_role_model');
            $employee_role_parameter = array($employee_role_id, $flag);
            $data['EmployeeRoleRecords'] = $this->employee_role_model->GetEmployeeRole($employee_role_parameter);
            $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
            $this->loadViews("master/employee_role", $this->global, $data, NULL);
        }
    }

    function InsertEmployeeRole()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('employee_id', 'Employee Id', 'required|max_length[50]|xss_clean');

            $employee_id = $this->input->post('employee_id');
            $role_id = $this->input->post('role_id');
            $change_no = 0;
            $creation_user_id = $this->session->userdata('employee_id');
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";

            $employee_role_parameter = array(
                $employee_id,
                $role_id,
                $change_no,
                $creation_user_id,
                $change_user_id,
                $record_status
            );

            $this->load->model('master/employee_role_model');
            $result = $this->employee_role_model->InsertEmployeeRole($employee_role_parameter);
            $result = $this->db->affected_rows();

            if ($result > 0) {

                $this->session->set_flashdata('success', 'Employee Role has been added !');
            } else {
                $this->session->set_flashdata('error', 'Employee Role Already Exist!');
            }

            redirect('EmployeeRole');
        }
    }

    function UpdateEmployeeRole()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id_update', 'Employee Id', 'required|max_length[50]|xss_clean');

        $employee_role_id = $this->input->post('employee_role_id_update');
        $employee_id = $this->input->post('employee_id_update');
        $role_id = $this->input->post('role_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_role_parameter = array(
            $employee_role_id,
            $employee_id,
            $role_id,
            $change_user_id,
            $record_status
        );

        $result = $this->employee_role_model->UpdateEmployeeRole($employee_role_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Role has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Employee Role cannot updated!');
        }

        redirect('EmployeeRole');
        // }
    }



    function DeleteEmployeeRole($employee_role_id)
    {
        $employee_role_parameter = array($employee_role_id);

        $result = $this->employee_role_model->DeleteEmployeeRole($employee_role_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Role has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Employee  Role cannot deleted !');
        }

        redirect('EmployeeRole');
    }
}
