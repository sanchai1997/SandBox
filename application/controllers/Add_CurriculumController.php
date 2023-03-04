<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_CurriculumController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Curriculum_model');
    }

    public function index() {
        // add_curriculum
        $CURRICULUM_value = $this->input->post('CURRICULUM_CODE') ;
        $arr_CURRICULUM_ = explode(':',$CURRICULUM_value); 
        $CURRICULUM_CODE = $arr_CURRICULUM_[0] ;
        $CURRICULUM_NAME = $arr_CURRICULUM_[1] ;
        $curriculum = [
            'EDUCATION_YEAR' => $this->input->post('EDUCATION_YEAR'),
            'SEMESTER' => $this->input->post('SEMESTER'),
            'SCHOOL_ID' => $this->input->post('SCHOOL_ID'),
            'CURRICULUM_NAME' => $CURRICULUM_NAME,
            'CURRICULUM_CODE' => $CURRICULUM_CODE,
            'EDUCATION_LEVEL_CODE' => $this->input->post('EDUCATION_LEVEL_CODE'),
            'GRADE_LEVEL_CODE' => $this->input->post('GRADE_LEVEL_CODE'),
            'CURRICULUM_DOCUMENT' => $this->input->post('CURRICULUM_DOCUMENT'),
            'LOCAL_CURRICULUM_FLAG' => $this->input->post('LOCAL_CURRICULUM_FLAG'),
            'LOCAL_CURRICULUM_NAME' => $this->input->post('LOCAL_CURRICULUM_NAME'),
            'LOCAL_CURRICULUM_DOCUMENT' => $this->input->post('LOCAL_CURRICULUM_DOCUMENT')
        ];
        $result_curriculum =  $this->Curriculum_model->add_curriculum($curriculum);
        
        if($result_curriculum != -1){
            $CURRICULUM_ID = $result_curriculum ;
            // add_curriculum_subject
            $CURRICULUM_SUBJECT = [
                'CURRICULUM_ID' => $CURRICULUM_ID,
                'SUBJECT_NAME' => $this->input->post('SUBJECT_NAME'),
                'SUBJECT_CODE' => $this->input->post('SUBJECT_CODE'),
                'SUBJECT_GROUP_CODE' => $this->input->post('SUBJECT_GROUP_CODE'),
                'SUBJECT_TYPE_CODE' => $this->input->post('SUBJECT_TYPE_CODE'),
                'CREDIT' => $this->input->post('CREDIT'),
                'LEARNING_HOUR' => $this->input->post('LEARNING_HOUR')
            ];
            $resul_CURRICULUM_SUBJECT = $this->Curriculum_model->add_curriculum_subject($CURRICULUM_SUBJECT);
    
            // add_curriculum_school_competency
            $CURRICULUM_SCHOOl_COMPETENCY = [
                'CURRICULUM_ID' => $CURRICULUM_ID,
                'CURRICULUM_COMPETENCY_CODE' => $this->input->post('CURRICULUM_COMPETENCY_CODE'),
            ];
            $resul_CURRICULUM_SUBJECT = $this->Curriculum_model->add_curriculum_school_competency($CURRICULUM_SCHOOl_COMPETENCY);

            if($resul_CURRICULUM_SUBJECT == 1 && $resul_CURRICULUM_SUBJECT == 1){
                $this->session->set_flashdata('success', "Saved Successfully!");
                show_error('Saved Successfully!');
            }else{
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                show_error('เกิดข้อผิดพลาดในการบันทึกข้อมูล1');
            }
            
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
            show_error('เกิดข้อผิดพลาดในการบันทึกข้อมูล2');
        }

        redirect(base_url('forms-curriculum'));

   
    }
}