<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Health_Information_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Health_Information_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateHealthInformation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('been_hospitalized', 'Pertanyaan 1', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $been_hospitalized = $this->input->post('been_hospitalized');
        $illness = $this->input->post('illness');
        $long_treated = $this->input->post('long_treated');
        $involved_drugs_or_crime = $this->input->post('involved_drugs_or_crime');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_health_information_parameter = array(
            $request_candidate_id,
            $been_hospitalized,
            $illness,
            $long_treated,
            $involved_drugs_or_crime,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Health_Information_Model->InsertCandidateHealthInformation($candidate_health_information_parameter);

        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Health Information has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Health Information cannot added !');
        }

        redirect('ApplicationForm');
    }

    function CandidateHealthInformationNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_health_information_parameter = array(
            $request_candidate_id,
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

        $result = $this->Candidate_Health_Information_Model->InsertCandidateHealthInformation($candidate_health_information_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
