<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class overtimereport_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reportleave/overtimereport_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Overtime Report';
        $this->loadViews("reportleave/overtimereport", $this->global, NULL, NULL);
    }

    function GetOvertimeReport()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        $overtimereport_parameter = array('p_overtime_id' => 0, 'p_employee_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0);
        $data['OvertimeReportListRecords'] = $this->overtimereport_model->GetOvertimeReport($overtimereport_parameter);
        $this->overtimereport_model->GetOvertimeReport($overtimereport_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("reportleave/overtimereport", $this->global, $data, NULL);
    }
}
