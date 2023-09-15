<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Attachment_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Attachment_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateAttachment()
    {

        $request_candidate_id = $this->input->post('request_candidate_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $config['upload_path']   = './upload/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        // $config['max_size']      = 2048; // 2MB maximum file size

        $this->load->library('upload', $config);

        $start = 0;

        foreach ($_FILES['files']['name'] as $key => $name) {
            $start =  $start + 1;
            $_FILES['userfile']['name']     = "Att-" . $start . "-" . $_FILES['files']['name'][$key];
            $_FILES['userfile']['type']     = $_FILES['files']['type'][$key];
            $_FILES['userfile']['tmp_name'] = $_FILES['files']['tmp_name'][$key];
            $_FILES['userfile']['error']    = $_FILES['files']['error'][$key];
            $_FILES['userfile']['size']     = $_FILES['files']['size'][$key];

            $attachment_category_id = "Att-" . $start;
            $attachment_file_url = "Att-" . $start . "-" . $_FILES['files']['name'][$key];
            $attachment_type = pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);

            if ($this->upload->do_upload('userfile')) {
                $data = $this->upload->data();

                $candidate_attachment_parameter = array(
                    $request_candidate_id,
                    $attachment_category_id,
                    $attachment_file_url,
                    $attachment_type,
                    $change_no,
                    $creation_user_id,
                    $change_user_id,
                    $record_status,
                    '',
                    'p_flag' => 0
                );

                $result = $this->Candidate_Attachment_Model->InsertCandidateAttachment($candidate_attachment_parameter);
            }
        }

        redirect('ApplicationForm');
    }

    // function InsertCandidateAttachment()
    // {
    //     $this->load->library('form_validation');
    //     // $this->form_validation->set_rules('attachment_file_url', 'Image', 'required|max_length[50]|xss_clean');

    //     // $targetDirectory = "./upload/";

    //     $start = 1;

    //     for ($i = $start; $i <= 5; $i++) {
    //         $inputName = "image" . $start;

    //         $request_candidate_id = $this->input->post('request_candidate_id');
    //         $change_no = 0;
    //         $creation_user_id = $this->session->userdata('request_candidate_id');
    //         $change_user_id = $this->session->userdata('request_candidate_id');
    //         $record_status = "A";

    //         $fileExt = pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION);
    //         if ($fileExt != "") {
    //             $attachment_file_url = $request_candidate_id . '-' . time() . '-' . $inputName . '.' . $fileExt;
    //         } else {
    //             $attachment_file_url = '';
    //         }



    //         $config['upload_path']    = './upload/';
    //         $config['allowed_types']  = 'jpeg|jpg|png|pdf';
    //         $config['file_name']      = $request_candidate_id . '-' . time() . '-' . $inputName;
    //         $config['overwrite']      = true;
    //         // $config['max_size']       = 2000000;
    //         //$config['max_width']      = 10000;
    //         //$config['max_height']     = 10000;

    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload($inputName)) {
    //             $error = array('error' => $this->upload->display_errors());
    //             $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
    //         } else {
    //             $data = array('upload_data' => $this->upload->data());

    //             $candidate_attachment_parameter = array(
    //                 $request_candidate_id,
    //                 $attachment_file_url,
    //                 $change_no,
    //                 $creation_user_id,
    //                 $change_user_id,
    //                 $record_status,
    //                 '',
    //                 'p_flag' => 0
    //             );

    //             $result = $this->Candidate_Attachment_Model->InsertCandidateAttachment($candidate_attachment_parameter);
    //         }

    //         $start = $start + 1;
    //     }

    //     if ($result > 0) {
    //         $this->session->set_flashdata('success', 'Candidate Attachment has been added !');
    //     } else {
    //         $this->session->set_flashdata('error', 'Candidate Attachment cannot added !');
    //     }

    //     redirect('ApplicationForm');
    // }

    function DeleteCandidateAttachment($candidate_attachment_id, $structure_image_url)
    {
        $candidate_attachment_parameter = array($candidate_attachment_id);

        $result = $this->Candidate_Attachment_Model->DeleteCandidateAttachment($candidate_attachment_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Company Structure has been deleted !');
            $path = './upload/' . $structure_image_url;
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Candidate Company Structure cannot deleted !');
        }
        redirect('ApplicationForm');
    }
}
