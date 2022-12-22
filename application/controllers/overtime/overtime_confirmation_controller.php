<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class overtime_confirmation_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('overtime/overtime_confirmation_model');
        $this->load->model('overtime/overtime_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Overtime Confirmation';
        $this->loadViews("overtime/overtime", $this->global, NULL, NULL);
    }

    function UpdateOvertimeConfirmation()
    {
        if ($this->input->post('cara') == 'XX-02') {
            $overtime_id = $this->input->post('overtime_id');
            $employee_id = $this->input->post('employee_id');
            $attendance_id = $this->input->post('attendance_id');
            $overtime_status_id = 'ST-005';
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";

            $overtime_confirmation_parameter = array($overtime_id, 'p_actual_time_overtime_start' => null, 'p_actual_time_overtime_finish' => null, $attendance_id, $overtime_status_id, $change_user_id, $record_status, 'p_flag' => 0);

            $this->load->model('overtime/overtime_confirmation_model');
            $this->overtime_confirmation_model->UpdateOvertimeConfirmation($overtime_confirmation_parameter);
            $this->session->set_flashdata('success', 'Approval Confirmed !');

            redirect('OvertimeDetail/' . $overtime_id . "/" . $employee_id);
        } else if ($this->input->post('cara') == 'XX-01') {
            $overtime_id = $this->input->post('overtime_id');
            $employee_id = $this->input->post('employee_id');
            $actual_time_overtime_start = date('Y-m-d H:i:s', strtotime($this->input->post('actual_time_overtime_start')));
            $actual_time_overtime_finish = date('Y-m-d H:i:s', strtotime($this->input->post('actual_time_overtime_finish')));
            $overtime_status_id = 'ST-005';
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";

            //actual total amount overtime
            // $totaltime = (strtotime($actual_time_overtime_finish) - strtotime($actual_time_overtime_start));
            // $hours = sprintf('%02d', intval($totaltime / 3600));
            // $seconds_remain = ($totaltime - ($hours * 3600));
            // $minutes = sprintf('%02d', intval($seconds_remain / 60));
            // $final = '';
            // if ($actual_time_overtime_start == '' || $actual_time_overtime_finish == '') {
            //     $final = ''; 
            // } else {
            //     // $final .= $hours . ':' . $minutes . ':' . $seconds;
            //     $final .= $hours . ':' . $minutes;
            // }
            // $actual_amount_time_overtime = $final;

            $overtime_confirmation_parameter = array($overtime_id, $actual_time_overtime_start, $actual_time_overtime_finish, 'p_attendance_id' => null, $overtime_status_id, $change_user_id, $record_status, 'p_flag' => 1);

            if (strtotime($actual_time_overtime_finish) <= strtotime($actual_time_overtime_start)) {
                $result = "Actual finish date time can't be same or older than Actual start date time ";
                echo json_encode($result);
                $this->session->set_flashdata('error', $result);
            } else {
                $this->load->model('overtime/overtime_confirmation_model');
                $this->overtime_confirmation_model->UpdateOvertimeConfirmation($overtime_confirmation_parameter);
                $this->session->set_flashdata('success', 'Approval Confirmed !');
            }

            redirect('OvertimeDetail/' . $overtime_id . "/" . $employee_id);
        }
    }
}
