<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class leavereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/leavereport_model');

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

        $leavereport_parameter = array(
            'p_leave_id' => 0,
            'p_employee_id' => 0,
            'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0
        );
        $data['LeaveReportListRecords'] = $this->leavereport_model->GetLeaveReport($leavereport_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/leavereport", $this->global, $data, NULL);
    }
}
