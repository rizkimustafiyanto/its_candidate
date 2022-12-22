<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function Login($login_parameter, $password)
    {
        // $this->db->select('u.employee_id, u.password, u.employee_name, r.role_id, r.role_name');
        // $this->db->from('gm_employee as u');
        // $this->db->join('gm_role as r', 'r.role_id = u.role_id');
        // // $this->db->join('gm_company as c', 'c.company_id = d.company_id');

        // $this->db->where('u.employee_account', $user_account);
        // $this->db->where('u.record_status', 'A');
        // $query = $this->db->get();
        // $user = $query->result();


        // if (!empty($user)) {
        //     if (verifyHashedPassword($password, $user[0]->password)) {
        //         return $user;
        //     } else {
        //         return array();
        //     }
        // } else {
        //     return array();
        // }

        $procedure = 'call usp_login(?, ?)';
        $sql_query = $this->db->query($procedure, $login_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            foreach ($sql_query->result() as $k) {
                $DBpassword = $k->password;
            }

            if (verifyHashedPassword($password, $DBpassword)) {
                return $sql_query->result();
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    function cekRole($cek_role_parameter)
    {
        $procedure = 'call usp_cek_role(?, ?)';
        $sql_query = $this->db->query($procedure, $cek_role_parameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            return $sql_query->result();
        }
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function CheckEmailExist($email)
    {
        $this->db->select('user_id');
        $this->db->where('email', $email);
        $this->db->where('record_status', 'A');
        $query = $this->db->get('gm_employee');

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * This function used to insert reset password data
     * @param {array} $data : This is reset password data
     * @return {boolean} $result : TRUE/FALSE
     */
    function ResetPasswordUser($data)
    {
        $result = $this->db->insert('tbl_reset_password', $data);

        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * This function is used to get customer information by email-id for forget password email
     * @param string $email : Email id of customer
     * @return object $result : Information of customer
     */
    function GetUserByEmail($email)
    {
        $this->db->select('user_id, email, user_name');
        $this->db->from('gm_employee');
        $this->db->where('record_status', 'A');
        $this->db->where('email', $email);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function used to check correct activation deatails for forget password.
     * @param string $email : Email id of user
     * @param string $activation_id : This is activation string
     */
    // function checkActivationDetails($email, $activation_id)
    // {
    //     $this->db->select('id');
    //     $this->db->from('tbl_reset_password');
    //     $this->db->where('email', $email);
    //     $this->db->where('activation_id', $activation_id);
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // This function used to create new password by reset link
    function ChangePassword($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('record_status', 'A"');
        $this->db->update('gm_employee', array('password' => getHashedPassword($password)));
        //$this->db->delete('tbl_reset_password', array('email'=>$email));
    }

    function ChangePass($changePassParameter, $oldPassword)
    {
        $procedure = 'call usp_change_pass(?,?,?,?)';
        $sql_query = $this->db->query($procedure, $changePassParameter);
        mysqli_next_result($this->db->conn_id);
        if ($sql_query->num_rows() > 0) {
            foreach ($sql_query->result() as $k) {
                $DBpassword = $k->password;
            }

            if (verifyHashedPassword($oldPassword, $DBpassword)) {
                return $sql_query->result();
            } else {
                return [];
            }
        } else {
            return [];
        }
    }

    function UpdatePass($param)
    {
        $procedure = 'call usp_change_pass(?,?,?,?)';
        $sql_query = $this->db->query($procedure, $param);
        return true;
    }
}
