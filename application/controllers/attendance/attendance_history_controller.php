<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class attendance_history_controller extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('attendance/attendance_model');
        $this->load->model('attendance/attendance_history_model');
        $this->load->model('master/employee_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Attendance';
        $this->loadViews("attendance/attendance", $this->global, NULL, NULL);
    }

    function GetAttendanceHistory()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        $employee_id = $this->session->userdata('employee_id');
        $attendance_history_parameter = array('p_attendance_id' => 0, 'p_employee_id' => $employee_id, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 0);
        $data['AttendanceRecords'] = $this->attendance_history_model->GetAttendanceHistory($attendance_history_parameter);


        $employee_id = $this->session->userdata('employee_id');
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 11);
        $data['EmployeeShiftRecords'] = $this->employee_model->GetEmployeeShiftStart($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("attendance/attendance_history", $this->global, $data, NULL);
    }


    function InsertAttendance()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('attendance_category_id', 'Attendance Category', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('date_time_attendance_start', 'Datetime Attendance Start', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $attendance_status = 'AXT-001';
        $date_time_attendance_start = date('Y-m-d H:i:s', strtotime($this->input->post('date_time_attendance_start')));
        $date_time_attendance_finish = date('Y-m-d H:i:s', strtotime($this->input->post('date_time_attendance_finish')));
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $attendance_parameter = array($employee_id, $attendance_status, $date_time_attendance_start, $date_time_attendance_finish, $description, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('attendance/attendance_model');
        $result = $this->attendance_model->InsertAttendance($attendance_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attendance has been added !');
        } else {
            $this->session->set_flashdata('error', 'Attendance cannot added !');
        }
        redirect('Attendance');
    }

    function UpdateAttendance()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('date_time_attendance_finish', 'Datetime Attendance Finish', 'required|max_length[50]|xss_clean');

        $attendance_id = $this->input->post('attendance_id_update');
        $employee_id = $this->input->post('employee_id_update');
        $date_time_attendance_finish = date('Y-m-d H:i:s', strtotime($this->input->post('date_time_attendance_finish_update')));
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $attendance_parameter = array($attendance_id, $employee_id, $date_time_attendance_finish, $change_user_id, $record_status);

        $this->load->model('attendance/attendance_model');
        $result = $this->attendance_model->UpdateAttendance($attendance_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attendance has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Attendance cannot updated !');
        }
        redirect('Attendance');
    }
}
