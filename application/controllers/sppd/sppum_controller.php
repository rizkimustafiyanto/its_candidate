<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sppum_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/sppum_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPUM';
        $this->loadViews("sppd/sppd_detail", $this->global, NULL, NULL);
    }

    function GetSPPUM()
    {
        $sppum_parameter = array('p_sppum_id' => 0, 'p_sppd_id' => '0', 'p_flag' => 0);
        $data['SPPUMRecords'] = $this->sppum_model->GetSPPUM($sppum_parameter);
    }

    function InsertSPPUM()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_id', 'SPPD ID', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $cost_id = $this->input->post('cost_id');

        if ($cost_id == 'CS-0003') {
            $nominal = $this->input->post('nominal_2');
        } else {
            $nominal = str_replace('.', '', $this->input->post('nominal_1'));
        }

        $qty = $this->input->post('qty');
        $editable = 'ETB-001';
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppum_parameter = array($sppd_id, $cost_id, $nominal, $qty, $editable, '', '', $change_no, $creation_user_id, $record_status);

        $this->sppum_model->InsertSPPUM($sppum_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success3', 'SPPUM created successfully');
        } else {
            $this->session->set_flashdata('error', 'SPPUM creation failed, the data has been added');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }

    function UpdateSPPUM()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nominal_update', 'Nominal', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppum_id = $this->input->post('sppum_id_update');
        $sppd_id = $this->input->post('sppd_id_update');
        // $nominal = $this->input->post('nominal_update');
        $nominal = str_replace('.', '', $this->input->post('nominal_update'));
        $qty = $this->input->post('qty_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppum_parameter = array($sppum_id, $nominal, $qty, $change_user_id, $record_status);

        $this->sppum_model->UpdateSPPUM($sppum_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success4', 'SPPUM updated successfully');
        } else {
            $this->session->set_flashdata('error', 'SPPUM update failed');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }

    function DeleteSPPUM($sppum_id, $sppd_id, $zone_type)
    {

        $sppum_parameter = array($sppum_id, $sppd_id, $zone_type);
        $result = $this->sppum_model->DeleteSPPUM($sppum_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPUM has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'SPPUM cannot deleted !');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }
}
