<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class noticeletter_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('noticeletter/noticeletter_model');
        $this->load->model('master/company_model');
        $this->load->model('master/variable_model');
        $this->load->helper(array('url', 'download'));

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Notice Letter';
        $this->loadViews("noticeletter/noticeletter", $this->global, NULL, NULL);
    }

    function GetNoticeLetter()
    {

        $employee_notice_letter_parameter = array('p_employee_notice_letter_id' => 0, 'p_employee_id' => '0', 'p_flag' => 1);
        $data['EmployeeNoticeLetterRecords'] = $this->noticeletter_model->GetNoticeLetter($employee_notice_letter_parameter);

        $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
        $data['CompanyRecords'] = $this->company_model->GetCompany($company_parameter);

        //variable
        $variable_notice_letter_type_parameter = array('p_variable_id' => 'NL', 'p_flag' => 1);
        $data['NoticeLetterTypeRecords'] = $this->variable_model->GetVariable($variable_notice_letter_type_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("noticeletter/noticeletter", $this->global, $data, NULL);
    }

    function InsertNoticeLetter()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $notice_letter_id = $this->input->post('notice_letter_id');
        $notice_letter_no = $this->input->post('notice_letter_no');
        $notice_reason = $this->input->post('notice_reason');
        $notice_letter_date = date('Y-m-d', strtotime($this->input->post('notice_letter_date')));
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if ($fileExt != "") {
            $notice_letter_url = $notice_letter_no . '-' . time() . '.' . $fileExt;
        } else {
            $notice_letter_url = "";
        }
        $notice_letter_type  = $fileExt;

        $employee_notice_letter_parameter = array($employee_id, $notice_letter_id, $notice_letter_no,  $notice_letter_type, $notice_letter_url, $notice_reason, $notice_letter_date, $change_no, $creation_user_id, $change_user_id, $record_status);

        if ($fileExt != "") {
            $config['upload_path']    = './upload/';
            $config['allowed_types']  = 'jpeg|jpg|png|pdf';
            $config['file_name']      = $notice_letter_no . '-' . time();
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
                $this->load->model('noticeletter/noticeletter_model');
                $result = $this->noticeletter_model->InsertNoticeLetter($employee_notice_letter_parameter);
                $result = $this->db->affected_rows();
                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Notice Letter has been created !');
                } else {
                    $this->session->set_flashdata('error', 'Notice Letter cannot created !');
                }
            }
        }
        redirect('NoticeLetter');
    }

    function DeleteNoticeLetter($employee_notice_letter_id, $notice_letter_url)
    {
        $employee_notice_letter_parameter = array($employee_notice_letter_id);

        $result = $this->noticeletter_model->DeleteNoticeLetter($employee_notice_letter_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Attachment has been deleted !');
            $path = './upload/' . $notice_letter_url;
            unlink($path);
        } else {
            $this->session->set_flashdata('error', 'Attachment cannot deleted !');
        }
        redirect('NoticeLetter');
    }

    function DownloadNoticeLetter($notice_letter_url, $employee_id)
    {
        force_download('./upload/' . $notice_letter_url, NULL);
        redirect('NoticeLetter');
    }

    function upload($notice_letter_url)
    {
        $file = file_get_contents('./upload/' . $notice_letter_url);
        header('Content-Type: application/pdf');
        @readfile($file);
    }
}
