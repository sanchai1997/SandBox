<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_development_activity_controller extends CI_Controller{
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-Curriculum.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Teacher Developmant Activity'; // Capitalize the first letter
        $data['listTeacher'] = $this->Teacher_model->get_teacher_All();
        $data['listDevelopmentActivityType'] = $this->Development_activity_type_model->get_DevelopmentActivityType_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-teacher_development_activity', $data);
        $this->load->view('templates/footer', $data);
    }
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('Teacher_model');
        $this->load->model('Development_activity_type_model');
    }
    public function add_teacher_development_activity_form() {
    
            $teacher_development_activity = [
                'DevelopmentActivityEducationYear' => $this->input->post('DevelopmentActivityEducationYear'),
                'DevelopmentActivitySemester' => $this->input->post('DevelopmentActivitySemester'),
                'TeacherID' => $this->input->post('TeacherID'),
                'DevelopmentActivityTypeCode' => $this->input->post('DevelopmentActivityTypeCode'),
                'DevelopmentActivityName' => $this->input->post('DevelopmentActivityName'),
                'DevelopmentActivityPlace' => $this->input->post('DevelopmentActivityPlace'),
                'Organizer' => $this->input->post('Organizer'),
                'DevelopmentActivityStartDate' => $this->input->post('DevelopmentActivityStartDate'),
                'DevelopmentActivityEndDate' => $this->input->post('DevelopmentActivityEndDate')
            ];
            $result_Development_activity_type =  $this->Development_activity_type_model->insert_Development_activity_type($teacher_development_activity);
            
         

        redirect(base_url('forms-curriculum'));

   
    }
    
}