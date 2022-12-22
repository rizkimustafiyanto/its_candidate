<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sickleavedatetime_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sickleave/sickleavedatetime_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave Date Time';
        $this->loadViews("sickleavedatetime/sickleavedatetime", $this->global, NULL, NULL);
    }

    function GetLeaveDateTime()
    {

        $this->load->model('sickleave/sickleavedatetime_model');
        $sick_leave_datetime_parameter = array('p_sick_leave_datetime_id' => 0, 'p_leave_id' => '0', 'p_flag' => 0);
        $data['SickLeaveDateTimeRecords'] = $this->sickleavedatetime_model->GetSickLeaveDateTime($sick_leave_datetime_parameter);
    }

    function InsertSickLeaveDateTime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sick_leave_date', 'Sick Leave Date', 'required|max_length[50]|xss_clean');

        $sick_leave_id = $this->input->post('sick_leave_id');
        $sick_leave_date = date('Y-m-d', strtotime($this->input->post('sick_leave_date')));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sick_leave_parameter = array($sick_leave_id, $sick_leave_date, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('sickleave/sickleavedatetime_model');
        $this->sickleavedatetime_model->InsertSickLeaveDateTime($sick_leave_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Leave Date Time Request created successfully');
        } else {
            $this->session->set_flashdata('error', 'Leave Date Time Request creation failed, the data has been added');
        }
        redirect('SickLeaveDetail/' . $sick_leave_id);
    }

    function DeleteSickLeaveDateTime($sick_leave_datetime_id, $sick_leave_id)
    {

        $sick_leave_datetime_parameter = array($sick_leave_datetime_id, $sick_leave_id);
        $result = $this->sickleavedatetime_model->DeleteSickLeaveDateTime($sick_leave_datetime_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Sick leave date time request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Sick leave date time request cannot deleted !');
        }
        redirect('SickLeaveDetail/' . $sick_leave_id);
    }
}
