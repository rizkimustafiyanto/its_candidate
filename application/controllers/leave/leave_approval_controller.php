<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class leave_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('leave/leave_approval_model');
        $this->load->model('leave/leave_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Leave Approval';
        $this->loadViews("leave/leave", $this->global, NULL, NULL);
    }


    function UpdateLeaveApproval()
    {
        $leave_id = $this->input->post('leave_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $leave_approval_parameter = array($leave_id, $status_id, $comment, $change_user_id, $record_status);

        $this->load->model('leave/leave_approval_model');
        $this->leave_approval_model->UpdateLeaveApproval($leave_approval_parameter);
        $this->session->set_flashdata('success', 'Approval submited !');


        $employee_id = $this->input->post('employee_id');
        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LeaveApprovalEmailRecords'] = $this->leave_approval_model->GetLeaveApprovalEmail($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['LeaveRequesterEmailRecords'] = $this->leave_approval_model->GetLeaveRequesterEmail($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LeaveRequesterNameRecords'] = $this->leave_approval_model->GetLeaveRequesterName($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->leave_approval_model->GetLeaveApproverName($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['LeaveDetails'] = $this->leave_approval_model->GetLeaveDetails($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 12);
        $data['TokenRecords'] = $this->leave_approval_model->GetToken($leave_approval_parameter);

        $leave_approval_parameter = array('p_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_leave_id' => $leave_id, 'p_approver_id' => 0, 'p_flag' => 13);
        $data['TokenRequesterRecords'] = $this->leave_approval_model->GetTokenRequester($leave_approval_parameter);

        if ($status_id == 'AOP-001') {
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
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LeaveDetails']->finish_date .
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
                $data['LeaveDetails']->leave_sub_category_id == 'SC-001' || $data['LeaveDetails']->leave_sub_category_id == 'SC-005' ||
                $data['LeaveDetails']->leave_sub_category_id == 'SC-006'
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
                $server_key = 'AAAAaZZ5py8:APA91bFaDzkUOtraat7TKhTBna1GAjiwVijikigi3NUTnntr0GWmW5id_A-JaGoIm1IuUGSqZd2PSUA7zPChH-rY1nYe8hHPigR2PTugc2iXAcd1txFZrbsUhwFGtqgPd_rGwYqS-5KO';

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
        }

        if ($status_id == 'AOP-001' && $data['LeaveDetails']->leave_status_id == 'ST-002') {
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
            $this->email->to($data['LeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Leave Request');
            if (($data['LeaveDetails']->leave_sub_category_id == 'SC-002') ||
                ($data['LeaveDetails']->leave_sub_category_id == 'SC-003')
            ) {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            } else if ($data['LeaveDetails']->leave_sub_category_id == 'SC-004') {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                        "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_finish .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            } else if (
                $data['LeaveDetails']->leave_sub_category_id == 'SC-001' || $data['LeaveDetails']->leave_sub_category_id == 'SC-005' ||
                $data['LeaveDetails']->leave_sub_category_id == 'SC-006'
            ) {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            }
            $this->email->send();

            if ($data['TokenRequesterRecords'] != null) {
                // FCM endpoint URL
                $url = 'https://fcm.googleapis.com/fcm/send';

                // FCM server key
                $server_key = 'AAAAaZZ5py8:APA91bFaDzkUOtraat7TKhTBna1GAjiwVijikigi3NUTnntr0GWmW5id_A-JaGoIm1IuUGSqZd2PSUA7zPChH-rY1nYe8hHPigR2PTugc2iXAcd1txFZrbsUhwFGtqgPd_rGwYqS-5KO';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRequesterRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Permohonan Izin anda dengan No '
                            . $leave_id . ' di setujui' .
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
        } else if ($status_id == 'AOP-002') {
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
            $this->email->to($data['LeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Leave Request');
            if (($data['LeaveDetails']->leave_sub_category_id == 'SC-002') ||
                ($data['LeaveDetails']->leave_sub_category_id == 'SC-003')
            ) {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            } else if ($data['LeaveDetails']->leave_sub_category_id == 'SC-004') {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_start .
                        "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->time_leave_finish .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            } else if (
                $data['LeaveDetails']->leave_sub_category_id == 'SC-001' || $data['LeaveDetails']->leave_sub_category_id == 'SC-005' ||
                $data['LeaveDetails']->leave_sub_category_id == 'SC-006'
            ) {
                $this->email->message(
                    "Yth : Bpk/Ibu " . " <b>" . $data['LeaveDetails']->requester_name . "</b>" .
                        "<br /> " .
                        "<br /> " .
                        "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                        "<br /> " .
                        "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['LeaveDetails']->leave_category_name .
                        "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                        $data['LeaveDetails']->leave_sub_category_name .
                        "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['LeaveDetails']->start_date .
                        "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['LeaveDetails']->finish_date .
                        "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $data['LeaveDetails']->leave_name .
                        "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                        "<br /> " .
                        "<br />Terimakasih " .
                        "<br /><b>Team HRD Persada Group</b>"
                );
            }
            $this->email->send();

            if ($data['TokenRequesterRecords'] != null) {
                // FCM endpoint URL
                $url = 'https://fcm.googleapis.com/fcm/send';

                // FCM server key
                $server_key = 'AAAAaZZ5py8:APA91bFaDzkUOtraat7TKhTBna1GAjiwVijikigi3NUTnntr0GWmW5id_A-JaGoIm1IuUGSqZd2PSUA7zPChH-rY1nYe8hHPigR2PTugc2iXAcd1txFZrbsUhwFGtqgPd_rGwYqS-5KO';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRequesterRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Permohonan Izin anda dengan No '
                            . $leave_id . ' di tolak' .
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
        }

        redirect('LeaveDetail/' . $leave_id);
    }
}
