<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class message_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/message_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/company_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Message';
        $this->loadViews("master/message_model", $this->global, NULL, NULL);
    }

    function GetMessage()
    {
        $message_parameter = array('p_message_id' => 0, 'p_employee_id' => 0, 'p_flag' => 0);
        $data['MessageRecords'] = $this->message_model->GetMessage($message_parameter);

        //Company
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //Employee
        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 0);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Message';
        $this->loadViews("master/message", $this->global, $data, NULL);
    }

    function InsertMessage()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('receiver_id', 'Receiver ID', 'required|max_length[50]|xss_clean');

        $receiver_id = $this->input->post('receiver_id');
        $sender_id = $this->session->userdata('employee_id');
        $message_title = $this->input->post('message_title');
        $message_body = $this->input->post('message_body');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $message_parameter = array(
            $receiver_id,
            $sender_id,
            $message_title,
            $message_body,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $result = $this->message_model->InsertMessage($message_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Message has been added !');
        } else {
            $this->session->set_flashdata('error', 'Message cannot added !');
        }

        redirect('Message');
    }

    function UpdateMessage()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('receiver_id', 'Receiver ID', 'required|max_length[50]|xss_clean');

        $message_id = $this->input->post('message_id_update');
        $receiver_id = $this->input->post('receiver_id_update');
        $sender_id = $this->session->userdata('employee_id');
        $message_title = $this->input->post('message_title_update');
        $message_body = $this->input->post('message_body_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";


        $message_parameter = array($message_id, $receiver_id, $sender_id, $message_title, $message_body, $change_user_id, $record_status);

        $this->load->model('master/message_model');
        $result = $this->message_model->UpdateMessage($message_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Message updated !');
        } else {
            $this->session->set_flashdata('error', 'Message cannot update !');
        }

        redirect('Message');
    }


    function DeleteMessage($message_id)
    {
        $message_parameter = array($message_id);

        $result = $this->message_model->DeleteMessage($message_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Message has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Message cannot deleted !');
        }

        redirect('Message');
    }
}
