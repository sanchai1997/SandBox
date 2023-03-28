<?php

class Teacher_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //Add Data Teacher
    public function add_teacher($SchoolID)
    {

        $config['file_name'] = 'ImageTeacher_' . $_POST['TeacherPersonalID'];
        $config['upload_path'] = './assets/img/teacher/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
        }

        $data = [

            'TeacherID' => $_POST['TeacherPersonalIDTypeCode'] . $_POST['TeacherPersonalID'],
            'SchoolID ' => $SchoolID,
            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'EntryEducationLevelCode' => $this->input->post('EntryEducationLevelCode'),
            'EntryDegreeCode' => $this->input->post('EntryDegreeCode'),
            'EntryMajorCode' => $this->input->post('EntryMajorCode'),
            'EntryProgramCode' => $this->input->post('EntryProgramCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'ImageTeacher' => $data['file_name'],
            'TeacherPersonalIDTypeCode' => $this->input->post('TeacherPersonalIDTypeCode'),
            'TeacherPersonalID' => $this->input->post('TeacherPersonalID'),
            'TeacherPassportNumber' => $this->input->post('TeacherPassportNumber'),
            'TeacherPrefixCode' => $this->input->post('TeacherPrefixCode'),
            'TeacherNameThai' => $this->input->post('TeacherNameThai'),
            'TeacherLastNameThai' => $this->input->post('TeacherLastNameThai'),
            'TeacherGenderCode' => $this->input->post('TeacherGenderCode'),
            'TeacherNationalityCode' => $this->input->post('TeacherNationalityCode'),
            'TeacherRaceCode' => $this->input->post('TeacherRaceCode'),
            'TeacherReligionCode' => $this->input->post('TeacherReligionCode'),
            'TeacherBirthDate' => $this->input->post('TeacherBirthDate'),
            'TeacherBloodCode' => $this->input->post('TeacherBloodCode')

        ];

        $result = $this->db->insert('TEACHER', $data);
        return $result;
    }


    //Add Data Teacher-Select SchoolID, EducationYear, Semester, PersonnelTypeCode, PositionCode
    public function add_teacher_select($SchoolID, $EducationYear, $Semester, $PersonnelTypeCode, $PositionCode)
    {

        $config['file_name'] = 'ImageTeacher_' . $_POST['TeacherPersonalID'];
        $config['upload_path'] = './assets/img/teacher/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
        }

        $data = [

            'TeacherID' => $_POST['TeacherPersonalIDTypeCode'] . $_POST['TeacherPersonalID'],
            'SchoolID ' => $SchoolID,
            'EducationYear' => $EducationYear,
            'Semester' => $Semester,
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'EntryEducationLevelCode' => $this->input->post('EntryEducationLevelCode'),
            'EntryDegreeCode' => $this->input->post('EntryDegreeCode'),
            'EntryMajorCode' => $this->input->post('EntryMajorCode'),
            'EntryProgramCode' => $this->input->post('EntryProgramCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $PersonnelTypeCode,
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'PositionCode' => $PositionCode,
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'ImageTeacher' => $data['file_name'],
            'TeacherPersonalIDTypeCode' => $this->input->post('TeacherPersonalIDTypeCode'),
            'TeacherPersonalID' => $this->input->post('TeacherPersonalID'),
            'TeacherPassportNumber' => $this->input->post('TeacherPassportNumber'),
            'TeacherPrefixCode' => $this->input->post('TeacherPrefixCode'),
            'TeacherNameThai' => $this->input->post('TeacherNameThai'),
            'TeacherLastNameThai' => $this->input->post('TeacherLastNameThai'),
            'TeacherGenderCode' => $this->input->post('TeacherGenderCode'),
            'TeacherNationalityCode' => $this->input->post('TeacherNationalityCode'),
            'TeacherRaceCode' => $this->input->post('TeacherRaceCode'),
            'TeacherReligionCode' => $this->input->post('TeacherReligionCode'),
            'TeacherBirthDate' => $this->input->post('TeacherBirthDate'),
            'TeacherBloodCode' => $this->input->post('TeacherBloodCode')

        ];

        $result = $this->db->insert('TEACHER', $data);
        return $result;
    }


    //Update Data Teacher MAIN
    public function update_teacher_main($TeacherID, $SchoolID)
    {

        $config['file_name'] = 'ImageTeacher_' . $_POST['TeacherPersonalID'];
        $config['upload_path'] = './assets/img/teacher/';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();
        }

        $data = [

            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'PersonnelStatusCode' => $this->input->post('PersonnelStatusCode'),
            'EntryEducationLevelCode' => $this->input->post('EntryEducationLevelCode'),
            'EntryDegreeCode' => $this->input->post('EntryDegreeCode'),
            'EntryMajorCode' => $this->input->post('EntryMajorCode'),
            'EntryProgramCode' => $this->input->post('EntryProgramCode'),
            'PersonnelStartDate' => $this->input->post('PersonnelStartDate'),
            'PersonnelRetireDate' => $this->input->post('PersonnelRetireDate'),
            'PersonnelTypeCode' => $this->input->post('PersonnelTypeCode'),
            'PositionStartDate' => $this->input->post('PositionStartDate'),
            'PositionCode' => $this->input->post('PositionCode'),
            'PositionLevelCode' => $this->input->post('PositionLevelCode'),
            'TeacherPrefixCode' => $this->input->post('TeacherPrefixCode'),
            'TeacherNameThai' => $this->input->post('TeacherNameThai'),
            'TeacherLastNameThai' => $this->input->post('TeacherLastNameThai'),
            'TeacherNameEnglish' => $this->input->post('TeacherNameEnglish'),
            'TeacherLastNameEnglish' => $this->input->post('TeacherLastNameEnglish')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher Person
    public function update_teacher_person($TeacherID, $SchoolID)
    {
        $data = [

            'TeacherPersonalID' => $this->input->post('TeacherPersonalID'),
            'TeacherPassportNumber' => $this->input->post('TeacherPassportNumber'),
            'TeacherGenderCode' => $this->input->post('TeacherGenderCode'),
            'TeacherNationalityCode' => $this->input->post('TeacherNationalityCode'),
            'TeacherRaceCode' => $this->input->post('TeacherRaceCode'),
            'TeacherReligionCode' => $this->input->post('TeacherReligionCode'),
            'TeacherBirthDate' => $this->input->post('TeacherBirthDate'),
            'TeacherBloodCode' => $this->input->post('TeacherBloodCode')
        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher marriage
    public function update_teacher_marriage($TeacherID, $SchoolID)
    {
        $data = [

            'MarriageStatusCode' => $this->input->post('MarriageStatusCode'),
            'SpousePersonalID' => $this->input->post('SpousePersonalID'),
            'SpousePrefixCode' => $this->input->post('SpousePrefixCode'),
            'SpouseNameThai' => $this->input->post('SpouseNameThai'),
            'SpouseLastNameThai' => $this->input->post('SpouseLastNameThai'),
            'SpouseNameEnglish' => $this->input->post('SpouseNameEnglish'),
            'SpouseLastNameEnglish' => $this->input->post('SpouseLastNameEnglish')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }


    //Update Data Teacher Address
    public function update_teacher_address($TeacherID, $SchoolID)
    {
        $data = [

            //ที่อยู่ตามทะเบียนบ้าน
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

            //ที่อยู่ปัจจุบัน
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
            //อีเมลล์
            'TeacherEmail' => $this->input->post('TeacherEmail')


        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher Contract
    public function update_teacher_contract($TeacherID, $SchoolID)
    {
        $data = [

            //ข้อมูลการว่าจ้าง
            'ContractNumber' => $this->input->post('ContractNumber'),
            'ContractTimes' => $this->input->post('ContractTimes'),
            'ContractTypeCode' => $this->input->post('ContractTypeCode'),
            'ContractYear' => $this->input->post('ContractYear'),
            'ContractStartDate' => $this->input->post('ContractStartDate'),
            'ContractEndDate' => $this->input->post('ContractEndDate'),

            //ข้อมูลเงินเดือน
            'SalaryTypeCode' => $this->input->post('SalaryTypeCode'),
            'CurrentSalary' => $this->input->post('CurrentSalary'),
            'AcademicSalary' => $this->input->post('AcademicSalary'),
            'CompensationSalary' => $this->input->post('CompensationSalary'),
            'EmolumentsSalary' => $this->input->post('EmolumentsSalary')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }


    //Update Data Teacher Talent
    public function update_teacher_talent($TeacherID, $SchoolID)
    {
        $data = [

            'TeacherQualificationCode' => $this->input->post('TeacherQualificationCode'),
            'TeacherTalentCode' => $this->input->post('TeacherTalentCode')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->update('TEACHER', $data);
        return $result;
    }

    //Delete Data Form Teacher
    public function delete_teacher($TeacherID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->update('TEACHER', $data);
        return $result;
    }


    //ADD Data Teacher Certificate
    public function add_teacher_certificate($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'CertificateCode' => $this->input->post('CertificateCode'),
            'CertificateLicenseNumber' => $this->input->post('CertificateLicenseNumber'),
            'CertificateLicenseIssuedDate' => $this->input->post('CertificateLicenseIssuedDate'),
            'CertificateLicenseExpiredDate' => $this->input->post('CertificateLicenseExpiredDate')

        ];

        $result = $this->db->insert('TEACHER_CERTIFICATE', $data);
        return $result;
    }

    //Update Data Teacher Certificate
    public function update_teacher_certificate($TeacherID, $SchoolID, $CertificateCode)
    {
        $data = [

            'CertificateLicenseNumber' => $this->input->post('CertificateLicenseNumber'),
            'CertificateLicenseIssuedDate' => $this->input->post('CertificateLicenseIssuedDate'),
            'CertificateLicenseExpiredDate' => $this->input->post('CertificateLicenseExpiredDate')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('CertificateCode', $CertificateCode)->update('TEACHER_CERTIFICATE', $data);
        return $result;
    }


    //Delete Data Form Teacher Certificate
    public function delete_teacher_certificate($TeacherID, $SchoolID, $CertificateCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('CertificateCode ', $CertificateCode)->update('TEACHER_CERTIFICATE', $data);
        return $result;
    }


    //ADD Data Teacher Position
    public function add_teacher_position($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'AdditionalPosition' => $this->input->post('AdditionalPosition'),
            'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
            'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
            'AdditionalCommand' => $this->input->post('AdditionalCommand'),
            'AdditionalComment' => $this->input->post('AdditionalComment'),
            'AdditionalDocumentURL' => $this->input->post('AdditionalDocumentURL')

        ];

        $result = $this->db->insert('TEACHER_ADDITIONAL_POSITION', $data);
        return $result;
    }

    //Update Data Teacher Position
    public function update_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode)
    {
        $data = [

            'AdditionalPosition' => $this->input->post('AdditionalPosition'),
            'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
            'AdditionalCommand' => $this->input->post('AdditionalCommand'),
            'AdditionalComment' => $this->input->post('AdditionalComment'),
            'AdditionalDocumentURL' => $this->input->post('AdditionalDocumentURL')

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->update('TEACHER_ADDITIONAL_POSITION', $data);
        return $result;
    }

    //Delete Data Form Teacher Position
    public function delete_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->update('TEACHER_ADDITIONAL_POSITION', $data);
        return $result;
    }


    //ADD Data Teacher Assistance
    public function add_teacher_assistance($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'AssistanceTypeCode' => $this->input->post('AssistanceTypeCode'),
            'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
            'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
            'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
            'AssistanceCommand' => $this->input->post('AssistanceCommand'),
            'AssistanceReason' => $this->input->post('AssistanceReason'),
            'AssistanceDocumentURL' => $this->input->post('AssistanceDocumentURL')

        ];

        $result = $this->db->insert('TEACHER_ASSISTANCE', $data);
        return $result;
    }

    //Update Data Teacher assistance
    public function update_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode)
    {
        $data = [

            'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
            'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
            'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
            'AssistanceCommand' => $this->input->post('AssistanceCommand'),
            'AssistanceReason' => $this->input->post('AssistanceReason'),
            'AssistanceDocumentURL' => $this->input->post('AssistanceDocumentURL')

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->update('TEACHER_ASSISTANCE', $data);
        return $result;
    }

    //Delete Data Form Teacher assistance
    public function delete_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->update('TEACHER_ASSISTANCE', $data);
        return $result;
    }


    //ADD Data Teacher Academic
    public function add_teacher_academic($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'AcademicStandingCode' => $this->input->post('AcademicStandingCode'),
            'AcademicDate' => $this->input->post('AcademicDate'),
            'AcademicProgramCode' => $this->input->post('AcademicProgramCode')

        ];

        $result = $this->db->insert('TEACHER_ACADEMIC', $data);
        return $result;
    }

    //Update Data Teacher Academic
    public function update_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode)
    {
        $data = [

            'AcademicDate' => $this->input->post('AcademicDate'),
            'AcademicProgramCode' => $this->input->post('AcademicProgramCode')

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AcademicStandingCode ', $AcademicStandingCode)->update('TEACHER_ACADEMIC', $data);
        return $result;
    }

    //Delete Data Form Teacher Academic
    public function delete_teacher_academic($TeacherID, $SchoolID, $AcademicStandingCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AcademicStandingCode ', $AcademicStandingCode)->update('TEACHER_ACADEMIC', $data);
        return $result;
    }


    //ADD Data Teacher Education
    public function add_teacher_education($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'EducationMajorCode' => $this->input->post('EducationMajorCode'),
            'EducationProgramCode' => $this->input->post('EducationProgramCode'),
            'EducationDegreeCode' => $this->input->post('EducationDegreeCode')

        ];

        $result = $this->db->insert('TEACHER_EDUCATION_DEGREE', $data);
        return $result;
    }

    //Update Data Teacher Education
    public function update_teacher_education($TeacherID, $SchoolID, $EducationDegreeCode)
    {
        $data = [

            'EducationProgramCode' => $this->input->post('EducationProgramCode')

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('EducationDegreeCode ', $EducationDegreeCode)->update('TEACHER_EDUCATION_DEGREE', $data);
        return $result;
    }

    //Delete Data Form Teacher Education
    public function delete_teacher_education($TeacherID, $SchoolID, $EducationDegreeCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('EducationDegreeCode ', $EducationDegreeCode)->update('TEACHER_EDUCATION_DEGREE', $data);
        return $result;
    }

    //ADD Data Teacher teaching
    public function add_teacher_teaching($TeacherID, $SchoolID)
    {
        $data = [

            'SchoolID' => $SchoolID,
            'TeacherID' => $TeacherID,
            'TeachingEducationYear' => $this->input->post('TeachingEducationYear'),
            'TeachingSemester' => $this->input->post('TeachingSemester'),
            'TeachingEducationLevelCode' => $this->input->post('TeachingEducationLevelCode'),
            'TeachingSubjectGroupCode' => $this->input->post('TeachingSubjectGroupCode'),
            'TeachingSubjectCode' => $this->input->post('TeachingSubjectCode')

        ];

        $result = $this->db->insert('TEACHER_TEACHING', $data);
        return $result;
    }

    //Update Data Teacher teaching
    public function update_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $data = [

            'TeachingEducationLevelCode' => $this->input->post('TeachingEducationLevelCode'),
            'TeachingSubjectGroupCode' => $this->input->post('TeachingSubjectGroupCode')

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('TeachingEducationYear ', $TeachingEducationYear)->where('TeachingSemester ', $TeachingSemester)->where('TeachingSubjectCode ', $TeachingSubjectCode)->update('TEACHER_TEACHING', $data);
        return $result;
    }

    //Delete Data Form Teacher teaching
    public function delete_teacher_teaching($TeacherID, $SchoolID, $TeachingEducationYear, $TeachingSemester, $TeachingSubjectCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('TeachingEducationYear ', $TeachingEducationYear)->where('TeachingSemester ', $TeachingSemester)->where('TeachingSubjectCode ', $TeachingSubjectCode)->update('TEACHER_TEACHING', $data);
        return $result;
    }
}
