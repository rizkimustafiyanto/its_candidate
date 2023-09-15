<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Candidate_Header_Controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('application_form/Application_Form_Model');
        $this->load->model('application_form/Candidate_Header_Model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Menu';
        $this->loadViews("application_form/Application_Form", $this->global, NULL, NULL);
    }

    function InsertCandidateHeader()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id = $this->input->post('request_candidate_id');
        $request_employee_id = $this->input->post('request_employee_id');
        $application_date = $this->input->post('application_date');
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $phone_no = $this->input->post('phone_no');
        $heigh = $this->input->post('heigh');
        $weight = $this->input->post('weight');
        $place_of_birth = $this->input->post('place_of_birth');
        $date_of_birth = $this->input->post('date_of_birth');
        $religion_id = $this->input->post('religion_id');
        $citizen_id = $this->input->post('citizen_id');
        $marital_status_id = $this->input->post('marital_status_id');
        $gender_id = $this->input->post('gender_id');
        $identity_number = $this->input->post('identity_number');
        $identity_period_validity = $this->input->post('identity_period_validity');
        $driving_license_number = $this->input->post('driving_license_number');
        $driving_license_type_id = $this->input->post('driving_license_type_id');
        $driving_license_period_validity = $this->input->post('driving_license_period_validity');
        $tax_id_number = $this->input->post('tax_id_number');
        $tax_id_registered_date = $this->input->post('tax_id_registered_date');
        $vehicle_type_id = $this->input->post('vehicle_type_id');
        $vehicle_ownership_status_id = $this->input->post('vehicle_ownership_status_id');
        $vehicle_police_no = $this->input->post('vehicle_police_no');
        $identity_residence_address = $this->input->post('identity_residence_address');
        $current_residence_address = $this->input->post('current_residence_address');
        $status_of_residence_id = $this->input->post('status_of_residence_id');
        $candidate_image_url = $this->input->post('candidate_image_url');
        $form_status = $this->input->post('form_status');
        $expired_date = $this->input->post('expired_date');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('request_candidate_id');
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $candidate_image_url = $request_candidate_id . '-' . time() . '.' . $fileExt;
        } else {
            $candidate_image_url = $candidate_image_url;
        }

        $candidate_header_parameter = array(
            $request_candidate_id,
            $request_employee_id,
            $application_date,
            $full_name,
            $email,
            $phone_no,
            $heigh,
            $weight,
            $place_of_birth,
            $date_of_birth,
            $religion_id,
            $citizen_id,
            $marital_status_id,
            $gender_id,
            $identity_number,
            $identity_period_validity,
            $driving_license_number,
            $driving_license_type_id,
            $driving_license_period_validity,
            $tax_id_number,
            $tax_id_registered_date,
            $vehicle_type_id,
            $vehicle_ownership_status_id,
            $vehicle_police_no,
            $identity_residence_address,
            $current_residence_address,
            $status_of_residence_id,
            $candidate_image_url,
            $form_status,
            $expired_date,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status,
            '',
            'p_flag' => 0
        );


        if ($candidate_image_url == NULL) {
            if ($fileExt != "") {
                $config['upload_path']    = './upload/';
                $config['allowed_types']  = 'jpeg|jpg|png';
                $config['file_name']      = $request_candidate_id . '-' . time();
                $config['overwrite']      = true;
                $config['max_size']       = 200000;
                $config['max_width']      = 10000;
                $config['max_height']     = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
                } else {
                    $data = array('upload_data' => $this->upload->data());

                    $result = $this->Candidate_Header_Model->InsertCandidateHeader($candidate_header_parameter);

                    // $result = $this->db->affected_rows();
                    if ($result > 0) {
                        $this->session->set_flashdata('success', 'Candidate Header has been added !');
                    } else {
                        $this->session->set_flashdata('error', 'Candidate Header cannot added !');
                    }
                }
            }
            redirect('ApplicationForm');
        } else {

            $result = $this->Candidate_Header_Model->InsertCandidateHeader($candidate_header_parameter);

            $result = $this->db->affected_rows();
            if ($result > 0) {
                $this->session->set_flashdata('success', 'Candidate Header has been added !');
            } else {
                $this->session->set_flashdata('error', 'Candidate Header cannot added !');
            }

            if ($result > 0) {
                if ($fileExt != "") {
                    $config['upload_path']    = './upload/';
                    $config['allowed_types']  = 'jpeg|jpg|png';
                    $config['file_name']      = $request_candidate_id . '-' . time();
                    $config['overwrite']      = true;
                    $config['max_size']       = 100000;
                    $config['max_width']      = 10000;
                    $config['max_height']     = 10000;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error', 'image cannot upload');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $this->session->set_flashdata('success', 'image has been upload');
                    }
                }

                $this->session->set_flashdata('success', 'Candidate Header has been added !');
            } else {
                $this->session->set_flashdata('error', 'Candidate Header cannot added !');
            }


            redirect('ApplicationForm');
        }
    }

    function CandidateHeaderNext()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('request_candidate_id', 'Request Candidate ID', 'required|max_length[50]|xss_clean');

        $request_candidate_id =
            $this->session->userdata('request_candidate_id');
        $flag_accordion = 'C';
        $change_user_id = $this->session->userdata('request_candidate_id');
        $record_status = "A";
        $candidate_header_parameter = array(
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

        $result = $this->Candidate_Header_Model->InsertCandidateHeader($candidate_header_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Next Session');
        } else {
            $this->session->set_flashdata('error', 'Please Complete This Session First !');
        }

        redirect('ApplicationForm');
    }
}
