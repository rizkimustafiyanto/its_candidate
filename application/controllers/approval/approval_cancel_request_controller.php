<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class approval_cancel_request_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('approval/approval_model');
        $this->load->model('overtime/overtime_approval_model');
        $this->load->model('paidleave/paidleave_approval_model');
        $this->load->model('sickleave/sickleave_approval_model');
        $this->load->model('leave/leave_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("approval/approval", $this->global, NULL, NULL);
    }

    function GetApprovalCancelRequest()
    {
        $employee_id = $this->session->userdata('employee_id');
        $approval_parameter = array('p_employee_id' => $employee_id);
        $data['ApprovalListRecords'] = $this->approval_model->GetApprovalCancelRequest($approval_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['ApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("approval/approval_cancel_request", $this->global, $data, NULL);
    }

}
