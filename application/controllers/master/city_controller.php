<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class city_controller extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master/city_model');

        $this->IsLoggedIn();
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : City';
        $this->loadViews("master/country", $this->global, NULL, NULL);
    }

    function GetCity()
    {

        $this->load->model('master/city_model');
        $city_parameter = array('p_city_id' => 0, 'p_province' => 0, 'p_flag' => 0, '');
        $data['countryRecords'] = $this->city_model->Getcountry($city_parameter);
        $this->global['pageTitle'] = 'CodeInsect : country Listing';
        $this->loadViews("master/country", $this->global, $data, NULL);
    }

    function GetCityByProvinceId()
    {

        $province_id = $this->input->post('province_id'); //receiving the ajax post from view

        $city_parameter = array('p_city_id' => 0, 'p_province_id' => $province_id, 'p_option' => 2);
        $records = $this->city_model->GetCity($city_parameter);

        echo json_encode($records);
    }
}
