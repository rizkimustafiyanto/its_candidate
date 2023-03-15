<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sppd_member_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/sppd_member_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD Member';
        $this->loadViews("sppd/sppd_detail", $this->global, NULL, NULL);
    }

    function GetSPPDMember()
    {
        $sppd_member_parameter = array('p_sppd_member_id' => 0, 'p_sppd_id' => '0', 'p_flag' => 0);
        $data['SPPDMemberRecords'] = $this->sppd_member_model->GetSPPDMember($sppd_member_parameter);
    }

    function InsertSPPDMember()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('member_id', 'Member ID', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $member_id = $this->input->post('member_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $member_id, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->sppd_member_model->InsertSPPDMember($sppd_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD Member created successfully');
        } else {
            $this->session->set_flashdata('error', 'SPPD Member creation failed, the data has been added');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }

    function DeleteSPPDMember($sppd_member_id, $sppd_id, $zone_type)
    {

        $sppd_member_parameter = array($sppd_member_id, $sppd_id, $zone_type);
        $result = $this->sppd_member_model->DeleteSPPDMember($sppd_member_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD Member has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'SPPD Member cannot deleted !');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }
}
