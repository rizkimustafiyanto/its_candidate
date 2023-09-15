<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Reference_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Reference_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateReference()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('referee_name', 'Nama', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $referee_name = $this->input->post('referee_name');
        $referee_position = $this->input->post('referee_position');
        $company_name = $this->input->post('company_name');
        $referee_relationship = $this->input->post('referee_relationship');
        $referee_address = $this->input->post('referee_address');
        $referee_phone_no = $this->input->post('referee_phone_no');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_reference_parameter = array(
            $request_candidate_id,
            $referee_name,
            $referee_position,
            $company_name,
            $referee_relationship,
            $referee_address,
            $referee_phone_no,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Reference_Model->InsertCandidateReference($candidate_reference_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Reference has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Reference cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateReference()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_reference_id_update', 'Candidate Reference ID', 'required|max_length[50]|xss_clean');

        $candidate_reference_id = $this->input->post('candidate_reference_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $referee_name = $this->input->post('referee_name_update');
        $referee_position = $this->input->post('referee_position_update');
        $company_name = $this->input->post('company_name_ref_update');
        $referee_relationship = $this->input->post('referee_relationship_update');
        $referee_address = $this->input->post('referee_address_update');
        $referee_phone_no = $this->input->post('referee_phone_no_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_reference_parameter = array(
            $candidate_reference_id,
            $request_candidate_id,
            $referee_name,
            $referee_position,
            $company_name,
            $referee_relationship,
            $referee_address,
            $referee_phone_no,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Reference_Model->UpdateCandidateReference($candidate_reference_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Reference updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Reference update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateReference($candidate_reference_id)
    {

        $candidate_reference_parameter = array($candidate_reference_id);
        $result = $this->Candidate_Reference_Model->DeleteCandidateReference($candidate_reference_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Reference has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Reference request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateReferenceNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_reference_parameter = array(
            $request_candidate_id,
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

        $result = $this->Candidate_Reference_Model->InsertCandidateReference($candidate_reference_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
