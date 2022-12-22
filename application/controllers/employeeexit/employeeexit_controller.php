<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class employeeexit_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('noticeletter/noticeletter_model');
        $this->load->model('master/company_model');
        $this->load->model('master/variable_model');
        $this->load->model('employeeexit/employeeexit_model');
        $this->load->helper(array('url', 'download'));


        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Employee Exit';
        $this->loadViews("noticeletter/noticeletter", $this->global, NULL, NULL);
    }

    function GetEmployeeExit()
    {

        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => 0, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 8);
        $data['EmployeeExitRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //variable
        $resign_status_parameter = array('p_variable_id' => 'RS', 'p_flag' => 1);
        $data['ResignStatusRecords'] = $this->variable_model->GetVariable($resign_status_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("employeeexit/employeeexit", $this->global, $data, NULL);
    }

    function InsertEmployeeExit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $resign_status = $this->input->post('resign_status');
        $employee_exit_reason = $this->input->post('employee_exit_reason');
        $employee_exit_date = date('Y-m-d', strtotime($this->input->post('employee_exit_date')));
        $employee_exit_no = $this->input->post('employee_exit_no');
        $employee_exit_url = $this->input->post('employee_exit_url');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $employee_exit_url = $employee_exit_no . '-' . time() . '.' . $fileExt;
        } else {
            $employee_exit_url = "";
        }
        // $notice_letter_type  = $fileExt;

        $employee_exit_parameter = array($employee_id, $resign_status, $employee_exit_reason,  $employee_exit_date, $employee_exit_no, $employee_exit_url, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $employee_exit_no . '-' . time();
            $config['overwrite']      = true;
            $config['max_size']       = 100000;
            $config['max_width']      = 10000;
            $config['max_height']     = 10000;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', 'Attachment cannot upload, please select with correct type file !');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $result = $this->employeeexit_model->InsertEmployeeExit($employee_exit_parameter);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Employee Exit has been created !');
                } else {
                    $this->session->set_flashdata('error', 'Employee Exit cannot created !');
                }
            }
        }
        redirect('EmployeeExit');
    }

    function UpdateEmployeeExit()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $resign_status = $this->input->post('resign_status');
        $employee_exit_reason = $this->input->post('employee_exit_reason');
        $employee_exit_date = date('Y-m-d', strtotime($this->input->post('employee_exit_date')));
        $employee_exit_no = $this->input->post('employee_exit_no');
        $employee_exit_url = $this->input->post('employee_exit_url');
        $change_user_id = $this->session->userdata('employee_id');

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $employee_exit_url = $employee_exit_no . '-' . time() . '.' . $fileExt;
        } else {
            $employee_exit_url = $employee_exit_url;
        }

        $employee_exit_parameter = array($employee_id, $resign_status, $employee_exit_reason,  $employee_exit_date, $employee_exit_no, $employee_exit_url, $change_user_id);

        $result = $this->employeeexit_model->UpdateEmployeeExit($employee_exit_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Employee Exit updated !');
        } else {
            $this->session->set_flashdata('error', 'Employee Exit cannot update !');
        }

        if ($result > 0) {
            if ($fileExt != "") {
                $config['upload_path']    = './upload/';
                $config['allowed_types']  = 'gif|jpg|jpeg|png|pdf';
                $config['file_name']      = $employee_exit_no . '-' . time();
                $config['overwrite']      = true;
                $config['max_size']       = 100000;
                $config['max_width']      = 10000;
                $config['max_height']     = 10000;

                $this->load->library('upload', $config);
                //$this->upload->do_upload('image');

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', 'image cannot upload');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    $this->session->set_flashdata('success', 'image has been upload');
                }
            }

            if ($resign_status == 'RS-001') {
                $path = './upload/' . $employee_exit_url;
                unlink($path);
            }
            $this->session->set_flashdata('success', 'Employee Exit has been updated !');
        } else {
            $this->session->set_flashdata('error', 'Employee Exit cannot updated !');
        }

        redirect('EmployeeExit');
    }

    function DownloadEmployeeExit($employee_exit_url)
    {
        force_download('./upload/' . $employee_exit_url, NULL);
        redirect('EmployeeExit');
    }

    function upload($employee_exit_url)
    {
        $file = file_get_contents('./upload/' . $employee_exit_url);
        header('Content-Type: application/pdf');
        @readfile($file);
    }
}
