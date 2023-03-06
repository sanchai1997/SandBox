<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_development_activity_controller extends CI_Controller{
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Teacher_model');
        $this->load->model('Code_model');
        $this->load->model('TeacherDevelopmentActivity_model');

    }

    public function forms() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-teacher_development_activity.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Teacher Developmant Activity'; // Capitalize the first letter
        $data['listTeacher'] = $this->Teacher_model->get_teacher_All();
        $data['listDevelopmentActivityType'] = $this->Code_model->get_DevelopmentActivityType_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-teacher_development_activity', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_teacher_development_activity() {
    
            $teacher_development_activity = [
                'DEVELOPMENT_ACTIVITY_EDUCATION_YEAR	' => $this->input->post('DevelopmentActivityEducationYear'),
                'DEVELOPMENT_ACTIVITY_SEMESTER' => $this->input->post('DevelopmentActivitySemester'),
                'TEACHER_ID' => $this->input->post('TeacherID'),
                'DEVELOPMENT_ACTIVITY_TYPE_CODE' => $this->input->post('DevelopmentActivityTypeCode'),
                'DEVELOPMENT_ACTIVITY_NAME' => $this->input->post('DevelopmentActivityName'),
                'DEVELOPMENT_ACTIVITY_PLACE' => $this->input->post('DevelopmentActivityPlace'),
                'DEVELOPMENT_ACTIVITY_HOUR' => $this->input->post('DevelopmentActivityHour'),
                'ORGANIZER' => $this->input->post('Organizer'),
                'DEVELOPMENT_ACTIVITY_START_DATE' => $this->input->post('DevelopmentActivityStartDate'),
                'DEVELOPMENT_ACTIVITY_END_DATE' => $this->input->post('DevelopmentActivityEndDate')
            ];
            $result =  $this->TeacherDevelopmentActivity_model->insert_TeacherDevelopmentActivity($teacher_development_activity);
            
            if($result == 1 ){
                show_error('บันทึกข้อมูลสำเร็จ');
                $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
               // redirect(base_url('list-teacher_development_activity')); //รอเพิ่มหน้า 
               redirect(base_url('forms-teacher_development_activity')); 
            }else{
                show_error('เกิดข้อผิดพลาดในการบันทึกข้อมูล');
                $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการบันทึกข้อมูล");
                redirect(base_url('forms-teacher_development_activity')); 
            }
            
     }
   
}
    
?>