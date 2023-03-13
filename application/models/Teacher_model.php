<?php

class Teacher_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function get_teacher_All() {
        $query = $this->db->get('TEACHER');
        return $query->result();
    }
    
    public function add_teacher()
    {
        $data = [

            'TeacherID' => $this->input->post('TeacherID'),
            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'SchoolID' => $this->input->post('SchoolID'),
            'TeacherPersonalID' => $this->input->post('TeacherPersonalID'),
            'TeacherPersonalIDTypeCode' => $this->input->post('TeacherPersonalIDTypeCode'),
            'TeacherPassportNumber' => $this->input->post('TeacherPassportNumber'),
            'TeacherPrefixCode' => $this->input->post('TeacherPrefixCode'),
            'TeacherNameThai' => $this->input->post('TeacherNameThai'),
            'TeacherNameEnglish' => $this->input->post('TeacherNameEnglish'),
            'TeacherMiddleNameThai' => $this->input->post('TeacherMiddleNameThai'),
            'TeacherMiddleNameEnglish' => $this->input->post('TeacherMiddleNameEnglish'),
            'TeacherLastNameThai' => $this->input->post('TeacherLastNameThai'),
            'TeacherLastNameEnglish' => $this->input->post('TeacherLastNameEnglish'),
            'TeacherGenderCode' => $this->input->post('TeacherGenderCode'),
            'TeacherBirthDate' => $this->input->post('TeacherBirthDate'),
            'TeacherNationalityCode' => $this->input->post('TeacherNationalityCode'),
            'TeacherRaceCode' => $this->input->post('TeacherRaceCode'),
            'TeacherReligionCode' => $this->input->post('TeacherReligionCode'),
            'TeacherBloodCode' => $this->input->post('TeacherBloodCode'),
            'TeacherOfficialAddressHouseRegisterID' => $this->input->post('TeacherOfficialAddressHouseRegisterID'),
            'TeacherOfficialAddressHouseNumber' => $this->input->post('TeacherOfficialAddressHouseNumber'),
            'TeacherOfficialAddressMoo' => $this->input->post('TeacherOfficialAddressMoo'),
            'TeacherOfficialAddressStreet' => $this->input->post('TeacherOfficialAddressStreet'),
            'TeacherOfficialAddressSoi' => $this->input->post('TeacherOfficialAddressSoi'),
            'TeacherOfficialAddressTrok' => $this->input->post('TeacherOfficialAddressTrok'),
            'TeacherOfficialAddressSubdistrictCode' => $this->input->post('TeacherOfficialAddressSubdistrictCode'),
            'TeacherOfficialAddressDistrictCode' => $this->input->post('TeacherOfficialAddressDistrictCode'),
            'TeacherOfficialAddressProvinceCode' => $this->input->post('TeacherOfficialAddressProvinceCode'),
            'TeacherOfficialAddressPostcode' => $this->input->post('TeacherOfficialAddressPostcode'),
            'TeacherOfficialAddressPhoneNumber' => $this->input->post('TeacherOfficialAddressPhoneNumber'),
            'TeacherCurrentAddressHouseRegisterID' => $this->input->post('TeacherCurrentAddressHouseRegisterID'),
            'TeacherCurrentAddressHouseNumber' => $this->input->post('TeacherCurrentAddressHouseNumber'),
            'TeacherCurrentAddressMoo' => $this->input->post('TeacherCurrentAddressMoo'),
            'TeacherCurrentAddressStreet' => $this->input->post('TeacherCurrentAddressStreet'),
            'TeacherCurrentAddressSoi' => $this->input->post('TeacherCurrentAddressSoi'),
            'TeacherCurrentAddressTrok' => $this->input->post('TeacherCurrentAddressTrok'),
            'TeacherCurrentAddressSubdistrictCode' => $this->input->post('TeacherCurrentAddressSubdistrictCode'),
            'TeacherCurrentAddressDistrictCode' => $this->input->post('TeacherCurrentAddressDistrictCode'),
            'TeacherCurrentAddressProvinceCode' => $this->input->post('TeacherCurrentAddressProvinceCode'),
            'TeacherCurrentAddressPostcode' => $this->input->post('TeacherCurrentAddressPostcode'),
            'TeacherCurrentAddressPhoneNumber' => $this->input->post('TeacherCurrentAddressPhoneNumber'),
            'TeacherEmail' => $this->input->post('TeacherEmail'),
            'MarriageStatusCode' => $this->input->post('MarriageStatusCode'),
            'SpousePersonalID' => $this->input->post('SpousePersonalID'),
            'SpousePrefixCode' => $this->input->post('SpousePrefixCode'),
            'SpouseNameThai' => $this->input->post('SpouseNameThai'),
            'SpouseNameEnglish' => $this->input->post('SpouseNameEnglish'),
            'SpouseMiddleNameThai' => $this->input->post('SpouseMiddleNameThai'),
            'SpouseMiddleNameEnglish' => $this->input->post('SpouseMiddleNameEnglish'),
            'SpouseLastNameThai' => $this->input->post('SpouseLastNameThai'),
            'SpouseLastNameEnglish' => $this->input->post('SpouseLastNameEnglish'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'EntryEducationLevelCode' => $this->input->post('EntryEducationLevelCode'),
            'EntryDegreeCode' => $this->input->post('EntryDegreeCode'),
            'EntryMajorCode' => $this->input->post('EntryMajorCode'),
            'EntryProgramCode' => $this->input->post('EntryProgramCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary'),
            'TeacherQualificationCode' => $this->input->post('TeacherQualificationCode'),
            'TeacherTalentCode' => $this->input->post('TeacherTalentCode')

        ];

        $result = $this->db->insert('TEACHER', $data);
        return $result;
    }



    //Update Data Student
    public function update_teacher($TeacherID)
    {
        $data = [

            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'SchoolID' => $this->input->post('SchoolID'),
            'TeacherPersonalID' => $this->input->post('TeacherPersonalID'),
            'TeacherPersonalIDTypeCode' => $this->input->post('TeacherPersonalIDTypeCode'),
            'TeacherPassportNumber' => $this->input->post('TeacherPassportNumber'),
            'TeacherPrefixCode' => $this->input->post('TeacherPrefixCode'),
            'TeacherNameThai' => $this->input->post('TeacherNameThai'),
            'TeacherNameEnglish' => $this->input->post('TeacherNameEnglish'),
            'TeacherMiddleNameThai' => $this->input->post('TeacherMiddleNameThai'),
            'TeacherMiddleNameEnglish' => $this->input->post('TeacherMiddleNameEnglish'),
            'TeacherLastNameThai' => $this->input->post('TeacherLastNameThai'),
            'TeacherLastNameEnglish' => $this->input->post('TeacherLastNameEnglish'),
            'TeacherGenderCode' => $this->input->post('TeacherGenderCode'),
            'TeacherBirthDate' => $this->input->post('TeacherBirthDate'),
            'TeacherNationalityCode' => $this->input->post('TeacherNationalityCode'),
            'TeacherRaceCode' => $this->input->post('TeacherRaceCode'),
            'TeacherReligionCode' => $this->input->post('TeacherReligionCode'),
            'TeacherBloodCode' => $this->input->post('TeacherBloodCode'),
            'TeacherOfficialAddressHouseRegisterID' => $this->input->post('TeacherOfficialAddressHouseRegisterID'),
            'TeacherOfficialAddressHouseNumber' => $this->input->post('TeacherOfficialAddressHouseNumber'),
            'TeacherOfficialAddressMoo' => $this->input->post('TeacherOfficialAddressMoo'),
            'TeacherOfficialAddressStreet' => $this->input->post('TeacherOfficialAddressStreet'),
            'TeacherOfficialAddressSoi' => $this->input->post('TeacherOfficialAddressSoi'),
            'TeacherOfficialAddressTrok' => $this->input->post('TeacherOfficialAddressTrok'),
            'TeacherOfficialAddressSubdistrictCode' => $this->input->post('TeacherOfficialAddressSubdistrictCode'),
            'TeacherOfficialAddressDistrictCode' => $this->input->post('TeacherOfficialAddressDistrictCode'),
            'TeacherOfficialAddressProvinceCode' => $this->input->post('TeacherOfficialAddressProvinceCode'),
            'TeacherOfficialAddressPostcode' => $this->input->post('TeacherOfficialAddressPostcode'),
            'TeacherOfficialAddressPhoneNumber' => $this->input->post('TeacherOfficialAddressPhoneNumber'),
            'TeacherCurrentAddressHouseRegisterID' => $this->input->post('TeacherCurrentAddressHouseRegisterID'),
            'TeacherCurrentAddressHouseNumber' => $this->input->post('TeacherCurrentAddressHouseNumber'),
            'TeacherCurrentAddressMoo' => $this->input->post('TeacherCurrentAddressMoo'),
            'TeacherCurrentAddressStreet' => $this->input->post('TeacherCurrentAddressStreet'),
            'TeacherCurrentAddressSoi' => $this->input->post('TeacherCurrentAddressSoi'),
            'TeacherCurrentAddressTrok' => $this->input->post('TeacherCurrentAddressTrok'),
            'TeacherCurrentAddressSubdistrictCode' => $this->input->post('TeacherCurrentAddressSubdistrictCode'),
            'TeacherCurrentAddressDistrictCode' => $this->input->post('TeacherCurrentAddressDistrictCode'),
            'TeacherCurrentAddressProvinceCode' => $this->input->post('TeacherCurrentAddressProvinceCode'),
            'TeacherCurrentAddressPostcode' => $this->input->post('TeacherCurrentAddressPostcode'),
            'TeacherCurrentAddressPhoneNumber' => $this->input->post('TeacherCurrentAddressPhoneNumber'),
            'TeacherEmail' => $this->input->post('TeacherEmail'),
            'MarriageStatusCode' => $this->input->post('MarriageStatusCode'),
            'SpousePersonalID' => $this->input->post('SpousePersonalID'),
            'SpousePrefixCode' => $this->input->post('SpousePrefixCode'),
            'SpouseNameThai' => $this->input->post('SpouseNameThai'),
            'SpouseNameEnglish' => $this->input->post('SpouseNameEnglish'),
            'SpouseMiddleNameThai' => $this->input->post('SpouseMiddleNameThai'),
            'SpouseMiddleNameEnglish' => $this->input->post('SpouseMiddleNameEnglish'),
            'SpouseLastNameThai' => $this->input->post('SpouseLastNameThai'),
            'SpouseLastNameEnglish' => $this->input->post('SpouseLastNameEnglish'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'EntryEducationLevelCode' => $this->input->post('EntryEducationLevelCode'),
            'EntryDegreeCode' => $this->input->post('EntryDegreeCode'),
            'EntryMajorCode' => $this->input->post('EntryMajorCode'),
            'EntryProgramCode' => $this->input->post('EntryProgramCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary'),
            'TeacherQualificationCode' => $this->input->post('TeacherQualificationCode'),
            'TeacherTalentCode' => $this->input->post('TeacherTalentCode')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->update('TEACHER', $data);
        return $result;
    }

    //Delete Data Teacher
    public function delete_teacher($TeacherID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->update('TEACHER', $data);
        return $result;
    }
}
