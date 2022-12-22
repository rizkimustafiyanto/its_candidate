<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

//Memanggil file autoload
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class attendance_temp_controller extends BaseController
{
    //Memanggil class dari PhpSpreadsheet dengan namespace
    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('attendance/attendance_temp_model');
        $this->load->library(array('excel', 'session'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Attendance';
        $this->loadViews("attendance/attendance", $this->global, NULL, NULL);
    }

    public function ImportTempAttendanceInsert()
    {
        $key = 'Persada123';

        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['data']['name']) && in_array($_FILES['data']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['data']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else if ('xls' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

            $spreadsheet = $reader->load($_FILES['data']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                $employee_id = $sheetData[$i]['0'];
                $date_time_attendance_start = date('H:i:s', strtotime($sheetData[$i]['1']));
                $date_time_attendance_finish = date('H:i:s', strtotime($sheetData[$i]['2']));
                $date = date('Y-m-d', strtotime($sheetData[$i]['3']));

                if ($date_time_attendance_start == '01:00:00') {
                    $date_time_attendance_start2 = date('Y-m-d', strtotime("$date"));
                } else if ($date_time_attendance_start != '01:00:00') {
                    $date_time_attendance_start2 = date('Y-m-d H:i:s', strtotime("$date $date_time_attendance_start"));
                }

                if ($date_time_attendance_finish == '01:00:00') {
                    $date_time_attendance_finish2 = date('Y-m-d', strtotime("$date"));
                } else if ($date_time_attendance_finish != '01:00:00') {
                    $date_time_attendance_finish2 = date('Y-m-d H:i:s', strtotime("$date $date_time_attendance_finish"));
                }

                if ($date_time_attendance_start == '01:00:00' && $date_time_attendance_finish == '01:00:00') {
                    $attendance_status = 'AXT-002';
                } else {
                    $attendance_status = 'AXT-001';
                }


                $temp_data = array(
                    'employee_id' => $employee_id,
                    'attendance_status' => $attendance_status,
                    'date_time_attendance_start' => $date_time_attendance_start2,
                    'date_time_attendance_finish' => $date_time_attendance_finish2,
                    'description' => NULL,
                    'change_no' => 0,
                    'creation_user_id' => $employee_id,
                    'change_user_id' => $employee_id,
                    'record_status' => 'A'
                );

                $result = $this->attendance_temp_model->InsertImportAttendance($temp_data);
            }
            if ($result > 0) {
                // Redirect to modal Preview
                $this->session->set_flashdata('preview', 'Attendance imported successfully !');
            } else {
                $this->session->set_flashdata('error', 'Import Attendance failed !');
            }
            redirect('Attendance');
        }
    }

    function DeleteAttendanceTemp()
    {
        $this->attendance_temp_model->DeleteAttendanceTemp();
        redirect('Attendance');
    }
}
