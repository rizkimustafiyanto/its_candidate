<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Question_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Question_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateQuestion()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question_1', 'Pertanyaan 1', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $question_1 = $this->input->post('question_1');
        $question_2 = $this->input->post('question_2');
        $question_3 = $this->input->post('question_3');
        $question_4 = $this->input->post('question_4');
        $question_5 = $this->input->post('question_5');
        $question_6 = $this->input->post('question_6');
        $question_7 = $this->input->post('question_7');
        $question_8 = $this->input->post('question_8');
        $question_9 = $this->input->post('question_9');
        $question_10 = $this->input->post('question_10');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $candidate_question_parameter = array(
            $request_candidate_id,
            $question_1,
            $question_2,
            $question_3,
            $question_4,
            $question_5,
            $question_6,
            $question_7,
            $question_8,
            $question_9,
            $question_10,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            'O',
            'p_flag' => 0
        );

        $result = $this->Candidate_Question_Model->InsertCandidateQuestion($candidate_question_parameter);

        // $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Candidate Question has been added !');
        } else {
            $this->session->set_flashdata('error', 'Candidate Question cannot added !');
        }

        redirect('ApplicationForm');
    }

    function CandidateQuestionNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_question_parameter = array(
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
            '',
            $change_user_id,
            $record_status,
            $flag_accordion,
            'p_flag' => 1
        );

        $result = $this->Candidate_Question_Model->InsertCandidateQuestion($candidate_question_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'Next Session');
    }
}
