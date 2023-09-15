<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class login_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }


    public function index()
    {
        $this->IsLoggedIn();
    }

    function IsLoggedIn()
    {
        $IsLoggedIn = $this->session->userdata('IsLoggedIn');

        if (!isset($IsLoggedIn) || $IsLoggedIn != TRUE) {
            $this->load->view('login');
        } else {
            redirect('/DashboardCandidate');
        }
    }

    public function Login()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('employee_account', 'Employee Account', 'required|max_length[128]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $employee_account = $this->input->post('employee_account');
            $password = $this->input->post('password');

            $login_parameter = array($employee_account, $password);
            $result = $this->login_model->Login($login_parameter, $password);
            if (count($result) > 0) {
                foreach ($result as $res) {
                    $sessionArray = array(
                        'email' => $res->user_id,
                        'role_id' => $res->role_id,
                        'candidate_name' => $res->candidate_name,
                        'request_candidate_id' => $res->request_candidate_id,

                        'IsLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    redirect('/Dashboard');
                    $this->session->set_flashdata('success', 'Success Login');
                }
            } else {
                $this->session->set_flashdata('error', 'Employee account or password mismatch');
                redirect('/login');
            }
        }
    }
}
