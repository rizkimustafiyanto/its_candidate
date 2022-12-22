<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employee_ext_paid_leave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_ext_paid_leave_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Extended Paid Leave';
        $this->loadViews("employee/employee", $this->global, NULL, NULL);
    }

    function GetExtPaidLeave()
    {

        $this->load->model('master/employee_ext_paid_leave_model');
        $employee_ext_paid_leave_parameter = array('p_employee_ext_paid_leave_id' => 0, 'p_flag' => 0);
        $data['ExtPaidLeaveRecords'] = $this->employee_ext_paid_leave_model->GetExtPaidLeave($employee_ext_paid_leave_parameter);
    }

    function InsertExtPaidLeave()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Amount', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = 'PL-001';
        $amount = $this->input->post('amount');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $ext_paid_leave_parameter = array($employee_id, $paid_leave_id, $amount, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/employee_ext_paid_leave_model');
        $this->employee_ext_paid_leave_model->InsertExtPaidLeave($ext_paid_leave_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Extended Paid Leave created successfully');
        } else {
            $this->session->set_flashdata('error', 'Extended Paid Leave creation failed, the data has been added');
        }
        redirect('EmployeeDetail/' . $employee_id);
        // }
    }

    function DeleteExtPaidLeave($employee_ext_paid_leave_id, $employee_id)
    {

        $ext_paid_leave_datetime_parameter = array($employee_ext_paid_leave_id, $employee_id);
        $result = $this->employee_ext_paid_leave_model->DeleteExtPaidLeave($ext_paid_leave_datetime_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid leave date time request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Paid leave date time request cannot deleted !');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }
}
