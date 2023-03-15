<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sickleavedetailreport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportdetail/sickleavedetailreport_model');
        $this->load->model('master/company_model');
        $this->load->model('master/employee_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave Detail Report';
        $this->loadViews("reportdetail/sickleavedetailreport", $this->global, NULL, NULL);
    }

    function GetSickLeaveDetailReport()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $companypusat = $this->input->post('companypusat');
            $company_brand_id_pusat = $this->input->post('company_brand_id_pusat');

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $sickleavereport_parameter = array(
                // 'p_sick_leave_id' => 0, 
                'p_employee_id' => 0,
                'p_company_id' => $companypusat,
                'p_company_brand_id' => $company_brand_id_pusat,
                'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0
            );
            $data['SickLeaveReportListRecords'] = $this->sickleavedetailreport_model->GetSickLeaveReport2($sickleavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {

            $company = $this->input->post('company');
            $company_brand_id_cabang = $this->input->post('company_brand_id_cabang');
            $employee_id = $this->session->userdata('employee_id');

            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            $employee_id = $this->session->userdata('employee_id');
            $sickleavereport_parameter = array(
                'p_employee_id' => $employee_id,
                'p_company_id' => $company,
                'p_company_brand_id' =>
                $company_brand_id_cabang, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0
            );
            $data['SickLeaveReportListRecords'] = $this->sickleavedetailreport_model->GetSickLeaveReport2($sickleavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportdetail/sickleavedetailreport", $this->global, $data, NULL);
    }

    function GetDefaultSickLeaveDetailReport()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $sickleavereport_parameter = array('p_sick_leave_id' => 0, 'p_employee_id' => 0, 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 0);
            $data['SickLeaveReportListRecords'] = $this->sickleavedetailreport_model->GetSickLeaveReport($sickleavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {

            $employee_id = $this->session->userdata('employee_id');
            $company_id = $this->session->userdata('company_id');


            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            //get company_brand_id
            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 15);
            $data['companybrandid'] = $this->employee_model->GetCompanyBrandId($employee_parameter);

            $employee_id = $this->session->userdata('employee_id');
            $sickleavereport_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_company_brand_id' => $data['companybrandid'], 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1);
            $data['SickLeaveReportListRecords'] = $this->sickleavedetailreport_model->GetSickLeaveReport2($sickleavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportdetail/sickleavedetailreport", $this->global, $data, NULL);
    }
}
