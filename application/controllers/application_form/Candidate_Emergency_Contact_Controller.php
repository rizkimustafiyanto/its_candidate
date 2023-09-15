<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Emergency_Contact_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Emergency_Contact_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateEmergencyContact()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('emergency_contact_name', 'Nama', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $emergency_contact_name = $this->input->post('emergency_contact_name');
        $emergency_contact_relationship = $this->input->post('emergency_contact_relationship');
        $emergency_contact_address = $this->input->post('emergency_contact_address');
        $emergency_contact_phone_no = $this->input->post('emergency_contact_phone_no');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_emergency_contact_parameter = array(
            $request_candidate_id,
            $emergency_contact_name,
            $emergency_contact_relationship,
            $emergency_contact_address,
            $emergency_contact_phone_no,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            '',
            'p_flag' => 0
        );

        $result = $this->Candidate_Emergency_Contact_Model->InsertCandidateEmergencyContact($candidate_emergency_contact_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Emergency Contact has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Emergency Contact cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateEmergencyContact()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_emergency_contact_id_update', 'Candidate Emergency Contact ID', 'required|max_length[50]|xss_clean');

        $candidate_emergency_contact_id = $this->input->post('candidate_emergency_contact_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $emergency_contact_name = $this->input->post('emergency_contact_name_update');
        $emergency_contact_relationship = $this->input->post('emergency_contact_relationship_update');
        $emergency_contact_address = $this->input->post('emergency_contact_address_update');
        $emergency_contact_phone_no = $this->input->post('emergency_contact_phone_no_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_emergency_contact_parameter = array(
            $candidate_emergency_contact_id,
            $request_candidate_id,
            $emergency_contact_name,
            $emergency_contact_relationship,
            $emergency_contact_address,
            $emergency_contact_phone_no,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Emergency_Contact_Model->UpdateCandidateEmergencyContact($candidate_emergency_contact_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Emergency Contact updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Emergency Contact update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateEmergencyContact($candidate_emergency_contact_id)
    {

        $candidate_emergency_contact_parameter = array($candidate_emergency_contact_id);
        $result = $this->Candidate_Emergency_Contact_Model->DeleteCandidateEmergencyContact($candidate_emergency_contact_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Emergency Contact has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Emergency Contact request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateEmergencyContactNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_emergency_contact_parameter = array(
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

        $result = $this->Candidate_Emergency_Contact_Model->InsertCandidateEmergencyContact($candidate_emergency_contact_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
