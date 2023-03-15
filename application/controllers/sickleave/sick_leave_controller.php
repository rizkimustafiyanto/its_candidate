<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sick_leave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sickleave/sick_leave_model');
        $this->load->model('master/variable_model');
        $this->load->model('sickleave/sickleavedatetime_model');
        $this->load->model('sickleave/sickleaveattachment_model');
        $this->load->model('sickleave/sickleave_approval_model');
        $this->load->helper(array('url', 'download'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave';
        $this->loadViews("sickleave/sickleave", $this->global, NULL, NULL);
    }

    function GetSickLeave()
    {

        $this->load->model('sickleave/sick_leave_model');
        $employee_id = $this->session->userdata('employee_id');
        $sick_leave_parameter = array('p_sick_leave_id' => 0, 'p_employee_id' => $employee_id, 'p_flag' => 4);
        $data['SickLeaveRecords'] = $this->sick_leave_model->GetSickLeave($sick_leave_parameter);

        // $data['sick_leave_id'] = $this->sick_leave_model->kode_sick_leave();
        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sickleave/sickleave", $this->global, $data, NULL);
    }


    function GetSickLeaveById($sick_leave_id)
    {

        $this->load->model('sickleave/sick_leave_model');
        $sick_leave_parameter = array('p_sick_leave_id' => $sick_leave_id, 'p_employee_id' => '', 'p_flag' => 1);
        $data['SickLeaveRecords'] = $this->sick_leave_model->GetSickLeave($sick_leave_parameter);

        // Sick Leave Date Time
        $sick_leave_datetime_parameter = array('p_sick_leave_datetime_id' => 0, 'p_sick_leave_id' => $sick_leave_id, 'p_flag' => 0);
        $data['SickLeaveDateTimeRecords'] = $this->sickleavedatetime_model->GetSickLeaveDateTime($sick_leave_datetime_parameter);

        // Sick Leave Attachment
        $sick_leave_attachment_parameter = array('p_sick_leave_attachment_id' => 0, 'p_sick_leave_id' => $sick_leave_id, 'p_flag' => 0);
        $data['SickLeaveAttachmentRecords'] = $this->sickleaveattachment_model->GetSickLeaveAttachment($sick_leave_attachment_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['SickLeaveApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $employee_id = $this->session->userdata('employee_id');
        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['SickLeaveApprovalRecords'] = $this->sickleave_approval_model->GetSickLeaveApproval($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['SickLeaveApproval1Records'] = $this->sickleave_approval_model->GetSickLeaveApproval1($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SickLeaveApprovalEmailRecords'] = $this->sickleave_approval_model->GetSickLeaveApprovalEmail($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['SickLeaveRequesterEmailRecords'] = $this->sickleave_approval_model->GetSickLeaveRequesterEmail($sick_leave_approval_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sickleave/sickleave_detail", $this->global, $data, NULL);
    }

    function InsertSickLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $sick_leave_status_id = 'ST-001';
        $amount_sick_leave = 0;
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $sick_leave_parameter = array($description, $employee_id, $sick_leave_status_id, $amount_sick_leave, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('sickleave/sick_leave_model');
        $result = $this->sick_leave_model->InsertSickLeave($sick_leave_parameter);

        if ($result > 0) {
            $param_sick_leave = [
                'p_sick_leave_id' => '',
                'p_employee_id' => '',
                'p_flag' => 2,
            ];
            $result1 = $this->sick_leave_model->GetSickLeave($param_sick_leave);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_sick_leave_id = $res->sick_leave_id;
                }
            }
            redirect(
                'SickLeaveDetail/' . $p_sick_leave_id
            );
        } else {
            $this->session->set_flashdata('error', 'Sick Leave Request creation failed !');
            redirect('SickLeave');
        }
    }

    function UpdateSickLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sick_leave_id', 'Sick Leave Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $sick_leave_id = $this->input->post('sick_leave_id');
        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $sick_leave_status_id = $this->input->post('sick_leave_status_id');
        $amount_sick_leave = $this->input->post('amount_sick_leave');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $sick_leave_parameter = array($sick_leave_id,  $description, $employee_id, $company_id, $company_brand_id, $sick_leave_status_id, $amount_sick_leave, $change_user_id, $record_status, 'p_flag' => 0);

        $this->load->model('sickleave/sick_leave_model');
        $result = $this->sick_leave_model->UpdateSickLeave($sick_leave_parameter);

        echo json_encode($result);
        $this->session->set_flashdata('success', 'Sick Leave Request Updated');
    }

    function SubmitSickLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sick_leave_id', 'Sick Leave Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $sick_leave_id = $this->input->post('sick_leave_id');
        $description = $this->input->post('description');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $sick_leave_status_id = $this->input->post('sick_leave_status_id');
        $amount_sick_leave = $this->input->post('amount_sick_leave');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sick_leave_parameter = array($sick_leave_id,  $description, $employee_id, $company_id, $company_brand_id, $sick_leave_status_id, $amount_sick_leave, $change_user_id, $record_status, 'p_flag' => 1);

        $this->load->model('sickleave/sick_leave_model');
        $result = $this->sick_leave_model->UpdateSickLeave($sick_leave_parameter);
        echo json_encode($result);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SickLeaveApprovalEmailRecords'] = $this->sickleave_approval_model->GetSickLeaveApprovalEmail($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['SickLeaveRequesterNameRecords'] = $this->sickleave_approval_model->GetSickLeaveRequesterName($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->sickleave_approval_model->GetSickLeaveApproverName($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['SickLeaveDetails'] = $this->sickleave_approval_model->GetSickLeaveDetails($sick_leave_approval_parameter);

        $sick_leave_approval_parameter = array('p_sick_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_sick_leave_id' => $sick_leave_id, 'p_approver_id' => 0, 'p_flag' => 12);
        $data['TokenRecords'] = $this->sickleave_approval_model->GetToken($sick_leave_approval_parameter);

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
            $server_key = 'AAAAaZZ5py8:APA91bFaDzkUOtraat7TKhTBna1GAjiwVijikigi3NUTnntr0GWmW5id_A-JaGoIm1IuUGSqZd2PSUA7zPChH-rY1nYe8hHPigR2PTugc2iXAcd1txFZrbsUhwFGtqgPd_rGwYqS-5KO';

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

        $this->session->set_flashdata('success', 'Sick Leave Request Submitted');
    }

    function DeleteSickLeave($sick_leave_id)
    {
        $sick_leave_parameter = array($sick_leave_id);

        $result = $this->sick_leave_model->DeleteSickLeave($sick_leave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Sick Leave request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Sick Leave request cannot deleted !');
        }

        redirect('SickLeave');
    }
}
