<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class confirmation_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('overtime/overtime_confirmation_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Overtime Confirmation';
        $this->loadViews("confirmation/confirmation", $this->global, NULL, NULL);
    }

    function GetConfirmation()
    {
        $employee_id = $this->session->userdata('employee_id');
        $confirmation_parameter = array('p_employee_id' => $employee_id);
        $data['ConfirmationListRecords'] = $this->overtime_confirmation_model->GetConfirmation($confirmation_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Overtime Confirmation';
        $this->loadViews("confirmation/confirmation", $this->global, $data, NULL);
    }
}
