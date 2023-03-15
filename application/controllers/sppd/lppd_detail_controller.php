<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class lppd_detail_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/lppd_detail_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : LPPD Detail';
        $this->loadViews("sppd/lppd_detail", $this->global, NULL, NULL);
    }

    function GetLPPDDetail()
    {
        $lppd_detail_parameter = array('p_lppd_detail_id' => 0, 'p_lppd_id' => '0', 'p_flag' => 0);
        $data['LPPDDetailRecords'] = $this->lppd_detail_model->GetLPPDDetail($lppd_detail_parameter);
    }

    function InsertLPPDDetail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lppd_id', 'LPPD ID', 'required|xss_clean');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|xss_clean');
        $this->form_validation->set_rules('kesimpulan', 'Kesimpulan', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $employee_id = $this->input->post('employee_id');
        $sppd_id = $this->input->post('sppd_id');
        $lppd_id = $this->input->post('lppd_id');
        $lppd_detail_date = date('Y-m-d', strtotime($this->input->post('lppd_detail_date')));
        $uraian = $this->input->post('uraian');
        $kesimpulan = $this->input->post('kesimpulan');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_detail_parameter = array($lppd_id, $sppd_id, $employee_id, $lppd_detail_date, $uraian, $kesimpulan, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->lppd_detail_model->InsertLPPDDetail($lppd_detail_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Detail created successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Detail creation failed!!');
        }

        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }

    function UpdateLPPDDetail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('lppd_detail_date_update', 'Date', 'required|xss_clean');
        $this->form_validation->set_rules('uraian_update', 'Uraian', 'required|xss_clean');
        $this->form_validation->set_rules('kesimpulan_update', 'Kesimpulan', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $lppd_id = $this->input->post('lppd_id');
        $lppd_detail_id = $this->input->post('lppd_detail_id_update');
        // $lppd_detail_date = date('Y-m-d', strtotime($this->input->post('lppd_detail_date_update')));
        $uraian = $this->input->post('uraian_update');
        $kesimpulan = $this->input->post('kesimpulan_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_detail_parameter = array($lppd_detail_id,  $uraian, $kesimpulan,  $change_user_id, $record_status);

        $result = $this->lppd_detail_model->UpdateLPPDDetail($lppd_detail_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Detail updated successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Detail update failed');
        }

        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }


    function DeleteLPPDDetail($lppd_detail_id, $lppd_id, $sppd_id, $zone_type)
    {

        $lppd_detail_parameter = array($lppd_detail_id, $lppd_id, $sppd_id, $zone_type);
        $result = $this->lppd_detail_model->DeleteLPPDDetail($lppd_detail_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Detail has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'LPPD Detail cannot deleted !');
        }
        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }
}
