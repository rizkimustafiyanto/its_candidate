<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Character_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Character_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateCharacter()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('kelebihan', 'Kelebihan', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $kelebihan = $this->input->post('kelebihan');
        $kekurangan = $this->input->post('kekurangan');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_character_parameter = array(
            $request_candidate_id,
            $kelebihan,
            $kekurangan,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Character_Model->InsertCandidateCharacter($candidate_character_parameter);

        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Character has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Character cannot added !');
        }

        redirect('ApplicationForm');
    }

    function CandidateCharacterNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_character_parameter = array(
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

        $result = $this->Candidate_Character_Model->InsertCandidateCharacter($candidate_character_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
