<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class cost_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/cost_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Cost';
        $this->loadViews("master/cost", $this->global, NULL, NULL);
    }

    function GetCost()
    {
        $cost_parameter = array('p_cost_id' => 0, 'p_flag' => 0);
        $data['CostRecords'] = $this->cost_model->GetCost($cost_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Cost Listing';
        $this->loadViews("master/cost", $this->global, $data, NULL);
    }

    function GetCostById($cost_id, $flag)
    {
        $cost_parameter = array($cost_id, $flag);
        $data['CostRecords'] = $this->cost_model->GetCost($cost_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Cost Listing';
        $this->loadViews("master/cost", $this->global, $data, NULL);
    }

    function InsertCost()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_name', 'Cost Name', 'required|xss_clean');

        $cost_name = $this->input->post('cost_name');
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $cost_parameter = array($cost_name, $description, $change_no, $creation_user_id, $change_user_id, $record_status);

        $result = $this->cost_model->InsertCost($cost_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Cost has been added !');
        } else {
            $this->session->set_flashdata('error', 'Cost cannot added !');
        }

        redirect('Cost');
    }


    function UpdateCost()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cost_id', 'Cost Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('cost_name', 'Cost Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $cost_id = $this->input->post('cost_id_update');
        $cost_name = $this->input->post('cost_name_update');
        $description = $this->input->post('description_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $cost_parameter = array($cost_id, $cost_name, $description, $change_user_id, $record_status);
        $result = $this->cost_model->UpdateCost($cost_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Cost updated !');
        } else {
            $this->session->set_flashdata('error', 'Cost cannot update !');
        }

        redirect('Cost');
    }

    function DeleteCost($cost_id)
    {
        $cost_parameter = array($cost_id);

        $result = $this->cost_model->DeleteCost($cost_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Cost has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Cost cannot deleted !');
        }

        redirect('Cost');
    }

    function GetNominalByCostLevelTujuan()
    {

        $cost_id = $this->input->post('cost_id'); //receiving the ajax post from view
        $level_id = $this->input->post('level_id');
        $regional_id = $this->input->post('regional_id');

        $cost_parameter =
            array('p_cost_id' => $cost_id, 'p_level_id' => $level_id, 'p_regional_id' => $regional_id);
        $records =  $this->cost_model->GetNominalByCostLevelTujuan($cost_parameter);

        echo json_encode($records);
    }
}
