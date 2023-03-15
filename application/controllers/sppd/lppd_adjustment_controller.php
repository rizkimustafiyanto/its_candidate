<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class lppd_adjustment_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/lppd_adjustment_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : LPPD Adjustment';
        $this->loadViews("sppd/lppd_detail", $this->global, NULL, NULL);
    }

    function LPPDAdjustment()
    {
        $lppd_adjustment_parameter = array('p_lppd_adjustment_id' => 0, 'p_lppd_id' => '0', 'p_flag' => 0);
        $data['LPPDAdjustmentRecords'] = $this->lppd_adjustment_model->GetLPPDAdjustment($lppd_adjustment_parameter);
    }

    function InsertLPPDAdjustment()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_id', 'Cost ID', 'required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $lppd_id = $this->input->post('lppd_id');
        $cost_id = $this->input->post('cost_id');
        $adjustment_type = $this->input->post('adjustment_type');
        $nominal = str_replace('.', '', $this->input->post('nominal_3'));
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = null;
        $record_status = "A";

        $lppd_adjustment_parameter = array($lppd_id, $cost_id, $adjustment_type, $nominal, $description, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->lppd_adjustment_model->InsertLPPDAdjustment($lppd_adjustment_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Adjustment created successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Adjustment creation failed, the data has been added');
        }

        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }

    function UpdateLPPDAdjustment()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nominal_update_2', 'Nominal', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $lppd_id = $this->input->post('lppd_id');
        $lppd_adjustment_id = $this->input->post('lppd_adjustment_id_update');
        $adjustment_type = $this->input->post('adjustment_type_update');
        $nominal = str_replace('-', '', $this->input->post('nominal_update_2'));
        $description = $this->input->post('description_update_2');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_adjustment_parameter = array($lppd_adjustment_id, $adjustment_type, $nominal, $description, $change_user_id, $record_status);

        $result = $this->lppd_adjustment_model->UpdateLPPDAdjustment($lppd_adjustment_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Adjustment updated successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Adjusment update failed');
        }

        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }


    function DeleteLPPDAdjustment($lppd_adjustment_id, $lppd_id, $sppd_id, $zone_type)
    {

        $lppd_adjustment_parameter = array($lppd_adjustment_id, $lppd_id, $sppd_id, $zone_type);
        $result = $this->lppd_adjustment_model->DeleteLPPDAdjustment($lppd_adjustment_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Adjustment has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'LPPD Adjustment cannot deleted !');
        }
        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }
}
