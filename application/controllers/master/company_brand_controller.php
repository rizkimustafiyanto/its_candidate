<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class company_brand_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/company_brand_model');
        $this->load->model('master/company_model');
        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Company Brand';
        $this->loadViews("master/company_brand", $this->global, NULL, NULL);
    }

    function GetCompanyBrand()
    {
        $this->load->model('master/company_brand_model');
        $company_brand_parameter = array('p_company_brand_id' => 0, 'p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyBrandRecords'] = $this->company_brand_model->GetCompanyBrand($company_brand_parameter);
        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);
        $this->global['pageTitle'] = 'CodeInsect : Company Brand Listing';
        $this->loadViews("master/company_brand", $this->global, $data, NULL);
    }



    function InsertCompanyBrand()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_brand_name', 'Company Brand Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');

        $company_brand_id = $this->input->post('company_brand_id');
        $company_brand_name = $this->input->post('company_brand_name');
        $company_id = $this->input->post('company_id');
        $bank = $this->input->post('bank');
        $no_rekening = $this->input->post('no_rekening');
        $nama_rekening = $this->input->post('nama_rekening');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $company_brand_parameter = array($company_brand_id, $company_id, $company_brand_name, $bank, $no_rekening, $nama_rekening, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('master/company_brand_model');
        $result = $this->company_brand_model->InsertCompanyBrand($company_brand_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Brand has been added !');
        } else {
            $this->session->set_flashdata('error', 'Company Brand cannot added !');
        }

        redirect('CompanyBrand');
    }

    function UpdateCompanyBrand()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company_brand_name', 'Company Brand Name', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_id', 'Company Id', 'required|max_length[50]|xss_clean');
        $this->form_validation->set_rules('company_brand_id', 'Company Brand Id', 'required|max_length[50]|xss_clean');

        $company_brand_id = $this->input->post('company_brand_id_update');
        $company_brand_name = $this->input->post('company_brand_name_update');
        $company_id = $this->input->post('company_id_update');
        $change_user_id = $this->session->userdata('employee_id');
        $bank = $this->input->post('bank_update');
        $no_rekening = $this->input->post('no_rekening_update');
        $nama_rekening = $this->input->post('nama_rekening_update');
        $record_status = "A";
        $company_brand_parameter = array($company_brand_id, $company_brand_name, $company_id, $bank, $no_rekening, $nama_rekening, $change_user_id, $record_status);

        $this->load->model('master/company_brand_model');
        $result = $this->company_brand_model->UpdateCompanyBrand($company_brand_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Brand Updated');
        } else {
            $this->session->set_flashdata('error', 'Company Brand Cannot Update');
        }

        redirect('CompanyBrand');
    }

    function DeleteCompanyBrand($company_brand_id)
    {
        $company_brand_parameter = array($company_brand_id);

        $result = $this->company_brand_model->DeleteCompanyBrand($company_brand_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Company Brand has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Company Brand cannot deleted !');
        }

        redirect('CompanyBrand');
    }

    function GetCompanyBrandByCompanyId()
    {

        $company_id = $this->input->post('company_id');

        $company_brand_parameter =
            array('p_company_brand_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 2);
        $records =  $this->company_brand_model->GetCompanyBrand($company_brand_parameter);

        echo json_encode($records);
    }

    function GetCompanyBrandByCompanyId2()
    {

        $company_id = $this->input->post('company_id_update');

        $company_brand_parameter =
            array('p_company_brand_id' => 0, 'p_company_id' => $company_id, 'p_flag' => 2);
        $records =  $this->company_brand_model->GetCompanyBrand($company_brand_parameter);

        echo json_encode($records);
    }


    function GetCompanyBrandByCompanyId3()
    {

        $company = $this->input->post('company');
        $employee_id = $this->session->userdata('employee_id');

        $company_brand_parameter =
            array('p_company_brand_id' => 0, 'p_employee_id' => $employee_id, 'p_company_id' => $company, 'p_flag' => 0);
        $records =  $this->company_brand_model->GetCompanyBrand2($company_brand_parameter);

        echo json_encode($records);
    }

    function GetCompanyBrandByCompanyId4()
    {

        $companypusat = $this->input->post('companypusat');

        $company_brand_parameter =
            array('p_company_brand_id' => 0, 'p_employee_id' => 0, 'p_company_id' => $companypusat, 'p_flag' => 1);
        $records =  $this->company_brand_model->GetCompanyBrand2($company_brand_parameter);

        echo json_encode($records);
    }

    function GetCompanyBrandByCompanyId5()
    {

        $company = $this->input->post('company_id_2');
        $employee_id = $this->session->userdata('employee_id');

        $company_brand_parameter =
            array('p_company_brand_id' => 0, 'p_employee_id' => $employee_id, 'p_company_id' => $company, 'p_flag' => 0);
        $records =  $this->company_brand_model->GetCompanyBrand2($company_brand_parameter);

        echo json_encode($records);
    }
}
