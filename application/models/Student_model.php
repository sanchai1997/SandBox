<?php

class Student_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //Add Data student 
    public function add_student($SchoolID)
    {

        $config['upload_path']          = 'assets/student/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImageStudent_' . $_POST['StudentPersonalID'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageStudent')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImageStudent']['name'], -4);
        $new_name = 'ImageStudent_' . $_POST['StudentPersonalID'] . $type;

        $data = [

            'StudentReferenceID ' => $_POST['StudentPersonalIDTypeCode'] . $_POST['StudentPersonalID'],
            'SchoolID ' => $SchoolID,
            'SchoolAdmissionYear' => $this->input->post('SchoolAdmissionYear'),
            'CurrentEducationLevelAdmissionYear' => $this->input->post('CurrentEducationLevelAdmissionYear'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'GradeLevelCode' => $this->input->post('GradeLevelCode'),
            'StudentID' => $this->input->post('StudentID'),
            'ImageStudent' => $new_name,
            'StudentStatusCode' => $this->input->post('StudentStatusCode'),
            'StudentPersonalIDTypeCode' => $this->input->post('StudentPersonalIDTypeCode'),
            'StudentPersonalID' => base64_encode($this->input->post('StudentPersonalID')),
            'StudentPassportNumber' => $this->input->post('StudentPassportNumber'),
            'StudentPrefixCode' => $this->input->post('StudentPrefixCode'),
            'StudentNameThai' => $this->input->post('StudentNameThai'),
            'StudentLastNameThai' => $this->input->post('StudentLastNameThai'),
            'StudentGenderCode' => $this->input->post('StudentGenderCode'),
            'StudentNationalityCode' => $this->input->post('StudentNationalityCode'),
            'StudentRaceCode' => $this->input->post('StudentRaceCode'),
            'StudentReligionCode' => $this->input->post('StudentReligionCode'),
            'StudentLanguageCode' => $this->input->post('StudentLanguageCode'),
            'StudentBirthDate' => $this->input->post('StudentBirthDate'),
            'StudentBirthProvinceCode' => $this->input->post('StudentBirthProvinceCode'),
            'StudentBloodCode' => $this->input->post('StudentBloodCode'),
            'StudentWeight' => $this->input->post('StudentWeight'),
            'StudentHeight' => $this->input->post('StudentHeight')

        ];

        $result = $this->db->insert('STUDENT', $data);
        return $result;
    }

    //Add Data student Select SchoolID , EducationYear , Semester , GradeLevelCode 
    public function add_student_select($SchoolID, $EducationYear, $Semester, $GradeLevelCode)
    {

        $config['upload_path']          = 'assets/student/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 50000;
        $config['max_width']            = 3402;
        $config['max_height']           = 1417;
        $config['file_name']            = 'ImageStudent_' . $_POST['StudentPersonalID'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageStudent')) {
            copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
            echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
        } else {
            echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
        }

        $type = substr($_FILES['ImageStudent']['name'], -4);
        $new_name = 'ImageStudent_' . $_POST['StudentPersonalID'] . $type;

        $data = [


            'StudentReferenceID' => $_POST['StudentPersonalIDTypeCode'] . $_POST['StudentPersonalID'],
            'SchoolID' => $SchoolID,
            'SchoolAdmissionYear' => $this->input->post('SchoolAdmissionYear'),
            'CurrentEducationLevelAdmissionYear' => $this->input->post('CurrentEducationLevelAdmissionYear'),
            'EducationLevelCode' => $this->input->post('EducationLevelCode'),
            'EducationYear' => $EducationYear,
            'Semester' => $Semester,
            'GradeLevelCode' => $GradeLevelCode,
            'StudentID' => $this->input->post('StudentID'),
            'ImageStudent' => $new_name,
            'StudentStatusCode' => $this->input->post('StudentStatusCode'),
            'StudentPersonalIDTypeCode' => $this->input->post('StudentPersonalIDTypeCode'),
            'StudentPersonalID' => base64_encode($this->input->post('StudentPersonalID')),
            'StudentPassportNumber' => $this->input->post('StudentPassportNumber'),
            'StudentPrefixCode' => $this->input->post('StudentPrefixCode'),
            'StudentNameThai' => $this->input->post('StudentNameThai'),
            'StudentLastNameThai' => $this->input->post('StudentLastNameThai'),
            'StudentGenderCode' => $this->input->post('StudentGenderCode'),
            'StudentNationalityCode' => $this->input->post('StudentNationalityCode'),
            'StudentRaceCode' => $this->input->post('StudentRaceCode'),
            'StudentReligionCode' => $this->input->post('StudentReligionCode'),
            'StudentLanguageCode' => $this->input->post('StudentLanguageCode'),
            'StudentBirthDate' => $this->input->post('StudentBirthDate'),
            'StudentBirthProvinceCode' => $this->input->post('StudentBirthProvinceCode'),
            'StudentBloodCode' => $this->input->post('StudentBloodCode'),
            'StudentWeight' => $this->input->post('StudentWeight'),
            'StudentHeight' => $this->input->post('StudentHeight')

        ];

        $result = $this->db->insert('STUDENT', $data);
        return $result;
    }

    //Update Student Main
    public function update_student_main($StudentReferenceID, $SchoolID, $ImageStudent)
    {

        if ($ImageStudent == 1) {

            $config['upload_path']          = 'assets/student/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 50000;
            $config['max_width']            = 3402;
            $config['max_height']           = 1417;
            $config['file_name']            = $_POST['ImageStudent'];

            copy($config['upload_path'] . $config['file_name'], $config['upload_path'] . 'logoold.jpg');
            unlink($config['upload_path'] . $config['file_name']);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ImageStudent')) {
                copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                unlink($config['upload_path'] . 'logoold.jpg');
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }


            $data = [

                'SchoolAdmissionYear' => $this->input->post('SchoolAdmissionYear'),
                'CurrentEducationLevelAdmissionYear' => $this->input->post('CurrentEducationLevelAdmissionYear'),
                'EducationLevelCode' => $this->input->post('EducationLevelCode'),
                'EducationYear' => $this->input->post('EducationYear'),
                'Semester' => $this->input->post('Semester'),
                'GradeLevelCode' => $this->input->post('GradeLevelCode'),
                'Classroom' => $this->input->post('Classroom'),
                'CurriculumID' => $this->input->post('CurriculumID'),
                'StudentID' => $this->input->post('StudentID'),
                'StudentStatusCode' => $this->input->post('StudentStatusCode'),
                'StudentPrefixCode' => $this->input->post('StudentPrefixCode'),
                'StudentNameThai' => $this->input->post('StudentNameThai'),
                'StudentLastNameThai' => $this->input->post('StudentLastNameThai'),
                'StudentNameEnglish' => $this->input->post('StudentNameEnglish'),
                'StudentLastNameEnglish' => $this->input->post('StudentLastNameEnglish')

            ];

            $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
            return $result;
        } elseif ($ImageStudent == 0) {

            $config['upload_path']          = 'assets/student/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 50000;
            $config['max_width']            = 3402;
            $config['max_height']           = 1417;
            $config['file_name']            = 'ImageStudent_' . $StudentReferenceID;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ImageStudent')) {
                copy($config['upload_path'] . 'logoold.jpg', $config['upload_path'] . $config['file_name']);
                echo str_replace("</p>", "", str_replace("<p>", "", $this->upload->display_errors()));
            } else {
                echo 'อัพโหลดไฟล์เรียบร้อยแล้ว';
            }

            $type = substr($_FILES['ImageStudent']['name'], -4);
            $new_name = 'ImageStudent_' . $StudentReferenceID . $type;


            $data = [

                'SchoolAdmissionYear' => $this->input->post('SchoolAdmissionYear'),
                'CurrentEducationLevelAdmissionYear' => $this->input->post('CurrentEducationLevelAdmissionYear'),
                'EducationLevelCode' => $this->input->post('EducationLevelCode'),
                'EducationYear' => $this->input->post('EducationYear'),
                'Semester' => $this->input->post('Semester'),
                'GradeLevelCode' => $this->input->post('GradeLevelCode'),
                'Classroom' => $this->input->post('Classroom'),
                'CurriculumID' => $this->input->post('CurriculumID'),
                'StudentID' => $this->input->post('StudentID'),
                'ImageStudent' => $new_name,
                'StudentStatusCode' => $this->input->post('StudentStatusCode'),
                'StudentPrefixCode' => $this->input->post('StudentPrefixCode'),
                'StudentNameThai' => $this->input->post('StudentNameThai'),
                'StudentLastNameThai' => $this->input->post('StudentLastNameThai'),
                'StudentNameEnglish' => $this->input->post('StudentNameEnglish'),
                'StudentLastNameEnglish' => $this->input->post('StudentLastNameEnglish')

            ];

            $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
            return $result;
        }
    }


    //Update Student Person
    public function update_student_person($StudentReferenceID, $SchoolID)
    {

        $data = [

            'StudentPersonalIDTypeCode' => $this->input->post('StudentPersonalIDTypeCode'),
            'StudentPersonalID' => base64_encode($this->input->post('StudentPersonalID')),
            'StudentPassportNumber' => $this->input->post('StudentPassportNumber'),
            'StudentGenderCode' => $this->input->post('StudentGenderCode'),
            'StudentNationalityCode' => $this->input->post('StudentNationalityCode'),
            'StudentRaceCode' => $this->input->post('StudentRaceCode'),
            'StudentReligionCode' => $this->input->post('StudentReligionCode'),
            'StudentLanguageCode' => $this->input->post('StudentLanguageCode'),
            'StudentOtherLanguageCode' => $this->input->post('StudentOtherLanguageCode'),
            'StudentBirthDate' => $this->input->post('StudentBirthDate'),
            'StudentBirthProvinceCode' => $this->input->post('StudentBirthProvinceCode'),
            'StudentBloodCode' => $this->input->post('StudentBloodCode'),
            'StudentWeight' => $this->input->post('StudentWeight'),
            'StudentHeight' => $this->input->post('StudentHeight')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Update Student Address
    public function update_student_address($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ที่อยู่ตามทะเบียนบ้าน
            'StudentOfficialAddressHouseNumber' => $this->input->post('StudentOfficialAddressHouseNumber'),
            'StudentOfficialAddressMoo' => $this->input->post('StudentOfficialAddressMoo'),
            'StudentOfficialAddressStreet' => $this->input->post('StudentOfficialAddressStreet'),
            'StudentOfficialAddressSoi' => $this->input->post('StudentOfficialAddressSoi'),
            'StudentOfficialAddressTrok' => $this->input->post('StudentOfficialAddressTrok'),
            'StudentOfficialAddressSubdistrictCode' => $this->input->post('StudentOfficialAddressSubdistrictCode'),
            'StudentOfficialAddressDistrictCode' => $this->input->post('StudentOfficialAddressDistrictCode'),
            'StudentOfficialAddressProvinceCode' => $this->input->post('StudentOfficialAddressProvinceCode'),
            'StudentOfficialAddressPostcode' => $this->input->post('StudentOfficialAddressPostcode'),
            'StudentOfficialAddressPhoneNumber' => $this->input->post('StudentOfficialAddressPhoneNumber'),

            //ที่อยู่ปัจจุบัน
            'StudentCurrentAddressHouseNumber' => $this->input->post('StudentCurrentAddressHouseNumber'),
            'StudentCurrentAddressMoo' => $this->input->post('StudentCurrentAddressMoo'),
            'StudentCurrentAddressStreet' => $this->input->post('StudentCurrentAddressStreet'),
            'StudentCurrentAddressSoi' => $this->input->post('StudentCurrentAddressSoi'),
            'StudentCurrentAddressTrok' => $this->input->post('StudentCurrentAddressTrok'),
            'StudentCurrentAddressSubdistrictCode' => $this->input->post('StudentCurrentAddressSubdistrictCode'),
            'StudentCurrentAddressDistrictCode' => $this->input->post('StudentCurrentAddressDistrictCode'),
            'StudentCurrentAddressProvinceCode' => $this->input->post('StudentCurrentAddressProvinceCode'),
            'StudentCurrentAddressPostcode' => $this->input->post('StudentCurrentAddressPostcode'),
            'StudentCurrentAddressPhoneNumber' => $this->input->post('StudentCurrentAddressPhoneNumber')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Update Student Parents
    public function update_student_parents($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ข้อมูลบิดา
            'FatherPersonalID' => $this->input->post('FatherPersonalID'),
            'FatherPassportNumber' => $this->input->post('FatherPassportNumber'),
            'FatherPrefixCode' => $this->input->post('FatherPrefixCode'),
            'FatherNameThai' => $this->input->post('FatherNameThai'),
            'FatherLastNameThai' => $this->input->post('FatherLastNameThai'),
            'FatherNameEnglish' => $this->input->post('FatherNameEnglish'),
            'FatherLastNameEnglish' => $this->input->post('FatherLastNameEnglish'),
            'FatherPersonStatusCode' => $this->input->post('FatherPersonStatusCode'),
            'FatherPhoneNumber' => $this->input->post('FatherPhoneNumber'),
            'FatherOccupationCode' => $this->input->post('FatherOccupationCode'),
            'FatherSalary' => $this->input->post('FatherSalary'),

            //ข้อมูลมารดา
            'MotherPersonalID' => $this->input->post('MotherPersonalID'),
            'MotherPassportNumber' => $this->input->post('MotherPassportNumber'),
            'MotherPrefixCode' => $this->input->post('MotherPrefixCode'),
            'MotherNameThai' => $this->input->post('MotherNameThai'),
            'MotherLastNameThai' => $this->input->post('MotherLastNameThai'),
            'MotherNameEnglish' => $this->input->post('MotherNameEnglish'),
            'MotherLastNameEnglish' => $this->input->post('MotherLastNameEnglish'),
            'MotherPersonStatusCode' => $this->input->post('MotherPersonStatusCode'),
            'MotherPhoneNumber' => $this->input->post('MotherPhoneNumber'),
            'MotherOccupationCode' => $this->input->post('MotherOccupationCode'),
            'MotherSalary' => $this->input->post('MotherSalary')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Update Student Family
    public function update_student_family($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ข้อมูลผู้ปกครอง
            'GuardianPersonalID' => $this->input->post('GuardianPersonalID'),
            'GuardianPassportNumber' => $this->input->post('GuardianPassportNumber'),
            'GuardianPrefixCode' => $this->input->post('GuardianPrefixCode'),
            'GuardianNameThai' => $this->input->post('GuardianNameThai'),
            'GuardianLastNameThai' => $this->input->post('GuardianLastNameThai'),
            'GuardianNameEnglish' => $this->input->post('GuardianNameEnglish'),
            'GuardianLastNameEnglish' => $this->input->post('GuardianLastNameEnglish'),
            'GuardianRelationCode' => $this->input->post('GuardianRelationCode'),
            'GuardianPhoneNumber' => $this->input->post('GuardianPhoneNumber'),
            'GuardianOccupationCode' => $this->input->post('GuardianOccupationCode'),
            'GuardianSalary' => $this->input->post('GuardianSalary'),

            //ข้อมูลครอบครัว
            'ParentMarriageStatusCode' => $this->input->post('ParentMarriageStatusCode'),
            'StudentBirthOrder' => $this->input->post('StudentBirthOrder'),
            'StudentElderBrotherAmount' => $this->input->post('StudentElderBrotherAmount'),
            'StudentElderSisterAmount' => $this->input->post('StudentElderSisterAmount'),
            'StudentYoungerBrotherAmount' => $this->input->post('StudentYoungerBrotherAmount'),
            'StudentYoungerSisterAmount' => $this->input->post('StudentYoungerSisterAmount')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Update Student Journey
    public function update_student_journey($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ข้อมูลการเดินทางไปสถานศึกษา
            'JourneyTypeCode' => $this->input->post('JourneyTypeCode'),
            'JourneyTime' => $this->input->post('JourneyTime'),
            'RockJourneyDistance' => $this->input->post('RockJourneyDistance'),
            'RubberJourneyDistance' => $this->input->post('RubberJourneyDistance'),
            'WaterJourneyDistance' => $this->input->post('WaterJourneyDistance'),

            //ข้อมูลความพิการ
            'DisabilityCode' => $this->input->post('DisabilityCode'),
            'DisabilityDetail' => $this->input->post('DisabilityDetail'),
            'DisabilityLevelCode' => $this->input->post('DisabilityLevelCode')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Update Student Disadvantaged
    public function update_student_disadvantaged($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ข้อมูลความด้อยโอกาส
            'DisadvantagedCode' => $this->input->post('DisadvantagedCode'),
            'LackingBookFlag' => $this->input->post('LackingBookFlag'),
            'LackingFoodFlag' => $this->input->post('LackingFoodFlag'),
            'LackingStationeryFlag' => $this->input->post('LackingStationeryFlag'),
            'LackingUniformFlag' => $this->input->post('LackingUniformFlag'),

            //ข้อมูลเกณฑ์ความยากจน
            'FamilyMonthlyIncome' => $this->input->post('FamilyMonthlyIncome'),
            'FamilyStatusCode' => $this->input->post('FamilyStatusCode'),
            'StudentLiveWithCode' => $this->input->post('StudentLiveWithCode'),
            'StateWelfareFlag' => $this->input->post('StateWelfareFlag')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }

    //Update Student Talent
    public function update_student_talent($StudentReferenceID, $SchoolID)
    {

        $data = [

            //ข้อมูลความสามารถพิเศษ
            'TalentCode' => $this->input->post('TalentCode')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->where('SchoolID', $SchoolID)->update('STUDENT', $data);
        return $result;
    }


    //Delete Data Form Student
    public function delete_student($StudentReferenceID)
    {
        $data = [

            'StudentReferenceID' => Date('Ymd') . rand(1, 9999),
            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('StudentReferenceID ', $StudentReferenceID)->update('STUDENT', $data);
        return $result;
    }
    public function get_STUDENT_All()
    {
        $this->db->from('STUDENT')
            ->where('DeleteStatus', 0);
        $query = $this->db->get();
        return $query->result();
    }
}
