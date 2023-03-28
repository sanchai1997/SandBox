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

        $config['upload_path']          = 'assets/teacher/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImageTeacher_' . $_POST['TeacherPersonalID'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImageTeacher']['name'], -4);
        $new_name = 'ImageTeacher_' . $_POST['TeacherPersonalID'] . $type;

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
            'ImageTeacher' => $new_name,
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

        $config['upload_path']          = 'assets/teacher/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImageTeacher_' . $_POST['TeacherPersonalID'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImageTeacher']['name'], -4);
        $new_name = 'ImageTeacher_' . $_POST['TeacherPersonalID'] . $type;

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
            'ImageTeacher' => $new_name,
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
    public function update_teacher_main($TeacherID, $SchoolID, $EducationYear, $Semester, $ImageTeacher)
    {

        $config['upload_path']          = 'assets/teacher/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = $ImageTeacher;

        copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.jpg');
        unlink($config['upload_path'] . $config['file_name']);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageTeacher')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            unlink($config['upload_path'] . 'logoold.jpg');
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
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

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher Person
    public function update_teacher_person($TeacherID, $SchoolID, $EducationYear, $Semester)
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

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher marriage
    public function update_teacher_marriage($TeacherID, $SchoolID, $EducationYear, $Semester)
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

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }


    //Update Data Teacher Address
    public function update_teacher_address($TeacherID, $SchoolID, $EducationYear, $Semester)
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

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }

    //Update Data Teacher Contract
    public function update_teacher_contract($TeacherID, $SchoolID, $EducationYear, $Semester)
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

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }


    //Update Data Teacher Talent
    public function update_teacher_talent($TeacherID, $SchoolID, $EducationYear, $Semester)
    {
        $data = [

            'TeacherQualificationCode' => $this->input->post('TeacherQualificationCode'),
            'TeacherTalentCode' => $this->input->post('TeacherTalentCode')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
        return $result;
    }

    //Delete Data Form Teacher
    public function delete_teacher($TeacherID, $SchoolID, $EducationYear, $Semester)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID', $SchoolID)->where('EducationYear', $EducationYear)->where('Semester', $Semester)->update('TEACHER', $data);
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
    public function update_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber)
    {
        $data = [

            'CertificateLicenseNumber' => $this->input->post('CertificateLicenseNumber'),
            'CertificateLicenseIssuedDate' => $this->input->post('CertificateLicenseIssuedDate'),
            'CertificateLicenseExpiredDate' => $this->input->post('CertificateLicenseExpiredDate')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)->where('CertificateCode', $CertificateCode)->where('CertificateLicenseNumber ', $CertificateLicenseNumber)->update('TEACHER_CERTIFICATE', $data);
        return $result;
    }


    //Delete Data Form Teacher Certificate
    public function delete_teacher_certificate($TeacherID, $SchoolID, $CertificateCode, $CertificateLicenseNumber)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('CertificateCode ', $CertificateCode)->where('CertificateLicenseNumber ', $CertificateLicenseNumber)->update('TEACHER_CERTIFICATE', $data);
        return $result;
    }


    //ADD Data Teacher Position
    public function add_teacher_position($TeacherID, $SchoolID)
    {
        if ($_FILES['AdditionalDocumentURL']['name'] != "") {

            $config['upload_path']          = 'assets/teacher/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = 'Document_' . $SchoolID . $TeacherID . $_POST['AdditionalDepartmentCode'] . $_POST['AdditionalDutyDate'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $type = substr($_FILES['AdditionalDocumentURL']['name'], -4);
            $new_name = 'Document_' . $SchoolID . $TeacherID . $_POST['AdditionalDepartmentCode'] . $_POST['AdditionalDutyDate'] . $type;

            $data = [

                'SchoolID' => $SchoolID,
                'TeacherID' => $TeacherID,
                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment'),
                'AdditionalDocumentURL' => $new_name

            ];

            $result = $this->db->insert('TEACHER_ADDITIONAL_POSITION', $data);
            return $result;
        } else {

            $data = [

                'SchoolID' => $SchoolID,
                'TeacherID' => $TeacherID,
                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalDepartmentCode' => $this->input->post('AdditionalDepartmentCode'),
                'AdditionalDutyDate' => $this->input->post('AdditionalDutyDate'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment'),

            ];

            $result = $this->db->insert('TEACHER_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }

    //Update Data Teacher Position
    public function update_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate, $AdditionalDocumentURL)
    {
        if ($AdditionalDocumentURL == 0) {
            if ($_FILES['AdditionalDocumentURL']['name'] != "") {

                $config['upload_path']          = 'assets/teacher/document/';
                $config['allowed_types']        = 'doc|pdf';
                $config['max_size']             = 50000;
                $config['file_name']            = 'Document_' . $SchoolID . $TeacherID . $AdditionalDepartmentCode . $AdditionalDutyDate;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                    echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
                } else {
                    echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
                }

                $type = substr($_FILES['AdditionalDocumentURL']['name'], -4);
                $new_name = 'Document_' . $SchoolID . $TeacherID . $AdditionalDepartmentCode . $AdditionalDutyDate . $type;

                $data = [

                    'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                    'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                    'AdditionalComment' => $this->input->post('AdditionalComment'),
                    'AdditionalDocumentURL' => $new_name

                ];

                $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('TEACHER_ADDITIONAL_POSITION', $data);
                return $result;
            } else {

                $data = [

                    'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                    'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                    'AdditionalComment' => $this->input->post('AdditionalComment')

                ];

                $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('TEACHER_ADDITIONAL_POSITION', $data);
                return $result;
            }
        } else {

            $config['upload_path']          = 'assets/teacher/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = $AdditionalDocumentURL;

            copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.pdf');
            unlink($config['upload_path'] . $config['file_name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AdditionalDocumentURL')) {
                copy($config['upload_path'] . 'logoold.pdf', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                unlink($config['upload_path'] . 'logoold.pdf');
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $data = [

                'AdditionalPosition' => $this->input->post('AdditionalPosition'),
                'AdditionalCommand' => $this->input->post('AdditionalCommand'),
                'AdditionalComment' => $this->input->post('AdditionalComment')

            ];

            $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('TEACHER_ADDITIONAL_POSITION', $data);
            return $result;
        }
    }

    //Delete Data Form Teacher Position
    public function delete_teacher_position($TeacherID, $SchoolID, $AdditionalDepartmentCode, $AdditionalDutyDate)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AdditionalDepartmentCode ', $AdditionalDepartmentCode)->where('AdditionalDutyDate ', $AdditionalDutyDate)->update('TEACHER_ADDITIONAL_POSITION', $data);
        return $result;
    }


    //ADD Data Teacher Assistance
    public function add_teacher_assistance($TeacherID, $SchoolID)
    {
        if ($_FILES['AssistanceDocumentURL']['name'] != "") {

            $config['upload_path']          = 'assets/teacher/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = 'Document_' . $SchoolID . $TeacherID . $_POST['AssistanceTypeCode'] . $_POST['AssistanceStartDate'];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $type = substr($_FILES['AssistanceDocumentURL']['name'], -4);
            $new_name = 'Document_' . $SchoolID . $TeacherID . $_POST['AssistanceTypeCode'] . $_POST['AssistanceStartDate'] . $type;

            $data = [

                'SchoolID' => $SchoolID,
                'TeacherID' => $TeacherID,
                'AssistanceTypeCode' => $this->input->post('AssistanceTypeCode'),
                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),
                'AssistanceDocumentURL' => $new_name

            ];

            $result = $this->db->insert('TEACHER_ASSISTANCE', $data);
            return $result;
        } else {

            $data = [

                'SchoolID' => $SchoolID,
                'TeacherID' => $TeacherID,
                'AssistanceTypeCode' => $this->input->post('AssistanceTypeCode'),
                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceStartDate' => $this->input->post('AssistanceStartDate'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),

            ];

            $result = $this->db->insert('TEACHER_ASSISTANCE', $data);
            return $result;
        }
    }

    //Update Data Teacher assistance
    public function update_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate, $AssistanceDocumentURL)
    {
        if ($AssistanceDocumentURL == 0) {
            if ($_FILES['AssistanceDocumentURL']['name'] != "") {
                $config['upload_path']          = 'assets/teacher/document/';
                $config['allowed_types']        = 'doc|pdf';
                $config['max_size']             = 50000;
                $config['file_name']            = 'Document_' . $SchoolID . $TeacherID . $AssistanceTypeCode . $AssistanceStartDate;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                    echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
                } else {
                    echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
                }


                $type = substr($_FILES['AssistanceDocumentURL']['name'], -4);
                $new_name = 'Document_' . $SchoolID . $TeacherID . $AssistanceTypeCode . $AssistanceStartDate . $type;

                $data = [

                    'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                    'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                    'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                    'AssistanceReason' => $this->input->post('AssistanceReason'),
                    'AssistanceDocumentURL' => $new_name

                ];

                $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('TEACHER_ASSISTANCE', $data);
                return $result;
            } else {

                $data = [

                    'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                    'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                    'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                    'AssistanceReason' => $this->input->post('AssistanceReason')

                ];

                $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('TEACHER_ASSISTANCE', $data);
                return $result;
            }
        } else {

            $config['upload_path']          = 'assets/teacher/document/';
            $config['allowed_types']        = 'doc|pdf';
            $config['max_size']             = 50000;
            $config['file_name']            = $AssistanceDocumentURL;

            copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.pdf');
            unlink($config['upload_path'] . $config['file_name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('AssistanceDocumentURL')) {
                copy($config['upload_path'] . 'logoold.pdf', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                unlink($config['upload_path'] . 'logoold.pdf');
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $data = [

                'AssistanceOrganizationName' => $this->input->post('AssistanceOrganizationName'),
                'AssistanceEndDate' => $this->input->post('AssistanceEndDate'),
                'AssistanceCommand' => $this->input->post('AssistanceCommand'),
                'AssistanceReason' => $this->input->post('AssistanceReason'),

            ];

            $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('TEACHER_ASSISTANCE', $data);
            return $result;
        }
    }

    //Delete Data Form Teacher assistance
    public function delete_teacher_assistance($TeacherID, $SchoolID, $AssistanceTypeCode, $AssistanceStartDate)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->where('SchoolID ', $SchoolID)->where('AssistanceTypeCode ', $AssistanceTypeCode)->where('AssistanceStartDate ', $AssistanceStartDate)->update('TEACHER_ASSISTANCE', $data);
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
    public function update_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $data = [

            'EducationProgramCode' => $this->input->post('EducationProgramCode')

        ];

        $result = $this->db->where('TeacherID', $TeacherID)->where('SchoolID', $SchoolID)
            ->where('EducationLevelCode', $EducationLevelCode)
            ->where('EducationMajorCode', $EducationMajorCode)
            ->where('EducationDegreeCode', $EducationDegreeCode)
            ->update('TEACHER_EDUCATION_DEGREE', $data);
        return $result;
    }

    //Delete Data Form Teacher Education
    public function delete_teacher_education($TeacherID, $SchoolID, $EducationLevelCode, $EducationMajorCode, $EducationDegreeCode)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID', $TeacherID)
            ->where('SchoolID ', $SchoolID)
            ->where('EducationLevelCode', $EducationLevelCode)
            ->where('EducationMajorCode', $EducationMajorCode)
            ->where('EducationDegreeCode', $EducationDegreeCode)
            ->update('TEACHER_EDUCATION_DEGREE', $data);
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
