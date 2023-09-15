<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Computer_Skill_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Computer_Skill_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateComputerSkill()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('computer_skill_type', 'Jenis Kemampuan', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $computer_skill_type = $this->input->post('computer_skill_type');
        $computer_skill_score = $this->input->post('computer_skill_score');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_computer_skill_parameter = array(
            $request_candidate_id,
            $computer_skill_type,
            $computer_skill_score,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Computer_Skill_Model->InsertCandidateComputerSkill($candidate_computer_skill_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Computer Skill has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Computer Skill cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateComputerSkill()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_computer_skill_id_update', 'Candidate Computer Skill ID', 'required|max_length[50]|xss_clean');

        $candidate_computer_skill_id = $this->input->post('candidate_computer_skill_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $computer_skill_type = $this->input->post('computer_skill_type_update');
        $computer_skill_score = $this->input->post('computer_skill_score_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_computer_skill_parameter = array(
            $candidate_computer_skill_id,
            $request_candidate_id,
            $computer_skill_type,
            $computer_skill_score,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Computer_Skill_Model->UpdateCandidateComputerSkill($candidate_computer_skill_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Computer Skill updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Computer Skill update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateComputerSkill($candidate_computer_skill_id)
    {

        $candidate_computer_skill_parameter = array($candidate_computer_skill_id);
        $result = $this->Candidate_Computer_Skill_Model->DeleteCandidateComputerSkill($candidate_computer_skill_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Computer Skill has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Computer Skill request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateComputerSkillNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_computer_skill_parameter = array(
            $request_candidate_id,
            '',
            '',
            '',
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Computer_Skill_Model->InsertCandidateComputerSkill($candidate_computer_skill_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
