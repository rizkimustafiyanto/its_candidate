<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sppd_approval_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/sppd_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD Approval';
        $this->loadViews("sppd/sppd_detail", $this->global, NULL, NULL);
    }


    function UpdateSPPDApproval()
    {
        $zone_type = $this->input->post('zone_type');
        $regional_id = $this->input->post('regional_id');
        $level_id = $this->input->post('level_id');
        $employee_id = $this->input->post('employee_id');
        $sppd_id = $this->input->post('sppd_id');
        $status_id = $this->input->post('status_id');
        $comment = $this->input->post('comment');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $sppd_approval_parameter = array($sppd_id, $employee_id, $status_id, $comment, $regional_id, $level_id, $change_user_id, $record_status);

        $this->load->model('sppd/sppd_approval_model');
        $this->sppd_approval_model->UpdateSPPDApproval($sppd_approval_parameter);

        //Approval Email
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SPPDApprovalEmailRecords'] = $this->sppd_approval_model->GetSPPDApprovalEmail($sppd_approval_parameter);

        //Requester Email
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['SPPDRequesterEmailRecords'] = $this->sppd_approval_model->GetSPPDRequesterEmail($sppd_approval_parameter);

        //Requester Name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['SPPDRequesterNameRecords'] = $this->sppd_approval_model->GetSPPDRequesterName($sppd_approval_parameter);


        //approver name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->sppd_approval_model->GetSPPDApproverName($sppd_approval_parameter);


        //paid leave details
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['SPPDDetails'] = $this->sppd_approval_model->GetSPPDDetails($sppd_approval_parameter);

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
            $this->email->to($data['SPPDApprovalEmailRecords']);
            $this->email->subject('No Reply - Approval Perjalanan Dinas - SPPD');
            $this->email->message(
                " Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                    "<br /> " .
                    "<br /> Mohon atas approval Perjalanan Dinas, dengan detail : " .
                    "<br /> " .
                    "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" .
                    $sppd_id  .
                    "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['SPPDRequesterNameRecords'] .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['SPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['SPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SPPDDetails']->finish_date .
                    "<br /> " .
                    "<br /> Untuk memberikan approval Bapak/Ibu dapat meng-klik link di bawah ini : " .
                    "<br /> <a href= 'http://apps.persada-group.com:8086/home/login'> HRIS Online </a>" .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        if ($status_id == 'AOP-001' && $data['SPPDDetails']->sppd_status_id == 'ST-002') {
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
            $this->email->to($data['SPPDRequesterEmailRecords']);
            $this->email->subject('No Reply - Request Perjalanan Dinas - SPPD');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['SPPDRequesterNameRecords'] . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Perjalanan Dinas anda dengan nomor document " . $sppd_id . " telah <b> Disetujui </b>" .
                    "<br /> " .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['SPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['SPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SPPDDetails']->finish_date .
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
            $this->email->to($data['SPPDRequesterEmailRecords']);
            $this->email->subject('No Reply - Request Perjalanan Dinas - SPPD');
            $this->email->message(
                "Kepada Yth : Bpk/Ibu " . " <b>" . $data['SPPDRequesterNameRecords'] . "</b>" .
                    "<br /> " .
                    "<br /> " .
                    "Pengajuan Perjalanan Dinas anda dengan nomor document " . $sppd_id . "  <b> Ditolak </b>" .
                    "<br /> " .
                    "<br />Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :&nbsp;" . $data['SPPDDetails']->tujuan_kota_id .
                    "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['SPPDDetails']->start_date .
                    "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['SPPDDetails']->finish_date .
                    "<br /> " .
                    "<br />Terimakasih " .
                    "<br /><b>Team HRD Persada Group</b>"
            );
            $this->email->send();
        }

        $this->session->set_flashdata('success', 'SPPD Approval submited !');

        redirect('SPPDDetail/' . $sppd_id . "/" . $zone_type);
    }
}
