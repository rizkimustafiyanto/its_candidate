<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class leavereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/leavereport_model');
        $this->load->model('approval/approval_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Leave Report';
        $this->loadViews("reportleave/leavereport", $this->global, NULL, NULL);
    }

    function GetLeaveReport()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $leavereport_parameter = array(
                'p_leave_id' => 0,
                'p_employee_id' => 0,
                'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0
            );
            $data['LeaveReportListRecords'] = $this->leavereport_model->GetLeaveReport($leavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $leavereport_parameter = array(
                'p_employee_id' => $employee_id,
                'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0
            );
            $data['LeaveReportListRecords'] = $this->leavereport_model->GetLeaveReport2($leavereport_parameter);
        }


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/leavereport", $this->global, $data, NULL);
    }

    function GetDefaultLeaveReport()
    {
        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {
            $leavereport_parameter = array(
                'p_leave_id' => 0,
                'p_employee_id' => 0,
                'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1
            );
            $data['LeaveReportListRecords'] = $this->leavereport_model->GetLeaveReport($leavereport_parameter);
        }

        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $leavereport_parameter = array(
                'p_employee_id' => $employee_id,
                'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1
            );
            $data['LeaveReportListRecords'] = $this->leavereport_model->GetLeaveReport2($leavereport_parameter);
        }

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/leavereport", $this->global, $data, NULL);
    }
}
