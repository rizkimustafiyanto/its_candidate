<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class overtime_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('overtime/overtime_model');
        $this->load->model('overtime/overtimeattachment_model');
        $this->load->model('overtime/overtime_approval_model');
        $this->load->model('master/variable_model');
        $this->load->model('attendance/attendance_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Overtime';
        $this->loadViews("overtime/overtime", $this->global, NULL, NULL);
    }

    function GetOvertime()
    {

        $this->load->model('overtime/overtime_model');
        $employee_id = $this->session->userdata('employee_id');
        $overtime_parameter = array('p_overtime_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 4);
        $data['OvertimeRecords'] = $this->overtime_model->GetOvertime($overtime_parameter);

        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 6);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        //Category/Keperluan
        $variable_category_parameter = array('p_variable_id' => 'OT', 'p_flag' => 1);
        $data['CategoryRecords'] = $this->variable_model->GetVariable($variable_category_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("overtime/overtime", $this->global, $data, NULL);
    }


    function GetOvertimeById($overtime_id, $employee_id)
    {

        $this->load->model('overtime/overtime_model');
        $overtime_parameter = array('p_overtime_id' => $overtime_id, 'p_employee_id' => '', 'p_flag' => 1);
        $data['OvertimeRecords'] = $this->overtime_model->GetOvertime($overtime_parameter);

        //Category/Keperluan
        $variable_category_parameter = array('p_variable_id' => 'OT', 'p_flag' => 1);
        $data['CategoryRecords'] = $this->variable_model->GetVariable($variable_category_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['OvertimeApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        // $employee_id = $this->session->userdata('employee_id');
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['OvertimeApprovalRecords'] = $this->overtime_approval_model->GetOvertimeApproval($overtime_approval_parameter);

        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['OvertimeApproval1Records'] = $this->overtime_approval_model->GetOvertimeApproval1($overtime_approval_parameter);

        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['OvertimeApprovalEmailRecords'] = $this->overtime_approval_model->GetOvertimeApprovalEmail($overtime_approval_parameter);

        // $employee_id = $this->input->post('employee_id');
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['OvertimeRequesterEmailRecords'] = $this->overtime_approval_model->GetOvertimeRequesterEmail($overtime_approval_parameter);

        //approval name
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->overtime_approval_model->GetOvertimeApproverName($overtime_approval_parameter);

        //details overtime
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['OvertimeDetails'] = $this->overtime_approval_model->GetOvertimeDetails($overtime_approval_parameter);

        // Overtime Attachment
        $overtime_attachment_parameter = array('p_overtime_attachment_id' => 0, 'p_overtime_id' => $overtime_id, 'p_flag' => 0);
        $data['OvertimeAttachmentRecords'] = $this->overtimeattachment_model->GetOvertimeAttachment($overtime_attachment_parameter);

        //Attendance List
        $attendance_parameter = array('p_attendance_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 4);
        $data['AttendanceRecords'] = $this->attendance_model->GetAttendance($attendance_parameter);

        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 13);
        $data['TokenRecords'] = $this->overtime_approval_model->GetToken($overtime_approval_parameter);

        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 14);
        $data['TokenRequesterRecords'] = $this->overtime_approval_model->GetTokenRequester($overtime_approval_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("overtime/overtime_detail", $this->global, $data, NULL);
    }

    function InsertOvertime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_start', 'Time Overtime Start', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_finish', 'Time Overtime Finish', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('overtime_category_id', 'Overtime Category Name', 'required|max_length[50]|xss_clean');

        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $overtime_category_id = $this->input->post('overtime_category_id');
        $overtime_status_id = 'ST-001';
        $time_overtime_start = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_start')));
        $time_overtime_finish = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_finish')));
        // $now = time();
        //total amount overtime
        $totaltime = (strtotime($time_overtime_finish) - strtotime($time_overtime_start));
        $hours = sprintf('%02d', intval($totaltime / 3600));
        $seconds_remain = ($totaltime - ($hours * 3600));
        $minutes = sprintf('%02d', intval($seconds_remain / 60));
        // $seconds = sprintf('%02d', ($seconds_remain - ($minutes * 60)));
        $final = '';
        if ($time_overtime_start == '' || $time_overtime_finish == '') {
            $final = '';
        } else {
            // $final .= $hours . ':' . $minutes . ':' . $seconds;
            $final .= $hours . ':' . $minutes;
        }
        $amount_time_overtime = $final;
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $overtime_parameter = array($description, $employee_id, $overtime_status_id, $overtime_category_id, $time_overtime_start,  $time_overtime_finish, $amount_time_overtime, $change_no, $creation_user_id, $change_user_id, $record_status);

        if (date('Y-m-d', strtotime($time_overtime_start)) < date("Y-m-d")) {
            $error = "Start date time can't older than Now ";
            $this->session->set_flashdata('error', $error);
            redirect('Overtime');
        } else if (strtotime($time_overtime_finish) <= strtotime($time_overtime_start)) {
            $error = "Finish date time can't be same or older than Start date time ";
            $this->session->set_flashdata('error', $error);
            redirect('Overtime');
        } else {
            $this->load->model('overtime/overtime_model');
            $result = $this->overtime_model->InsertOvertime($overtime_parameter);

            if ($result > 0) {

                $param_overtime = [
                    'p_overtime_id' => '',
                    'p_employee_id' => '',
                    'p_flag' => 2,
                ];
                $result1 = $this->overtime_model->GetOvertime($param_overtime);
                if ($result1 > 0) {
                    foreach ($result1 as $res) {
                        $p_overtime_id = $res->overtime_id;
                        $p_employee_id = $res->employee_id;
                    }
                }
                redirect(
                    'OvertimeDetail/' . $p_overtime_id . '/' . $p_employee_id
                );
            } else {
                $this->session->set_flashdata('error', 'Overtime Request creation failed');
                redirect('Overtime');
            }
        }
    }

    function UpdateOvertime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('overtime_id', 'Overtime Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_start', 'Time Overtime Start', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_finish', 'Time Overtime Finish', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('overtime_category_id', 'Overtime Category Name', 'required|max_length[50]|xss_clean');

        $overtime_id = $this->input->post('overtime_id');
        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $overtime_category_id = $this->input->post('overtime_category_id');
        $overtime_status_id = $this->input->post('overtime_status_id');
        $time_overtime_start = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_start')));
        $time_overtime_finish = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_finish')));

        // perhitungan jam lembur
        $totaltime = (strtotime($time_overtime_finish) - strtotime($time_overtime_start));
        $hours = sprintf('%02d', intval($totaltime / 3600));
        $seconds_remain = ($totaltime - ($hours * 3600));
        $minutes = sprintf('%02d', intval($seconds_remain / 60));
        // $seconds = sprintf('%02d', ($seconds_remain - ($minutes * 60)));
        $final = '';
        if ($time_overtime_start == '' || $time_overtime_finish == '') {
            $final = '';
        } else {
            // $final .= $hours . ':' . $minutes . ':' . $seconds;
            $final .= $hours . ':' . $minutes;
        }
        $amount_time_overtime = $final;
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $overtime_parameter = array($overtime_id,  $description, $employee_id, $company_id, $company_brand_id, $overtime_status_id, $overtime_category_id, $time_overtime_start,  $time_overtime_finish, $amount_time_overtime, $change_user_id, $record_status, 'p_flag' => 0);

        //cek jika date time finish kurang dari date time start

        if (date('Y-m-d', strtotime($time_overtime_start)) < date("Y-m-d")) {
            $result  = "Start date time can't older than Now ";
            echo json_encode($result);
            $this->session->set_flashdata('error', $result);
        } else if (strtotime($time_overtime_finish) <= strtotime($time_overtime_start)) {
            $result = "Finish date time can't be same or older than Start date time ";
            echo json_encode($result);
            $this->session->set_flashdata('error', $result);
        } else {
            $this->load->model('overtime/overtime_model');
            $result = $this->overtime_model->UpdateOvertime($overtime_parameter);
            echo json_encode($result);
            $this->session->set_flashdata('success', 'Overtime Request Updated');
        }
    }

    function SubmitOvertime()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('overtime_id', 'Overtime Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_start', 'Time Overtime Start', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('time_overtime_finish', 'Time Overtime Finish', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('overtime_category_id', 'Overtime Category Name', 'required|max_length[50]|xss_clean');

        $overtime_id = $this->input->post('overtime_id');
        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $overtime_category_id = $this->input->post('overtime_category_id');
        $overtime_status_id = $this->input->post('overtime_status_id');
        $time_overtime_start = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_start')));
        $time_overtime_finish = date('Y-m-d H:i:s', strtotime($this->input->post('time_overtime_finish')));

        // perhitungan jam lembur
        $totaltime = (strtotime($time_overtime_finish) - strtotime($time_overtime_start));
        $hours = sprintf('%02d', intval($totaltime / 3600));
        $seconds_remain = ($totaltime - ($hours * 3600));
        $minutes = sprintf('%02d', intval($seconds_remain / 60));
        // $seconds = sprintf('%02d', ($seconds_remain - ($minutes * 60)));
        $final = '';
        if ($time_overtime_start == '' || $time_overtime_finish == '') {
            $final = '';
        } else {
            // $final .= $hours . ':' . $minutes . ':' . $seconds;
            $final .= $hours . ':' . $minutes;
        }
        $amount_time_overtime = $final;
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $overtime_parameter = array($overtime_id,  $description, $employee_id, $company_id, $company_brand_id, $overtime_status_id, $overtime_category_id, $time_overtime_start,  $time_overtime_finish, $amount_time_overtime, $change_user_id, $record_status, 'p_flag' => 1);

        // cek jika date time finish melebihi date time start
        if (date('Y-m-d', strtotime($time_overtime_start)) < date("Y-m-d")) {
            $result  = "Start date time can't older than Now ";
            echo json_encode($result);
            $this->session->set_flashdata('error', $result);
        } else if (strtotime($time_overtime_finish) <= strtotime($time_overtime_start)) {
            $result = "Finish date time can't be same or older than Start date time ";
            echo json_encode($result);
            $this->session->set_flashdata('error', $result);
        } else {
            $this->load->model('overtime/overtime_model');
            $result = $this->overtime_model->UpdateOvertime($overtime_parameter);
            echo json_encode($result);

            $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 5);
            $data['OvertimeApprovalEmailRecords'] = $this->overtime_approval_model->GetOvertimeApprovalEmail($overtime_approval_parameter);

            $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 7);
            $data['OvertimeRequesterNameRecords'] = $this->overtime_approval_model->GetOvertimeRequesterName($overtime_approval_parameter);

            //approval name
            $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 8);
            $data['ApproverName'] = $this->overtime_approval_model->GetOvertimeApproverName($overtime_approval_parameter);

            //details overtime
            $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 9);
            $data['OvertimeDetails'] = $this->overtime_approval_model->GetOvertimeDetails($overtime_approval_parameter);

            //tinggal manggil overtime details ke body email and testing

            $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 13);
            $data['TokenRecords'] = $this->overtime_approval_model->GetToken($overtime_approval_parameter);

            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'it.psdjkt@gmail.com',  // Email gmail
                'smtp_pass'   => 'nwnpmqsdrxdecvxq',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->from('it.psdjkt@gmail.com', 'Persada Group');
            $this->email->to($data['OvertimeApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Overtime Request');
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon approval atas Overtime Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $overtime_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['OvertimeRequesterNameRecords'] .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->overtimecategoryname .
                    "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['OvertimeDetails']->overtimestart .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['OvertimeDetails']->overtimefinish .
                    "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->amountovertime .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['OvertimeDetails']->description .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/hris/Approval'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();

            if ($data['TokenRecords'] != null) {
                // FCM endpoint URL
                $url = 'https://fcm.googleapis.com/fcm/send';

                // FCM server key
                $server_key = 'AAAAaZZ5py8:APA91bFaDzkUOtraat7TKhTBna1GAjiwVijikigi3NUTnntr0GWmW5id_A-JaGoIm1IuUGSqZd2PSUA7zPChH-rY1nYe8hHPigR2PTugc2iXAcd1txFZrbsUhwFGtqgPd_rGwYqS-5KO';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Mohon untuk memberikan approval pada Overtime Request dengan No '
                            . $overtime_id .
                            '. Terimakasih.'
                    ),
                    'data' => array(
                        'chatId' => '123456',
                        'senderId' => 'user123'
                    )
                );

                // Set headers
                $headers = array(
                    'Content-Type:application/json',
                    'Authorization:key=' . $server_key
                );

                // Initialize cURL
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

                // Execute the request
                $response = curl_exec($ch);

                // Check for errors
                if ($response === false) {
                    $error = curl_error($ch);
                    curl_close($ch);
                    log_message('error', 'FCM request failed: ' . $error);
                    // return false;
                }

                // Close cURL
                curl_close($ch);

                // Check the response status
                $response_data = json_decode($response);
                if ($response_data->success == 1) {
                    log_message('info', 'FCM notification sent successfully.');
                    // return true;
                } else {
                    log_message('error', 'FCM notification failed: ' . $response);
                    // return false;
                }
            }

            $this->session->set_flashdata('success', 'Overtime Request Submitted');
        }
    }

    function DeleteOvertime($overtime_id)
    {
        $overtime_parameter = array($overtime_id);
        $result = $this->overtime_model->DeleteOvertime($overtime_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Overtime request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Overtime request cannot deleted !');
        }
        redirect('Overtime');
    }
}
