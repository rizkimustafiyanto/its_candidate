<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_model');
        $this->load->model('master/role_model');
        $this->load->model('master/company_model');
        $this->load->model('master/company_branch_model');
        $this->load->model('master/division_model');
        $this->load->model('master/department_model');
        $this->load->model('master/city_model');
        $this->load->model('master/province_model');
        $this->load->model('master/country_model');
        $this->load->model('master/variable_model');
        $this->load->model('noticeletter/noticeletter_model');
        $this->load->model('master/employee_address_model');
        $this->load->model('master/shift_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee';
        $this->loadViews("master/employee", $this->global, NULL, NULL);
    }

    function GetEmployee()
    {
        $company_id = $this->session->userdata('company_id');

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0);
            $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 13);
            $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);
        }

        $department_parameter = array('p_department_id' => 0, 'p_division_id' => 0, 'p_flag' => 0);
        $data['DepartmentRecords'] = $this->department_model->GetDepartment($department_parameter);
        $division_parameter = array('p_division_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['DivisionRecords'] = $this->division_model->GetDivision($division_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //variable
        $variable_gender_parameter = array('p_variable_id' => 'GND', 'p_flag' => 1);
        $data['GenderRecords'] = $this->variable_model->GetVariable($variable_gender_parameter);

        //religion
        $variable_religion_parameter = array('p_variable_id' => 'RG', 'p_flag' => 1);
        $data['ReligionRecords'] = $this->variable_model->GetVariable($variable_religion_parameter);

        //gender
        $variable_gender_parameter = array('p_variable_id' => 'GR', 'p_flag' => 1);
        $data['GenderRecords'] = $this->variable_model->GetVariable($variable_gender_parameter);

        //employee status
        $variable_employee_status_parameter = array('p_variable_id' => 'ES', 'p_flag' => 1);
        $data['EmployeeStatusRecords'] = $this->variable_model->GetVariable($variable_employee_status_parameter);

        //employee level
        $variable_employee_level_parameter = array('p_variable_id' => 'EL', 'p_flag' => 1);
        $data['EmployeeLevelRecords'] = $this->variable_model->GetVariable($variable_employee_level_parameter);

        //employee level
        $variable_citizen_status_parameter = array('p_variable_id' => 'CS', 'p_flag' => 1);
        $data['CitizenStatusRecords'] = $this->variable_model->GetVariable($variable_citizen_status_parameter);

        //leave type
        $leave_type_parameter = array('p_variable_id' => 'LT', 'p_flag' => 1);
        $data['LeaveTypeRecords'] = $this->variable_model->GetVariable($leave_type_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //approver status
        $variable_approver_status_parameter = array('p_variable_id' => 'APS', 'p_flag' => 1);
        $data['ApproverStatusRecords'] = $this->variable_model->GetVariable($variable_approver_status_parameter);

        //hak lembur
        $variable_hak_lembur_parameter = array('p_variable_id' => 'OVT', 'p_flag' => 1);
        $data['HakLemburRecords'] = $this->variable_model->GetVariable($variable_hak_lembur_parameter);

        //shift
        $shift_parameter = array('p_shift_id' => 0, 'p_flag' => 0);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee", $this->global, $data, NULL);
    }

    function GetEmployeeById($employee_id)
    {
        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 6);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);


        $company_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 6);
        $data['GetCompanyEmployee'] = $this->employee_model->GetCompanyEmployee($company_parameter);
        // $company_id = $this->session->userdata('company_id');

        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $data['GetCompanyEmployee'], 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 4);
        $data['EmployeeForLeaderRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $department_parameter = array('p_department_id' => 0, 'p_division_id' => 0, 'p_flag' => 0);
        $data['DepartmentRecords'] = $this->department_model->GetDepartment($department_parameter);

        $division_parameter = array('p_division_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['DivisionRecords'] = $this->division_model->GetDivision($division_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        $company_branch_parameter = array('p_company_branch_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyBranchRecords'] = $this->company_branch_model->GetCompanyBranch($company_branch_parameter);

        //variable
        $variable_gender_parameter = array('p_variable_id' => 'GND', 'p_flag' => 1);
        $data['GenderRecords'] = $this->variable_model->GetVariable($variable_gender_parameter);

        //religion
        $variable_religion_parameter = array('p_variable_id' => 'RG', 'p_flag' => 1);
        $data['ReligionRecords'] = $this->variable_model->GetVariable($variable_religion_parameter);

        //gender
        $variable_gender_parameter = array('p_variable_id' => 'GR', 'p_flag' => 1);
        $data['GenderRecords'] = $this->variable_model->GetVariable($variable_gender_parameter);

        //employee status
        $variable_employee_status_parameter = array('p_variable_id' => 'ES', 'p_flag' => 1);
        $data['EmployeeStatusRecords'] = $this->variable_model->GetVariable($variable_employee_status_parameter);

        //employee level
        $variable_employee_level_parameter = array('p_variable_id' => 'EL', 'p_flag' => 1);
        $data['EmployeeLevelRecords'] = $this->variable_model->GetVariable($variable_employee_level_parameter);

        //employee citizen
        $variable_citizen_status_parameter = array('p_variable_id' => 'CS', 'p_flag' => 1);
        $data['CitizenStatusRecords'] = $this->variable_model->GetVariable($variable_citizen_status_parameter);

        //leave type 
        $leave_type_parameter = array('p_variable_id' => 'LT', 'p_flag' => 1);
        $data['LeaveTypeRecords'] = $this->variable_model->GetVariable($leave_type_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //approver status
        $variable_approver_status_parameter = array('p_variable_id' => 'APS', 'p_flag' => 1);
        $data['ApproverStatusRecords'] = $this->variable_model->GetVariable($variable_approver_status_parameter);

        $this->load->model('master/employee_ext_paid_leave_model');
        $employee_ext_paid_leave_parameter = array('p_employee_ext_paid_leave_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 1);
        $data['ExtPaidLeaveRecords'] = $this->employee_ext_paid_leave_model->GetExtPaidLeave($employee_ext_paid_leave_parameter);

        $this->load->model('master/employee_leader_model');
        $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 1);
        $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeader($employee_leader_parameter);

        $variable_employee_document_parameter = array('p_variable_id' => 'DOC', 'p_flag' => 1);
        $data['EmployeeDocumentTypeRecords'] = $this->variable_model->GetVariable($variable_employee_document_parameter);

        $this->load->model('master/employeedocument_model');
        $employee_document_parameter = array('p_employee_document_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeDocumentRecords'] = $this->employeedocument_model->GetEmployeeDocument($employee_document_parameter);

        $employee_notice_letter_parameter = array('p_employee_notice_letter_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeNoticeLetterRecords'] = $this->noticeletter_model->GetNoticeLetter($employee_notice_letter_parameter);

        //Resign Status
        $resign_status_parameter = array('p_variable_id' => 'RS', 'p_flag' => 1);
        $data['ResignStatusRecords'] = $this->variable_model->GetVariable($resign_status_parameter);

        //Address Type
        $address_type_parameter = array('p_variable_id' => 'ADR', 'p_flag' => 1);
        $data['AddressTypeRecords'] = $this->variable_model->GetVariable($address_type_parameter);

        //Country
        $country_parameter = array('p_country_id' => 0, 'p_flag' => 0);
        $data['CountryRecords'] = $this->country_model->GetCountry($country_parameter);

        //Employee Address
        $employee_address_parameter = array('p_employee_address_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeAddressRecords'] = $this->employee_address_model->GetEmployeeAddress($employee_address_parameter);

        //shift
        $shift_parameter = array('p_shift_id' => 0, 'p_flag' => 0);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        //hak lembur
        $variable_hak_lembur_parameter = array('p_variable_id' => 'OVT', 'p_flag' => 1);
        $data['HakLemburRecords'] = $this->variable_model->GetVariable($variable_hak_lembur_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/employee_detail", $this->global, $data, NULL);
    }

    function InsertEmployee()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $employee_name = $this->input->post('employee_name');
        $email = $this->input->post('email');
        $phone_no = $this->input->post('phone_no');
        $company_id = $this->input->post('company_id');
        $division_id = $this->input->post('division_id');
        $department_id = $this->input->post('department_id');
        $company_branch_id = $this->input->post('company_branch_id');
        $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth')));
        $place_of_birth = $this->input->post('place_of_birth');;
        $gender_id = $this->input->post('gender_id');;
        $religion_id = $this->input->post('religion_id');
        $employee_status_id = $this->input->post('employee_status_id');
        $level_id = $this->input->post('level_id');
        $leave_type_id = $this->input->post('leave_type_id');
        $citizen_status_id = $this->input->post('citizen_status_id');
        $join_date = date('Y-m-d', strtotime($this->input->post('join_date')));
        $approver_status = $this->input->post('approver_status');
        $resign_status = 'RS-001';
        $jabatan = $this->input->post('jabatan');
        $shift_id = $this->input->post('shift_id');
        // add photo for employee
        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $photo_url = $employee_id . '-' . time() . '.' . $fileExt;
        } else {
            $photo_url = "";
        }

        $overtime_flag = $this->input->post('overtime_flag');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $employee_parameter = array(
            $employee_id,
            $employee_name,
            $email,
            $phone_no,
            $company_id,
            $division_id,
            $department_id,
            $company_branch_id,
            $date_of_birth,
            $place_of_birth,
            $gender_id,
            $religion_id,
            $employee_status_id,
            $level_id,
            $leave_type_id,
            $citizen_status_id,
            $join_date,
            $approver_status,
            $resign_status,
            $jabatan,
            $shift_id,
            $photo_url,
            $overtime_flag,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png';
            $config['file_name']      = $employee_id . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 100000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);
        }
        //$this->upload->do_upload('image');

        // if (!$this->upload->do_upload('image')) {
        //     $error = array('error' => $this->upload->display_errors());
        //     $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
        // } else {
        //     $data = array('upload_data' => $this->upload->data());
        $this->load->model('master/employee_model');
        $result = $this->employee_model->InsertEmployee($employee_parameter);

        if ($result > 0) {

            $employee_param = [
                'p_employee_id' => '',
                'p_company_id' => '',
                'p_division_id' => '',
                'p_department_id' => '',
                'p_flag' => 9,
            ];
            $result1 =
                $this->employee_model->GetEmployee($employee_param);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_employee_id = $res->employee_id;
                }
            }
            redirect(
                'EmployeeDetail/' . $p_employee_id
            );
        } else {
            $this->session->set_flashdata('error', 'Employee cannot added !');
            redirect('Employee');
        }
        // }
        // }
    }


    function UpdateEmployee()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id_update');
        $employee_name = $this->input->post('employee_name_update');
        $email = $this->input->post('email_update');
        $phone_no = $this->input->post('phone_no_update');
        $company_id = $this->input->post('company_id_update');
        $division_id = $this->input->post('division_id_update');
        $department_id = $this->input->post('department_id_update');
        $company_branch_id = $this->input->post('company_branch_id_update');
        $date_of_birth = date('Y-m-d', strtotime($this->input->post('date_of_birth_update')));
        $place_of_birth = $this->input->post('place_of_birth_update');;
        $gender_id = $this->input->post('gender_id_update');
        $religion_id = $this->input->post('religion_id_update');
        $employee_status_id = $this->input->post('employee_status_id_update');
        $level_id = $this->input->post('level_id_update');
        $leave_type_id = $this->input->post('leave_type_id_update');
        $citizen_status_id = $this->input->post('citizen_status_id_update');
        $join_date = date('Y-m-d', strtotime($this->input->post('join_date_update')));
        $approver_status = $this->input->post('approver_status_update');
        $resign_status = $this->input->post('resign_status_update');
        $jabatan = $this->input->post('jabatan_update');
        $shift_id = $this->input->post('shift_id_update');
        $overtime_flag = $this->input->post('overtime_flag_update');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $flag = 0;
        $employee_parameter = array(
            $employee_id,
            $employee_name,
            $email,
            $phone_no,
            $company_id,
            $division_id,
            $department_id,
            $company_branch_id,
            $date_of_birth,
            $place_of_birth,
            $gender_id,
            $religion_id,
            $employee_status_id,
            $level_id,
            $leave_type_id,
            $citizen_status_id,
            $join_date,
            $approver_status,
            $resign_status,
            $jabatan,
            $shift_id,
            $overtime_flag,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            $flag
        );

        $this->load->model('master/employee_model');
        $result = $this->employee_model->UpdateEmployee($employee_parameter);
        echo json_encode($result);
        // if ($result > 0) {
        $this->session->set_flashdata('success', 'Employee updated !');
        // } else {
        //     $this->session->set_flashdata('error', 'Employee cannot update !');
        // }

        // redirect('EmployeeDetail/' . $employee_id); 
    }


    function DeleteEmployee($employee_id)
    {
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 6);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployeePhoto($employee_parameter);
        $employee_parameter = array($employee_id);

        $result = $this->employee_model->DeleteEmployee($employee_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee has been deleted !');
            $path = './upload/' . $data['EmployeeRecords'];
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Employee  cannot deleted !');
        }

        redirect('Employee ');
    }

    function GetEmployeeByCompanyId()
    {

        $company_id = $this->input->post('company_id'); //receiving the ajax post from view

        $employee_parameter =
            array('p_employee_id' => 0, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 7);
        $records =  $this->employee_model->GetEmployee($employee_parameter);

        echo json_encode($records);
    }
}
