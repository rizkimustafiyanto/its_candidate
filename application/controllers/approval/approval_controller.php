<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('approval/approval_model');
        $this->load->model('overtime/overtime_approval_model');
        $this->load->model('paidleave/paidleave_approval_model');
        $this->load->model('sickleave/sickleave_approval_model');
        $this->load->model('leave/leave_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("approval/approval", $this->global, NULL, NULL);
    }

    function GetApproval()
    {
        $employee_id = $this->session->userdata('employee_id');
        $approval_parameter = array('p_employee_id' => $employee_id);
        $data['ApprovalListRecords'] = $this->approval_model->GetApproval($approval_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['ApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Approval';
        $this->loadViews("approval/approval", $this->global, $data, NULL);
    }

    function MultipleApproval()
    {

        $runningnoid = explode(',', $this->input->post('runningno'));

        foreach ($runningnoid as $det) {
            $runningno     = $det;
            $status_id = $this->input->post('status_id');
            $comment = $this->input->post('comment');
            $change_user_id = $this->session->userdata('employee_id');
            $record_status = "A";


            $approval_parameter = array($runningno, $status_id, $comment, $change_user_id, $record_status);


            $this->load->model('approval/approval_model');
            $result = $this->approval_model->MultipleApproval($approval_parameter);


            $this->session->set_flashdata('success', 'Approval submited !');


            if (substr($runningno, 0, 2) == 'OT') {
                if ($result > 0)
                    $param_approval = [
                        'p_overtime_approval_id' => '',
                        'p_employee_id' => '',
                        'p_overtime' => $runningno,
                        'approver_id' => '',
                        'p_flag' => 10,
                    ];
                $param_approval2 = [
                    'p_overtime_approval_id' => '',
                    'p_employee_id' => '',
                    'p_overtime' => $runningno,
                    'approver_id' => '',
                    'p_flag' => 11,
                ];
                $cek_status = $this->overtime_approval_model->GetOvertimeApproval($param_approval);
                $cek_status2 = $this->overtime_approval_model->GetOvertimeApproval($param_approval2);


                if ($cek_status > 0) {
                    foreach ($cek_status as $record) {
                        $overtime_id = $record->overtime_id;
                        $requester_name = $record->requester_name;
                        $email_approver = $record->email_approver;
                        $approver_name = $record->approver_name;
                        $overtimecategoryname = $record->overtimecategoryname;
                        $description = $record->description;
                        $overtimestart = $record->overtimestart;
                        $overtimefinish = $record->overtimefinish;
                        $amountovertime = $record->amountovertime;
                        $overtime_status_id = $record->overtime_status_id;
                        $requester_email = $record->requester_email;
                        // $last_approver = $record->last_approver;
                        // }

                        if ($cek_status2 > 0) {
                            foreach ($cek_status2 as $record2) {
                                $last_approver = $record2->last_approver;

                                if (($status_id == 'AOP-001') && ('111190024' == $change_user_id)) {
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
                                    $this->email->to($requester_email);
                                    $this->email->subject('No Reply - Overtime Request');
                                    $this->email->message(
                                        "Yth : " . " <b>" . $requester_name . "</b>" .
                                            "<br /> " .
                                            "<br /> " .
                                            "Pengajuan Overtime Request anda dengan nomor document " . $overtime_id . " telah <b> Disetujui </b>" .
                                            "<br /> " .
                                            "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $overtimecategoryname .
                                            "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $overtimestart .
                                            "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $overtimefinish .
                                            "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $amountovertime .
                                            "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
                                            "<br /> " .
                                            "<br />Terimakasih " .
                                            "<br /><b>Team HRD Persada Group</b>"
                                    );
                                    $this->email->send();
                                } else if ($status_id == 'AOP-001') {
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
                                    $this->email->to($email_approver);
                                    $this->email->subject('No Reply - Approval Overtime Request');
                                    $this->email->message(
                                        "Yth : " . " <b>" . $approver_name . "</b>" .
                                            "<br /> " .
                                            "<br /> Anda mendapatkan tugas untuk Approve Overtime Request, dengan detail : " .
                                            "<br /> " .
                                            "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $overtime_id .
                                            "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $requester_name .
                                            "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $overtimecategoryname .
                                            "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $overtimestart .
                                            "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $overtimefinish .
                                            "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $amountovertime .
                                            "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
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
                                    $this->email->to($requester_email);
                                    $this->email->subject('No Reply - Overtime Request');
                                    $this->email->message(
                                        "Yth : " . " <b>" . $requester_name . "</b>" .
                                            "<br /> " .
                                            "<br /> " .
                                            "Pengajuan Overtime Request anda dengan nomor document " . $overtime_id . " <b> Ditolak </b>" .
                                            "<br /> " .
                                            "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $overtimecategoryname .
                                            "<br />Mulai Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $overtimestart .
                                            "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $overtimefinish .
                                            "<br />Total Lembur &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $amountovertime .
                                            "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
                                            "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $comment .
                                            "<br /> " .
                                            "<br />Terimakasih " .
                                            "<br /><b>Team HRD Persada Group</b>"
                                    );
                                    $this->email->send();
                                }
                            }
                        }
                    }
                }
            }
            //end of overtime

            if (substr($runningno, 0, 2) == 'PL') {
                if ($result > 0)
                    $param_approval = [
                        'p_employee_paid_leave_approval_id' => '',
                        'p_employee_id' => '',
                        'p_employee_paid_leave_id' => $runningno,
                        'approver_id' => '',
                        'p_flag' => 10,
                    ];
                $cek_status = $this->paidleave_approval_model->GetPaidLeaveApproval($param_approval);

                if ($cek_status > 0) {
                    foreach ($cek_status as $record) {
                        $employee_paid_leave_id = $record->employee_paid_leave_id;
                        $requester_name = $record->requester_name;
                        $email_approver = $record->email_approver;
                        $approver_name = $record->approver_name;
                        $paid_leave_name = $record->paid_leave_name;
                        $paid_leave_amount = $record->paid_leave_amount;
                        $start_date = $record->start_date;
                        $finish_date = $record->finish_date;
                        $description = $record->description;
                        $paid_leave_status_id = $record->paid_leave_status_id;
                        $requester_email = $record->requester_email;
                        // }
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
                            $this->email->to($email_approver);
                            $this->email->subject('No Reply - Approval Paid Leave Request');
                            $this->email->message(
                                " Kepada Yth : Bpk/Ibu " . " <b>" . $approver_name . "</b>" .
                                    "<br /> " .
                                    "<br /> Mohon atas approval Paid Leave Request, dengan detail : " .
                                    "<br /> " .
                                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $employee_paid_leave_id .
                                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $requester_name .
                                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_name .
                                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_amount . "&nbsp; hari" .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                            $this->email->send();
                        }


                        if ($status_id == 'AOP-001' && $paid_leave_status_id == 'ST-002') {
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
                            $this->email->to($requester_email);
                            $this->email->subject('No Reply - Paid Leave Request');
                            $this->email->message(
                                "Kepada Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Paid Leave Request anda dengan nomor document " . $employee_paid_leave_id . " telah <b> Disetujui </b>" .
                                    "<br /> " .
                                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_name .
                                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_amount . "&nbsp; hari" .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
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
                            $this->email->to($requester_email);
                            $this->email->subject('No Reply - Paid Leave Request');
                            $this->email->message(
                                "Kepada Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Paid Leave Request anda dengan nomor document " . $employee_paid_leave_id . "  <b> Ditolak </b>" .
                                    "<br /> " .
                                    "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_name .
                                    "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $paid_leave_amount . "&nbsp; hari" .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $description .
                                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $comment .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                            $this->email->send();
                        }
                    }
                }
            }
            // end of paid leave


            if (substr($runningno, 0, 2) == 'SL') {
                if ($result > 0)
                    $param_approval = [
                        'p_sick_leave_approval_id' => '',
                        'p_employee_id' => '',
                        'p_sick_leave_id' => $runningno,
                        'p_approver_id' => '',
                        'p_flag' => 10,
                    ];
                $cek_status = $this->sickleave_approval_model->GetSickLeaveApproval($param_approval);

                if ($cek_status > 0) {
                    foreach ($cek_status as $record) {
                        $sick_leave_id = $record->sick_leave_id;
                        $requester_name = $record->requester_name;
                        $email_approver = $record->email_approver;
                        $approver_name = $record->approver_name;
                        $amount_sick_leave = $record->amount_sick_leave;
                        $start_date = $record->start_date;
                        $finish_date = $record->finish_date;
                        $description = $record->description;
                        $sick_leave_status_id = $record->sick_leave_status_id;
                        $requester_email = $record->requester_email;
                    }
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
                        $this->email->to($email_approver);
                        $this->email->subject('No Reply - Approval Sick Leave Request');
                        $this->email->message(
                            "Kepada Yth : Bpk/Ibu " . " <b>" . $approver_name . "</b>" .
                                "<br /> " .
                                "<br /> Mohon atas approval Sick Leave Request, dengan detail : " .
                                "<br /> " .
                                "<br /> Document No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $sick_leave_id .
                                "<br />Requester Name&nbsp;&nbsp;&nbsp;:&nbsp;" . $requester_name .
                                "<br />Jumlah Izin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $amount_sick_leave . "&nbsp; hari" .
                                "<br />Mulai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $start_date .
                                "<br />Sampai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $finish_date .
                                "<br />Keterangan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $description .
                                "<br /> " .
                                "<br />Terimakasih " .
                                "<br /><b>Team HRD Persada Group</b>"
                        );
                        $this->email->send();
                    }

                    if ($status_id == 'AOP-001' && $sick_leave_status_id == 'ST-002') {
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
                        $this->email->to($email_approver);
                        $this->email->subject('No Reply - Sick Leave Request');
                        $this->email->message(
                            "Kepada Yth Bpk/Ibu : " . " <b>" . $requester_name . "</b>" .
                                "<br /> " .
                                "<br /> " .
                                "Pengajuan Sick Leave Request anda dengan nomor document " . $sick_leave_id . " telah <b> Disetujui </b>" .
                                "<br /> " .
                                "<br />Jumlah Izin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $amount_sick_leave . "&nbsp; hari" .
                                "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $start_date .
                                "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $finish_date .
                                "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $description .
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
                        $this->email->to($email_approver);
                        $this->email->subject('No Reply - Sick Leave Request');
                        $this->email->message(
                            "Kepada Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                "<br /> " .
                                "<br /> " .
                                "Pengajuan Sick Leave Request anda dengan nomor document " . $sick_leave_id . " <b> Ditolak </b>" .
                                "<br /> " .
                                "<br />Jumlah Izin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $amount_sick_leave . "&nbsp; hari" .
                                "<br />Mulai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $start_date .
                                "<br />Sampai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;" . $finish_date .
                                "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $description .
                                "<br /> Alasan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:&nbsp;" . $comment .
                                "<br /> " .
                                "<br />Terimakasih " .
                                "<br /><b>Team HRD Persada Group</b>"
                        );
                        $this->email->send();
                    }
                }
            }
            if (substr($runningno, 0, 2) == 'LV') {
                if ($result > 0)
                    $param_approval = [
                        'p_leave_approval_id' => '',
                        'p_employee_id' => '',
                        'p_leave' => $runningno,
                        'p_approver_id' => '',
                        'p_flag' => 10,
                    ];
                $cek_status = $this->leave_approval_model->GetLeaveApproval($param_approval);

                if ($cek_status > 0) {
                    foreach ($cek_status as $record) {
                        $leave_id = $record->leave_id;
                        $requester_name = $record->requester_name;
                        $email_approver = $record->email_approver;
                        $approver_name = $record->approver_name;
                        $leave_sub_category_id = $record->leave_sub_category_id;
                        $leave_category_name = $record->leave_category_name;
                        $leave_sub_category_name = $record->leave_sub_category_name;
                        $start_date = $record->start_date;
                        $finish_date = $record->finish_date;
                        $time_leave_start = $record->time_leave_start;
                        $time_leave_finish = $record->time_leave_finish;
                        $leave_name = $record->leave_name;

                        $leave_status_id = $record->leave_status_id;
                        $requester_email = $record->requester_email;
                    }

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
                        $this->email->to($email_approver);
                        $this->email->subject('No Reply - Approval Leave Request');
                        if (($leave_sub_category_id == 'SC-002') ||
                            ($leave_sub_category_id == 'SC-003')
                        ) {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $approver_name . "</b>" .
                                    "<br /> " .
                                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                                    "<br /> " .
                                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $requester_name .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-004') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $approver_name . "</b>" .
                                    "<br /> " .
                                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                                    "<br /> " .
                                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $requester_name .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_finish .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-001') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $approver_name . "</b>" .
                                    "<br /> " .
                                    "<br /> Mohon approval atas Leave Request, dengan detail : " .
                                    "<br /> " .
                                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_id .
                                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $requester_name .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        }
                        $this->email->send();
                    }

                    if ($status_id == 'AOP-001' && $leave_status_id == 'ST-002') {
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
                        $this->email->to($requester_email);
                        $this->email->subject('No Reply - Leave Request');
                        if (($leave_sub_category_id == 'SC-002') ||
                            ($leave_sub_category_id == 'SC-003')
                        ) {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-004') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_finish .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-001') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " telah <b> Disetujui </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        }
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
                        $this->email->to($requester_email);
                        $this->email->subject('No Reply - Leave Request');
                        if (($leave_sub_category_id == 'SC-002') ||
                            ($leave_sub_category_id == 'SC-003')
                        ) {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-004') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Start Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_start .
                                    "<br />Finish Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;       :&nbsp;" . $time_leave_finish .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        } else if ($leave_sub_category_id == 'SC-001') {
                            $this->email->message(
                                "Yth : Bpk/Ibu " . " <b>" . $requester_name . "</b>" .
                                    "<br /> " .
                                    "<br /> " .
                                    "Pengajuan Leave Request anda dengan nomor document " . $leave_id . " <b> Ditolak </b>" .
                                    "<br /> " .
                                    "<br />Keperluan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $leave_category_name .
                                    "<br />Izin untuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                                    $leave_sub_category_name .
                                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    :&nbsp;" . $start_date .
                                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       :&nbsp;" . $finish_date .
                                    "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;      :&nbsp;" . $leave_name .
                                    "<br /> Alasan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $comment .
                                    "<br /> " .
                                    "<br />Terimakasih " .
                                    "<br /><b>Team HRD Persada Group</b>"
                            );
                        }
                        $this->email->send();
                    }
                }
            }
        }
        //END OF FOREACH
        redirect('Approval');
    }
}
