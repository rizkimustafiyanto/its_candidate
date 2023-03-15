<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class lppd_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/lppd_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : LPPD Approval';
        $this->loadViews("sppd/lppd_detail", $this->global, NULL, NULL);
    }


    function UpdateLPPDApproval()
    {
        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $lppd_id = $this->input->post('lppd_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $lppd_approval_parameter = array($lppd_id, $employee_id, $status_id, $comment, $change_user_id, $record_status);

        $this->load->model('sppd/lppd_approval_model');
        $this->lppd_approval_model->UpdateLPPDApproval($lppd_approval_parameter);

        //Approval Email
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LPPDApprovalEmailRecords'] = $this->lppd_approval_model->GetLPPDApprovalEmail($lppd_approval_parameter);

        //Requester Email
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['LPPDRequesterEmailRecords'] = $this->lppd_approval_model->GetLPPDRequesterEmail($lppd_approval_parameter);

        //Requester Name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LPPDRequesterNameRecords'] = $this->lppd_approval_model->GetLPPDRequesterName($lppd_approval_parameter);

        //approver name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->lppd_approval_model->GetLPPDApproverName($lppd_approval_parameter);

        //paid leave details
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['LPPDDetails'] = $this->lppd_approval_model->GetLPPDDetails($lppd_approval_parameter);

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
            $this->email->to($data['LPPDApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Laporan Biaya Perjalanan Dinas - LBPD');
            $this->email->message(
                " Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon atas approval Laporan Biaya Perjalanan Dinas, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                    $lppd_id  .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LPPDRequesterNameRecords'] .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['LPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['LPPDDetails']->finish_date .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/home/'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        if ($status_id == 'AOP-001' && $data['LPPDDetails']->lppd_status_id == 'ST-002') {
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
            $this->email->to($data['LPPDRequesterEmailRecords']);
            $this->email->subject('No Reply - Laporan Biaya Perjalanan Dinas - LBPD');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['LPPDRequesterNameRecords'] . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Perjalanan Dinas anda dengan nomor document " . $lppd_id . " telah <b> Dikonfirmasi </b>" .
                    "<br /> " .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['LPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['LPPDDetails']->finish_date .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        } else if ($status_id == 'RCK-001') {
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
            $this->email->to($data['LPPDRequesterEmailRecords']);
            $this->email->subject('No Reply - Laporan Biaya Perjalanan Dinas - LBPD');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['LPPDRequesterNameRecords'] . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Perjalanan Dinas anda dengan nomor document " . $lppd_id . "  <b> perlu diCheck kembali </b>" .
                    "<br /> " .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['LPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['LPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['LPPDDetails']->finish_date .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        $this->session->set_flashdata('success', 'LPPD Approval submited !');

        redirect('LPPDDetail/' . $lppd_id . "/" . $sppd_id . "/" . $zone_type);
    }
}
