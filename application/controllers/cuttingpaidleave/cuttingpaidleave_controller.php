<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class cuttingpaidleave_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cuttingpaidleave/cuttingpaidleave_model');
        $this->load->model('paidleave/paidleavedatetime_model');
        $this->load->model('paidleave/paidleave_approval_model');
        $this->load->model('paidleave/paidleave_model');
        $this->load->model('master/variable_model');
        $this->load->model('master/company_model');
        $this->load->model('master/employee_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave';
        $this->loadViews("cuttingpaidleave/cuttingpaidleave", $this->global, NULL, NULL);
    }

    function GetCuttingPaidLeaveFilter()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {

            $employee_id = $this->session->userdata('employee_id');
            $companypusat = $this->input->post('companypusat');
            $company_brand_id_pusat = $this->input->post('company_brand_id_pusat');

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $paidleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $companypusat, 'p_company_brand_id' => $company_brand_id_pusat, 'p_flag' => 0);
            $data['CuttingPaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave2($paidleave_parameter);
        }


        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $company = $this->input->post('company');
            $company_brand_id_cabang = $this->input->post('company_brand_id_cabang');

            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);


            $paidleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company, 'p_company_brand_id' => $company_brand_id_cabang, 'p_flag' => 0);
            $data['CuttingPaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave2($paidleave_parameter);
        }


        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("cuttingpaidleave/cuttingpaidleave", $this->global, $data, NULL);
    }

    function GetCuttingPaidLeave()
    {

        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '5') {

            $company_parameter = array('p_company_id' => 0, 'p_flag' => 0);
            $data['CompanyInBrandPusatRecords'] = $this->company_model->GetCompany($company_parameter);

            $paidleave_parameter = array('p_employee_paid_leave_id' => 0, 'p_employee_id' => 0, 'p_paid_leave_id' => 0, 'p_flag' => 6);
            $data['CuttingPaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave($paidleave_parameter);
        }


        if ($this->session->userdata('role_id') == '2') {
            $employee_id = $this->session->userdata('employee_id');
            $company_id = $this->session->userdata('company_id');


            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 14);
            $data['CompanyInBrandRecords'] = $this->employee_model->GetEmployee($employee_parameter);

            //get company_brand_id
            $employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 15);
            $data['companybrandid'] = $this->employee_model->GetCompanyBrandId($employee_parameter);


            $paidleave_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => $company_id, 'p_company_brand_id' => $data['companybrandid'], 'p_flag' => 0);
            $data['CuttingPaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave2($paidleave_parameter);
        }


        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'KC', 'p_flag' => 1);
        $data['EmployeePaidLeaveKhususRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("cuttingpaidleave/cuttingpaidleave", $this->global, $data, NULL);
    }


    function GetCuttingPaidLeaveById($employee_paid_leave_id, $paid_leave_id, $employee_id)
    {
        // $employee_id = $this->input->post('employee_id');
        $paidleave_parameter = array('p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_employee_id' => $employee_id, 'p_paid_leave_id' => $paid_leave_id, 'p_flag' => 1);
        $data['PaidLeaveRecords'] = $this->paidleave_model->GetPaidLeave($paidleave_parameter);

        //employee paid leave
        $variable_employee_paid_leave_parameter = array('p_variable_id' => 'PL', 'p_flag' => 1);
        $data['EmployeePaidLeaveRecords'] = $this->variable_model->GetVariable($variable_employee_paid_leave_parameter);

        $paidleave_parameter = array('p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_employee_id' => $employee_id, 'p_paid_leave_id' => $paid_leave_id, 'p_flag' => 5);
        $data['EmployeeCompany'] = $this->paidleave_model->GetEmployeeCompany($paidleave_parameter);

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

        $paid_leave_approval_parameter = array('p_employee_paid_leave_approval_id' => 0, 'p_employee_id' => $employee_id, 'p_employee_paid_leave_id' => $employee_paid_leave_id, 'p_approver_id' => 0, 'p_flag' => 2);
        $data['PaidLeaveApprovalRecords'] = $this->paidleave_approval_model->GetPaidLeaveApproval($paid_leave_approval_parameter);


        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("cuttingpaidleave/cuttingpaidleave_detail", $this->global, $data, NULL);
    }

    function InsertCuttingPaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_amount = 0;
        $paid_leave_status_id = 'ST-001';
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('employee_id');
        $pic_phone_no = 0;
        $urgent_phone_no = 0;
        $change_no = 0;
        $creation_user_id = $this->session->userdata('employee_id');
        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";
        $paidleave_parameter = array($employee_id, $paid_leave_id, $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, $change_no, $creation_user_id, $change_user_id, $record_status);

        $param_employee = [
            'p_employee_id' => $employee_id,
            'p_company_id' => '',
            'p_division_id' => '',
            'p_department_id' => '',
            'p_flag' => 5,
        ];
        $result2 = $this->employee_model->GetEmployee($param_employee);
        if ($result2 > 0) {
            foreach ($result2 as $res2) {
                $remainingpaidleave =  $res2->remainingpaidleave;

                if ($remainingpaidleave > 0 && $remainingpaidleave <= 12) {

                    $this->load->model('paidleave/paidleave_model');
                    $result = $this->paidleave_model->InsertCuttingPaidLeave($paidleave_parameter);
                    $result = $this->db->affected_rows();
                    if ($result > 0) {
                        $param_paid_leave = [
                            'p_employee_paid_leave_id' => '',
                            'p_employee_id' => '',
                            'p_paid_leave_id' => '',
                            'p_flag' => 3,
                        ];
                        $result1 = $this->paidleave_model->GetPaidLeave($param_paid_leave);

                        if ($result1 > 0) {
                            foreach ($result1 as $res) {
                                $p_employee_paid_leave_id = $res->employee_paid_leave_id;
                            }
                        }
                        redirect(
                            redirect('CuttingPaidLeaveDetail/' . $p_employee_paid_leave_id . '/' . $paid_leave_id . '/' . $employee_id)
                        );
                    } else {
                        $this->session->set_flashdata('error', 'Cutting Paid Leave creation failed, the data cannot added');
                        redirect('CuttingPaidLeave');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Karyawan ini tidak memiliki cuti atau sisa cutinya habis');
                    redirect('CuttingPaidLeave');
                }
            }
        }
    }

    function UpdateCuttingPaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $company_id = $this->session->userdata('company_id');
        $company_brand_id = $this->input->post('company_brand_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_amount = $this->input->post('paid_leave_amount');
        $paid_leave_status_id = $this->input->post('paid_leave_status_id');
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array(
            $employee_paid_leave_id, $employee_id, $company_id, $company_brand_id, $paid_leave_id,
            $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, '',
            $change_user_id, $record_status, 'p_flag' => 0
        );

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->UpdatePaidLeave($paidleave_parameter);
        echo json_encode($result);
        $this->session->set_flashdata('success', 'Cutting Paid Leave Updated');
    }

    function SubmitCuttingPaidLeave()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Description', 'required|max_length[50]|xss_clean');

        $employee_paid_leave_id = $this->input->post('employee_paid_leave_id');
        $employee_id = $this->input->post('employee_id');
        $paid_leave_id = $this->input->post('paid_leave_id');
        $paid_leave_amount = $this->input->post('paid_leave_amount');
        $paid_leave_status_id = $this->input->post('paid_leave_status_id');
        $description = $this->input->post('description');
        $changer_pic = $this->input->post('changer_pic');
        $pic_phone_no = $this->input->post('pic_phone_no');
        $urgent_phone_no = $this->input->post('urgent_phone_no');

        $change_user_id = $this->session->userdata('employee_id');
        $record_status = "A";

        $paidleave_parameter = array(
            $employee_paid_leave_id, $employee_id, '', '', $paid_leave_id,
            $paid_leave_amount, $paid_leave_status_id, $description, $changer_pic, $pic_phone_no, $urgent_phone_no, '',
            $change_user_id, $record_status, 'p_flag' => 6
        );

        $this->load->model('paidleave/paidleave_model');
        $result = $this->paidleave_model->UpdatePaidLeave($paidleave_parameter);
        echo json_encode($result);

        //$this->load->model('master/employee_model');
        //$employee_parameter = array('p_employee_id' => $employee_id, 'p_company_id' => 0, 'p_division_id' => 0, 'p_department_id' => 0, 'p_flag' => 6);
        //$data['EmployeeRecords'] = $this->employee_model->GetEmployeeForNotif($employee_parameter);

        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'it.psdjkt@gmail.com',
        //     'smtp_pass'   => 'nwnpmqsdrxdecvxq',
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ];

        // $this->load->library('email', $config);
        // $this->email->from('it.psdjkt@gmail.com', 'Persada Group');
        // $this->email->to($data['EmployeeRecords']->email);
        // $this->email->subject('No Reply - Pemberitahuan Pemotongan Cuti');
        // $this->email->message(
        //     "Kepada Yth : Bpk/Ibu " . " <b>" . $data['EmployeeRecords']->employee_name . "</b>" .
        //         "<br /> " .
        //         "<br /> " .
        //         "Email ini merupakan email pemberitahuan bahwa cuti Bapak/Ibu telah dipotong dikarenakan tidak hadir tanpa alasan yang jelas, dengan nomor cuti : " . $employee_paid_leave_id .
        //         "<br /> " .
        //         "<br /> " .
        //         "<br />Terimakasih " .
        //         "<br /><b>Team HRD Persada Group</b>"
        // );
        // $this->email->send();
        $this->session->set_flashdata('success', 'Cutting Paid Leave Submitted');
    }

    function DeleteCuttingPaidLeave($employee_paid_leave_id)
    {
        $paidleave_parameter = array($employee_paid_leave_id);
        $result = $this->paidleave_model->DeletePaidLeave($paidleave_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Cutting Paid Leave has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Cutting Paid Leave cannot deleted !');
        }
        redirect('CuttingPaidLeave');
    }
}
