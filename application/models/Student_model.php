<?php

class Student_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    public function add_student($SchoolID)
    {

        $config['file_name'] = 'ImageStudent_' . $_POST['StudentPersonalID'];
        $config['upload_path'] = 'image/student';
        $config['allowed_types'] = 'doc|docx|pdf|jpg|png|xls|ppt|zip|xlsx';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('ImageStudent')) {
            echo $this->upload->display_errors();
        } else {

            $data = $this->upload->data();

            $data = [

                'StudentReferenceID ' => $_POST['StudentPrefixCode'] . $_POST['StudentPersonalID'],
                'SchoolID ' => $SchoolID,
                'ImageStudent' => $data['file_name'],
                'SchoolAdmissionYear' => $this->input->post('SchoolAdmissionYear'),
                'CurrentEducationLevelAdmissionYear' => $this->input->post('CurrentEducationLevelAdmissionYear'),
                'EducationLevelCode' => $this->input->post('EducationLevelCode'),
                'EducationYear' => $this->input->post('EducationYear'),
                'Semester' => $this->input->post('Semester'),
                'GradeLevelCode' => $this->input->post('GradeLevelCode'),
                'ImageStudent' => $this->input->post('ImageStudent'),
                'StudentID' => $this->input->post('StudentID'),
                'StudentStatusCode' => $this->input->post('StudentStatusCode'),
                'StudentPersonalIDTypeCode' => $this->input->post('StudentPersonalIDTypeCode'),
                'StudentPersonalID' => $this->input->post('StudentPersonalID'),
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
    }
}
