<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class menu_lppd_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/menu_lppd_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : LPPD Approval';
        $this->loadViews("sppd/lppd_approval", $this->global, NULL, NULL);
    }

    function GetMenuLPPDApproval()
    {
        $employee_id = $this->session->userdata('employee_id');
        $menu_lppd_approval_parameter = array('p_employee_id' => $employee_id);
        $data['MenuLPPDApprovalListRecords'] = $this->menu_lppd_approval_model->GetMenuLPPDApproval($menu_lppd_approval_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['ApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("sppd/menu_lppd_approval", $this->global, $data, NULL);
    }
}
