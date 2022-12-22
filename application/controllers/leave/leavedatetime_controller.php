<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class leavedatetime_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('leave/leavedatetime_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Leave Date Time';
        $this->loadViews("leavedatetime/leavedatetime", $this->global, NULL, NULL);
    }

    function GetLeaveDateTime()
    {

        $this->load->model('leave/leavedatetime_model');
        $leave_datetime_parameter = array('p_leave_datetime_id' => 0, 'p_leave_id' => '0', 'p_flag' => 0);
        $data['LeaveDateTimeRecords'] = $this->leavedatetime_model->GetLeaveDateTime($leave_datetime_parameter);
    }

    function InsertLeaveDateTime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('leave_date', 'Leave Date', 'required|max_length[50]|xss_clean');

        $leave_id = $this->input->post('leave_id');
        $leave_date = date('Y-m-d', strtotime($this->input->post('leave_date')));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $leave_parameter = array($leave_id, $leave_date, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('leave/leavedatetime_model');
        $this->leavedatetime_model->InsertLeaveDateTime($leave_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Leave Date Time Request created successfully');
        } else {
            $this->session->set_flashdata('error', 'Leave Date Time Request creation failed, the data has been added');
        }
        redirect('LeaveDetail/' . $leave_id);
    }

    function DeleteLeaveDateTime($leave_datetime_id, $leave_id)
    {

        $leave_datetime_parameter = array($leave_datetime_id);
        $result = $this->leavedatetime_model->DeleteLeaveDateTime($leave_datetime_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'leave date time request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'leave date time request cannot deleted !');
        }
        redirect('LeaveDetail/' . $leave_id);
    }
}
