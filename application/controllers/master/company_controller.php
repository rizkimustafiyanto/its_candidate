<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class company_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/company_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Company';
        $this->loadViews("master/company", $this->global, NULL, NULL);
    }

    function GetCompany()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->model('master/company_model');
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Company Listing';
        $this->loadViews("master/company", $this->global, $data, NULL);
        // }
    }

    function GetCompanyById($company_id, $flag)
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->model('master/company_model');
        $company_parameter = array($company_id, $flag);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : company Listing';
        $this->loadViews("master/company", $this->global, $data, NULL);
        // }
    }

    function InsertCompany()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        // $this->form_validation->set_rules('company_id', 'company Id', 'required|max_length[50]|xss_clean');
        // $this->form_validation->set_rules('company_initial', 'Company Initial', 'required|is_unique[gm.company.company_initial]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_initial', 'Company Initial', 'required|is_unique[gm.company.company_initial]');
        $this->form_validation->set_rules('company_name', 'company Name', 'required|max_length[50]|xss_clean');

        $company_id = $this->input->post('company_id');
        $company_initial = $this->input->post('company_initial');
        $company_name = $this->input->post('company_name');
        $phone_no = $this->input->post('phone_no');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $description = $this->input->post('description');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $company_parameter = array($company_id, $company_initial, $company_name, $phone_no, $email, $address, $description, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/company_model');
        $result = $this->company_model->InsertCompany($company_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company has been added !');
        } else {
            $this->session->set_flashdata('error', 'Company cannot added !');
        }

        redirect('Company');
        // }
    }


    function UpdateCompany()
    {
        // if ($this->isAdmin() == TRUE) {
        //     $this->loadThis();
        // } else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('phone_no', 'Phone No', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $company_id = $this->input->post('company_id_update');
        $company_name = $this->input->post('company_name_update');
        $phone_no = $this->input->post('phone_no_update');
        $email = $this->input->post('email_update');
        $address = $this->input->post('address_update');
        $description = $this->input->post('description_update');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $company_parameter = array($company_id, $company_name, $phone_no, $email, $address, $description, $change_user_id, $record_status);

        $this->load->model('master/company_model');
        $result = $this->company_model->Updatecompany($company_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company updated !');
        } else {
            $this->session->set_flashdata('error', 'Company cannot update !');
        }

        redirect('Company');
        // }
    }

    function DeleteCompany($company_id)
    {
        $company_parameter = array($company_id);

        $result = $this->company_model->DeleteCompany($company_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'company has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'company cannot deleted !');
        }

        redirect('Company');
    }
}
