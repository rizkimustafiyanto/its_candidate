<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class paidleave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('paidleave/paidleavedatetime_model');
        $this->load->model('paidleave/paidleave_approval_model');
        $this->load->model('master/variable_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave';
        $this->loadViews("paidleave/paidleave", $this->global, NULL, NULL);
    }

    function GetPaidLeave()
    {

        $this->load->model('paidleave/paidleave_model');
        $employee_id = $this->session->userdata('employee_id');
        $paidleave_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => $employee_id, 'p_paid_leave_id' => 0, 'p_flag' => 4);
        $data['PaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave($paidleave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $company_id = $this->session->userdata('company_id');
        $division_id = $this->session->userdata('division_id');
        $department_id = $this->session->userdata('department_id');
        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => '0', 'p_company_id' => $company_id, 'p_division_id' => $division_id, 'p_department_id' => $department_id, 'p_flag' => 3);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("paidleave/paidleave", $this->global, $data, NULL);
    }


    function GetPaidLeaveById($employee_paid_leave_id, $paid_leave_id, $employee_id)
    {
        // $employee_id = $this->input->post('employee_id');
        $paidleave_parameter = array('p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_employee_id' => $employee_id, 'p_paid_leave_id' => $paid_leave_id, 'p_flag' => 1);
        $data['PaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave($paidleave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $paidleave_parameter = array('p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_employee_id' => $employee_id, 'p_paid_leave_id' => $paid_leave_id, 'p_flag' => 5);
        $data['EmployeeCompany'] = $this->paidleave_model->GetEmployeeCompany($paidleave_parameter);

        // $company_id = $this->session->userdata('company_id');
        // $division_id = $this->session->userdata('division_id');
        // $department_id = $this->session->userdata('department_id');
        $this->load->model('master/employee_model');
        $employee_parameter = array('p_employee_id' => '0', 'p_company_id' => $data['EmployeeCompany'], 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 3);
        $data['EmployeeRecords'] = $this->employee_model->GetEmployee($employee_parameter);

        // Paid Leave Date Time
        $paid_leave_datetime_parameter = array('p_employee_paid_leave_datetime_id' => 0, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_flag' => 0);
        $data['PaidLeaveDateTimeRecords'] = $this->paidleavedatetime_model->GetPaidLeaveDateTime($paid_leave_datetime_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //Status
        $variable_status_parameter = array('p_variable_id' => 'AOP', 'p_flag' => 1);
        $data['PaidLeaveApprovalStatusRecords'] = $this->variable_model->GetVariable($variable_status_parameter);

        $employee_id = $this->session->userdata('employee_id');
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['PaidLeaveApprovalRecords'] = $this->paidleave_approval_model->GetPaidLeaveApproval($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 4);
        $data['PaidLeaveApproval1Records'] = $this->paidleave_approval_model->GetPaidLeaveApproval1($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['PaidLeaveApprovalEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveApprovalEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 6);
        $data['PaidLeaveRequesterEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterEmail($paid_leave_approval_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("paidleave/paidleave_detail", $this->global, $data, NULL);
    }

    function InsertPaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_sub_id = $this->input->post('paid_leave_sub_id');

        if ($paid_leave_id != 'PL-001') {
            $paid_leave_id = $paid_leave_sub_id;
        }

        $paid_leave_amount = 0;
        $paid_leave_status_id = 'ST-001';
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $paidleave_parameter = array($employee_id, $paid_leave_id, $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, $change_no, $creation_user_id, $change_user_id, $record_status);

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->InsertPaidLeave($paidleave_parameter);

        if ($result > 0) {
            $param_paid_leave = [
                'p_employee_paid_leave_id' => '',
                'p_flag' => 3,
                'p_employee_id' => '',
                'p_paid_leave_id' => '',
            ];
            $result1 = $this->paidleave_model->GetPaidLeave($param_paid_leave);
            if ($result1 > 0) {
                foreach ($result1 as $res) {
                    $p_employee_paid_leave_id = $res->employee_paid_leave_id;
                }
            }
            redirect(
                redirect('PaidLeaveDetail/' . $p_employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id)
            );
        } else {
            $this->session->set_flashdata('error', 'Paid Leave Request creation failed, the data cannot added');
            redirect('PaidLeave');
        }
    }

    function UpdatePaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_name2 = $this->input->post('paid_leave_name2');

        if ($paid_leave_name2 == 'PL-002') {
            $paid_leave_id = $paid_leave_id;
        } else {
            $paid_leave_id = $paid_leave_name2;
        }

        $paid_leave_amount = $this->input->post('paid_leave_amount');
        $paid_leave_status_id = $this->input->post('paid_leave_status_id');
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array($employee_paid_leave_id, $employee_id, $company_id, $company_brand_id, $paid_leave_id, $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, '',  $change_user_id, $record_status, 'p_flag' => 0);

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->UpdatePaidLeave($paidleave_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'Paid Leave Request Updated');
    }

    function UpdatePaidLeaveStatus()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_name2 = $this->input->post('paid_leave_name2');

        if ($paid_leave_name2 == 'PL-002') {
            $paid_leave_id = $paid_leave_id;
        } else {
            $paid_leave_id = $paid_leave_name2;
        }


        $paid_leave_amount = $this->input->post('paid_leave_amount');
        $paid_leave_status_id = $this->input->post('paid_leave_status_id');
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array($employee_paid_leave_id, $employee_id, $company_id, $company_brand_id, $paid_leave_id, $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, $change_user_id, $record_status, 'p_flag' => 1);

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->UpdatePaidLeave($paidleave_parameter);
        echo json_encode($result);
    }

    function SubmitPaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_name2 = $this->input->post('paid_leave_name2');

        if ($paid_leave_name2 == 'PL-002') {
            $paid_leave_id = $paid_leave_id;
        } else {
            $paid_leave_id = $paid_leave_name2;
        }
        $paid_leave_amount = $this->input->post('paid_leave_amount');
        $paid_leave_status_id = $this->input->post('paid_leave_status_id');
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array($employee_paid_leave_id, $employee_id, $company_id, $company_brand_id, $paid_leave_id, $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic,  $pic_phone_no, $urgent_phone_no, '',  $change_user_id, $record_status, 'p_flag' => 3);

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->UpdatePaidLeave($paidleave_parameter);
        echo json_encode($result);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 5);
        $data['PaidLeaveApprovalEmailRecords'] = $this->paidleave_approval_model->GetPaidLeaveApprovalEmail($paid_leave_approval_parameter);

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 7);
        $data['PaidLeaveRequesterNameRecords'] = $this->paidleave_approval_model->GetPaidLeaveRequesterName($paid_leave_approval_parameter);

        //approver name
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 8);
        $data['ApproverName'] = $this->paidleave_approval_model->GetPaidLeaveApproverName($paid_leave_approval_parameter);

        //paid leave details
        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 9);
        $data['PaidLeaveDetails'] = $this->paidleave_approval_model->GetPaidLeaveDetails($paid_leave_approval_parameter);

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'it.psdjkt@gmail.com',  // Email gmail
            'smtp_pass'   => 'nwnpmqsdrxdecvxq',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->from('it.psdjkt@gmail.com', 'Persada Group');
        $this->email->to($data['PaidLeaveApprovalEmailRecords']);
        $this->email->subject('No Reply - Approval Paid Leave Request');
        $this->email->message(
            " Kepada Yth : Bpk/Ibu " . " <b>" . $data['ApproverName'] . "</b>" .
                "<br /> " .
                "<br /> Mohon atas approval Paid Leave Request, dengan detail : " .
                "<br /> " .
                "<br /> Document No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $employee_paid_leave_id .
                "<br />Requester Name &nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveRequesterNameRecords'] .
                "<br />Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_name .
                "<br />Jumlah Cuti &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     :&nbsp;" . $data['PaidLeaveDetails']->paid_leave_amount . "&nbsp; hari" .
                "<br />Mulai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        :&nbsp;" . $data['PaidLeaveDetails']->start_date .
                "<br />Sampai &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->finish_date .
                "<br />Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;      :&nbsp;" . $data['PaidLeaveDetails']->description .
                "<br /> " .
                "<br />Terimakasih " .
                "<br /><b>Team HRD Persada Group</b>"
        );
        $this->email->send();
        $this->session->set_flashdata('success', 'Paid Leave Request Submitted');
    }

    function DeletePaidLeave($employee_paid_leave_id)
    {
        $paidleave_parameter = array($employee_paid_leave_id);
        $result = $this->paidleave_model->DeletePaidLeave($paidleave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Paid Leave request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Paid Leave request cannot deleted !');
        }
        redirect('PaidLeave');
    }

    function RequestCanceled()
    {
        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $paid_leave_status_id = 'ST-006';
        $reason_canceled = $this->input->post('reason_canceled');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array($employee_paid_leave_id, $employee_id, $company_id, $company_brand_id, '', '', $paid_leave_status_id, '', '', '', '', $reason_canceled, $change_user_id, $record_status, 'p_flag' => 4);

        $this->load->model('paidleave/paidleave_approval_model');
        $this->paidleave_model->RequestCanceled($paidleave_parameter);
        $this->session->set_flashdata('success', 'Request Canceled submited !');

        redirect('PaidLeaveDetail/' . $employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id);
    }
}
