<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sppd_detail_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/sppd_detail_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : SPPD Detail';
        $this->loadViews("sppd/sppd_detail", $this->global, NULL, NULL);
    }

    function GetSPPDDetail()
    {
        $sppd_detail_parameter = array('p_sppd_detail_id' => 0, 'p_sppd_id' => '0', 'p_flag' => 0);
        $data['SPPDDetailRecords'] = $this->sppd_detail_model->GetSPPDDetail($sppd_detail_parameter);
    }

    function InsertSPPDDetail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_date_time', 'SPPD Date Time', 'required|xss_clean');
        $this->form_validation->set_rules('acara', 'Acara', 'required|xss_clean');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required|xss_clean');
        $this->form_validation->set_rules('uraian', 'Uraian', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $employee_id = $this->input->post('employee_id');
        $sppd_id = $this->input->post('sppd_id');
        $sppd_date_time = date('Y-m-d', strtotime($this->input->post('sppd_date_time')));
        $acara = $this->input->post('acara');
        $lokasi = $this->input->post('lokasi');
        $uraian = $this->input->post('uraian');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_id, $employee_id, $sppd_date_time, $acara, $lokasi, $uraian, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->sppd_detail_model->InsertSPPDDetail($sppd_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD Detail created successfully');
        } else {
            $this->session->set_flashdata('error', 'SPPD Detail creation failed, the data has been added');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }

    function UpdateSPPDDetail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('sppd_date_time_update', 'SPPD Date Time', 'required|xss_clean');
        $this->form_validation->set_rules('acara_update', 'Acara', 'required|xss_clean');
        $this->form_validation->set_rules('lokasi_update', 'Lokasi', 'required|xss_clean');
        $this->form_validation->set_rules('uraian_update', 'Uraian', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_detail_id = $this->input->post('sppd_detail_id_update');
        $sppd_id = $this->input->post('sppd_id_update');
        $sppd_date_time = date('Y-m-d H:i:s', strtotime($this->input->post('sppd_date_time_update')));
        $acara = $this->input->post('acara_update');
        $lokasi = $this->input->post('lokasi_update');
        $uraian = $this->input->post('uraian_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $sppd_parameter = array($sppd_detail_id, $sppd_date_time, $acara, $lokasi, $uraian,  $change_user_id, $record_status);

        $this->sppd_detail_model->UpdateSPPDDetail($sppd_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD Detail updated successfully');
        } else {
            $this->session->set_flashdata('error', 'SPPD Detail update failed');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }


    function DeleteSPPDDetail($sppd_detail_id, $sppd_id, $zone_type)
    {

        $sppd_detail_parameter = array($sppd_detail_id, $sppd_id, $zone_type);
        $result = $this->sppd_detail_model->DeleteSPPDDetail($sppd_detail_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'SPPD Detail has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'SPPD Detail cannot deleted !');
        }
        redirect('SPPDDetail/' . $sppd_id . '/' . $zone_type);
    }
}
