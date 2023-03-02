<?php 

class Add_curriculum_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function add_curriculum() {    
       
        $data = [
            'EDUCATION_YEAR' => $this->input->post('EDUCATION_YEAR'),
            'SEMESTER' => $this->input->post('SEMESTER'),
            'SCHOOL_ID' => $this->input->post('SCHOOL_ID'),
            'CURRICULUM_NAME' => $this->input->post('CURRICULUM_NAME'),
            'CURRICULUM_CODE' => $this->input->post('CURRICULUM_CODE'),
            'EDUCATION_LEVEL_CODE' => $this->input->post('EDUCATION_LEVEL_CODE'),
            'GRADE_LEVEL_CODE' => $this->input->post('GRADE_LEVEL_CODE'),
            'CURRICULUM_DOCUMENT' => $this->input->post('CURRICULUM_DOCUMENT'),
            'LOCAL_CURRICULUM_FLAG' => $this->input->post('LOCAL_CURRICULUM_FLAG'),
            'LOCAL_CURRICULUM_NAME' => $this->input->post('LOCAL_CURRICULUM_NAME'),
            'LOCAL_CURRICULUM_DOCUMENT' => $this->input->post('LOCAL_CURRICULUM_DOCUMENT')
        ];
 
        $result = $this->db->insert('CURRICULUM', $data);
        return $result;
    }
}

?>