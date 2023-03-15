<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class regional_cost_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/employee_model');
        $this->load->model('master/regional_cost_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/regional_model');
        $this->load->model('master/cost_model');


        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Regional Cost';
        $this->loadViews("master/regional_cost_model", $this->global, NULL, NULL);
    }

    function GetRegionalCost()
    {
        $regional_cost_parameter = array('p_regional_cost_id' => 0, 'p_flag' => 0);
        $data['RegionalCostRecords'] = $this->regional_cost_model->GetRegionalCost($regional_cost_parameter);

        //employee level
        $variable_employee_level_parameter = array('p_variable_id' => 'EL', 'p_flag' => 1);
        $data['EmployeeLevelRecords'] = $this->variable_model->GetVariable($variable_employee_level_parameter);

        //regional
        $regional_parameter = array('p_regional_id' => 0, 'p_flag' => 0);
        $data['RegionalRecords'] = $this->regional_model->GetRegional($regional_parameter);

        //cost
        $cost_parameter = array('p_cost_id' => 0, 'p_flag' => 0);
        $data['CostRecords'] = $this->cost_model->GetCost($cost_parameter);

        //editable
        $editable_parameter = array('p_variable_type' => 'flag_editable', 'p_flag' => 0);
        $data['EditableRecords'] = $this->variable_model->GetVariable2($editable_parameter);

        $data['kode'] = $this->regional_cost_model->kode();

        $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
        $this->loadViews("master/regional_cost", $this->global, $data, NULL);
    }


    function InsertRegionalCost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('regional_cost_id', 'Regional Cost Id', 'required|max_length[50]|xss_clean');

        $regional_cost_id = $this->input->post('regional_cost_id');
        $regional_id = $this->input->post('regional_id');
        $cost_id = $this->input->post('cost_id');
        $level_id = $this->input->post('level_id');
        $nominal = $this->input->post('nominal');
        $description = $this->input->post('description');
        $editable = $this->input->post('editable');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $regional_cost_parameter = array(
            $regional_cost_id,
            $regional_id,
            $cost_id,
            $level_id,
            $nominal,
            $description,
            $editable,
            $change_no,
            $creation_user_id,
            $change_user_id,
            $record_status
        );

        $result = $this->regional_cost_model->InsertRegionalCost($regional_cost_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {

            $this->session->set_flashdata('success', 'Regional Cost has been added !');
        } else {
            $this->session->set_flashdata('error', 'Regional Cost cannot added, the data has been added !');
        }

        redirect('RegionalCost');
    }

    function UpdateRegionalCost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('regional_cost_id', 'Regional Cost Id', 'required|max_length[50]|xss_clean');

        $regional_cost_id = $this->input->post('regional_cost_id_update');
        $regional_id = $this->input->post('regional_id_update');
        $cost_id = $this->input->post('cost_id_update');
        $level_id = $this->input->post('level_id_update');
        $nominal = $this->input->post('nominal_update');
        $description = $this->input->post('description_update');
        $editable = $this->input->post('editable_update');
        $change_user_id = $this->session->userdata('employee_id_update');
        $record_status = "A";



        $regional_cost_parameter = array($regional_cost_id, $regional_id, $cost_id, $level_id, $nominal, $description, $editable, $change_user_id, $record_status);

        $result = $this->regional_cost_model->UpdateRegionalCost($regional_cost_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Regional Cost updated !');
        } else {
            $this->session->set_flashdata('error', 'Regional Cost cannot update, the data has been added !');
        }
        redirect('RegionalCost');
    }


    function DeleteRegionalCost($regional_cost_id)
    {
        $regional_cost_parameter = array($regional_cost_id);

        $result = $this->regional_cost_model->DeleteRegionalCost($regional_cost_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Regional Cost has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Regional Cost cannot deleted !');
        }

        redirect('RegionalCost');
    }
}
