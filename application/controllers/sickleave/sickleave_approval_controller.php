<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sickleave_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sickleave/sickleave_approval_model');
        // $this->load->model('sickleave/sickleave_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave Approval';
        $this->loadViews("sickleave/sickleave", $this->global, NULL, NULL);
    }


    function UpdateSickLeaveApproval()
    {
        $sick_leave_id = $this->input->post('sick_leave_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $sick_leave_approval_parameter = array($sick_leave_id, $status_id, $comment, $change_user_id, $record_status);

        $this->load->model('sickleave/sickleave_approval_model');
        $this->sickleave_approval_model->UpdateSickLeaveApproval($sick_leave_approval_parameter);
        $this->session->set_flashdata('success', 'Approval submited !');

        $employee_id = $this->input->post('employee_id');
        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SickLeaveApprovalEmailRecords'] = $this->sickleave_approval_model->GetSickLeaveApprovalEmail($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['SickLeaveRequesterEmailRecords'] = $this->sickleave_approval_model->GetSickLeaveRequesterEmail($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['SickLeaveRequesterNameRecords'] = $this->sickleave_approval_model->GetSickLeaveRequesterName($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->sickleave_approval_model->GetSickLeaveApproverName($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['SickLeaveDetails'] = $this->sickleave_approval_model->GetSickLeaveDetails($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 12);
        $data['TokenRecords'] = $this->sickleave_approval_model->GetToken($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 13);
        $data['TokenRequesterRecords'] = $this->sickleave_approval_model->GetTokenRequester($sick_leave_approval_parameter);

        if ($status_id == 'AOP-001') {
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
            $this->email->to($data['SickLeaveApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Sick Leave Request');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon atas approval Sick Leave Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $sick_leave_id .
                    "<br />Requester Name&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveRequesterNameRecords'] .
                    "<br />Jumlah Izin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->amount_sick_leave . "&nbsp; hari" .
                    "<br />Mulai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->start_date .
                    "<br />Sampai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->finish_date .
                    "<br />Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->description .
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
                $server_key = 'AAAAkid7nn0:APA91bEw61vVxKu8sGCf2vIshpkjPYv_JW8KW41UwM4xMfs7jhV9AVWC9Stxh4ijXRmRst_4NDEslEcEInunYd-23uYfMKh5gZVOmLFsJKw6AyvZZHQTC9pcwKJKnouy3XFfccZMGaqI';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Mohon untuk memberikan approval pada Sick Leave Request dengan No '
                            . $sick_leave_id .
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

        if ($status_id == 'AOP-001' && $data['SickLeaveDetails']->sick_leave_status_id == 'ST-002') {
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
            $this->email->to($data['SickLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Sick Leave Request');
            $this->email->message(
                "Kepada Yth Bpk/Ibu : " . " <b>" . $data['SickLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Sick Leave Request anda dengan nomor document " . $sick_leave_id . " telah <b> Disetujui </b>" .
                    "<br /> " .
                    "<br />Jumlah Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['SickLeaveDetails']->amount_sick_leave . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['SickLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SickLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SickLeaveDetails']->description .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );

            $this->email->send();


            if ($data['TokenRequesterRecords'] != null) {
                // FCM endpoint URL
                $url = 'https://fcm.googleapis.com/fcm/send';

                // FCM server key
                $server_key = 'AAAAkid7nn0:APA91bEw61vVxKu8sGCf2vIshpkjPYv_JW8KW41UwM4xMfs7jhV9AVWC9Stxh4ijXRmRst_4NDEslEcEInunYd-23uYfMKh5gZVOmLFsJKw6AyvZZHQTC9pcwKJKnouy3XFfccZMGaqI';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRequesterRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Permohonan Izin anda dengan No '
                            . $sick_leave_id . ' di setujui' .
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
            $this->email->to($data['SickLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Sick Leave Request');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['SickLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Sick Leave Request anda dengan nomor document " . $sick_leave_id . " <b> Ditolak </b>" .
                    "<br /> " .
                    "<br />Jumlah Izin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->amount_sick_leave . "&nbsp; hari" .
                    "<br />Mulai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->start_date .
                    "<br />Sampai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $data['SickLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SickLeaveDetails']->description .
                    "<br /> Alasan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:&nbsp;" . $comment .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();

            if ($data['TokenRequesterRecords'] != null) {
                // FCM endpoint URL
                $url = 'https://fcm.googleapis.com/fcm/send';

                // FCM server key
                $server_key = 'AAAAkid7nn0:APA91bEw61vVxKu8sGCf2vIshpkjPYv_JW8KW41UwM4xMfs7jhV9AVWC9Stxh4ijXRmRst_4NDEslEcEInunYd-23uYfMKh5gZVOmLFsJKw6AyvZZHQTC9pcwKJKnouy3XFfccZMGaqI';

                // Notification payload
                $payload = array(
                    'to' => $data['TokenRequesterRecords'],
                    'notification' => array(
                        'title' =>
                        'Approval Information',
                        'body' => 'Permohonan Izin anda dengan No '
                            . $sick_leave_id . ' di tolak' .
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

        redirect('SickLeaveDetail/' . $sick_leave_id);
    }
}
