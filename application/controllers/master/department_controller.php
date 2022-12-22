<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class department_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/department_model');
        $this->load->model('master/division_model');
        $this->load->model('master/company_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Department';
        $this->loadViews("master/department", $this->global, NULL, NULL);
    }

    function GetDepartment()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $department_parameter = array('p_department_id' => 0, 'p_division_id' => 0, 'p_flag' => 0);
        $data['DepartmentRecords'] = $this->department_model->GetDepartment($department_parameter);
        $division_parameter = array('p_division_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['DivisionRecords'] = $this->division_model->GetDivision($division_parameter);
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Department Listing';
        $this->loadViews("master/department", $this->global, $data, NULL);
        // }
    }

    function GetDepartmentById($department_id, $flag)
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->model('master/department_model');
        $department_parameter = array($department_id, $flag);
        $data['DepartmentRecords'] = $this->department_model->GetDivision($department_parameter);
        $this->global['pageTitle'] = 'CodeInsect : department Listing';
        $this->loadViews("master/department", $this->global, $data, NULL);
        // }
    }

    function InsertDepartment()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('department_name', 'department Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('division_id', 'Division Id', 'required|max_length[50]|xss_clean');

        $department_id = $this->input->post('department_id');
        $department_name = $this->input->post('department_name');
        $division_id = $this->input->post('division_id');

        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $department_parameter = array($department_id, $division_id, $department_name, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/department_model');
        $result = $this->department_model->InsertDepartment($department_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Department has been added !');
        } else {
            $this->session->set_flashdata('error', 'Department cannot added !');
        }

        redirect('Department');
        // }
    }

    function UpdateDepartment()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Department_name', 'Department Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('division_id', 'Division Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('department_id', 'Department Id', 'required|max_length[50]|xss_clean');

        $department_id = $this->input->post('department_id_update');
        $department_name = $this->input->post('department_name_update');
        $division_id = $this->input->post('division_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $department_parameter = array($department_id, $department_name, $division_id, $change_user_id, $record_status);

        $this->load->model('master/department_model');
        $result = $this->department_model->UpdateDepartment($department_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Department Updated');
        } else {
            $this->session->set_flashdata('error', 'Department Cannot Update');
        }

        redirect('Department');
        // }
    }

    function DeleteDepartment($department_id)
    {
        $department_parameter = array($department_id);

        $result = $this->department_model->DeleteDepartment($department_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Department has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Department cannot deleted !');
        }

        redirect('Department');
    }

    function GetDepartmentByDivisionId()
    {

        $division_id = $this->input->post('division_id'); //receiving the ajax post from view

        $department_parameter =
            array('p_department_id' => 0, 'p_division_id' => $division_id, 'p_flag' => 2);
        $records =  $this->department_model->GetDepartment($department_parameter);

        echo json_encode($records);
    }

    function GetDepartmentByDivisionId2()
    {

        $division_id = $this->input->post('division_id_update'); //receiving the ajax post from view

        $department_parameter =
            array('p_department_id' => 0, 'p_division_id' => $division_id, 'p_flag' => 2);
        $records =  $this->department_model->GetDepartment($department_parameter);

        echo json_encode($records);
    }
}
