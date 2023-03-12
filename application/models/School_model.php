<?php

class School_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_school_All() {
        $query = $this->db->get('School');
        return $query->result();
    }
    
    ///////////////////////////////////SCHOOL/////////////////////////////////////////
    //Add Data Form School
    public function add_school()
    {
        $data = [

            'SchoolID' => $this->input->post('SchoolID'),
            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'InnovationAreaCode' => $this->input->post('InnovationAreaCode'),
            'SchoolNameThai' => $this->input->post('SchoolNameThai'),
            'SchoolNameEnglish' => $this->input->post('SchoolNameEnglish'),
            'SchoolEstablishedDate' => $this->input->post('SchoolEstablishedDate'),
            'SchoolTypeCode' => $this->input->post('SchoolTypeCode'),
            'SchoolStatusCode' => $this->input->post('SchoolStatusCode'),
            'MunicipalCode' => $this->input->post('MunicipalCode'),
            'SchoolAddressHouseRegisterID' => $this->input->post('SchoolAddressHouseRegisterID'),
            'SchoolAddressHouseNumber' => $this->input->post('SchoolAddressHouseNumber'),
            'SchoolAddressMoo' => $this->input->post('SchoolAddressMoo'),
            'SchoolAddressStreet' => $this->input->post('SchoolAddressStreet'),
            'SchoolAddressSoi' => $this->input->post('SchoolAddressSoi'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'SchoolAddressSubdistrictCode' => $this->input->post('SchoolAddressSubdistrictCode'),
            'SchoolAddressDistrictCode' => $this->input->post('SchoolAddressDistrictCode'),
            'SchoolAddressProvinceCode' => $this->input->post('SchoolAddressProvinceCode'),
            'SchoolAddressPostcode' => $this->input->post('SchoolAddressPostcode'),
            'SchoolLatitude' => $this->input->post('SchoolLatitude'),
            'SchoolLongitude' => $this->input->post('SchoolLongitude'),
            'SchoolMapURL' => $this->input->post('SchoolMapURL'),
            'SchoolPhoneNumber' => $this->input->post('SchoolPhoneNumber'),
            'SchoolSecondPhoneNumber' => $this->input->post('SchoolSecondPhoneNumber'),
            'SchoolFaxNumber' => $this->input->post('SchoolFaxNumber'),
            'SchoolSecondFaxNumber' => $this->input->post('SchoolSecondFaxNumber'),
            'SchoolEmail' => $this->input->post('SchoolEmail'),
            'SchoolWebsiteURL' => $this->input->post('SchoolWebsiteURL'),
            'AdministratorPersonalID' => $this->input->post('AdministratorPersonalID'),
            'AdministratorPrefixCode' => $this->input->post('AdministratorPrefixCode'),
            'AdministratorNameThai' => $this->input->post('AdministratorNameThai'),
            'AdministratorMiddleNameThai' => $this->input->post('AdministratorMiddleNameThai'),
            'AdministratorLastNameThai' => $this->input->post('AdministratorLastNameThai'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'ElectricTypeCode' => $this->input->post('ElectricTypeCode'),
            'InternetTypeCode' => $this->input->post('InternetTypeCode'),
            'WaterTypeCode' => $this->input->post('WaterTypeCode'),
            'EducationContentCode' => $this->input->post('EducationContentCode'),
            'DLTVFlag' => $this->input->post('DLTVFlag'),
            'ComputerOnlineNumber' => $this->input->post('ComputerOnlineNumber'),
            'ComputerStandaloneNumber' => $this->input->post('ComputerStandaloneNumber'),
            'ComputerTeachNumber' => $this->input->post('ComputerTeachNumber'),
            'ComputerManageNumber' => $this->input->post('ComputerManageNumber'),
            'ToiletMaleStudentNumber' => $this->input->post('ToiletMaleStudentNumber'),
            'ToiletFemaleStudentNumber' => $this->input->post('ToiletFemaleStudentNumber'),
            'ToiletCombinationNumber' => $this->input->post('ToiletCombinationNumber')

        ];

        $result = $this->db->insert('SCHOOL', $data);
        return $result;
    }

    //Update Data Form School
    public function update_school($id)
    {
        $data = [

            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'JurisdictionCode' => $this->input->post('JurisdictionCode'),
            'InnovationAreaCode' => $this->input->post('InnovationAreaCode'),
            'SchoolNameThai' => $this->input->post('SchoolNameThai'),
            'SchoolNameEnglish' => $this->input->post('SchoolNameEnglish'),
            'SchoolEstablishedDate' => $this->input->post('SchoolEstablishedDate'),
            'SchoolTypeCode' => $this->input->post('SchoolTypeCode'),
            'SchoolStatusCode' => $this->input->post('SchoolStatusCode'),
            'MunicipalCode' => $this->input->post('MunicipalCode'),
            'SchoolAddressHouseRegisterID' => $this->input->post('SchoolAddressHouseRegisterID'),
            'SchoolAddressHouseNumber' => $this->input->post('SchoolAddressHouseNumber'),
            'SchoolAddressMoo' => $this->input->post('SchoolAddressMoo'),
            'SchoolAddressStreet' => $this->input->post('SchoolAddressStreet'),
            'SchoolAddressSoi' => $this->input->post('SchoolAddressSoi'),
            'SchoolAddressTrok' => $this->input->post('SchoolAddressTrok'),
            'SchoolAddressSubdistrictCode' => $this->input->post('SchoolAddressSubdistrictCode'),
            'SchoolAddressDistrictCode' => $this->input->post('SchoolAddressDistrictCode'),
            'SchoolAddressProvinceCode' => $this->input->post('SchoolAddressProvinceCode'),
            'SchoolAddressPostcode' => $this->input->post('SchoolAddressPostcode'),
            'SchoolLatitude' => $this->input->post('SchoolLatitude'),
            'SchoolLongitude' => $this->input->post('SchoolLongitude'),
            'SchoolMapURL' => $this->input->post('SchoolMapURL'),
            'SchoolPhoneNumber' => $this->input->post('SchoolPhoneNumber'),
            'SchoolSecondPhoneNumber' => $this->input->post('SchoolSecondPhoneNumber'),
            'SchoolFaxNumber' => $this->input->post('SchoolFaxNumber'),
            'SchoolSecondFaxNumber' => $this->input->post('SchoolSecondFaxNumber'),
            'SchoolEmail' => $this->input->post('SchoolEmail'),
            'SchoolWebsiteURL' => $this->input->post('SchoolWebsiteURL'),
            'AdministratorPersonalID' => $this->input->post('AdministratorPersonalID'),
            'AdministratorPrefixCode' => $this->input->post('AdministratorPrefixCode'),
            'AdministratorNameThai' => $this->input->post('AdministratorNameThai'),
            'AdministratorMiddleNameThai' => $this->input->post('AdministratorMiddleNameThai'),
            'AdministratorLastNameThai' => $this->input->post('AdministratorLastNameThai'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'ElectricTypeCode' => $this->input->post('ElectricTypeCode'),
            'InternetTypeCode' => $this->input->post('InternetTypeCode'),
            'WaterTypeCode' => $this->input->post('WaterTypeCode'),
            'EducationContentCode' => $this->input->post('EducationContentCode'),
            'DLTVFlag' => $this->input->post('DLTVFlag'),
            'ComputerOnlineNumber' => $this->input->post('ComputerOnlineNumber'),
            'ComputerStandaloneNumber' => $this->input->post('ComputerStandaloneNumber'),
            'ComputerTeachNumber' => $this->input->post('ComputerTeachNumber'),
            'ComputerManageNumber' => $this->input->post('ComputerManageNumber'),
            'ToiletMaleStudentNumber' => $this->input->post('ToiletMaleStudentNumber'),
            'ToiletFemaleStudentNumber' => $this->input->post('ToiletFemaleStudentNumber'),
            'ToiletCombinationNumber' => $this->input->post('ToiletCombinationNumber')

        ];

        $result = $this->db->where('SchoolID', $id)->update('SCHOOL', $data);
        return $result;
    }

    //Delete Data Form School
    public function delete_school($id)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $id)->update('SCHOOL', $data);
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
    public function update_award($SchoolID, $Year, $Name)
    {
        $data = [

            'AwardYear' => $this->input->post('AwardYear'),
            'AwardName' => $this->input->post('AwardName'),
            'AwardSource' => $this->input->post('AwardSource'),
            'AwardLevelCode' => $this->input->post('AwardLevelCode')

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('AwardYear', $Year)->where('AwardName', $Name)->update('SCHOOL_AWARD', $data);
        return $result;
    }

    //Delete Data Form Award
    public function delete_award($SchoolID, $Year, $Name)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('SchoolID', $SchoolID)->where('AwardYear', $Year)->where('AwardName', $Name)->update('SCHOOL_AWARD', $data);
        return $result;
    }
    ///////////////////////////////////AWARD- END /////////////////////////////////////////

}
