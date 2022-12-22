<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Employee (EmployeeController)
 * Employee Class to control all employee related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class dashboard_employee_controller extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('dashboard/dashboard_employee_model');
        $this->load->model('attendance/attendance_history_model');


        $this->IsLoggedIn();
    }

    /**
     * This function used to load the first screen of the employee
     */
    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        $employee_id = $this->session->userdata('employee_id');
        $count_paid_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 0);
        $data['CountPaidLeave'] = $this->dashboard_employee_model->GetCountPaidLeave($count_paid_leave_parameter);
        $count_sick_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 1);
        $data['CountSickLeave'] = $this->dashboard_employee_model->GetCountSickLeave($count_sick_leave_parameter);
        $count_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 2);
        $data['CountLeave'] = $this->dashboard_employee_model->GetCountLeave($count_leave_parameter);
        $count_overtime_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 3);
        $data['CountOvertime'] = $this->dashboard_employee_model->GetCountOvertime($count_overtime_parameter);

        $amount_paid_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 4);
        $data['AmountPaidLeave'] = $this->dashboard_employee_model->GetAmountPaidLeave($amount_paid_leave_parameter);

        $taken_paid_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 5);
        $data['TakenPaidLeave'] = $this->dashboard_employee_model->GetTakenPaidLeave($taken_paid_leave_parameter);

        $remaining_paid_leave_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 6);
        $data['RemainingPaidLeave'] = $this->dashboard_employee_model->GetRemainingPaidLeave($remaining_paid_leave_parameter);

        //PAID LEAVE
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 7);
        $data['PLDraft'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 8);
        $data['PLWaitApproval'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 9);
        $data['PLApproved'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 10);
        $data['PLRejected'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);

        //SICK LEAVE
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 11);
        $data['SLDraft'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 12);
        $data['SLWaitApproval'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 13);
        $data['SLApproved'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 14);
        $data['SLRejected'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);

        //REGULAR LEAVE
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 15);
        $data['LVDraft'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 16);
        $data['LVWaitApproval'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 17);
        $data['LVApproved'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 18);
        $data['LVRejected'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);

        //OVERTIME
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 19);
        $data['OTDraft'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 20);
        $data['OTWaitApproval'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 21);
        $data['OTApproved'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 22);
        $data['OTRejected'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);
        $grafik_employee_parameter = array('p_employee_id' => $employee_id, 'p_flag' => 23);
        $data['OTClosed'] = $this->dashboard_employee_model->GetDataGrafikEmployee($grafik_employee_parameter);

        $employee_id = $this->session->userdata('employee_id');
        $attendance_history_parameter = array('p_attendance_id' => 0, 'p_employee_id' => $employee_id, 'p_date_1' => 0, 'p_date_2' => 0, 'p_flag' => 1);
        $data['AttendanceRecords'] = $this->attendance_history_model->GetAttendanceHistory($attendance_history_parameter);


        $this->loadViews("dashboard/dashboard_employee", $this->global, $data, NULL);
    }



    /**
     * This function is used to load the employee list
     */
    function employeeListing()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('employee_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->employee_model->employeeListingCount($searchText);
            $returns = $this->paginationCompress("employeeListing/", $count, 5);
            $data['employeeRecords'] = $this->employee_model->employeeListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'CodeInsect : Employee Listing';
            $this->loadViews("employee", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->model('employee_model');
            $data['roles'] = $this->employee_model->getEmployeerRoles();

            $this->global['pageTitle'] = 'CodeInsect : Add New Employee';

            $this->loadViews("addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $employeeId = $this->input->post("employeeId");
        $email = $this->input->post("email");

        if (empty($employeeId)) {
            $result = $this->employee_model->checkEmailExists($email);
        } else {
            $result = $this->employee_model->checkEmailExists($email, $employeeId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }

    /**
     * This function is used to add new employee to the system
     */
    function addNewEmployee()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');

            if ($this->form_validation->run() == FALSE) {
                $this->addNew();
            } else {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $role_idId = $this->input->post('role');

                $employeeInfo = array(
                    'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $role_idId, 'name' => $name,
                    'createdBy' => $this->employee_id, 'createdDtm' => date('Y-m-d H:i:s')
                );

                $this->load->model('employee_model');
                $result = $this->employee_model->addNewEmployee($employeeInfo);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'New Employee created successfully');
                } else {
                    $this->session->set_flashdata('error', 'Employee creation failed');
                }

                redirect('addNew');
            }
        }
    }


    /**
     * This function is used load employee edit information
     * @param number $employeeId : Optional : This is employee id
     */
    function editOld($employeeId = NULL)
    {
        if ($this->isAdmin() == TRUE || $employeeId == 1) {
            $this->loadThis();
        } else {
            if ($employeeId == null) {
                redirect('employeeListing');
            }

            $data['roles'] = $this->employee_model->getEmployeeRoles();
            $data['employeeInfo'] = $this->employee_model->getEmployeeInfo($employeeId);

            $this->global['pageTitle'] = 'CodeInsect : Edit Employee';

            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the employee information
     */
    function editEmployee()
    {
        if ($this->isAdmin() == TRUE) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');

            $employeeId = $this->input->post('employeeId');

            $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|max_length[20]');
            $this->form_validation->set_rules('role', 'Role', 'trim|required|numeric');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|xss_clean');

            if ($this->form_validation->run() == FALSE) {
                $this->editOld($employeeId);
            } else {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $role_idId = $this->input->post('role');
                $mobile = $this->input->post('mobile');

                $employeeInfo = array();

                if (empty($password)) {
                    $employeeInfo = array(
                        'email' => $email, 'roleId' => $role_idId, 'name' => $name,
                        'mobile' => $mobile, 'updatedBy' => $this->employee_id, 'updatedDtm' => date('Y-m-d H:i:s')
                    );
                } else {
                    $employeeInfo = array(
                        'email' => $email, 'password' => getHashedPassword($password), 'roleId' => $role_idId,
                        'name' => ucwords($name), 'mobile' => $mobile, 'updatedBy' => $this->employee_id,
                        'updatedDtm' => date('Y-m-d H:i:s')
                    );
                }

                $result = $this->employee_model->editEmployee($employeeInfo, $employeeId);

                if ($result == true) {
                    $this->session->set_flashdata('success', 'Employee updated successfully');
                } else {
                    $this->session->set_flashdata('error', 'Employee updation failed');
                }

                redirect('employeeListing');
            }
        }
    }


    /**
     * This function is used to delete the employee using employeeId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteEmployee()
    {
        if ($this->isAdmin() == TRUE) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $employeeId = $this->input->post('employeeId');
            $employeeInfo = array('isDeleted' => 1, 'updatedBy' => $this->employee_id, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->employee_model->deleteEmployee($employeeId, $employeeInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'CodeInsect : Change Password';

        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }


    /**
     * This function is used to change the password of the employee
     */
    function changePassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->loadChangePass();
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->employee_model->matchOldPassword($this->employee_id, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            } else {
                $employeeData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->employee_id,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->employee_model->changePassword($this->employee_id, $employeeData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}
