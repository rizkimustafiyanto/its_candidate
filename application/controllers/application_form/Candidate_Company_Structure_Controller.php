<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Company_Structure_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Company_Structure_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateCompanyStructure()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('structure_image_url', 'Image', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $structure_image_url = $request_candidate_id . '-' . time() . '.' . $fileExt;
        } else {
            $structure_image_url = "";
        }

        $candidate_company_structure_parameter = array(
            $request_candidate_id,
            $structure_image_url,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            '',
            'p_flag' => 0
        );

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $request_candidate_id . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 200000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $result = $this->Candidate_Company_Structure_Model->InsertCandidateCompanyStructure($candidate_company_structure_parameter);

                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Candidate Company Structure has been added !');
                } else {
                    $this->session->set_flashdata('error', 'Candidate Company Structure cannot added !');
                }
            }
        }

        redirect('ApplicationForm');
    }

    function CandidateCompanyStructureNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_company_structure_parameter = array(
            $request_candidate_id,
            '',
            '',
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Company_Structure_Model->InsertCandidateCompanyStructure($candidate_company_structure_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }

    function DeleteCandidateCompanyStructure($candidate_company_structure_id, $structure_image_url)
    {
        $candidate_company_structure_parameter = array($candidate_company_structure_id);

        $result = $this->Candidate_Company_Structure_Model->DeleteCandidateCompanyStructure($candidate_company_structure_parameter);

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
