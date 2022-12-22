<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_address_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_address_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Address';
        $this->loadViews("master/employeeaddress", $this->global, NULL, NULL);
    }

    function GetEmployeeAddress()
    {
        $employee_address_parameter = array('p_employee_address_id' => 0, 'p_employee_id' => '0', 'p_flag' => 0);
        $data['EmployeeAddressRecords'] = $this->employee_address_model->GetEmployeeAddress($employee_address_parameter);
    }

    function InsertEmployeeAddress()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $address_type_id = $this->input->post('address_type_id');
        $country_id = $this->input->post('country_id');
        $province_id = $this->input->post('province_id');
        $city_id = $this->input->post('city_id');
        $address = $this->input->post('address');
        $zip_code = $this->input->post('zip_code');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_address_parameter = array($employee_id, $address_type_id, $country_id,  $province_id, $city_id, $address, $zip_code, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->employee_address_model->InsertEmployeeAddress($employee_address_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Address created successfully');
        } else {
            $this->session->set_flashdata('error', 'Employee Address creation failed, the data has been added');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }

    function UpdateEmployeeAddress()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');

        $employee_address_id = $this->input->post('employee_address_id_update');
        $employee_id = $this->input->post('employee_id_update');
        $address_type_id = $this->input->post('address_type_id_update');
        $country_id = $this->input->post('country_id_update');
        $province_id = $this->input->post('province_id_update');
        $city_id = $this->input->post('city_id_update');
        $address = $this->input->post('address_update');
        $zip_code = $this->input->post('zip_code_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_address_parameter = array($employee_address_id, $employee_id, $address_type_id, $country_id,  $province_id, $city_id, $address, $zip_code, $change_user_id, $record_status);

        $result = $this->employee_address_model->UpdateEmployeeAddress($employee_address_parameter);
        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Address updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Employee Address update failed!');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }


    function DeleteEmployeeAddress($employee_address_id, $employee_id)
    {
        $employee_address_parameter = array($employee_address_id);

        $result = $this->employee_address_model->DeleteEmployeeAddress($employee_address_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Address has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Employee Address cannot deleted !');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }
}
