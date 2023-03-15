<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class massiveleavedatetimetemp_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('massiveleave/massiveleavedatetimetemp_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Paid Leave Date Time';
        $this->loadViews("massiveleave/massiveleavedetail", $this->global, NULL, NULL);
    }

    function GetMassiveLeaveDateTimeTemp()
    {

        $massive_leave_datetime_temp_parameter = array('p_massive_leave_date_temp_id' => 0);
        $data['MassiveLeaveDateTimeTempRecords'] = $this->massiveleavedatetimetemp_model->GetMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter);
    }

    function InsertMassiveLeaveDateTimeTemp()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('massive_leave_date', 'Massive Leave Date', 'required|max_length[50]|xss_clean');


        $massive_leave_date = date('Y-m-d', strtotime($this->input->post('massive_leave_date')));

        $massive_leave_datetime_temp_parameter = array($massive_leave_date);

        $this->massiveleavedatetimetemp_model->InsertMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter);
        $result = $this->db->affected_rows();
        if ($result > 0) {
            $this->session->set_flashdata('success', 'Massive Leave Date Time Request created successfully');
        } else {
            $this->session->set_flashdata('error', 'Massive Leave Date Time Request creation failed, the data has been added');
        }
        redirect('MassiveLeaveDetail');
    }

    function DeleteMassiveLeaveDateTimeTemp($massive_leave_datetime_id)
    {

        $massive_leave_datetime_temp_parameter = array($massive_leave_datetime_id);
        $result = $this->massiveleavedatetimetemp_model->DeleteMassiveLeaveDateTimeTemp($massive_leave_datetime_temp_parameter);

        if ($result > 0) {
            $this->session->set_flashdata('success', 'Massive leave date time request has been deleted !');
        } else {
            $this->session->set_flashdata('error', 'Massive leave date time request cannot deleted !');
        }
        redirect('MassiveLeaveDetail');
    }
}
