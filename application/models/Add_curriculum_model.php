<?php 

class Add_curriculum_model  extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }

    public function add_curriculum() {    
       
        $curriculum = [
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

        $CURRICULUM_SUBJECT = [
            'CURRICULUM_ID' => $this->input->post('CURRICULUM_ID'),
            'SUBJECT_NAME' => $this->input->post('SUBJECT_NAME'),
            'SUBJECT_CODE' => $this->input->post('SUBJECT_CODE'),
            'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
            'SUBJECT_TYPE_CODE' => $this->input->post('SUBJECT_TYPE_CODE'),
            'CREDIT' => $this->input->post('CREDIT'),
            'LEARNING_HOUR' => $this->input->post('LEARNING_HOUR')
        ];
 
        $result = $this->db->insert('CURRICULUM', $curriculum);
        $result = $this->db->insert('curriculum_subject', $CURRICULUM_SUBJECT);
        return $result;
    }
    
}

?>