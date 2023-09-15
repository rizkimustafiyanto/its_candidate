<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Job_History_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Job_History_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateJobHistory()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $company_name = $this->input->post('company_name');
        $company_phone = $this->input->post('company_phone');
        $working_from = $this->input->post('working_from');
        $working_to = $this->input->post('working_to');
        $working_position = $this->input->post('working_position');
        $direct_leader_name = $this->input->post('direct_leader_name');
        $direct_leader_position = $this->input->post('direct_leader_position');
        $reason_to_leave_work = $this->input->post('reason_to_leave_work');
        $last_salary = str_replace('.', '', $this->input->post('last_salary'));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_job_history_parameter = array(
            $request_candidate_id,
            $company_name,
            $company_phone,
            $working_from,
            $working_to,
            $working_position,
            $direct_leader_name,
            $direct_leader_position,
            $reason_to_leave_work,
            $last_salary,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            '',
            'p_flag' => 0
        );

        $result = $this->Candidate_Job_History_Model->InsertCandidateJobHistory($candidate_job_history_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Job History has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Job History cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateJobHistory()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('candidate_job_history_id_update', 'Candidate Job History ID', 'required|max_length[50]|xss_clean');

        $candidate_job_history_id = $this->input->post('candidate_job_history_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $company_name = $this->input->post('company_name_update');
        $company_phone = $this->input->post('company_phone_update');
        $working_from = $this->input->post('working_from_update');
        $working_to = $this->input->post('working_to_update');
        $working_position = $this->input->post('working_position_update');
        $direct_leader_name = $this->input->post('direct_leader_name_update');
        $direct_leader_position = $this->input->post('direct_leader_position_update');
        $reason_to_leave_work = $this->input->post('reason_to_leave_work_update');
        $last_salary = str_replace('.', '', $this->input->post('last_salary_update'));
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_job_history_parameter = array(
            $candidate_job_history_id,
            $request_candidate_id,
            $company_name,
            $company_phone,
            $working_from,
            $working_to,
            $working_position,
            $direct_leader_name,
            $direct_leader_position,
            $reason_to_leave_work,
            $last_salary,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Job_History_Model->UpdateCandidateJobHistory($candidate_job_history_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Job History updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Job History update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateJobHistory($candidate_job_history_id)
    {

        $candidate_job_history_parameter = array($candidate_job_history_id);
        $result = $this->Candidate_Job_History_Model->DeleteCandidateJobHistory($candidate_job_history_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Job History has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Job History request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateJobHistoryNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_job_history_parameter = array(
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
            '',
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Job_History_Model->InsertCandidateJobHistory($candidate_job_history_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
