<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Employee (EmployeeController)
 * Employee Class to control all employee related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Dashboard_Candidate_Controller extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();

        $this->IsLoggedIn();
    }

    /**
     * This function used to load the first screen of the employee
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';


        $this->loadViews("dashboard/Dashboard_Candidate", $this->global, $data, NULL);
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}
