<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

//Memanggil file autoload
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class attendance_controller extends BaseController
{
    //Memanggil class dari PhpSpreadsheet dengan namespace
    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('attendance/attendance_model');
        $this->load->model('attendance/attendance_temp_model');
        $this->load->model('master/employee_model');
        $this->load->library(array('excel', 'session'));
        $this->load->helper(array('url', 'download'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Attendance';
        $this->loadViews("attendance/attendance", $this->global, NULL, NULL);
    }

    function GetAttendance()
    {
        $date_1 = date('Y-m-d', strtotime($this->input->post('date_1')));
        $date_2 = date('Y-m-d', strtotime($this->input->post('date_2')));

        $attendance_parameter = array('p_attendance_id' => 0, 'p_employee_id' => 0, 'p_overtime_id' => 0, 'p_date_1' => $date_1, 'p_date_2' => $date_2, 'p_flag' => 1);
        $data['AttendanceRecords'] = $this->attendance_model->GetAttendance($attendance_parameter);

        $attendance_parameter = array('p_attendance_id' => 0, 'p_employee_id' => 0, 'p_flag' => 0);
        $data['AttendanceTempRecords'] = $this->attendance_temp_model->GetAttendance($attendance_parameter);

        $employee_id = $this->session->userdata('employee_id');
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 11);
        $data['EmployeeShiftRecords'] = $this->employee_model->GetEmployeeShiftStart($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("attendance/attendance", $this->global, $data, NULL);
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
        $photo_url = null;
        $longitude = null;
        $latitude = null;
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $attendance_parameter = array($employee_id, $attendance_status, $date_time_attendance_start, $date_time_attendance_finish, $description, $photo_url, $longitude, $latitude, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('attendance/attendance_model');
        $this->attendance_model->InsertAttendance($attendance_parameter);
        $result = $this->db->affected_rows();
        // print $result;

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

    function InsertAttendanceTemptoAttendance()
    {

        $attendance_parameter = array('p_attendance_id' => 0, 'p_employee_id' => 0, 'p_flag' => 0);
        $data['AttendanceTempRecords'] = $this->attendance_temp_model->GetAttendance($attendance_parameter);

        foreach ($data['AttendanceTempRecords'] as $record) {

            $employee_id = $record->employee_id;
            $attendance_status = $record->attendance_status;
            $date_time_attendance_start = $record->date_time_attendance_start;
            $date_time_attendance_finish = $record->date_time_attendance_finish;
            $description = $record->description;
            $photo_url = NULL;
            $longitude = NULL;
            $latitude = NULL;
            $change_no = 0;
            $creation_user_id = $record->employee_id;
            $change_user_id = $record->employee_id;
            $record_status = 'A';

            $attendance_parameter = array($employee_id, $attendance_status, $date_time_attendance_start, $date_time_attendance_finish, $description, $photo_url, $longitude, $latitude, $change_no, $creation_user_id, $change_user_id, $record_status);

            $this->load->model('attendance/attendance_model');
            $result = $this->attendance_model->InsertAttendance($attendance_parameter);
        }

        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attendance has been added !');
        } else {
            $this->session->set_flashdata('error', 'Attendance cannot added !');
        }
        redirect('Attendance');
    }


    public function download()
    {
        force_download('assets/dist/template/Template.xlsx', NULL);
    }
}
