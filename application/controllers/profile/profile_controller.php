<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class profile_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('profile/profile_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/role_model');
        $this->load->model('master/company_model');
        $this->load->model('master/division_model');
        $this->load->model('master/department_model');
        $this->load->model('master/city_model');
        $this->load->model('master/province_model');
        $this->load->model('master/country_model');
        $this->load->model('master/variable_model');
        $this->load->model('noticeletter/noticeletter_model');
        $this->load->model('login_model');
        $this->load->model('master/employee_address_model');
        $this->load->model('master/shift_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Profile';
        $this->loadViews("profile/profile", $this->global, NULL, NULL);
    }

    function GetProfile()
    {
        $employee_id = $this->session->userdata('employee_id');
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 5);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

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
        $variable_religion_parameter = array('p_variable_id' => 'R', 'p_flag' => 1);
        $data['ReligionRecords'] = $this->variable_model->GetVariable($variable_religion_parameter);
        //gender
        $variable_gender_parameter = array('p_variable_id' => 'G', 'p_flag' => 1);
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

        $variable_employee_document_parameter = array('p_variable_id' => 'DOC', 'p_flag' => 1);
        $data['EmployeeDocumentTypeRecords'] = $this->variable_model->GetVariable($variable_employee_document_parameter);

        $this->load->model('master/employee_ext_paid_leave_model');
        $employee_ext_paid_leave_parameter = array('p_employee_ext_paid_leave_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 1);
        $data['ExtPaidLeaveRecords'] = $this->employee_ext_paid_leave_model->GetExtPaidLeave($employee_ext_paid_leave_parameter);

        $this->load->model('master/employee_leader_model');
        $employee_leader_parameter = array('p_employee_leader_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 1);
        $data['EmployeeLeaderRecords'] = $this->employee_leader_model->GetEmployeeLeader($employee_leader_parameter);

        $this->load->model('master/employeedocument_model');
        $employee_document_parameter = array('p_employee_document_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeDocumentRecords'] = $this->employeedocument_model->GetEmployeeDocument($employee_document_parameter);

        $employee_notice_letter_parameter = array('p_employee_notice_letter_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeNoticeLetterRecords'] = $this->noticeletter_model->GetNoticeLetter($employee_notice_letter_parameter);

        //Resign Status
        $resign_status_parameter = array('p_variable_id' => 'RS', 'p_flag' => 1);
        $data['ResignStatusRecords'] = $this->variable_model->GetVariable($resign_status_parameter);

        //Employee Address
        $employee_address_parameter = array('p_employee_address_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['EmployeeAddressRecords'] = $this->employee_address_model->GetEmployeeAddress($employee_address_parameter);

        //shift
        $shift_parameter = array('p_shift_id' => 0, 'p_flag' => 0);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("profile/profile", $this->global, $data, NULL);
    }

    function ChangePass()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'oldPassword',
            'oldPassword',
            'required|max_length[128]'
        );
        $this->form_validation->set_rules(
            'newPassword',
            'newPassword',
            'required|max_length[32]'
        );

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $changePassParameter = [
                'employee_id' => $this->session->userdata('employee_id'),
                'oldPassword' => $oldPassword,
                'p_flag' => 0,
                'p_change_user_id' => $this->session->userdata('employee_id'),
            ];
            $result = $this->login_model->ChangePass(
                $changePassParameter,
                $oldPassword
            );

            if (count($result) > 0) {
                $param = [
                    $this->session->userdata('employee_id'),
                    getHashedPassword($newPassword),
                    1,
                    $this->session->userdata('employee_id'),
                ];

                $result1 = $this->login_model->UpdatePass($param);

                if ($result1 > 0) {
                    $this->session->set_flashdata(
                        'success',
                        'Password change successfully'
                    );
                } else {
                    $this->session->set_flashdata(
                        'error',
                        'Password creation failed'
                    );
                }
                redirect('Profile');
            } else {
                $this->session->set_flashdata('error', 'Password Not Change, Old Password Not Match');
                redirect('Profile');
                // echo $oldPassword;
            }
        }
    }
}
