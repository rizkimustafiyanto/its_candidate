<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Achievement_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Achievement_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateAchievement()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('achievement_year', 'Tahun', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $achievement_year = $this->input->post('achievement_year');
        $achievement_type = $this->input->post('achievement_type');
        $achievement_level = $this->input->post('achievement_level');
        $achievement_region = $this->input->post('achievement_region');
        $achievement_result = $this->input->post('achievement_result');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_achievement_parameter = array(
            $request_candidate_id,
            $achievement_year,
            $achievement_type,
            $achievement_level,
            $achievement_region,
            $achievement_result,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Achievement_Model->InsertCandidateAchievement($candidate_achievement_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Achievement has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Achievement cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateAchievement()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_achievement_id_update', 'Candidate Achievement ID', 'required|max_length[50]|xss_clean');

        $candidate_achievement_id = $this->input->post('candidate_achievement_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $achievement_year = $this->input->post('achievement_year_update');
        $achievement_type = $this->input->post('achievement_type_update');
        $achievement_level = $this->input->post('achievement_level_update');
        $achievement_region = $this->input->post('achievement_region_update');
        $achievement_result = $this->input->post('achievement_result_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_achievement_parameter = array(
            $candidate_achievement_id,
            $request_candidate_id,
            $achievement_year,
            $achievement_type,
            $achievement_level,
            $achievement_region,
            $achievement_result,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Achievement_Model->UpdateCandidateAchievement($candidate_achievement_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Achievement updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Achievement update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateAchievement($candidate_achievement_id)
    {

        $candidate_achievement_parameter = array($candidate_achievement_id);
        $result = $this->Candidate_Achievement_Model->DeleteCandidateAchievement($candidate_achievement_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Achievement has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Achievement request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateAchievementNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_achievement_parameter = array(
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

        $result = $this->Candidate_Achievement_Model->InsertCandidateAchievement($candidate_achievement_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
