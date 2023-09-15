<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Education_History_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Education_History_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateEducationHistory()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('education_level_id', 'Tingkat', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $from_year = $this->input->post('from_year');
        $to_year = $this->input->post('to_year');
        $education_level_id = $this->input->post('education_level_id');
        $school_name = $this->input->post('school_name');
        $school_place = $this->input->post('school_place');
        $school_majors = $this->input->post('school_majors');
        $school_certified_status = $this->input->post('school_certified_status');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_education_history_parameter = array(
            $request_candidate_id,
            $from_year,
            $to_year,
            $education_level_id,
            $school_name,
            $school_place,
            $school_majors,
            $school_certified_status,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            '',
            'p_flag' => 0
        );

        $result = $this->Candidate_Education_History_Model->InsertCandidateEducationHistory($candidate_education_history_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Education History has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Education History cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateEducationHistory()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_education_history_id_update', 'Candidate Education History ID', 'required|max_length[50]|xss_clean');

        $candidate_education_history_id = $this->input->post('candidate_education_history_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $from_year = $this->input->post('from_year_update');
        $to_year = $this->input->post('to_year_update');
        $education_level_id = $this->input->post('education_level_id_update');
        $school_name = $this->input->post('school_name_update');
        $school_place = $this->input->post('school_place_update');
        $school_majors = $this->input->post('school_majors_update');
        $school_certified_status = $this->input->post('school_certified_status_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_education_history_parameter = array(
            $candidate_education_history_id,
            $request_candidate_id,
            $from_year,
            $to_year,
            $education_level_id,
            $school_name,
            $school_place,
            $school_majors,
            $school_certified_status,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Education_History_Model->UpdateCandidateEducationHistory($candidate_education_history_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Education History updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Education History update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateEducationHistory($candidate_education_history_id)
    {

        $candidate_education_history_parameter = array($candidate_education_history_id);
        $result = $this->Candidate_Education_History_Model->DeleteCandidateEducationHistory($candidate_education_history_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Education History has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Education History request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateEducationHistoryNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_education_history_parameter = array(
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

        $result = $this->Candidate_Education_History_Model->InsertCandidateEducationHistory($candidate_education_history_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');;
    }
}
