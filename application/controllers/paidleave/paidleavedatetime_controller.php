<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paidleavedatetime_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave/paidleavedatetime_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave Date Time';
        $this->loadViews("paidleavedatetime/paidleavedatetime", $this->global, NULL, NULL);
    }

    function GetPaidLeaveDateTime()
    {

        $this->load->model('paidleavedatetime/paidleavedatetime_model');
        $paid_leave_datetime_parameter = array('p_employee_paid_leave_datetime_id' => 0, 'p_employee_paid_leave_id' => '0', 'p_flag' => 0);
        $data['PaidLeaveDateTimeRecords'] = $this->paidleavedatetime_model->GetPaidLeaveDateTime($paid_leave_datetime_parameter);
    }

    function InsertPaidLeaveDateTime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_paid_leave_date', 'Paid Leave Date', 'required|max_length[50]|xss_clean');


        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_paid_leave_date = date('Y-m-d', strtotime($this->input->post('employee_paid_leave_date')));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $paid_leave_parameter = array($employee_paid_leave_id, $employee_paid_leave_date, $change_no, $creation_user_id, $change_user_id, $record_status);

        // if (date('Y-m-d', strtotime($this->input->post('employee_paid_leave_date'))) < date('Y-m-d')) {
        //     $error = "Paid Leave date can't older than Now ";
        //     $this->session->set_flashdata('error', $error);
        //     redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
        // }

        $this->load->model('paidleave/paidleavedatetime_model');
        $this->paidleavedatetime_model->InsertPaidLeaveDateTime($paid_leave_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid Leave Date Time Request created successfully');
        } else {
            $this->session->set_flashdata('error', 'Paid Leave Date Time Request creation failed, the data has been added');
        }
        redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
    }

    function DeletePaidLeaveDateTime($employee_paid_leave_datetime_id, $employee_paid_leave_id, $paid_leave_id, $employee_id)
    {

        $paid_leave_datetime_parameter = array($employee_paid_leave_datetime_id, $employee_paid_leave_id);
        $result = $this->paidleavedatetime_model->DeletePaidLeaveDateTime($paid_leave_datetime_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid leave date time request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Paid leave date time request cannot deleted !');
        }
        redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
    }
}
