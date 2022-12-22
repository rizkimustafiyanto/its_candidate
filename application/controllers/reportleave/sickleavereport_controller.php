<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sickleavereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/sickleavereport_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave Report';
        $this->loadViews("reportleave/sickleavereport", $this->global, NULL, NULL);
    }

    function GetSickLeaveReport()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));

        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        $sickleavereport_parameter = array('p_sick_leave_id' => 0, 'p_employee_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0);
        $data['SickLeaveReportListRecords'] = $this->sickleavereport_model->GetSickLeaveReport($sickleavereport_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/sickleavereport", $this->global, $data, NULL);
    }
}
