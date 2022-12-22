<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class province_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/province_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Province';
        $this->loadViews("master/country", $this->global, NULL, NULL);
    }

    function GetProvince()
    {

        $this->load->model('master/province_model');
        $province_parameter = array('p_province_id' => 0, 'p_country_id' => 0, 'p_flag' => 0, '');
        $data['CountryRecords'] = $this->province_model->GetCountry($province_parameter);
        $this->global['pageTitle'] = 'CodeInsect : country Listing';
        $this->loadViews("master/country", $this->global, $data, NULL);
    }



    function GetProvinceByCountryId()
    {

        $country_id = $this->input->post('country_id'); //receiving the ajax post from view

        $province_parameter = array('p_province_id' => 0, 'p_country_id' => $country_id, 'p_option' => 2);
        $records = $this->province_model->GetProvince($province_parameter);

        echo json_encode($records);
    }
}
