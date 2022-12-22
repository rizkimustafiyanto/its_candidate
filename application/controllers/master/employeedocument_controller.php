<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employeedocument_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employeedocument_model');
        $this->load->helper(array('url', 'download'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Document';
        $this->loadViews("master/employeedocument", $this->global, NULL, NULL);
    }

    function GetEmployeeDocument()
    {

        $this->load->model('master/employeedocument_model');
        $employee_document_parameter = array('p_employee_document_id' => 0, 'p_employee_id' => '0', 'p_flag' => 0);
        $data['EmployeeDocumentRecords'] = $this->employeedocument_model->GetEmployeeDocument($employee_document_parameter);
    }

    function InsertEmployeeDocument()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('document_no', 'Document No', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $document_id = $this->input->post('document_id');
        $document_no = $this->input->post('document_no');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $document_url = $document_no . '-' . time() . '.' . $fileExt;
            // $attachment_url = $sick_leave_id . date("H:i:s") . '.' . $fileExt;
        } else {
            $document_url = "";
        }
        $document_type  = $fileExt;

        $employee_document_parameter = array($employee_id, $document_id, $document_no,  $document_type, $document_url, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $document_no . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 100000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);
            //$this->upload->do_upload('image');

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->load->model('master/employeedocument_model');
                $result = $this->employeedocument_model->InsertEmployeeDocument($employee_document_parameter);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Attachment has been upload !');
                } else {
                    $this->session->set_flashdata('error', 'Attachment cannot upload, You already upload this file !');
                }
            }
        }

        redirect('EmployeeDetail/' . $employee_id);
    }

    function DeleteEmployeeDocument($employee_document_id, $employee_id, $document_url)
    {
        $employee_document_parameter = array($employee_document_id);

        $result = $this->employeedocument_model->DeleteEmployeeDocument($employee_document_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attachment has been deleted !');
            $path = './upload/' . $document_url;
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Attachment cannot deleted !');
        }
        redirect('EmployeeDetail/' . $employee_id);
    }

    function DownloadEmployeeDocument($document_url, $employee_id)
    {
        force_download('./upload/' . $document_url, NULL);
        redirect('EmployeeDetail/' . $employee_id);
    }

    function InsertProfileDocument()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('document_no', 'Document No', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $document_id = $this->input->post('document_id');
        $document_no = $this->input->post('document_no');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $document_url = $document_no . '-' . time() . '.' . $fileExt;
            // $attachment_url = $sick_leave_id . date("H:i:s") . '.' . $fileExt;
        } else {
            $document_url = "";
        }
        $document_type  = $fileExt;

        $employee_document_parameter = array($employee_id, $document_id, $document_no,  $document_type, $document_url, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $document_no . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 100000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);
            //$this->upload->do_upload('image');

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $this->load->model('master/employeedocument_model');
                $result = $this->employeedocument_model->InsertEmployeeDocument($employee_document_parameter);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Attachment has been upload !');
                } else {
                    $this->session->set_flashdata('error', 'Attachment cannot upload, You already upload this file !');
                }
            }
        }

        redirect('Profile');
    }

    function DeleteProfileDocument($employee_document_id, $employee_id, $document_url)
    {
        $employee_document_parameter = array($employee_document_id);

        $result = $this->employeedocument_model->DeleteEmployeeDocument($employee_document_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attachment has been deleted !');
            $path = './upload/' . $document_url;
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Attachment cannot deleted !');
        }
        redirect('Profile');
    }

    function DownloadProfileDocument($document_url, $employee_id)
    {
        force_download('./upload/' . $document_url, NULL);
        redirect('Profile');
    }

    function uploadEmployeeDoc($document_url)
    {
        $file = file_get_contents('./upload/' . $document_url);
        header('Content-Type: application/pdf');
        @readfile($file);
    }
}
