<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paidleavereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/paidleavereport_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave Report';
        $this->loadViews("reportleave/paidleavereport", $this->global, NULL, NULL);
    }

    function GetPaidLeaveReport()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        $company_id = $this->session->userdata('company_id');

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $paidleavereport_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => 0, 'p_company_id' => 0, 'p_paid_leave_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport($paidleavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $paidleavereport_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => 0, 'p_company_id' => $company_id, 'p_paid_leave_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 1);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport($paidleavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/paidleavereport", $this->global, $data, NULL);
    }
}
