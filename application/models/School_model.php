<?php

class School_model extends CI_Model {
 
    public function __construct() {

        $this->load->database();
        $this->load->helper('url');

    }

    public function select_school() {

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
            'SECOND_FAX_NUMBER' => $this->input->post('SECOND_FAX_NUMBER'),
            'EMAIL' => $this->input->post('EMAIL'),
            'WEBSITE_URL' => $this->input->post('WEBSITE_URL'),

            //Page forms-school-detail
            'EDUCATION_YEAR' => $this->input->post('EDUCATION_YEAR'),
            'SEMESTER' => $this->input->post('SEMESTER'),
            'AREA_NO' => $this->input->post('AREA_NO'),
            'AREA_NAME' => $this->input->post('AREA_NAME'),
            'JURISDICTION_CODE' => $this->input->post('JURISDICTION_CODE'),
            'MUNICIPAL_CODE' => $this->input->post('MUNICIPAL_CODE'),
            'INNOVATION_AREA_CODE' => $this->input->post('INNOVATION_AREA_CODE'),
            'EDUCATION_LEVEL_CODES' => $this->input->post('EDUCATION_LEVEL_CODES'),
            'ELECTRIC_TYPE_CODES' => $this->input->post('ELECTRIC_TYPE_CODES'),
            'WATER_TYPE_CODES' => $this->input->post('WATER_TYPE_CODES'),
            'INTERNET_TYPE_CODES' => $this->input->post('INTERNET_TYPE_CODES'),
            'EDUCATION_CONTENTS' => $this->input->post('EDUCATION_CONTENTS'),
            'COMPUTER_ONLINE_NUMBER' => $this->input->post('COMPUTER_ONLINE_NUMBER'),
            'COMPUTER_STANDALONE_NUMBER' => $this->input->post('COMPUTER_STANDALONE_NUMBER'),
            'COMPUTER_TEACH_NUMBER' => $this->input->post('COMPUTER_TEACH_NUMBER'),
            'COMPUTER_MANAGE_NUMBER' => $this->input->post('COMPUTER_MANAGE_NUMBER'),
            'TOILET_STUDENT_MALE_NUMBER' => $this->input->post('TOILET_STUDENT_MALE_NUMBER'),
            'TOILET_STUDENT_FEMALE_NUMBER' => $this->input->post('TOILET_STUDENT_FEMALE_NUMBER'),
            'TOILET_COMBINATION' => $this->input->post('TOILET_COMBINATION')


        ];
 
        $result = $this->db->insert('SCHOOL', $data);
        return $result;
    }

    public function add_classroom() {    
        $data = [
            
            //Page forms-school-classrooom
            'SCHOOL_ID' => $this->input->post('SCHOOL_ID'),
            'CLASSROOM_GRADE_LEVEL_CODE' => $this->input->post('CLASSROOM_GRADE_LEVEL_CODE'),
            'CLASSROOM_AMOUNT' => $this->input->post('CLASSROOM_AMOUNT')
            
        ];
 
        $result = $this->db->insert('SCHOOL_CLASSROOM', $data);
        return $result;
    }

    public function add_award() {    
        $data = [
            
            //Page forms-school-award
            'SCHOOL_ID' => $this->input->post('SCHOOL_ID'),
            'AWARD_YEAR' => $this->input->post('AWARD_YEAR'),
            'AWARD_NAME' => $this->input->post('AWARD_NAME'),
            'AWARD_SOURCE' => $this->input->post('AWARD_SOURCE'),
            'AWARD_LEVEL_CODE' => $this->input->post('AWARD_LEVEL_CODE')
            
        ];
 
        $result = $this->db->insert('SCHOOL_AWARD', $data);
        return $result;
    }
}
    
?>