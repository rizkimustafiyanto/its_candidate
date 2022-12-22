<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class overtime_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('overtime/overtime_approval_model');
        $this->load->model('overtime/overtime_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Overtime Approval';
        $this->loadViews("overtime/overtime", $this->global, NULL, NULL);
    }


    function UpdateOvertimeApproval()
    {
        $overtime_id = $this->input->post('overtime_id');
        $employee_id = $this->input->post('employee_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $overtime_approval_parameter = array($overtime_id, $status_id, $comment, $change_user_id, $record_status);

        $this->load->model('overtime/overtime_approval_model');
        $this->overtime_approval_model->UpdateOvertimeApproval($overtime_approval_parameter);
        $this->session->set_flashdata('success', 'Approval submited !');

        $employee_id = $this->input->post('employee_id');
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['OvertimeApprovalEmailRecords'] = $this->overtime_approval_model->GetOvertimeApprovalEmail($overtime_approval_parameter);

        $employee_id = $this->input->post('employee_id');
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['OvertimeRequesterEmailRecords'] = $this->overtime_approval_model->GetOvertimeRequesterEmail($overtime_approval_parameter);

        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['OvertimeRequesterNameRecords'] = $this->overtime_approval_model->GetOvertimeRequesterName($overtime_approval_parameter);

        //approval name
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->overtime_approval_model->GetOvertimeApproverName($overtime_approval_parameter);

        //details overtime
        $overtime_approval_parameter = array('p_overtime_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_overtime_id' => $overtime_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['OvertimeDetails'] = $this->overtime_approval_model->GetOvertimeDetails($overtime_approval_parameter);

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
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        if ($status_id == 'AOP-001' && $data['OvertimeDetails']->overtime_status_id == 'ST-002') {
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
            $this->email->to($data['OvertimeRequesterEmailRecords']);
            $this->email->subject('No Reply - Overtime Request');
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['OvertimeDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Overtime Request anda dengan nomor document " . $overtime_id . " telah <b> Disetujui </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->overtimecategoryname .
                    "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['OvertimeDetails']->overtimestart .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['OvertimeDetails']->overtimefinish .
                    "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->amountovertime .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['OvertimeDetails']->description .
                    // "<br /> Keterangan : " . $comment .
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
                'smtp_user' => 'it.psdjkt@gmail.com',  // Email gmail
                'smtp_pass'   => 'nwnpmqsdrxdecvxq',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->from('it.psdjkt@gmail.com', 'Persada Group');
            $this->email->to($data['OvertimeRequesterEmailRecords']);
            $this->email->subject('No Reply - Overtime Request');
            $this->email->message(
                "Yth : Bpk/Ibu " . " <b>" . $data['OvertimeDetails']->requester_name . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Overtime Request anda dengan nomor document " . $overtime_id . " <b> Ditolak </b>" .
                    "<br /> " .
                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->overtimecategoryname .
                    "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $data['OvertimeDetails']->overtimestart .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $data['OvertimeDetails']->overtimefinish .
                    "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['OvertimeDetails']->amountovertime .
                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['OvertimeDetails']->description .
                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $comment .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        redirect('OvertimeDetail/' . $overtime_id . "/" . $employee_id);
    }
}
