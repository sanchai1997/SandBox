<?php

class School_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_school_All()
    {
        $this->db->from('SCHOOL')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_school_top()
    {
        $this->db->from('SCHOOL')
            ->where('DeleteStatus', 0)
            ->LIMIT(1);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_school($SchoolID)
    {
        $this->db->from('SCHOOL')
            ->where('SchoolID', $SchoolID)
            ->where('DeleteStatus', 0)
            ->LIMIT(1);
        $query = $this->db->get();

        return $query->result();
    }

    ///////////////////////////////////SCHOOL/////////////////////////////////////////
    //Add Data Form School
    public function add_school()
    {

        $config['upload_path']          = 'assets/school/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImageSchool_' . $_POST['JurisdictionCode'] . $_POST['SchoolAddressProvinceCode'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageSchool')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImageSchool']['name'], -4);
        $new_name = 'ImageSchool_' . $_POST['JurisdictionCode'] . $_POST['SchoolAddressProvinceCode'] . $type;

        $data = [

            'SchoolID ' => $this->input->post('SchoolID'),
            'InnovationAreaCode' => $this->input->post('InnovationAreaCode'),
            'ImageSchool' => $new_name,
            'SchoolNameThai' => $this->input->post('SchoolNameThai'),
            'SchoolNameEnglish' => $this->input->post('SchoolNameEnglish'),
            'SchoolEstablishedDate' => $this->input->post('SchoolEstablishedDate'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'SchoolTypeCode ' => $this->input->post('SchoolTypeCode'),
            'SchoolStatusCode' => $this->input->post('SchoolStatusCode'),
            'MunicipalCode' => $this->input->post('MunicipalCode'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'SchoolAddressHouseNumber' => $this->input->post('SchoolAddressHouseNumber'),
            'SchoolAddressMoo' => $this->input->post('SchoolAddressMoo'),
            'SchoolAddressStreet' => $this->input->post('SchoolAddressStreet'),
            'SchoolAddressSoi' => $this->input->post('SchoolAddressSoi'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'SchoolAddressPostcode' => $this->input->post('SchoolAddressPostcode'),
            'SchoolAddressProvinceCode' => $this->input->post('SchoolAddressProvinceCode'),
            'SchoolAddressDistrictCode' => $this->input->post('SchoolAddressDistrictCode'),
            'SchoolAddressSubdistrictCode' => $this->input->post('SchoolAddressSubdistrictCode'),
            'SchoolLatitude' => $this->input->post('SchoolLatitude'),
            'SchoolLongitude' => $this->input->post('SchoolLongitude'),
            'SchoolMapURL' => $this->input->post('SchoolMapURL')
        ];

        $result = $this->db->insert('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School MAIN
    public function update_school_main($SchoolID, $ImageSchool)
    {

        $config['upload_path']          = 'assets/school/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = $ImageSchool;

        copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.jpg');
        unlink($config['upload_path'] . $config['file_name']);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageSchool')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            unlink($config['upload_path'] . 'logoold.jpg');
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $data = [

            'InnovationAreaCode' => $this->input->post('InnovationAreaCode'),
            'SchoolNameThai' => $this->input->post('SchoolNameThai'),
            'SchoolNameEnglish' => $this->input->post('SchoolNameEnglish'),
            'SchoolEstablishedDate' => $this->input->post('SchoolEstablishedDate'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'SchoolTypeCode ' => $this->input->post('SchoolTypeCode'),
            'SchoolStatusCode' => $this->input->post('SchoolStatusCode'),
            'MunicipalCode' => $this->input->post('MunicipalCode'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode')

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Address
    public function update_school_address($SchoolID)
    {
        $data = [

            'SchoolAddressHouseNumber' => $this->input->post('SchoolAddressHouseNumber'),
            'SchoolAddressMoo' => $this->input->post('SchoolAddressMoo'),
            'SchoolAddressStreet' => $this->input->post('SchoolAddressStreet'),
            'SchoolAddressSoi' => $this->input->post('SchoolAddressSoi'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'SchoolAddressPostcode' => $this->input->post('SchoolAddressPostcode'),
            'SchoolAddressProvinceCode' => $this->input->post('SchoolAddressProvinceCode'),
            'SchoolAddressDistrictCode' => $this->input->post('SchoolAddressDistrictCode'),
            'SchoolAddressSubdistrictCode' => $this->input->post('SchoolAddressSubdistrictCode'),
            'SchoolLatitude' => $this->input->post('SchoolLatitude'),
            'SchoolLongitude' => $this->input->post('SchoolLongitude'),
            'SchoolMapURL' => $this->input->post('SchoolMapURL')

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Contact
    public function update_school_contact($SchoolID)
    {
        $data = [
            'SchoolPhoneNumber' => $this->input->post('SchoolPhoneNumber'),
            'SchoolSecondPhoneNumber' => $this->input->post('SchoolSecondPhoneNumber'),
            'SchoolFaxNumber' => $this->input->post('SchoolFaxNumber'),
            'SchoolSecondFaxNumber' => $this->input->post('SchoolSecondFaxNumber'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'SchoolEmail' => $this->input->post('SchoolEmail'),
            'SchoolWebsiteURL' => $this->input->post('SchoolWebsiteURL')
        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Administrator
    public function update_school_administrator($SchoolID)
    {
        $data = [
            'AdministratorPersonalID' => $this->input->post('AdministratorPersonalID'),
            'AdministratorPrefixCode' => $this->input->post('AdministratorPrefixCode'),
            'AdministratorNameThai' => $this->input->post('AdministratorNameThai'),
            'AdministratorMiddleNameThai' => $this->input->post('AdministratorMiddleNameThai'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'AdministratorLastNameThai' => $this->input->post('AdministratorLastNameThai')
        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Utilities
    public function update_school_utilities($SchoolID)
    {
        $data = [
            'ElectricTypeCode' => $this->input->post('ElectricTypeCode'),
            'InternetTypeCode' => $this->input->post('InternetTypeCode'),
            'WaterTypeCode' => $this->input->post('WaterTypeCode')
        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Teaching
    public function update_school_teaching($SchoolID)
    {
        $data = [
            'EducationContentCode' => $this->input->post('EducationContentCode'),
            'DLTVFlag' => $this->input->post('DLTVFlag')
        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School Statistical
    public function update_school_statistical($SchoolID)
    {
        $data = [
            'ComputerOnlineNumber' => $this->input->post('ComputerOnlineNumber'),
            'ComputerStandaloneNumber' => $this->input->post('ComputerStandaloneNumber'),
            'ComputerTeachNumber' => $this->input->post('ComputerTeachNumber'),
            'ComputerManageNumber' => $this->input->post('ComputerManageNumber'),
            'ToiletMaleStudentNumber' => $this->input->post('ToiletMaleStudentNumber'),
            'ToiletFemaleStudentNumber' => $this->input->post('ToiletFemaleStudentNumber'),
            'ToiletCombinationNumber' => $_POST['ToiletMaleStudentNumber'] + $_POST['ToiletFemaleStudentNumber']
        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }

    //Delete Data Form School
    public function delete_school($SchoolID)

    {
        $data = [
            'SchoolID' => date('Ymd') . rand(1, 999),
            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }
    ///////////////////////////////////SCHOOL- END /////////////////////////////////////////



    ///////////////////////////////////CLASSROOM /////////////////////////////////////////
    //Add Data Form ClassRoom
    public function add_classroom($SchoolID)
    {
        $data = [

            //Page forms-school-classrooom
            'SchoolID' => $SchoolID,
            'ClassroomGradeLevelCode' => $this->input->post('ClassroomGradeLevelCode'),
            'ClassroomAmount' => $this->input->post('ClassroomAmount')

        ];

        $result = $this->db->insert('SCHOOL_CLASSROOM', $data);
        return $result;
    }

    //Update Data Form ClassRoom
    public function update_classroom($SchoolID, $ClassID)
    {
        $data = [

            'ClassroomAmount' => $this->input->post('ClassroomAmount')

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('ClassroomGradeLevelCode', $ClassID)->update('SCHOOL_CLASSROOM', $data);
        return $result;
    }

    //Delete Data Form ClassRoom
    public function delete_classroom($SchoolID, $ClassID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('ClassroomGradeLevelCode', $ClassID)->update('SCHOOL_CLASSROOM', $data);
        return $result;
    }
    ///////////////////////////////////CLASSROOM- END /////////////////////////////////////////

    /////////////////////////////////// AWARD /////////////////////////////////////////
    //Add Data Form Award
    public function add_award($SchoolID)
    {
        $data = [

            //Page forms-school-award
            'SchoolID' => $SchoolID,
            'AwardYear' => $this->input->post('AwardYear'),
            'AwardName' => $this->input->post('AwardName'),
            'AwardSource' => $this->input->post('AwardSource'),
            'AwardLevelCode' => $this->input->post('AwardLevelCode')

        ];

        $result = $this->db->insert('SCHOOL_AWARD', $data);
        return $result;
    }

    //Update Data Form Award
    public function update_award($ID, $SchoolID, $AwardYear)
    {
        $data = [

            'AwardSource' => $this->input->post('AwardSource'),
            'AwardLevelCode' => $this->input->post('AwardLevelCode')

        ];

        $result = $this->db->where('ID', $ID)->where('SchoolID', $SchoolID)->where('AwardYear', $AwardYear)->update('SCHOOL_AWARD', $data);
        return $result;
    }

    //Delete Data Form Award
    public function delete_award($ID, $SchoolID, $AwardYear)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('ID', $ID)->where('SchoolID', $SchoolID)->where('AwardYear', $AwardYear)->update('SCHOOL_AWARD', $data);
        return $result;
    }
    ///////////////////////////////////AWARD- END /////////////////////////////////////////

    /////////////////////////////////// Building /////////////////////////////////////////
    //Add Data Form Building 
    public function add_building()
    {
        $data = [

            //Page forms-school-Building
            'SchoolID' => $this->input->post('SchoolID'),
            'BuildingName' => $this->input->post('BuildingName'),
            'BuildingTypeCode' => $this->input->post('BuildingTypeCode'),
            'BuildingDesignCode' => $this->input->post('BuildingDesignCode'),
            'BuildingDetail' => $this->input->post('BuildingDetail'),
            'BuildingRoom' => $this->input->post('BuildingRoom'),
            'BuildingConstructionDate' => $this->input->post('BuildingConstructionDate')

        ];

        $result = $this->db->insert('SCHOOL_BUILDING', $data);
        return $result;
    }

    //Update Data Form Building 
    public function update_building($ID)
    {
        $data = [

            'BuildingName' => $this->input->post('BuildingName'),
            'BuildingTypeCode' => $this->input->post('BuildingTypeCode'),
            'BuildingDesignCode' => $this->input->post('BuildingDesignCode'),
            'BuildingDetail' => $this->input->post('BuildingDetail'),
            'BuildingRoom' => $this->input->post('BuildingRoom'),
            'BuildingConstructionDate' => $this->input->post('BuildingConstructionDate')

        ];

        $result = $this->db->where('ID', $ID)->update('SCHOOL_BUILDING', $data);
        return $result;
    }

    //Delete Data Form Building 
    public function delete_building($ID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('ID', $ID)->update('SCHOOL_BUILDING', $data);
        return $result;
    }
    ///////////////////////////////////Building- END /////////////////////////////////////////


}
