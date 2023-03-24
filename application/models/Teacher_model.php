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


    //Add Data Teacher-Select SchoolID, EducationYear, Semester, EntryMajorCode, EntryProgramCode
    public function add_teacher_select($SchoolID, $EducationYear, $Semester, $EntryMajorCode, $EntryProgramCode)
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
            'EntryMajorCode' => $EntryMajorCode,
            'EntryProgramCode' => $EntryProgramCode,
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


    //Delete Data Form Teacher
    public function delete_teacher($TeacherID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('TeacherID ', $TeacherID)->update('TEACHER', $data);
        return $result;
    }
}
