<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Courses_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Courses_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateCourses()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('courses_old', 'Lama Kursus', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $courses_old = $this->input->post('courses_old');
        $courses_year = $this->input->post('courses_year');
        $courses_type = $this->input->post('courses_type');
        $courses_organizer = $this->input->post('courses_organizer');
        $courses_place = $this->input->post('courses_place');
        $courses_funded_by = $this->input->post('courses_funded_by');
        $courses_certified_status = $this->input->post('courses_certified_status');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_courses_parameter = array(
            $request_candidate_id,
            $courses_old,
            $courses_year,
            $courses_type,
            $courses_organizer,
            $courses_place,
            $courses_funded_by,
            $courses_certified_status,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Courses_Model->InsertCandidateCourses($candidate_courses_parameter);

        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Courses has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Courses cannot added !');
        }

        redirect('ApplicationForm');
    }

    function UpdateCandidateCourses()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('courses_old_id_update', 'Lama Kursus', 'required|max_length[50]|xss_clean');

        $candidate_courses_id = $this->input->post('candidate_courses_id_update');
        $request_candidate_id = $this->input->post('request_candidate_id_update');
        $courses_old = $this->input->post('courses_old_update');
        $courses_year = $this->input->post('courses_year_update');
        $courses_type = $this->input->post('courses_type_update');
        $courses_organizer = $this->input->post('courses_organizer_update');
        $courses_place = $this->input->post('courses_place_update');
        $courses_funded_by = $this->input->post('courses_funded_by_update');
        $courses_certified_status = $this->input->post('courses_certified_status_update');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_courses_parameter = array(
            $candidate_courses_id,
            $request_candidate_id,
            $courses_old,
            $courses_year,
            $courses_type,
            $courses_organizer,
            $courses_place,
            $courses_funded_by,
            $courses_certified_status,
            $change_user_id,
            $record_status
        );

        $this->Candidate_Courses_Model->UpdateCandidateCourses($candidate_courses_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Courses updated successfully');
        } else {
            $this->session->set_flashdata('error', 'Candidate Courses update failed');
        }
        redirect('ApplicationForm');
    }

    function DeleteCandidateCourses($candidate_courses_id)
    {

        $candidate_courses_parameter = array($candidate_courses_id);
        $result = $this->Candidate_Courses_Model->DeleteCandidateCourses($candidate_courses_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Courses has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Courses request cannot deleted !');
        }

        redirect('ApplicationForm');
    }

    function CandidateCoursesNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_courses_parameter = array(
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

        $result = $this->Candidate_Courses_Model->InsertCandidateCourses($candidate_courses_parameter);
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
