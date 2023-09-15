<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Social_Activity_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Social_Activity_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateSocialActivity()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('activity_social_year', 'Tahun', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $activity_social_year = $this->input->post('activity_social_year');
        $activity_social_position = $this->input->post('activity_social_position');
        $activity_type_name = $this->input->post('activity_type_name');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_social_activity_parameter = array(
            $request_candidate_id,
            $activity_social_year,
            $activity_social_position,
            $activity_type_name,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Social_Activity_Model->InsertCandidateSocialActivity($candidate_social_activity_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Social Activity has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Social Activity cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateSocialActivity()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_social_activity_id_update', 'Candidate Social Activity ID', 'required|max_length[50]|xss_clean');

        $candidate_social_activity_id = $this->input->post('candidate_social_activity_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $activity_social_year = $this->input->post('activity_social_year_update');
        $activity_social_position = $this->input->post('activity_social_position_update');
        $activity_type_name = $this->input->post('activity_type_name_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_social_activity_parameter = array(
            $candidate_social_activity_id,
            $request_candidate_id,
            $activity_social_year,
            $activity_social_position,
            $activity_type_name,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Social_Activity_Model->UpdateCandidateSocialActivity($candidate_social_activity_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Social Activity updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Social Activity update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateSocialActivity($candidate_social_activity_id)
    {

        $candidate_social_activity_parameter = array($candidate_social_activity_id);
        $result = $this->Candidate_Social_Activity_Model->DeleteCandidateSocialActivity($candidate_social_activity_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Social Activity has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Social Activity request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateSocialActivityNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_social_activity_parameter = array(
            $request_candidate_id,
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

        $result = $this->Candidate_Social_Activity_Model->InsertCandidateSocialActivity($candidate_social_activity_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
