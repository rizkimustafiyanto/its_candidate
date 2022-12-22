<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Employee (EmployeeController)
 * Employee Class to control all employee related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class dashboard_admin_controller extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        $this->load->model('dashboard/dashboard_admin_model');

        $this->IsLoggedIn();
    }

    /**
     * This function used to load the first screen of the employee
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        $count_paid_leave_parameter = array('p_employee_id' => 0, 'p_flag' => 0);
        $data['CountPaidLeave'] = $this->dashboard_admin_model->GetCountPaidLeave($count_paid_leave_parameter);
        $count_sick_leave_parameter = array('p_employee_id' => 0, 'p_flag' => 1);
        $data['CountSickLeave'] = $this->dashboard_admin_model->GetCountSickLeave($count_sick_leave_parameter);
        $count_leave_parameter = array('p_employee_id' => 0, 'p_flag' => 2);
        $data['CountLeave'] = $this->dashboard_admin_model->GetCountLeave($count_leave_parameter);
        $count_overtime_parameter = array('p_employee_id' => 0, 'p_flag' => 3);
        $data['CountOvertime'] = $this->dashboard_admin_model->GetCountOvertime($count_overtime_parameter);

        //paid leave
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 4);
        $data['January'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 5);
        $data['February'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 6);
        $data['March'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 7);
        $data['April'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 8);
        $data['May'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 9);
        $data['June'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 10);
        $data['July'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 11);
        $data['August'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 12);
        $data['September'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 13);
        $data['October'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 14);
        $data['November'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 15);
        $data['December'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);


        //sick leave
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 16);
        $data['SLJanuary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 17);
        $data['SLFebruary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 18);
        $data['SLMarch'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 19);
        $data['SLApril'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 20);
        $data['SLMay'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 21);
        $data['SLJune'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 22);
        $data['SLJuly'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 23);
        $data['SLAugust'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 24);
        $data['SLSeptember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 25);
        $data['SLOctober'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 26);
        $data['SLNovember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 27);
        $data['SLDecember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);


        //regular leave
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 28);
        $data['LVJanuary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 29);
        $data['LVFebruary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 30);
        $data['LVMarch'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 31);
        $data['LVApril'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 32);
        $data['LVMay'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 33);
        $data['LVJune'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 34);
        $data['LVJuly'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 35);
        $data['LVAugust'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 36);
        $data['LVSeptember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 37);
        $data['LVOctober'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 38);
        $data['LVNovember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 39);
        $data['LVDecember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);

        //OVERTIME leave
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 40);
        $data['OTJanuary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 41);
        $data['OTFebruary'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 42);
        $data['OTMarch'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 43);
        $data['OTApril'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 44);
        $data['OTMay'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 45);
        $data['OTJune'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 46);
        $data['OTJuly'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 47);
        $data['OTAugust'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 48);
        $data['OTSeptember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 49);
        $data['OTOctober'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 50);
        $data['OTNovember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);
        $grafik_admin_parameter = array('p_employee_id' => 0, 'p_flag' => 51);
        $data['OTDecember'] = $this->dashboard_admin_model->GetDataGrafikAdmin($grafik_admin_parameter);

        $this->loadViews("dashboard/dashboard_admin", $this->global, $data, NULL);
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
