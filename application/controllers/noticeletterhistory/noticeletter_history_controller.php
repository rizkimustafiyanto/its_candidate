<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class noticeletter_history_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('noticeletterhistory/noticeletter_history_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Notice Letter History';
        $this->loadViews("noticeletter_history/noticeletter_history", $this->global, NULL, NULL);
    }

    function GetNoticeLetterHistory()
    {
        $employee_id = $this->session->userdata('employee_id');
        $employee_noticeletter_parameter = array('p_employee_id' => $employee_id);
        $data['NoticeLetterHistoryListRecords'] = $this->noticeletter_history_model->GetNoticeLetterHistory($employee_noticeletter_parameter);

        $this->global['pageTitle'] = 'CodeInsect : Menu Listing';
        $this->loadViews("noticeletterhistory/noticeletterhistory", $this->global, $data, NULL);
    }
}
