<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class leave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('leave/leave_model');
        $this->load->model('master/variable_model');
        $this->load->model('leave/leavedatetime_model');
        $this->load->model('leave/leave_approval_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Leave';
        $this->loadViews("leave/leave", $this->global, NULL, NULL);
    }

    function GetLeave()
    {
        $this->load->model('leave/leave_model');
        $employee_id = $this->session->userdata('employee_id');
        $leave_parameter = array('p_leave_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 4);
        $data['LeaveRecords'] = $this->leave_model->GetLeave($leave_parameter);

        //Leave Date Time
        $leave_datetime_parameter = array('p_leave_datetime_id' => 0, 'p_leave_id' => '0', 'p_flag' => 0);
        $data['LeaveDateTimeRecords'] = $this->leavedatetime_model->GetLeaveDateTime($leave_datetime_parameter);

        //Category/Keperluan
        $variable_category_parameter = array('p_variable_id' => 'BA', 'p_flag' => 3);
        $data['CategoryRecords'] = $this->variable_model->GetVariable($variable_category_parameter);

        //Sub Category/Izin untuk
        $variable_sub_category_parameter = array('p_variable_id' => 'SC', 'p_flag' => 1);
        $data['SubCategoryRecords'] = $this->variable_model->GetVariable($variable_sub_category_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("leave/leave", $this->global, $data, NULL);
    }


    function GetLeaveById($leave_id)
    {
        $this->load->model('leave/leave_model');
        $leave_parameter = array('p_leave_id' => $leave_id, 'p_employee_id' => '', 'p_flag' => 1);
        $data['LeaveRecords'] = $this->leave_model->GetLeave($leave_parameter);

        // Leave Date Time
        $leave_datetime_parameter = array('p_leave_datetime_id' => 0, 'p_leave_id' => $leave_id, 'p_flag' => 0);
        $data['LeaveDateTimeRecords'] = $this->leavedatetime_model->GetLeaveDateTime($leave_datetime_parameter);

        //Category/Keperluan
        $variable_category_parameter = array('p_variable_id' => 'BA', 'p_flag' => 3);
        $data['CategoryRecords'] = $this->variable_model->GetVariable($variable_category_parameter);


        //Category/Keperluan
        $variable_category_parameter = array('p_variable_id' => 'BA', 'p_flag' => 1);
        $data['CategoryRecords1'] = $this->variable_model->GetVariable($variable_category_parameter);

        //Sub Category/Izin untuk
        $variable_sub_category_parameter = array('p_variable_id' => 'SC', 'p_flag' => 1);
        $data['SubCategoryRecords'] = $this->variable_model->GetVariable($variable_sub_category_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['LeaveApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $employee_id = $this->session->userdata('employee_id');
        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['LeaveApprovalRecords'] = $this->leave_approval_model->GetLeaveApproval($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['LeaveApproval1Records'] = $this->leave_approval_model->GetLeaveApproval1($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LeaveApprovalEmailRecords'] = $this->leave_approval_model->GetLeaveApprovalEmail($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['LeaveRequesterEmailRecords'] = $this->leave_approval_model->GetLeaveRequesterEmail($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LeaveRequesterNameRecords'] = $this->leave_approval_model->GetLeaveRequesterName($leave_approval_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("leave/leave_detail", $this->global, $data, NULL);
    }

    function InsertLeave()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('leave_name', 'Leave Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('leave_category_id', 'Leave Category Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('leave_sub_category_id', 'Leave Sub Category Name', 'required|max_length[50]|xss_clean');

        $leave_name = $this->input->post('leave_name');
        $employee_id = $this->input->post('employee_id');
        $leave_category_id = $this->input->post('leave_category_id');
        $leave_sub_category_id = $this->input->post('leave_sub_category_id');
        $leave_status_id = 'ST-001';


        if ($leave_sub_category_id == 'SC-001') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-002') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-003') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-004') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = $this->input->post('time_leave_finish');
        } else if ($leave_sub_category_id == 'SC-005') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-006') {
            $time_leave_start = null;
            $time_leave_finish = null;
        }


        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $leave_parameter = array($leave_name, $employee_id, $leave_status_id, $leave_category_id, $leave_sub_category_id, $time_leave_start,  $time_leave_finish, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('leave/leave_model');
        $result = $this->leave_model->InsertLeave($leave_parameter);

        if ($result > 0) {
            $param_leave = [
                'p_leave_id' => '',
                'p_employee_id' => '',
                'p_flag' => 2,
            ];
            $result1 = $this->leave_model->GetLeave($param_leave);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_leave_id = $res->leave_id;
                }
            }
            redirect(
                'LeaveDetail/' . $p_leave_id
            );
        } else {
            $this->session->set_flashdata('error', 'Leave Request creation failed');
            redirect('Leave');
        }
    }

    function UpdateLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('leave_id', 'Leave Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('leave_name', 'Leave Name', 'required|max_length[50]|xss_clean');

        $leave_id = $this->input->post('leave_id');
        $leave_name = $this->input->post('leave_name');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $leave_category_id = $this->input->post('leave_category_id');
        $leave_sub_category_id = $this->input->post('leave_sub_category_id');
        $leave_status_id = $this->input->post('leave_status_id');

        if ($leave_sub_category_id == 'SC-001') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-002') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-003') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-004') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = $this->input->post('time_leave_finish');
        } else if ($leave_sub_category_id == 'SC-005') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-006') {
            $time_leave_start = null;
            $time_leave_finish = null;
        }


        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $leave_parameter = array($leave_id,  $leave_name, $employee_id, $company_id, $company_brand_id, $leave_status_id, $leave_category_id, $leave_sub_category_id, $time_leave_start,  $time_leave_finish, $change_user_id, $record_status, 'p_flag' => 0);

        $this->load->model('leave/leave_model');
        $result = $this->leave_model->UpdateLeave($leave_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'Leave Request Updated');
    }

    function SubmitLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('leave_id', 'Leave Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('leave_name', 'Leave Name', 'required|max_length[50]|xss_clean');

        $leave_id = $this->input->post('leave_id');
        $leave_name = $this->input->post('leave_name');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $leave_category_id = $this->input->post('leave_category_id');
        $leave_sub_category_id = $this->input->post('leave_sub_category_id');
        $leave_status_id = $this->input->post('leave_status_id');


        if ($leave_sub_category_id == 'SC-001') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-002') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-003') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-004') {
            $time_leave_start = $this->input->post('time_leave_start');
            $time_leave_finish = $this->input->post('time_leave_finish');
        } else if ($leave_sub_category_id == 'SC-005') {
            $time_leave_start = null;
            $time_leave_finish = null;
        } else if ($leave_sub_category_id == 'SC-006') {
            $time_leave_start = null;
            $time_leave_finish = null;
        }


        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $leave_parameter = array($leave_id,  $leave_name, $employee_id, $company_id, $company_brand_id, $leave_status_id, $leave_category_id, $leave_sub_category_id, $time_leave_start,  $time_leave_finish, $change_user_id, $record_status, 'p_flag' => 1);

        $this->load->model('leave/leave_model');
        $result = $this->leave_model->UpdateLeave($leave_parameter);
        echo json_encode($result);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LeaveApprovalEmailRecords'] = $this->leave_approval_model->GetLeaveApprovalEmail($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LeaveRequesterNameRecords'] = $this->leave_approval_model->GetLeaveRequesterName($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->leave_approval_model->GetLeaveApproverName($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['LeaveDetails'] = $this->leave_approval_model->GetLeaveDetails($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 12);
        $data['TokenRecords'] = $this->leave_approval_model->GetToken($leave_approval_parameter);

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'it.psdjkt@gmail.com',
            'smtp_pass'   => 'nwnpmqsdrxdecvxq',
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('it.psdjkt@gmail.com', 'Persada Group');
        $this->email->to($data['LeaveApprovalEmailRecords']);
        $this->email->subject('No Reply - Approval Leave Request');
        if (($data['LeaveDetails']->leave_sub_category_id == 'SC-002') ||
            ($data['LeaveDetails']->leave_sub_category_id == 'SC-003')
        ) {
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LeaveRequesterNameRecords'] .
                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                    $data['LeaveDetails']->leave_sub_category_name .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/hris/Approval'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
        } else if ($data['LeaveDetails']->leave_sub_category_id == 'SC-004') {
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LeaveRequesterNameRecords'] .
                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                    $data['LeaveDetails']->leave_sub_category_name .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                    "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_finish .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/hris/Approval'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
        } else if (
            $data['LeaveDetails']->leave_sub_category_id == 'SC-001' || $data['LeaveDetails']->leave_sub_category_id == 'SC-005'
            || $data['LeaveDetails']->leave_sub_category_id == 'SC-006'
        ) {
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LeaveRequesterNameRecords'] .
                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                    $data['LeaveDetails']->leave_sub_category_name .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/hris/Approval'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
        }
        $this->email->send();

        if ($data['TokenRecords'] != null) {
            // FCM endpoint URL
            $url = 'https://fcm.googleapis.com/fcm/send';

            // FCM server key
            $server_key = 'AAAAkid7nn0:APA91bEw61vVxKu8sGCf2vIshpkjPYv_JW8KW41UwM4xMfs7jhV9AVWC9Stxh4ijXRmRst_4NDEslEcEInunYd-23uYfMKh5gZVOmLFsJKw6AyvZZHQTC9pcwKJKnouy3XFfccZMGaqI';

            // Notification payload
            $payload = array(
                'to' => $data['TokenRecords'],
                'notification' => array(
                    'title' =>
                    'Approval Information',
                    'body' => 'Mohon untuk memberikan approval pada Leave Request dengan No '
                        . $leave_id .
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

        $this->session->set_flashdata('success', 'Leave Request Submitted');
    }

    function DeleteLeave($leave_id)
    {
        $leave_parameter = array($leave_id);

        $result = $this->leave_model->DeleteLeave($leave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'leave request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'leave request cannot deleted !');
        }

        redirect('Leave');
    }
}
