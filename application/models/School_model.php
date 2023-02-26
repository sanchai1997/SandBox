<?php

class School_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function select_school()
    {
        $schools = $this->db->get("SCHOOL")->result();
        return $schools;
    }

    public function add_school() {    
        $data = [

            //Page forms-school
            'NAME_TH' => $this->input->post('NAME_TH'),
            'NAME_EN' => $this->input->post('NAME_EN'),
            'ESTABLISHED_DATE' => $this->input->post('ESTABLISHED_DATE'),
            'SCHOOL_TYPE_CODE' => $this->input->post('SCHOOL_TYPE_CODE'),
            'SCHOOL_STATUS_CODE' => $this->input->post('SCHOOL_STATUS_CODE'),
            'ADDRESS_PROVINCE_CODE' => $this->input->post('ADDRESS_PROVINCE_CODE'),
            'ADDRESS_HOUSE_NO' => $this->input->post('ADDRESS_HOUSE_NO'),
            'ADDRESS_MOO' => $this->input->post('ADDRESS_MOO'),
            'ADDRESS_STREET' => $this->input->post('ADDRESS_STREET'),
            'ADDRESS_SOI' => $this->input->post('ADDRESS_SOI'),
            'ADDRESS_TROK' => $this->input->post('ADDRESS_TROK'),
            'ADDRESS_SUBDISTRICT_CODE' => $this->input->post('ADDRESS_SUBDISTRICT_CODE'),
            'ADDRESS_DISTRICT_CODE' => $this->input->post('ADDRESS_DISTRICT_CODE'),
            'ADDRESS_PROVINCE_CODE' => $this->input->post('ADDRESS_PROVINCE_CODE'),
            'ADDRESS_POSTCODE' => $this->input->post('ADDRESS_POSTCODE'),
            'LATTITUDE' => $this->input->post('LATTITUDE'),
            'LONGITUDE' => $this->input->post('LONGITUDE'),
            'MAP_URL' => $this->input->post('MAP_URL'),
            'PHONE_NUMBER' => $this->input->post('PHONE_NUMBER'),
            'SECOND_PHONE_NUMBER' => $this->input->post('SECOND_PHONE_NUMBER'),
            'FAX_NUMBER' => $this->input->post('FAX_NUMBER'),
            'EMAIL' => $this->input->post('EMAIL'),
            'WEBSITE_URL' => $this->input->post('WEBSITE_URL')

            //Page forms-school-detail

        ];
 
        $result = $this->db->insert('SCHOOL', $data);
        return $result;
    }
}
    
?>