<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Family_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Family_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateFamily()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('family_realitionship_id', 'Hubungan Keluarga', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $family_realitionship_id = $this->input->post('family_realitionship_id');
        $name = $this->input->post('name');
        $gender_id = $this->input->post('gender_id');
        $age = $this->input->post('age');
        $last_education_id = $this->input->post('last_education_id');
        $profession_name = $this->input->post('profession_name');
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_family_parameter = array(
            $request_candidate_id,
            $family_realitionship_id,
            $name,
            $gender_id,
            $age,
            $last_education_id,
            $profession_name,
            $description,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Family_Model->InsertCandidateFamily($candidate_family_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Family has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Family cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateFamily()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('family_realitionship_id_update', 'Hubungan Keluarga', 'required|max_length[50]|xss_clean');

        $candidate_family_id = $this->input->post('candidate_family_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $family_realitionship_id = $this->input->post('family_realitionship_id_update');
        $name = $this->input->post('name_update');
        $gender_id = $this->input->post('gender_id_update');
        $age = $this->input->post('age_update');
        $last_education_id = $this->input->post('last_education_id_update');
        $profession_name = $this->input->post('profession_name_update');
        $description = $this->input->post('description_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_family_parameter = array(
            $candidate_family_id,
            $request_candidate_id,
            $family_realitionship_id,
            $name,
            $gender_id,
            $age,
            $last_education_id,
            $profession_name,
            $description,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Family_Model->UpdateCandidateFamily($candidate_family_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Family updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Family update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateFamily($candidate_family_id)
    {

        $candidate_family_parameter = array($candidate_family_id);
        $result = $this->Candidate_Family_Model->DeleteCandidateFamily($candidate_family_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Family has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Family request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateFamilyNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_family_parameter = array(
            $request_candidate_id,
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Family_Model->InsertCandidateFamily($candidate_family_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
