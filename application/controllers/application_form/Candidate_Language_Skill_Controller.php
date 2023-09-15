<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Language_Skill_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Language_Skill_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateLanguageSkill()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('language_type', 'Jenis Bahasa', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $language_type = $this->input->post('language_type');
        $listening_score = $this->input->post('listening_score');
        $speaking_score = $this->input->post('speaking_score');
        $reading_score = $this->input->post('reading_score');
        $writing_score = $this->input->post('writing_score');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_language_skill_parameter = array(
            $request_candidate_id,
            $language_type,
            $listening_score,
            $speaking_score,
            $reading_score,
            $writing_score,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Language_Skill_Model->InsertCandidateLanguageSkill($candidate_language_skill_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Language Skill has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Language Skill cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateLanguageSkill()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_language_skill_id_update', 'Candidate Language Skill ID', 'required|max_length[50]|xss_clean');

        $candidate_language_skill_id = $this->input->post('candidate_language_skill_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $language_type = $this->input->post('language_type_update');
        $listening_score = $this->input->post('listening_score_update');
        $speaking_score = $this->input->post('speaking_score_update');
        $reading_score = $this->input->post('reading_score_update');
        $writing_score = $this->input->post('writing_score_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_language_skill_parameter = array(
            $candidate_language_skill_id,
            $request_candidate_id,
            $language_type,
            $listening_score,
            $speaking_score,
            $reading_score,
            $writing_score,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Language_Skill_Model->UpdateCandidateLanguageSkill($candidate_language_skill_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Language Skill updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Language Skill update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateLanguageSkill($candidate_language_skill_id)
    {

        $candidate_language_skill_parameter = array($candidate_language_skill_id);
        $result = $this->Candidate_Language_Skill_Model->DeleteCandidateLanguageSkill($candidate_language_skill_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Language Skill has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Language Skill request cannot deleted !');
        }

        redirect('ApplicationForm');
    }


    function CandidateLanguageSkillNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_language_skill_parameter = array(
            $request_candidate_id,
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

        $result = $this->Candidate_Language_Skill_Model->InsertCandidateLanguageSkill($candidate_language_skill_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
