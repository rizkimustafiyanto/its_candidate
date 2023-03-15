<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class massiveleave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('massiveleave/massiveleave_model');
        $this->load->model('massiveleave/massiveleavedatetimetemp_model');
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('leave/leave_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/company_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/company_brand_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Massive Leave';
        $this->loadViews("massiveleave/massiveleave", $this->global, NULL, NULL);
    }

    function GetMassiveLeaveFilter()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $employee_id = $this->session->userdata('employee_id');
            $companypusat = $this->input->post('companypusat');
            $company_brand_id_pusat = $this->input->post('company_brand_id_pusat');

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $massiveleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $companypusat, 'p_company_brand_id' => $company_brand_id_pusat, 'p_flag' => 0);
            $data['MassiveLeaveRecords'] = $this->massiveleave_model->GetMassiveLeave2($massiveleave_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $company = $this->input->post('company');
            $company_brand_id_cabang = $this->input->post('company_brand_id_cabang');


            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $massiveleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company, 'p_company_brand_id' => $company_brand_id_cabang, 'p_flag' => 0);
            $data['MassiveLeaveRecords'] = $this->massiveleave_model->GetMassiveLeave2($massiveleave_parameter);
        }


        $massiveleave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
        $data['EmployeeTempRecords'] = $this->massiveleave_model->GetEmployeeTemp($massiveleave_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("massiveleave/massiveleave", $this->global, $data, NULL);
    }


    function GetMassiveLeave()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $employee_id = $this->session->userdata('employee_id');
            $massiveleave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
            $data['MassiveLeaveRecords'] = $this->massiveleave_model->GetMassiveLeave($massiveleave_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $company_id = $this->session->userdata('company_id');


            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            //get company_brand_id
            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 15);
            $data['companybrandid'] = $this->employee_model->GetCompanyBrandId($employee_parameter);


            $massiveleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_company_brand_id' => $data['companybrandid'], 'p_flag' => 0);
            $data['MassiveLeaveRecords'] = $this->massiveleave_model->GetMassiveLeave2($massiveleave_parameter);
        }


        $massiveleave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
        $data['EmployeeTempRecords'] = $this->massiveleave_model->GetEmployeeTemp($massiveleave_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("massiveleave/massiveleave", $this->global, $data, NULL);
    }

    function InsertMassiveLeave()
    {

        $massiveleave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
        $data['EmployeeTempRecords'] = $this->massiveleave_model->GetEmployeeTemp($massiveleave_parameter);

        foreach ($data['EmployeeTempRecords'] as $record) {
            $employee_id = $record->employee_id;
            $paid_leave_id = $this->input->post('paid_leave_id');
            // $paid_leave_amount = 2;
            $paid_leave_status_id = 'ST-002';
            $description = $this->input->post('description');
            $changer_pic = '-';
            $pic_phone_no = 0;
            $urgent_phone_no = 0;
            // $employee_paid_leave_date = date('Y-m-d', strtotime($this->input->post('employee_paid_leave_date')));
            $change_no = 0;
            $creation_user_id = $this->session->userdata('employee_id');
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";

            $massiveleave_parameter = array($employee_id, $paid_leave_id, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no,  $change_no, $creation_user_id, $change_user_id, $record_status);

            $result = $this->massiveleave_model->InsertMassiveLeave($massiveleave_parameter);
            // echo json_encode($result);
        }


        $result = $this->massiveleave_model->DeleteMassiveLeaveAllDateTemp($massiveleave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Massive Leave has been added !');
        } else {
            $this->session->set_flashdata('error', 'Massive Leave cannot added !');
        }
        redirect('MassiveLeave');
    }

    function DeleteMassivePaidLeave($employee_paid_leave_id)
    {
        $paidleave_parameter = array($employee_paid_leave_id);
        $result = $this->paidleave_model->DeletePaidLeave($paidleave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Massive Leave has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Massive Leave cannot deleted !');
        }
        redirect('MassiveLeave');
    }

    function DeleteMassiveLeave($leave_id)
    {
        $leave_parameter = array($leave_id);

        $result = $this->leave_model->DeleteLeave($leave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Massive Leave request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Massive Leave request cannot deleted !');
        }

        redirect('MassiveLeave');
    }

    function InserttoEmployeeTemp()
    {

        $company_id = $this->input->post('company_id');
        $company_brand_id_pusat = $this->input->post('company_brand_id'); //receiving the ajax post from view
        //receiving the ajax post from view

        $employee_parameter =
            array('p_company_id' => $company_id, 'p_company_brand_id' => $company_brand_id_pusat);
        $result = $this->massiveleave_model->InserttoEmployeeTemp2($employee_parameter);
        echo json_encode($result);

        redirect('MassiveLeaveDetail');
    }

    function InserttoEmployeeTempCabang()
    {

        $company_id = $this->input->post('company_id_2');
        $company_brand_id = $this->input->post('company_brand_id_2'); //receiving the ajax post from view
        //receiving the ajax post from view

        $employee_parameter =
            array('p_company_id' => $company_id, 'p_company_brand_id' => $company_brand_id);
        $result = $this->massiveleave_model->InserttoEmployeeTemp2($employee_parameter);
        echo json_encode($result);

        redirect('MassiveLeaveDetail');
    }

    function GetMassiveLeaveById()
    {


        $massiveleave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
        $data['EmployeeTempRecords'] = $this->massiveleave_model->GetEmployeeTemp($massiveleave_parameter);

        $massive_leave_datetime_temp_parameter = array('p_massive_leave_date_temp_id' => 0);
        $data['MassiveLeaveDatetimeTempRecords'] = $this->massiveleavedatetimetemp_model->GetMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("massiveleave/massiveleave_detail", $this->global, $data, NULL);
    }

    function DeleteEmployeeTemp($employee_temp_id)
    {

        $employee_parameter = array($employee_temp_id);
        $result = $this->massiveleave_model->DeleteEmployeeTemp($employee_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Temp has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Employee Temp cannot deleted !');
        }

        redirect('MassiveLeaveDetail');
    }
}
