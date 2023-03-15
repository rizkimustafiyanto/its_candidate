<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class lppd_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/lppd_model');
        $this->load->model('sppd/sppd_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/province_zone_model');
        $this->load->model('master/country_zone_model');
        $this->load->model('sppd/sppd_detail_model');
        $this->load->model('sppd/sppd_member_model');
        $this->load->model('sppd/sppum_model');
        $this->load->model('sppd/sppd_approval_model');
        $this->load->model('master/cost_model');
        $this->load->model('master/company_model');
        $this->load->model('sppd/lppd_cost_model');
        $this->load->model('sppd/lppd_approval_model');
        $this->load->model('sppd/lppd_adjustment_model');
        $this->load->model('sppd/lppd_detail_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD';
        $this->loadViews("sppd/lppd", $this->global, NULL, NULL);
    }

    function GetLPPD()
    {
        $employee_id = $this->session->userdata('employee_id');
        $lppd_parameter = array('p_lppd_id' => 0, 'p_sppd_id' => 0, 'p_zone_type' => '', 'p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['LPPDRecords'] = $this->lppd_model->GetLPPD($lppd_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sppd/lppd", $this->global, $data, NULL);
    }


    function GetLPPDById($lppd_id, $sppd_id, $zone_type)
    {

        $lppd_parameter = array('p_lppd_id' => $lppd_id, 'p_sppd_id' => $sppd_id, 'p_zone_type' => $zone_type, 'p_employee_id' => '', 'p_flag' => 1);
        $data['LPPDRecords'] = $this->lppd_model->GetLPPD($lppd_parameter);

        //Variable
        $variable_zone_type_parameter = array('p_variable_type' => 'zone_type', 'p_flag' => 0);
        $data['ZoneTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Province Zone
        $province_zone_parameter = array('p_province_zone_id' => 0, 'p_flag' => 0);
        $data['ProvinceZoneRecords'] = $this->province_zone_model->GetProvinceZone($province_zone_parameter);

        //Country Zone
        $country_zone_parameter = array('p_country_zone_id' => 0, 'p_flag' => 0);
        $data['CountryZoneRecords'] = $this->country_zone_model->GetCountryZone($country_zone_parameter);

        //Variable
        $variable_zone_type_parameter = array('p_variable_type' => 'beban_biaya_type', 'p_flag' => 0);
        $data['BebanBiayaTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Variable Type Cost Review
        $variable_zone_type_parameter = array('p_variable_type' => 'Cost_Review', 'p_flag' => 0);
        $data['TypeCostReviewRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //get spp level id and company brand id
        $sppd_parameter = array('p_sppd_id' => $sppd_id, 'p_zone_type' => $zone_type, 'p_employee_id' => '', 'p_flag' => 1);
        $data['SPPDLevelCompanyRecords'] = $this->sppd_model->GetSPPDLevelCompany($sppd_parameter);

        //company
        $company_parameter = array('p_company_id' => $data['SPPDLevelCompanyRecords']->company_id, 'p_flag' => 2);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //company
        $company_parameter = array('p_company_id' => $data['SPPDLevelCompanyRecords']->company_id, 'p_flag' => 1);
        $data['Company1Records'] = $this->company_model->GetCompany($company_parameter);

        //cost
        $cost_parameter = array('p_cost_id' => 0, 'p_flag' => 2);
        $data['CostRecords'] = $this->cost_model->GetCost($cost_parameter);

        //cost LPPD
        $cost_parameter = array('p_cost_id' => 0, 'p_flag' => 0);
        $data['CostLPPDRecords'] = $this->cost_model->GetCost($cost_parameter);

        //LPPD Cost
        $lppd_cost_parameter = array('p_lppd_cost_id' => 0, 'p_lppd_id' => $lppd_id, 'p_flag' => 0);
        $data['LPPDCostRecords'] = $this->lppd_cost_model->GetLPPDCost($lppd_cost_parameter);

        //LPPD Cost Amount
        $lppd_cost_parameter = array('p_lppd_cost_id' => 0, 'p_lppd_id' => $lppd_id, 'p_flag' => 1);
        $data['TotalLPPDCostRecords'] = $this->lppd_cost_model->GetTotalLPPDCost($lppd_cost_parameter);

        //Approval
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['LPPDApprovalRecords'] = $this->lppd_approval_model->GetLPPDApproval($lppd_approval_parameter);

        //Approver
        // $employee_id = $this->session->userdata('employee_id');
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['LPPDApproverRecords'] = $this->lppd_approval_model->GetLPPDApprover($lppd_approval_parameter);

        //Status Approval
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['LPPDApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        //cost
        $lppd_cost_parameter =
            array('p_lppd_cost_id' => 0, 'p_lppd_id' => $lppd_id, 'p_flag' => 0);
        $data['CostHRDRecords'] = $this->lppd_cost_model->GetLPPDCost($lppd_cost_parameter);

        //Approver ID FAD
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 10);
        $data['ApproverFAD'] = $this->lppd_approval_model->GetLPPDApproverFAD($lppd_approval_parameter);

        //Approver ID HRD 
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 11);
        $data['ApproverHRD'] = $this->lppd_approval_model->GetLPPDApproverHRD($lppd_approval_parameter);

        //LPPD Adjustment
        $lppd_adjustment_parameter = array('p_lppd_adjustment_id' => 0, 'p_lppd_id' => $lppd_id, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => 0, 'p_level_id' => 0, 'p_flag' => 0);
        $data['LPPDAdjustmentRecords'] = $this->lppd_adjustment_model->GetLPPDAdjustment($lppd_adjustment_parameter);

        $lppd_adjustment_parameter = array(
            'p_lppd_adjustment_id' => 0, 'p_lppd_id' => $lppd_id, 'p_sppd_id' =>
            $sppd_id, 'p_company_brand_id' => 0, 'p_level_id' => 0,
            'p_flag' => 5
        );
        $data['LPPDTotalAdjustRecord'] = $this->lppd_adjustment_model->GetTotalLPPDAdjustment($lppd_adjustment_parameter);

        $lppd_adjustment_parameter = array(
            'p_lppd_adjustment_id' => 0, 'p_lppd_id' => $lppd_id, 'p_sppd_id' =>
            $sppd_id, 'p_company_brand_id' => 0, 'p_level_id' => 0,
            'p_flag' => 1
        );
        $data['LPPDTotalAdjustmentRecord'] = $this->lppd_adjustment_model->GetTotalLPPDAdjustment($lppd_adjustment_parameter);

        //Total Adjustment Cost
        $lppd_adjustment_parameter = array('p_lppd_adjustment_id' => 0, 'p_lppd_id' => $lppd_id, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => 0, 'p_level_id' => 0, 'p_flag' => 1);
        $data['TotalLPPDAdjustmentRecords'] = $this->lppd_adjustment_model->GetTotalLPPDAdjustment($lppd_adjustment_parameter);


        //SPPUM Total
        $sppum_parameter = array('p_sppum_id' => 0, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => $data['SPPDLevelCompanyRecords']->company_brand_id, 'p_level_id' => $data['SPPDLevelCompanyRecords']->level_id, 'p_flag' => 1);
        $data['SPPUMTotal75Records'] = $this->sppum_model->Get75SPPUM($sppum_parameter);

        //get param level id and company brand id to show in lppd detail
        $sppd_parameter = array('p_sppd_id' => $sppd_id, 'p_zone_type' => $zone_type, 'p_employee_id' => '', 'p_flag' => 1);
        $data['SPPDLevelCompanyRecords'] = $this->sppd_model->GetSPPDLevelCompany($sppd_parameter);

        //Final = kurang / lebih
        $lppd_adjustment_parameter = array(
            'p_lppd_adjustment_id' => 0, 'p_lppd_id' => $lppd_id, 'p_sppd_id' =>
            $sppd_id, 'p_company_brand_id' => $data['SPPDLevelCompanyRecords']->company_brand_id, 'p_level_id' => $data['SPPDLevelCompanyRecords']->level_id,
            'p_flag' => 3
        );
        $data['FinalRecord'] = $this->lppd_adjustment_model->GetFinalLPPD($lppd_adjustment_parameter);

        //LPPD Detail
        $lppd_detail_parameter = array('p_lppd_detail_id' => 0, 'p_lppd_id' => $lppd_id, 'p_flag' => 0);
        $data['LPPDDetailRecords'] = $this->lppd_detail_model->GetLPPDDetail($lppd_detail_parameter);

        //Line no Approval
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 13);
        $data['ApproverLineNo1'] = $this->lppd_approval_model->GetLPPDLineNoApproverHRD($lppd_approval_parameter);

        //Line no Max - 1
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 12);
        $data['ApproverLineNoKrg1'] = $this->lppd_approval_model->GetLPPDLineNoApproverHRD($lppd_approval_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sppd/lppd_detail", $this->global, $data, NULL);
    }

    function SubmitLPPD()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lppd_id', 'LPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|xss_clean');
        $this->form_validation->set_rules('kesimpulan', 'Kesimpulan', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $lppd_id = $this->input->post('lppd_id');
        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $lppd_status_id = $this->input->post('lppd_status_id');

        $company_brand_id = $this->input->post('company_brand_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_parameter = array(
            $lppd_id, $sppd_id, $employee_id, $lppd_status_id,
            $company_brand_id, $change_user_id, $record_status, 'p_flag' => 0
        );

        $result = $this->lppd_model->UpdateLPPD($lppd_parameter);
        echo json_encode($result);

        //Data untuk attendance
        $lppd_detail_parameter = array('p_lppd_detail_id' => 0, 'p_lppd_id' => $lppd_id, 'p_flag' => 0);
        $data['LPPDDetailRecords'] = $this->lppd_detail_model->GetLPPDDetail($lppd_detail_parameter);

        foreach ($data['LPPDDetailRecords'] as $record) {
            $lppd_id_1 = $record->lppd_id;
            $employee_id_1 = $this->input->post('employee_id');
            $lppd_detail_date = $record->lppd_detail_date;

            $lppd_parameter = array($lppd_id_1, $employee_id_1, $lppd_detail_date);

            $result = $this->lppd_model->UpdateLPPD2($lppd_parameter);
        }

        //Approval Email
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LPPDApprovalEmailRecords'] = $this->lppd_approval_model->GetLPPDApprovalEmail($lppd_approval_parameter);

        //Requester Name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LPPDRequesterNameRecords'] = $this->lppd_approval_model->GetLPPDRequesterName($lppd_approval_parameter);

        //approver name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->lppd_approval_model->GetLPPDApproverName($lppd_approval_parameter);


        //paid leave details
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['LPPDDetails'] = $this->lppd_approval_model->GetLPPDDetails($lppd_approval_parameter);

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
        $this->session->set_flashdata('success', 'LPPD Request Submitted');
    }

    function ReSubmitLPPD()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lppd_id', 'LPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|xss_clean');
        $this->form_validation->set_rules('kesimpulan', 'Kesimpulan', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $lppd_id = $this->input->post('lppd_id');
        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $lppd_status_id = $this->input->post('lppd_status_id');

        $company_brand_id = $this->input->post('company_brand_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_parameter = array(
            $lppd_id, $sppd_id, $employee_id, $lppd_status_id,
            $company_brand_id, $change_user_id, $record_status, 'p_flag' => 1
        );

        $result = $this->lppd_model->UpdateLPPD($lppd_parameter);
        echo json_encode($result);


        //Approval Email
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['LPPDApprovalEmailRecords'] = $this->lppd_approval_model->GetLPPDApprovalEmail($lppd_approval_parameter);

        //Requester Name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['LPPDRequesterNameRecords'] = $this->lppd_approval_model->GetLPPDRequesterName($lppd_approval_parameter);

        //approver name
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->lppd_approval_model->GetLPPDApproverName($lppd_approval_parameter);


        //paid leave details
        $lppd_approval_parameter = array('p_lppd_approval_id' => 0, 'p_lppd_id' => $lppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['LPPDDetails'] = $this->lppd_approval_model->GetLPPDDetails($lppd_approval_parameter);

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
        $this->session->set_flashdata('success', 'LPPD Request Submitted');
    }
}
