<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paidleave_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave/paidleave_approval_model');
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave Approval';
        $this->loadViews("paidleave/paidleave", $this->global, NULL, NULL);
    }


    function UpdatePaidLeaveApproval()
    {
        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_approval_parameter = array($employee_paid_leave_id, $status_id, $comment, $change_user_id, $record_status, 'p_flag' => 0);

        $this->load->model('paidleave/paidleave_approval_model');
        $this->paidleave_approval_model->UpdatePaidLeaveApproval($paidleave_approval_parameter);
        $this->session->set_flashdata('success', 'Approval submited !');

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['PaidLeaveApprovalEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveApprovalEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['PaidLeaveRequesterEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['PaidLeaveRequesterNameRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterName($paid_leave_approval_parameter);

        //approver name
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->paidleave_approval_model->GetPaidLeaveApproverName($paid_leave_approval_parameter);

        //paid leave details
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['PaidLeaveDetails'] = $this->paidleave_approval_model->GetPaidLeaveDetails($paid_leave_approval_parameter);

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
            $this->email->to($data['PaidLeaveApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Paid Leave Request');
            $this->email->message(
                " Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon atas approval Paid Leave Request, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $employee_paid_leave_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveRequesterNameRecords'] .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }


        if ($status_id == 'AOP-001' && $data['PaidLeaveDetails']->paid_leave_status_id == 'ST-002') {
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
            $this->email->to($data['PaidLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Paid Leave Request');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['PaidLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Paid Leave Request anda dengan nomor document " . $employee_paid_leave_id . " telah <b> Disetujui </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
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
            $this->email->to($data['PaidLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Paid Leave Request');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['PaidLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Paid Leave Request anda dengan nomor document " . $employee_paid_leave_id . "  <b> Ditolak </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $comment .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
    }


    function UpdatePaidLeaveCancelApproval()
    {
        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_approval_parameter = array($employee_paid_leave_id, $status_id, $comment, $change_user_id, $record_status, 'p_flag' => 1);

        $this->load->model('paidleave/paidleave_approval_model');
        $this->paidleave_approval_model->UpdatePaidLeaveApproval($paidleave_approval_parameter);
        $this->session->set_flashdata('success', 'Approval submited !');

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['PaidLeaveApprovalEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveApprovalEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['PaidLeaveRequesterEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['PaidLeaveRequesterNameRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterName($paid_leave_approval_parameter);

        //approver name
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->paidleave_approval_model->GetPaidLeaveApproverName($paid_leave_approval_parameter);

        //paid leave details
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['PaidLeaveDetails'] = $this->paidleave_approval_model->GetPaidLeaveDetails($paid_leave_approval_parameter);

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
            $this->email->to($data['PaidLeaveApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Paid Leave Canceled');
            $this->email->message(
                " Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon atas approval Paid Leave Canceled, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $employee_paid_leave_id .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveRequesterNameRecords'] .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }


        if ($status_id == 'AOP-001' && $data['PaidLeaveDetails']->paid_leave_status_id == 'ST-002') {
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
            $this->email->to($data['PaidLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Paid Leave Canceled');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['PaidLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Paid Leave Canceled anda dengan nomor document " . $employee_paid_leave_id . " telah <b> Disetujui </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
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
            $this->email->to($data['PaidLeaveRequesterEmailRecords']);
            $this->email->subject('No Reply - Paid Leave Canceled');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['PaidLeaveDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Paid Leave Canceled anda dengan nomor document " . $employee_paid_leave_id . "  <b> Ditolak </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $comment .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
    }
}
