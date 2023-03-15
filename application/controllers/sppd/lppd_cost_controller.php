<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class lppd_cost_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sppd/lppd_cost_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : LPPD Cost';
        $this->loadViews("sppd/lppd_detail", $this->global, NULL, NULL);
    }

    function GetLPPD()
    {
        $lppd_cost_parameter = array('p_lppd_cost_id' => 0, 'p_lppd_id' => '0', 'p_flag' => 0);
        $data['LPPDCostRecords'] = $this->lppd_cost_model->GetLPPDCost($lppd_cost_parameter);
    }

    function InsertLPPDCost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_id', 'Cost ID', 'required|xss_clean');
        $this->form_validation->set_rules('qty', 'Qty', 'required|xss_clean');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $employee_id = $this->input->post('employee_id');
        $lppd_id = $this->input->post('lppd_id');
        $cost_id = $this->input->post('cost_id_input');
        $cost_date = date('Y-m-d', strtotime($this->input->post('cost_date')));;
        $nominal = str_replace('.', '', $this->input->post('nominal'));
        $qty = $this->input->post('qty');

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $lppd_cost_attachment_url = $lppd_id . '-' . time() . '.' . $fileExt;
        } else {
            $lppd_cost_attachment_url = "";
        }

        $editable = 'ETB-001';
        $description = $this->input->post('description');

        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_cost_parameter = array($lppd_id, $sppd_id, $employee_id, $cost_id, $cost_date, $nominal, $qty, $lppd_cost_attachment_url, $editable, $description, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $lppd_id . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 100000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->lppd_cost_model->InsertLPPDCost($lppd_cost_parameter);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'LPPD Cost created successfully');
                } else {
                    $this->session->set_flashdata('error', 'LPPD Cost creation failed!!');
                }
            }
        }
        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }

    function UpdateLPPDCost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_id_update', 'Cost ID', 'required|xss_clean');
        $this->form_validation->set_rules('qty_update', 'Qty', 'required|xss_clean');
        $this->form_validation->set_rules('nominal_update', 'Nominal', 'required|xss_clean');

        $zone_type = $this->input->post('zone_type');
        $sppd_id = $this->input->post('sppd_id');
        $lppd_id = $this->input->post('lppd_id');
        $lppd_cost_id = $this->input->post('lppd_cost_id_update');
        // $cost_id = $this->input->post('cost_id_update');
        $nominal = str_replace('.', '', $this->input->post('nominal_update'));
        $qty = $this->input->post('qty_update');
        $lppd_cost_attachment_url = $this->input->post('lppd_cost_attachment_url_update');
        $description = $this->input->post('description_update');

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $lppd_cost_attachment_url = $lppd_id . '-' . time() . '.' . $fileExt;
        } else {
            $lppd_cost_attachment_url = $lppd_cost_attachment_url;
        }

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $lppd_cost_parameter = array($lppd_cost_id, $nominal, $qty, $lppd_cost_attachment_url, $description, $change_user_id, $record_status);


        $result = $this->lppd_cost_model->UpdateLPPDCost($lppd_cost_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Cost updated successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Cost update failed');
        }

        if ($result > 0) {
            if ($fileExt != "") {
                $config['upload_path']    = './upload/';
                $config['allowed_types']  = 'jpeg|jpg|png|pdf';
                $config['file_name']      = $lppd_id . '-' . time();
                $config['overwrite']      = true;
                $config['max_size']       = 100000;
                $config['max_width']      = 10000;
                $config['max_height']     = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', 'image cannot upload');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->session->set_flashdata('success', 'image has been upload');
                }
            }

            $this->session->set_flashdata('success', 'LPPD Cost updated successfully');
        } else {
            $this->session->set_flashdata('error', 'LPPD Cost update failed');
        }

        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }


    function DeleteLPPDCost($lppd_cost_id, $lppd_id, $sppd_id, $zone_type)
    {

        $lppd_cost_parameter = array($lppd_cost_id, $lppd_id, $sppd_id, $zone_type);
        $result = $this->lppd_cost_model->DeleteLPPDCost($lppd_cost_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'LPPD Cost has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'LPPD Cost cannot deleted !');
        }
        redirect('LPPDDetail/' . $lppd_id . '/' . $sppd_id . '/' . $zone_type);
    }

    function DownloadLPPDCost($lppd_cost_attachment_url, $lppd_id)
    {
        force_download('./upload/' . $lppd_cost_attachment_url, NULL);
    }

    function upload($lppd_cost_attachment_url)
    {
        $file = file_get_contents('./upload/' . $lppd_cost_attachment_url);
        header('Content-Type: application/pdf');
        @readfile($file);
    }
}
