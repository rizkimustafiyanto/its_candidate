<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paidleavereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/paidleavereport_model');
        $this->load->model('master/employee_model');
        $this->load->model('approval/approval_model');

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

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $paidleavereport_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => 0, 'p_paid_leave_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport($paidleavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $paidleavereport_parameter = array('p_employee_id' => $employee_id, 'p_date_1' =>  $date_1, 'p_date_2' =>  $date_2, 'p_flag' => 0);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport2($paidleavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/paidleavereport", $this->global, $data, NULL);
    }

    function GetDefaultPaidLeaveReport()
    {
        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $paidleavereport_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => 0, 'p_paid_leave_id' => 0, 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport($paidleavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $paidleavereport_parameter = array('p_employee_id' => $employee_id, 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1);
            $data['PaidLeaveReportListRecords'] = $this->paidleavereport_model->GetPaidLeaveReport2($paidleavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/paidleavereport", $this->global, $data, NULL);
    }
}
