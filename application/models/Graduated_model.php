<?php

class Graduated_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
        $this->load->helper('url');
    }

    //Delete Data graduated
    public function delete_graduated($StudentReferenceID)
    {
        $data = [

            'DeleteStatus' => '1'

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)
            ->update('GRADUATED', $data);
        return $result;
    }

    //update Data graduated
    public function update_graduated($StudentReferenceID)
    {
        $data = [

            'GraduatedDate' => $this->input->post('GraduatedDate'),
            'GraduatedOrderNumber' => $this->input->post('GraduatedOrderNumber'),
            'CertificationNumber' => $this->input->post('CertificationNumber'),
            'EndorserPrefixCode' => $this->input->post('EndorserPrefixCode'),
            'EndorserNameThai' => $this->input->post('EndorserNameThai'),
            'EndorserLastNameThai' => $this->input->post('EndorserLastNameThai'),
            'EndorserPositionCode' => $this->input->post('EndorserPositionCode')

        ];

        $result = $this->db->where('StudentReferenceID', $StudentReferenceID)
            ->update('GRADUATED', $data);
        return $result;
    }
}
