<?php

class Graduated_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //ADD Data graduated
    public function add_graduated()
    {

        $data = [

            'EducationYear' => $this->input->post('EducationYear'),
            'Semester' => $this->input->post('Semester'),
            'GraduatedSchoolID' => $this->input->post('GraduatedSchoolID'),
            'StudentReferenceID' => $this->input->post('StudentReferenceID'),
            'GraduatedEducationYear' => $this->input->post('GraduatedEducationYear'),
            'GraduatedDate' => $this->input->post('GraduatedDate'),
            'GraduatedEducationLevelCode' => $this->input->post('GraduatedEducationLevelCode'),
            'GraduatedGradeLevelCode' => $this->input->post('GraduatedGradeLevelCode'),
            'GraduatedOrderNumber' => $this->input->post('GraduatedOrderNumber'),
            'GraduatedTranscriptNumber' => $this->input->post('GraduatedTranscriptNumber'),
            'GraduatedTranscriptSeriesNumber' => $this->input->post('GraduatedTranscriptSeriesNumber'),
            'CertificationNumber' => $this->input->post('CertificationNumber'),
            'EndorserPrefixCode' => $this->input->post('EndorserPrefixCode'),
            'EndorserNameThai' => $this->input->post('EndorserNameThai'),
            'EndorserMiddleNameThai' => $this->input->post('EndorserMiddleNameThai'),
            'EndorserLastNameThai' => $this->input->post('EndorserLastNameThai'),
            'EndorserPositionCode' => $this->input->post('EndorserPositionCode')

        ];

        $result = $this->db->insert('GRADUATED', $data);
        return $result;
    }

    //Update Data graduated
    public function update_graduated($StudentReferenceID)
    {

        $data = [

            'Semester' => $this->input->post('Semester'),
            'GraduatedEducationYear' => $this->input->post('GraduatedEducationYear'),
            'GraduatedDate' => $this->input->post('GraduatedDate'),
            'GraduatedEducationLevelCode' => $this->input->post('GraduatedEducationLevelCode'),
            'GraduatedOrderNumber' => $this->input->post('GraduatedOrderNumber'),
            'GraduatedTranscriptNumber' => $this->input->post('GraduatedTranscriptNumber'),
            'GraduatedTranscriptSeriesNumber' => $this->input->post('GraduatedTranscriptSeriesNumber'),
            'CertificationNumber' => $this->input->post('CertificationNumber'),
            'EndorserPrefixCode' => $this->input->post('EndorserPrefixCode'),
            'EndorserNameThai' => $this->input->post('EndorserNameThai'),
            'EndorserMiddleNameThai' => $this->input->post('EndorserMiddleNameThai'),
            'EndorserLastNameThai' => $this->input->post('EndorserLastNameThai'),
            'EndorserPositionCode' => $this->input->post('EndorserPositionCode')
        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->update('GRADUATED', $data);
        return $result;
    }

    //Delete Data graduated
    public function delete_graduated($StudentReferenceID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)->update('GRADUATED', $data);
        return $result;
    }
}
