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

    ///////////////////////////////////SCHOOL/////////////////////////////////////////
    //Add Data Form School
    public function add_school()
    {

        $config['file_name'] = 'ImageSchool_' . $_POST['JurisdictionCode'] . $_POST['SchoolAddressProvinceCode'];
        $config['upload_path'] = './assets/school/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageSchool')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
        }

        $data = [

            'SchoolID ' => $_POST['JurisdictionCode'] . $_POST['SchoolAddressProvinceCode'],
            'InnovationAreaCode' => $this->input->post('InnovationAreaCode'),
            'ImageSchool' => $data['file_name'],
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
    public function update_school_main($SchoolID)
    {

        $config['file_name'] = 'ImageSchool_' . $SchoolID;
        $config['upload_path'] = './assets/school/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
        $config['overwrite'] = TRUE;


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageSchool')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
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

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->update('SCHOOL', $data);
        return $result;
    }
    ///////////////////////////////////SCHOOL- END /////////////////////////////////////////



    ///////////////////////////////////CLASSROOM /////////////////////////////////////////
    //Add Data Form ClassRoom
    public function add_classroom()
    {
        $data = [

            //Page forms-school-classrooom
            'SchoolID' => $this->input->post('SchoolID'),
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
    public function add_award()
    {
        $data = [

            //Page forms-school-award
            'SchoolID' => $this->input->post('SchoolID'),
            'AwardYear' => $this->input->post('AwardYear'),
            'AwardName' => $this->input->post('AwardName'),
            'AwardSource' => $this->input->post('AwardSource'),
            'AwardLevelCode' => $this->input->post('AwardLevelCode')

        ];

        $result = $this->db->insert('SCHOOL_AWARD', $data);
        return $result;
    }

    //Update Data Form Award
    public function update_award($SchoolID, $Year)
    {
        $data = [

            'AwardName' => $this->input->post('AwardName'),
            'AwardSource' => $this->input->post('AwardSource'),
            'AwardLevelCode' => $this->input->post('AwardLevelCode')

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('AwardYear', $Year)->update('SCHOOL_AWARD', $data);
        return $result;
    }

    //Delete Data Form Award
    public function delete_award($SchoolID, $Year)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('AwardYear', $Year)->update('SCHOOL_AWARD', $data);
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
    public function update_building($Id)
    {
        $data = [

            'BuildingName' => $this->input->post('BuildingName'),
            'BuildingTypeCode' => $this->input->post('BuildingTypeCode'),
            'BuildingDesignCode' => $this->input->post('BuildingDesignCode'),
            'BuildingDetail' => $this->input->post('BuildingDetail'),
            'BuildingRoom' => $this->input->post('BuildingRoom'),
            'BuildingConstructionDate' => $this->input->post('BuildingConstructionDate')

        ];

        $result = $this->db->where('Id', $Id)->update('SCHOOL_BUILDING', $data);
        return $result;
    }

    //Delete Data Form Building 
    public function delete_building($Id)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('Id', $Id)->update('SCHOOL_BUILDING', $data);
        return $result;
    }
    ///////////////////////////////////Building- END /////////////////////////////////////////


}
