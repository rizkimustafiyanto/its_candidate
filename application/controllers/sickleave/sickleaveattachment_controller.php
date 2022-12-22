<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class sickleaveattachment_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sickleave/sickleaveattachment_model');
        $this->load->helper(array('url', 'download'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Sick Leave Attachment';
        $this->loadViews("sickleaveattachment/sickleaveattachment", $this->global, NULL, NULL);
    }

    function GetLeaveAttachment()
    {

        $this->load->model('sickleave/sickleaveattachment_model');
        $sick_leave_attachment_parameter = array('p_sick_leave_attachment_id' => 0, 'p_leave_id' => '0', 'p_flag' => 0);
        $data['SickLeaveAttachmentRecords'] = $this->sickleaveattachment_model->GetSickLeaveAttachment($sick_leave_attachment_parameter);
    }

    function InsertSickLeaveAttachment()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('attachment_name', 'Attachment Name', 'required|max_length[50]|xss_clean');

        $sick_leave_id = $this->input->post('sick_leave_id');
        $attachment_name = $this->input->post('attachment_name');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $attachment_url = $sick_leave_id . '-' . time() . '.' . $fileExt;
        } else {
            $attachment_url = "";
        }
        $attachment_type  = $fileExt;

        $sick_leave_attachment_parameter = array($sick_leave_id, $attachment_name, $attachment_type, $attachment_url, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $sick_leave_id . '-' . time();
            // $config['file_name']      = $sick_leave_id;
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
                $this->load->model('sickleave/sickleaveattachment_model');
                $result = $this->sickleaveattachment_model->InsertSickLeaveAttachment($sick_leave_attachment_parameter);
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Attachment has been upload !');
                } else {
                    $this->session->set_flashdata('error', 'Attachment cannot upload !');
                }
            }
        }
        redirect('SickLeaveDetail/' . $sick_leave_id);
    }

    function DeleteSickLeaveAttachment($sick_leave_attachment_id, $sick_leave_id, $attachment_url)
    {
        $sick_leave_attachment_parameter = array($sick_leave_attachment_id);

        $result = $this->sickleaveattachment_model->DeleteSickLeaveAttachment($sick_leave_attachment_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attachment has been deleted !');
            $path = './upload/' . $attachment_url;
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Attachment cannot deleted !');
        }
        redirect('SickLeaveDetail/' . $sick_leave_id);
    }

    function DownloadSickLeaveAttachment($attachment_url, $sick_leave_id)
    {
        force_download('./upload/' . $attachment_url, NULL);
        redirect('SickLeaveDetail/' . $sick_leave_id);
    }

    function upload($attachment_url)
    {
        $file = file_get_contents('./upload/' . $attachment_url);
        header('Content-Type: application/pdf');
        @readfile($file);
    }
}
