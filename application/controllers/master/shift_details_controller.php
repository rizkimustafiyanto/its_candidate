<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class shift_details_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/shift_details_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Shift Details';
        $this->loadViews("master/shift_details_model", $this->global, NULL, NULL);
    }

    function GetShiftDetails()
    {
        $this->load->model('master/shift_details_model');
        $shift_details_parameter = array('p_shift_details_id' => 0, 'p_shift_id' => 0, 'p_flag' => 0, 'p_shift_day' => 0);
        $data['ShiftDetailsRecords'] = $this->shift_details_model->GetShiftDetails($shift_details_parameter);

        $this->load->model('master/shift_model');
        $shift_parameter = array('p_shift_id' => 0, 'p_flag' => 0);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Shift Details';
        $this->loadViews("master/shift_details", $this->global, $data, NULL);
    }

    function InsertShiftDetails()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shift_id', 'Shift ID', 'required|max_length[50]|xss_clean');

        $shift_id = $this->input->post('shift_id');
        $shift_day = $this->input->post('shift_day');
        $shift_time_start = date('H:i:s', strtotime($this->input->post('shift_time_start')));
        $shift_time_finish = date('H:i:s', strtotime($this->input->post('shift_time_finish')));
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $shift_details_parameter = array(
            $shift_id,
            $shift_day,
            $shift_time_start,
            $shift_time_finish,
            $description,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $this->load->model('master/shift_details_model');
        $result = $this->shift_details_model->InsertShiftDetails($shift_details_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Shift Details has been added !');
        } else {
            $this->session->set_flashdata('error', 'Shift Details cannot added, the data has been added !');
        }

        redirect('ShiftDetail/' . $shift_id);
    }

    function UpdateShiftDetails()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shift_id', 'Shift ID', 'required|max_length[50]|xss_clean');

        $shift_details_id = $this->input->post('shift_details_id_update');
        $shift_id = $this->input->post('shift_id_update');
        $shift_day = $this->input->post('shift_day_update');
        $shift_time_start = date('H:i:s', strtotime($this->input->post('shift_time_start_update')));
        $shift_time_finish = date('H:i:s', strtotime($this->input->post('shift_time_finish_update')));
        $description = $this->input->post('description_update');
        $change_user_id = $this->session->userdata('employee_id_update');
        $record_status = "A";


        $shift_details_parameter = array($shift_details_id, $shift_id, $shift_day, $shift_time_start, $shift_time_finish, $description, $change_user_id, $record_status);

        $this->load->model('master/shift_details_model');
        $result = $this->shift_details_model->UpdateShiftDetails($shift_details_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Shift Details updated !');
        } else {
            $this->session->set_flashdata('error', 'Shift Details cannot update !');
        }

        redirect('ShiftDetail/' . $shift_id);
    }


    function DeleteShiftDetails($shift_details_id, $shift_id)
    {
        $shift_details_parameter = array($shift_details_id);

        $result = $this->shift_details_model->DeleteShiftDetails($shift_details_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Shift Details has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Shift Details cannot deleted !');
        }

        redirect('ShiftDetail/' . $shift_id);
    }
}
