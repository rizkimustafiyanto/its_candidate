<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class shift_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/shift_model');
        $this->load->model('master/shift_details_model');
        $this->load->model('master/employee_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/company_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Shift';
        $this->loadViews("master/shift_model", $this->global, NULL, NULL);
    }

    function GetShift()
    {
        $this->load->model('master/shift_model');
        $shift_parameter = array('p_shift_id' => 0, 'p_flag' => 0);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Shift';
        $this->loadViews("master/shift", $this->global, $data, NULL);
    }

    function GetShiftById($shift_id)
    {
        $shift_parameter = array('p_shift_details_id' => 0, 'p_shift_id' => $shift_id, 'p_flag' => 0, 'p_shift_day' => 0);
        $data['ShiftDetailsRecords'] = $this->shift_details_model->GetShiftDetails($shift_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        $shift_parameter = array('p_shift_id' => $shift_id, 'p_flag' => 2);
        $data['ShiftRecords'] = $this->shift_model->GetShift($shift_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Shift Details';
        $this->loadViews("master/shift_details", $this->global, $data, NULL);
    }

    function InsertShift()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shift_id', 'Shift ID', 'required|max_length[50]|xss_clean');

        $shift_id = $this->input->post('shift_id');
        $shift_name = $this->input->post('shift_name');
        $description = $this->input->post('description');
        $company_id = $this->input->post('company_id');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $shift_parameter = array(
            $shift_id,
            $shift_name,
            $description,
            $company_id,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $this->load->model('master/shift_model');
        $result = $this->shift_model->InsertShift($shift_parameter);

        if ($result > 0) {
            $param_shift = [
                'p_shift_id' => '',
                'p_flag' => 1,
            ];
            $result1 = $this->shift_model->GetShift($param_shift);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_shift_id = $res->shift_id;
                }
            }
            redirect(
                'ShiftDetail/' . $p_shift_id
            );
        } else {
            $this->session->set_flashdata('error', 'Shift Request creation failed');
            redirect('Shift');
        }
    }

    function UpdateShift()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('shift_id', 'Shift ID', 'required|max_length[50]|xss_clean');

        $shift_id = $this->input->post('shift_id');
        $shift_name = $this->input->post('shift_name');
        $description = $this->input->post('description');
        $company_id = $this->input->post('company_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";


        $shift_parameter = array($shift_id, $shift_name, $description, $company_id, $change_user_id, $record_status);

        $this->load->model('master/shift_model');
        $result = $this->shift_model->UpdateShift($shift_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'Shift Updated');
    }


    function DeleteShift($shift_id)
    {
        $shift_parameter = array($shift_id);

        $result = $this->shift_model->DeleteShift($shift_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Shift has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Shift cannot deleted !');
        }

        redirect('Shift');
    }

    function GetShiftByCompanyId()
    {

        $company_id = $this->input->post('company_id'); //receiving the ajax post from view

        $shift_parameter =
            array('p_shift_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 3);
        $records =  $this->shift_model->GetShift2($shift_parameter);

        echo json_encode($records);
    }

    function GetShiftByCompanyId2()
    {

        $company_id = $this->input->post('company_id_update'); //receiving the ajax post from view

        $shift_parameter =
            array('p_shift_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 3);
        $records =  $this->shift_model->GetShift2($shift_parameter);

        echo json_encode($records);
    }
}
