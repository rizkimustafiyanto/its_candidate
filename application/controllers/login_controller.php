<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class login_controller extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->IsLoggedIn();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function IsLoggedIn()
    {
        $IsLoggedIn = $this->session->userdata('IsLoggedIn');

        if (!isset($IsLoggedIn) || $IsLoggedIn != TRUE) {
            $this->load->view('login');
        } else {
            redirect('/Dashboard');
        }
    }


    /**
     * This function used to logged in employee
     */
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
            // $remember = $this->input->post('remember');

            $login_parameter = array($employee_account, $password);
            $result = $this->login_model->Login($login_parameter, $password);
            if (count($result) > 0) {
                foreach ($result as $res) {
                    $sessionArray = array(
                        'employee_id' => $res->employee_id,
                        'role_id' => $res->role_id,
                        'company_id' => $res->company_id,
                        'division_id' => $res->division_id,
                        'department_id' => $res->department_id,
                        'role_name' => $res->role_name,
                        'employee_name' => $res->employee_name,
                        'company_name' => $res->company_name,

                        'IsLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    if ($res->role_id != '1') {
                        redirect('/DashboardEmployee');
                        $this->session->set_flashdata('success', 'Success Login');
                    } else {
                        redirect('/DashboardAdmin');
                        $this->session->set_flashdata('success', 'Success Login');
                    }
                }
            } else {
                $this->session->set_flashdata('error', 'Employee account or password mismatch');
                // $this->session->sess_destroy();
                redirect('/login');
                // $this->session->sess_destroy();
            }
        }
    }

    public function cekRole()
    {
        // $result = $this->login_model->Login($user_account, $password);

        $cek_role_parameter = [
            'p_user_account' => $this->session->userdata('user_id'),
            'p_password' => '',
        ];
        $result = $this->login_model->cekRole($cek_role_parameter);

        if ($result > 0) {
            foreach ($result as $res) {
                $sessionArray = [
                    'employee_id' => $res->employee_id,
                    'role_id' => $res->role_id,
                    'role_name' => $res->role_name,
                    'employee_name' => $res->employee_name,
                    'company_id' => $res->company_id,
                    'division_id' => $res->division_id,
                    'department_id' => $res->department_id,
                    'photo_url' => $res->photo_url,
                    'IsLoggedIn' => true,
                ];
            }

            $this->session->set_userdata($sessionArray);

            if ($res->role_id == '1' || $res->role_id == '5') {
                redirect('/DashboardAdmin');
                // $this->session->set_flashdata('success', 'Success Login');
            } else if ($res->role_id != '1' && $res->role_id != '5') {
                redirect('/DashboardEmployee');
                // $this->session->set_flashdata('success', 'Success Login');
            } else {
                redirect('../home/Dashboard');
            }
        } else {
            redirect('../home/Dashboard');
        }
    }

    function home()
    {
        redirect('../home/Dashboard');
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $this->load->view('forgotPassword');
    }

    /**
     * This function used to generate reset password request link
     */
    function resetPasswordEmployee()
    {
        $status = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->forgotPassword();
        } else {
            $email = $this->input->post('login_email');

            if ($this->login_model->checkEmailExist($email)) {
                $encoded_email = urlencode($email);

                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum', 15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();

                $save = $this->login_model->resetPasswordEmployee($data);

                if ($save) {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmEmployee/" . $data['activation_id'] . "/" . $encoded_email;
                    $EmployeeInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if (!empty($employeeInfo)) {
                        $data1["name"] = $employeeInfo[0]->name;
                        $data1["email"] = $employeeInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if ($sendStatus) {
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                } else {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            } else {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    // This function used to reset the password 
    function resetPasswordConfirmEmployee($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);

        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        if ($is_correct == 1) {
            $this->load->view('newPassword', $data);
        } else {
            redirect('/login');
        }
    }

    // This function used to create new password
    function createPasswordEmployee()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->resetPasswordConfirmEmployee($activation_id, urlencode($email));
        } else {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

            if ($is_correct == 1) {
                $this->login_model->createPasswordEmployee($email, $password);

                $status = 'success';
                $message = 'Password changed successfully';
            } else {
                $status = 'error';
                $message = 'Password changed failed';
            }
            setFlashData($status, $message);
            redirect("/login");
        }
    }
}
