<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class menu_sppd_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/menu_sppd_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD Approval';
        $this->loadViews("sppd/sppd_approval", $this->global, NULL, NULL);
    }

    function GetMenuSPPDApproval()
    {
        $employee_id = $this->session->userdata('employee_id');
        $menu_sppd_approval_parameter = array('p_employee_id' => $employee_id);
        $data['MenuSPPDApprovalListRecords'] = $this->menu_sppd_approval_model->GetMenuSPPDApproval($menu_sppd_approval_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['ApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("sppd/menu_sppd_approval", $this->global, $data, NULL);
    }
}
