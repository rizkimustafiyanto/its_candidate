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
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
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
        }

        redirect('SickLeaveDetail/' . $sick_leave_id);
    }
}
