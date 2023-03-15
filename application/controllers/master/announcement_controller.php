<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class announcement_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/announcement_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/company_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Announcement';
        $this->loadViews("master/announcement_model", $this->global, NULL, NULL);
    }

    function GetAnnouncement()
    {
        $announcement_parameter = array('p_announcement_id' => 0, 'p_flag' => 0);
        $data['AnnouncementRecords'] = $this->announcement_model->GetAnnouncement($announcement_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Announcement';
        $this->loadViews("master/announcement", $this->global, $data, NULL);
    }

    function InsertAnnouncement()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('announcement_title', 'Announcement Title', 'required|max_length[50]|xss_clean');

        $announcement_title = $this->input->post('announcement_title');
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $image_url = $creation_user_id . '-' . time() . '.' . $fileExt;
        } else {
            $image_url = "";
        }

        $announcement_parameter = array($announcement_title, $description, $image_url, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $creation_user_id . '-' . time();
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
                $result = $this->announcement_model->InsertAnnouncement($announcement_parameter);
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Attachment has been upload !');
                } else {
                    $this->session->set_flashdata('error', 'Attachment cannot upload !');
                }
            }
        }
        redirect('Announcement');
    }

    function UpdateAnnouncement()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('announcement_title', 'Announcement Title', 'required|max_length[50]|xss_clean');

        $announcement_id = $this->input->post('announcement_id');
        $announcement_title = $this->input->post('announcement_title');
        $description = $this->input->post('description');
        $image_url = $this->input->post('image_url');
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $image_url = $creation_user_id . '-' . time() . '.' . $fileExt;
        } else {
            $image_url = $image_url;
        }

        $announcement_parameter = array($announcement_id, $announcement_title, $description, $image_url, $change_user_id, $record_status);

        $result = $this->announcement_model->UpdateAnnouncement($announcement_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Announcement updated !');
        } else {
            $this->session->set_flashdata('error', 'Announcement cannot update !');
        }

        if ($result > 0) {
            if ($fileExt != "") {
                $config['upload_path']    = './upload/';
                $config['allowed_types']  = 'gif|jpg|jpeg|png|pdf';
                $config['file_name']      = $creation_user_id . '-' . time();
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

            $this->session->set_flashdata('success', 'Announcement has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Announcement cannot updated !');
        }

        redirect('Announcement');
    }


    function DeleteAnnouncement($announcement_id)
    {
        $announcement_parameter = array($announcement_id);

        $result = $this->announcement_model->DeleteAnnouncement($announcement_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Announcement has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Announcement cannot deleted !');
        }

        redirect('Announcement');
    }
}
