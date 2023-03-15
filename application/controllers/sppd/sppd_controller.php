<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sppd_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/sppd_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/province_zone_model');
        $this->load->model('master/country_zone_model');
        $this->load->model('master/company_model');
        $this->load->model('master/cost_model');
        $this->load->model('sppd/sppd_detail_model');
        $this->load->model('sppd/sppd_member_model');
        $this->load->model('sppd/sppd_approval_model');
        $this->load->model('sppd/sppum_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD';
        $this->loadViews("sppd/sppd", $this->global, NULL, NULL);
    }

    function GetSPPD()
    {
        $employee_id = $this->session->userdata('employee_id');
        $sppd_parameter = array('p_sppd_id' => 0, 'p_zone_type' => 0,  'p_employee_id' => $employee_id, 'p_flag' => 3);
        $data['SPPDRecords'] = $this->sppd_model->GetSPPD($sppd_parameter);

        //Variable Zone Type
        $variable_zone_type_parameter = array('p_variable_type' => 'zone_type', 'p_flag' => 0);
        $data['ZoneTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Province Zone
        $province_zone_parameter = array('p_province_zone_id' => 0, 'p_flag' => 0);
        $data['ProvinceZoneRecords'] = $this->province_zone_model->GetProvinceZone($province_zone_parameter);

        //Country Zone
        $country_zone_parameter = array('p_country_zone_id' => 0, 'p_flag' => 0);
        $data['CountryZoneRecords'] = $this->country_zone_model->GetCountryZone($country_zone_parameter);

        //Variable Beban Biaya Type
        $variable_zone_type_parameter = array('p_variable_type' => 'beban_biaya_type', 'p_flag' => 0);
        $data['BebanBiayaTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Company flag 2
        $company_id = $this->session->userdata('company_id');
        $company_parameter = array('p_company_id' => $company_id, 'p_flag' => 2);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //Company flag 1
        $company_parameter = array('p_company_id' => $company_id, 'p_flag' => 1);
        $data['Company1Records'] = $this->company_model->GetCompany($company_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sppd/sppd", $this->global, $data, NULL);
    }


    function GetSPPDById($sppd_id, $zone_type)
    {

        $sppd_parameter = array('p_sppd_id' => $sppd_id, 'p_zone_type' => $zone_type, 'p_employee_id' => '', 'p_flag' => 1);
        $data['SPPDRecords'] = $this->sppd_model->GetSPPD($sppd_parameter);

        //Variable Zone Type
        $variable_zone_type_parameter = array('p_variable_type' => 'zone_type', 'p_flag' => 0);
        $data['ZoneTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Province Zone
        $province_zone_parameter = array('p_province_zone_id' => 0, 'p_flag' => 0);
        $data['ProvinceZoneRecords'] = $this->province_zone_model->GetProvinceZone($province_zone_parameter);

        //Country Zone
        $country_zone_parameter = array('p_country_zone_id' => 0, 'p_flag' => 0);
        $data['CountryZoneRecords'] = $this->country_zone_model->GetCountryZone($country_zone_parameter);

        //Variable Beban Biaya Type
        $variable_zone_type_parameter = array('p_variable_type' => 'beban_biaya_type', 'p_flag' => 0);
        $data['BebanBiayaTypeRecords'] = $this->variable_model->GetVariable2($variable_zone_type_parameter);

        //Employee for SPPD Member
        $company_id = $this->session->userdata('company_id');
        $division_id = $this->session->userdata('division_id');
        $department_id = $this->session->userdata('department_id');
        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => '0', 'p_company_id' => $company_id, 'p_division_id' => $division_id, 'p_department_id' => $department_id, 'p_flag' => 3);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        //SPPD Detail
        $sppd_detail_parameter = array('p_sppd_detail_id' => 0, 'p_sppd_id' => $sppd_id, 'p_flag' => 0);
        $data['SPPDDetailRecords'] = $this->sppd_detail_model->GetSPPDDetail($sppd_detail_parameter);

        //COUNT SPPD
        $sppd_detail_parameter = array('p_sppd_detail_id' => 0, 'p_sppd_id' => $sppd_id, 'p_flag' => 3);
        $data['CountSPPDDetailRecords'] = $this->sppd_detail_model->GetSPPDDetail1($sppd_detail_parameter);

        //SPPD Member
        $sppd_member_parameter = array('p_sppd_member_id' => 0, 'p_sppd_id' => $sppd_id, 'p_flag' => 0);
        $data['SPPDMemberRecords'] = $this->sppd_member_model->GetSPPDMember($sppd_member_parameter);

        //SPPUM
        $sppum_parameter = array('p_sppum_id' => 0, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => 0, 'p_level_id' => 0, 'p_flag' => 0);
        $data['SPPUMRecords'] = $this->sppum_model->GetSPPUM($sppum_parameter);

        //Approval
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['SPPDApprovalRecords'] = $this->sppd_approval_model->GetSPPDApproval($sppd_approval_parameter);

        //Cost
        $cost_parameter = array('p_cost_id' => 0, 'p_flag' => 2);
        $data['CostRecords'] = $this->cost_model->GetCost($cost_parameter);

        //Get SPPD Level ID and Company Brand ID
        $sppd_parameter = array('p_sppd_id' => $sppd_id, 'p_zone_type' => $zone_type, 'p_employee_id' => '', 'p_flag' => 1);
        $data['SPPDLevelCompanyRecords'] = $this->sppd_model->GetSPPDLevelCompany($sppd_parameter);

        //SPPUM Total
        $sppum_parameter = array('p_sppum_id' => 0, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => $data['SPPDLevelCompanyRecords']->company_brand_id, 'p_level_id' => $data['SPPDLevelCompanyRecords']->level_id, 'p_flag' => 1);
        $data['SPPUMTotalRecords'] = $this->sppum_model->GetTotalSPPUM($sppum_parameter);

        //SPPUM Total
        $sppum_parameter = array('p_sppum_id' => 0, 'p_sppd_id' => $sppd_id, 'p_company_brand_id' => $data['SPPDLevelCompanyRecords']->company_brand_id, 'p_level_id' => $data['SPPDLevelCompanyRecords']->level_id, 'p_flag' => 1);
        $data['SPPUMTotal75Records'] = $this->sppum_model->Get75SPPUM($sppum_parameter);

        //Approver
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['SPPDApproverRecords'] = $this->sppd_approval_model->GetSPPDApprover($sppd_approval_parameter);

        //Status Approval
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['SPPDApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        //Company flag 2
        $company_parameter = array('p_company_id' => $data['SPPDLevelCompanyRecords']->company_id, 'p_flag' => 2);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //Company flag 1
        $company_parameter = array('p_company_id' => $data['SPPDLevelCompanyRecords']->company_id, 'p_flag' => 1);
        $data['Company1Records'] = $this->company_model->GetCompany($company_parameter);

        //Approval Email
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SPPDApprovalEmailRecords'] = $this->sppd_approval_model->GetSPPDApprovalEmail($sppd_approval_parameter);

        //Requester Email
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['SPPDRequesterEmailRecords'] = $this->sppd_approval_model->GetSPPDRequesterEmail($sppd_approval_parameter);

        //Requester Name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['SPPDRequesterNameRecords'] = $this->sppd_approval_model->GetSPPDRequesterName($sppd_approval_parameter);

        //Approver Name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->sppd_approval_model->GetSPPDApproverName($sppd_approval_parameter);

        //Paid Leave Details
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['SPPDDetails'] = $this->sppd_approval_model->GetSPPDDetails($sppd_approval_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("sppd/sppd_detail", $this->global, $data, NULL);
    }

    function InsertSPPD()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tujuan_kota_id', 'Tujuan Kota ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('beban_biaya_id', 'Beban Biaya ID', 'required|max_length[50]|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $beban_biaya_type = $this->input->post('beban_biaya_type');

        $employee_id = $this->input->post('employee_id');
        $keperluan = $this->input->post('keperluan');

        if ($zone_type == 'ZT-001') {
            $tujuan_kota_id = $this->input->post('tujuan_kota_id');
        } else {
            $tujuan_kota_id = $this->input->post('tujuan_kota_id_2');
        }

        if ($beban_biaya_type == 'BB-001') {
            $beban_biaya_company_id = $this->input->post('beban_biaya_company_id');
            $beban_biaya_division_id = $this->input->post('beban_biaya_division_id');
            $beban_biaya_lainnya_id = null;
        } else if ($beban_biaya_type == 'BB-002') {
            $beban_biaya_company_id = $this->input->post('beban_biaya_company_id_2');
            $beban_biaya_division_id = $this->input->post('beban_biaya_division_id_2');
            $beban_biaya_lainnya_id = null;
        } else {
            $beban_biaya_company_id = null;
            $beban_biaya_division_id = null;
            $beban_biaya_lainnya_id = $this->input->post('beban_biaya_lainnya_id');
        }

        $description = $this->input->post('description');
        $zone_type = $this->input->post('zone_type');
        $sppd_status_id = 'ST-001';
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($employee_id, $tujuan_kota_id, $keperluan, $beban_biaya_company_id, $beban_biaya_division_id, $beban_biaya_lainnya_id, $description, $zone_type, $beban_biaya_type,  $sppd_status_id, $change_no, $creation_user_id, $change_user_id, $record_status);

        $result = $this->sppd_model->InsertSPPD($sppd_parameter);

        if ($result > 0) {
            $param_sppd = [
                'p_sppd_id' => '',
                'p_zone_type' => '',
                'p_employee_id' => '',
                'p_flag' => 2,
            ];
            $result1 = $this->sppd_model->GetSPPD($param_sppd);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_sppd_id = $res->sppd_id;
                }
            }
            redirect(
                'SPPDDetail/' . $p_sppd_id . "/" . $zone_type
            );
        } else {
            $this->session->set_flashdata('error', 'SPPD Request creation failed');
            redirect('SPPD');
        }
    }

    function UpdateSPPD()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_id', 'SPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tujuan_kota_id', 'Tujuan Kota ID', 'required|max_length[50]|xss_clean');

        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $tujuan_kota_id = $this->input->post('tujuan_kota_id');
        $keperluan = $this->input->post('keperluan');
        $beban_biaya_company_id = $this->input->post('beban_biaya_company_id');
        $beban_biaya_division_id = $this->input->post('beban_biaya_division_id');
        $beban_biaya_lainnya_id = $this->input->post('beban_biaya_lainnya_id');
        $description = $this->input->post('description');
        $zone_type = $this->input->post('zone_type');
        $beban_biaya_type = $this->input->post('beban_biaya_type');
        $sppd_status_id = $this->input->post('sppd_status_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $regional_id = $this->input->post('regional_id');
        $level_id = $this->input->post('level_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $employee_id, $tujuan_kota_id, $keperluan, $beban_biaya_company_id, $beban_biaya_division_id, $beban_biaya_lainnya_id, $description, $zone_type, $beban_biaya_type, $sppd_status_id, $company_id, $company_brand_id, $regional_id, $level_id, $change_user_id, $record_status, 'p_flag' => 0);

        $result = $this->sppd_model->UpdateSPPD($sppd_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'SPPD Request Updated');
    }

    function UpdateSPPDZone()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_id', 'SPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tujuan_kota_id', 'Tujuan Kota ID', 'required|max_length[50]|xss_clean');

        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $tujuan_kota_id = $this->input->post('tujuan_kota_id');
        $zone_type = $this->input->post('zone_type');
        $sppd_status_id = $this->input->post('sppd_status_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $employee_id, $tujuan_kota_id, '', '', '', '', '', $zone_type, '', $sppd_status_id, '', '', '', '', $change_user_id, $record_status, 'p_flag' => 4);

        $result = $this->sppd_model->UpdateSPPD($sppd_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'SPPD Request Updated');
    }

    function SubmitSPPD()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_id', 'SPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tujuan_kota_id', 'Tujuan Kota ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('beban_biaya_id', 'Beban Biaya ID', 'required|max_length[50]|xss_clean');

        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $tujuan_kota_id = $this->input->post('tujuan_kota_id');
        $keperluan = $this->input->post('keperluan');
        $beban_biaya_company_id = $this->input->post('beban_biaya_company_id');
        $beban_biaya_division_id = $this->input->post('beban_biaya_division_id');
        $beban_biaya_lainnya_id = $this->input->post('beban_biaya_lainnya_id');
        $description = $this->input->post('description');
        $zone_type = $this->input->post('zone_type');
        $beban_biaya_type = $this->input->post('beban_biaya_type');
        $sppd_status_id = $this->input->post('sppd_status_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $regional_id = $this->input->post('regional_id');
        $level_id = $this->input->post('level_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $employee_id, $tujuan_kota_id, $keperluan, $beban_biaya_company_id, $beban_biaya_division_id, $beban_biaya_lainnya_id, $description, $zone_type, $beban_biaya_type, $sppd_status_id, $company_id, $company_brand_id, $regional_id, $level_id, $change_user_id, $record_status, 'p_flag' => 1);

        $result = $this->sppd_model->UpdateSPPD($sppd_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'SPPD Request Submitted');

        //Approval Email
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['SPPDApprovalEmailRecords'] = $this->sppd_approval_model->GetSPPDApprovalEmail($sppd_approval_parameter);

        //Requester Name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['SPPDRequesterNameRecords'] = $this->sppd_approval_model->GetSPPDRequesterName($sppd_approval_parameter);


        //approver name
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->sppd_approval_model->GetSPPDApproverName($sppd_approval_parameter);


        //paid leave details
        $sppd_approval_parameter = array('p_sppd_approval_id' => 0, 'p_sppd_id' => $sppd_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['SPPDDetails'] = $this->sppd_approval_model->GetSPPDDetails($sppd_approval_parameter);

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


    function GenerateSPPUM()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_id', 'SPPD Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('tujuan_kota_id', 'Tujuan Kota ID', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('beban_biaya_id', 'Beban Biaya ID', 'required|max_length[50]|xss_clean');

        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $tujuan_kota_id = $this->input->post('tujuan_kota_id');
        $keperluan = $this->input->post('keperluan');
        $beban_biaya_company_id = $this->input->post('beban_biaya_company_id');
        $beban_biaya_division_id = $this->input->post('beban_biaya_division_id');
        $beban_biaya_lainnya_id = $this->input->post('beban_biaya_lainnya_id');
        $description = $this->input->post('description');
        $zone_type = $this->input->post('zone_type');
        $beban_biaya_type = $this->input->post('beban_biaya_type');
        $sppd_status_id = $this->input->post('sppd_status_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $regional_id = $this->input->post('regional_id');
        $level_id = $this->input->post('level_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $employee_id, $tujuan_kota_id, $keperluan, $beban_biaya_company_id, $beban_biaya_division_id, $beban_biaya_lainnya_id, $description, $zone_type, $beban_biaya_type, $sppd_status_id, $company_id, $company_brand_id, $regional_id, $level_id, $change_user_id, $record_status, 'p_flag' => 2);

        $result = $this->sppd_model->UpdateSPPD($sppd_parameter);
        echo json_encode($result);

        $this->session->set_flashdata('success2', 'Mohon Cek SPPUM Anda');
    }

    function DeleteSPPD($sppd_id)
    {
        $sppd_parameter = array($sppd_id);
        $result = $this->sppd_model->DeleteSPPD($sppd_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'SPPD request cannot deleted !');
        }

        redirect('SPPD');
    }
}
