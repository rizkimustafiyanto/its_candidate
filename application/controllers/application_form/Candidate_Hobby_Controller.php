<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Hobby_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Hobby_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateHobby()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hobby_name', 'Hobby', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $hobby_name = $this->input->post('hobby_name');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_hobby_parameter = array(
            $request_candidate_id,
            $hobby_name,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Hobby_Model->InsertCandidateHobby($candidate_hobby_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Hobby has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Hobby cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateHobby()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_hobby_id_update', 'Candidate Hobby ID', 'required|max_length[50]|xss_clean');

        $candidate_hobby_id = $this->input->post('candidate_hobby_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $hobby_name = $this->input->post('hobby_name_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_hobby_parameter = array(
            $candidate_hobby_id,
            $request_candidate_id,
            $hobby_name,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Hobby_Model->UpdateCandidateHobby($candidate_hobby_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Hobby updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Hobby update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateHobby($candidate_hobby_id)
    {

        $candidate_hobby_parameter = array($candidate_hobby_id);
        $result = $this->Candidate_Hobby_Model->DeleteCandidateHobby($candidate_hobby_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Hobby has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Hobby request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateHobbyNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id
            = $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_hobby_parameter = array(
            $request_candidate_id,
            '',
            '',
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Hobby_Model->InsertCandidateHobby($candidate_hobby_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
