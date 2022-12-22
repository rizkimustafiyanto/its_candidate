<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_brand_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_model');
        $this->load->model('master/company_brand_model');
        $this->load->model('master/employee_brand_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Brand';
        $this->loadViews("master/employee_brand", $this->global, NULL, NULL);
    }

    function GetEmployeeBrand()
    {
        $this->load->model('master/employee_brand_model');
        $employee_brand_parameter = array('p_employee_brand_id' => 0, 'p_flag' => 0);
        $data['EmployeeBrandRecords'] = $this->employee_brand_model->GetEmployeeBrand($employee_brand_parameter);

        $brand_parameter = array('p_company_brand_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyBrandRecords'] = $this->company_brand_model->GetCompanyBrand($brand_parameter);

        $employee_parameter = array(
            'p_employee_id' => 0, 'p_company_id' => 0,
            'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0
        );
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee_brand", $this->global, $data, NULL);
    }

    function GetEmployeeBrandById($employee_brand_id, $flag)
    {
        $this->load->model('master/employee_brand_model');
        $employee_brand_parameter = array($employee_brand_id, $flag);
        $data['EmployeeBrandRecords'] = $this->employee_brand_model->GetEmployeeBrand($employee_brand_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee_brand", $this->global, $data, NULL);
    }

    function InsertEmployeeBrand()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_brand_parameter = array(
            $employee_id,
            $company_brand_id,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $this->load->model('master/employee_brand_model');
        $result = $this->employee_brand_model->InsertEmployeeBrand($employee_brand_parameter);
        $result = $this->db->affected_rows();

        if ($result > 0) {

            $this->session->set_flashdata('success', 'Employee Brand has been added !');
        } else {
            $this->session->set_flashdata('error', 'Employee Brand Already Exist!');
        }

        redirect('EmployeeBrand');
    }

    function UpdateEmployeeBrand()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id_update', 'Employee Id', 'required|max_length[50]|xss_clean');

        $employee_brand_id = $this->input->post('employee_brand_id_update');
        $employee_id = $this->input->post('employee_id_update');
        $company_brand_id = $this->input->post('company_brand_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_brand_parameter = array(
            $employee_brand_id,
            $employee_id,
            $company_brand_id,
            $change_user_id,
            $record_status
        );

        $result = $this->employee_brand_model->UpdateEmployeeBrand($employee_brand_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Brand has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Employee Brand cannot updated!');
        }

        redirect('EmployeeBrand');
    }



    function DeleteEmployeeBrand($employee_brand_id)
    {
        $employee_brand_parameter = array($employee_brand_id);

        $result = $this->employee_brand_model->DeleteEmployeeBrand($employee_brand_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Brand has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Employee  Brand cannot deleted !');
        }

        redirect('EmployeeBrand');
    }
}
