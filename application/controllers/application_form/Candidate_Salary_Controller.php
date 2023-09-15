<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Salary_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Salary_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateSalary()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('last_salary', 'Gaji Terakhir', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $last_salary = str_replace('.', '', $this->input->post('last_salary_c'));
        $transport_allowance = str_replace('.', '', $this->input->post('transport_allowance'));
        $meal_allowance = str_replace('.', '', $this->input->post('meal_allowance'));
        $insurance_allowance = str_replace('.', '', $this->input->post('insurance_allowance'));
        $other_facility = $this->input->post('other_facility');
        $summary_expected_salary = str_replace('.', '', $this->input->post('summary_expected_salary'));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_salary_parameter = array(
            $request_candidate_id,
            $last_salary,
            $transport_allowance,
            $meal_allowance,
            $insurance_allowance,
            $other_facility,
            $summary_expected_salary,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Salary_Model->InsertCandidateSalary($candidate_salary_parameter);

        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Salary has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Salary cannot added !');
        }

        redirect('ApplicationForm');
    }

    function CandidateSalaryNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_salary_parameter = array(
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

        $result = $this->Candidate_Salary_Model->InsertCandidateSalary($candidate_salary_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
