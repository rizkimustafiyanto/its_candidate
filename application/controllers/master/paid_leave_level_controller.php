<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paid_leave_level_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_model');
        $this->load->model('master/paid_leave_level_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave Level';
        $this->loadViews("master/paid_leave_level_model", $this->global, NULL, NULL);
    }

    function GetPaidLeaveLevel()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->model('master/paid_leave_level_model');
        $paid_leave_level_parameter = array('p_paid_leave_level_id' => 0, 'p_flag' => 0);
        $data['PaidLeaveLevelRecords'] = $this->paid_leave_level_model->GetPaidLeaveLevel($paid_leave_level_parameter);

        //employee status
        $variable_employee_status_parameter = array('p_variable_id' => 'ES', 'p_flag' => 1);
        $data['EmployeeStatusRecords'] = $this->variable_model->GetVariable($variable_employee_status_parameter);

        //employee level
        $variable_employee_level_parameter = array('p_variable_id' => 'EL', 'p_flag' => 1);
        $data['EmployeeLevelRecords'] = $this->variable_model->GetVariable($variable_employee_level_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $data['kode'] = $this->paid_leave_level_model->kode();

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/paid_leave_level", $this->global, $data, NULL);
        // }
    }

    // function GetPaidLeaveLevelById($paid_leave_level_id, $flag)
    // {
    //     if ($this->isAdmin() == TRUE) {
    //         $this->loadThis();
    //     } else {
    //         $this->load->model('master/paid_leave_level_id_model');
    //         $paid_leave_level_id_parameter = array($paid_leave_level_id, $flag);
    //         $data['PaidLeaveLevelRecords'] = $this->paid_leave_level_id_model->GetPaidLeaveLevel($paid_leave_level_id_parameter);

    //         $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
    //         $this->loadViews("master/paid_leave_level", $this->global, $data, NULL);
    //     }
    // }

    function InsertPaidLeaveLevel()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('paid_leave_level_id', 'Paid Leave Level Id', 'required|max_length[50]|xss_clean');

        $paid_leave_level_id = $this->input->post('paid_leave_level_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_sub_id = $this->input->post('paid_leave_sub_id');

        if ($paid_leave_id != 'PL-001') {
            $paid_leave_id = $paid_leave_sub_id;
        }

        $level_id = $this->input->post('level_id');
        $amount_paid_leave = $this->input->post('amount_paid_leave');
        $employee_status_id = $this->input->post('employee_status_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paid_leave_level_parameter = array(
            $paid_leave_level_id,
            $paid_leave_id,
            $level_id,
            $amount_paid_leave,
            $employee_status_id,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $this->load->model('master/paid_leave_level_model');
        $result = $this->paid_leave_level_model->InsertPaidLeaveLevel($paid_leave_level_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {

            $this->session->set_flashdata('success', 'Paid Leave Level has been added !');
        } else {
            $this->session->set_flashdata('error', 'Paid Leave Level cannot added, the data has been added !');
        }

        redirect('PaidLeaveLevel');
        // }
    }

    function UpdatePaidLeaveLevel()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('paid_leave_level_id', 'Paid Leave Level Id', 'required|max_length[50]|xss_clean');

        $paid_leave_level_id = $this->input->post('paid_leave_level_id_update');
        $paid_leave_id = $this->input->post('paid_leave_id_update');
        $paid_leave_name2 = $this->input->post('paid_leave_name2_update');

        if ($paid_leave_name2 == 'PL-002') {
            $paid_leave_id = $paid_leave_id;
        } else {
            $paid_leave_id = $paid_leave_name2;
        }

        $level_id = $this->input->post('level_id_update');
        $amount_paid_leave = $this->input->post('amount_paid_leave_update');
        $employee_status_id = $this->input->post('employee_status_id_update');
        $change_user_id = $this->session->userdata('employee_id_update');
        $record_status = "A";



        $paid_leave_level_parameter = array($paid_leave_level_id, $paid_leave_id, $level_id, $amount_paid_leave, $employee_status_id, $change_user_id, $record_status);

        $this->load->model('master/paid_leave_level_model');
        $result = $this->paid_leave_level_model->UpdatePaidLeaveLevel($paid_leave_level_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid Leave Level updated !');
        } else {
            $this->session->set_flashdata('error', 'Paid Leave Level cannot update, the data has been added !');
        }
        redirect('PaidLeaveLevel');
        // }
    }


    function DeletePaidLeaveLevel($paid_leave_level_id)
    {
        $paid_leave_level_parameter = array($paid_leave_level_id);

        $result = $this->paid_leave_level_model->DeletePaidLeaveLevel($paid_leave_level_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid Leave Level has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Paid Leave Level cannot deleted !');
        }

        redirect('PaidLeaveLevel');
    }
}
