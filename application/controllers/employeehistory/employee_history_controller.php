<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_history_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employeehistory/employee_history_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee History';
        $this->loadViews("employee_history/employee_history", $this->global, NULL, NULL);
    }

    function GetEmployeeHistory()
    {
        $employee_id = $this->session->userdata('employee_id');
        $employee_history_parameter = array('p_employee_id' => $employee_id);
        $data['EmployeeHistoryListRecords'] = $this->employee_history_model->GetEmployeeHistory($employee_history_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("employeehistory/employeehistory", $this->global, $data, NULL);
    }
}
