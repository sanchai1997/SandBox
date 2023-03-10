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
        
        if ( ! file_exists(APPPATH.'views/pages/forms/TeacherDevelopmentActivity/forms-teacher_development_activity.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Teacher Developmant Activity'; // Capitalize the first letter
        $data['listTeacher'] = $this->Teacher_model->get_teacher_All();
        $data['listDevelopmentActivityType'] = $this->Code_model->get_DevelopmentActivityType_All();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/TeacherDevelopmentActivity/forms-teacher_development_activity', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add_teacher_development_activity() {
        $DevelopmentDocument = $this->do_upload('DevelopmentDocument',"DevelopmentDocument");

        if($DevelopmentDocument != -1 ){
            $teacher_development_activity = [
                'DevelopmentActivityEducationYear' => $this->input->post('DevelopmentActivityEducationYear'),
                'DevelopmentActivitySemester' => $this->input->post('DevelopmentActivitySemester'),
                'TeacherID' => $this->input->post('TeacherID'),
                'DevelopmentActivityTypeCode' => $this->input->post('DevelopmentActivityTypeCode'),
                'DevelopmentActivityName' => $this->input->post('DevelopmentActivityName'),
                'DevelopmentActivityPlace' => $this->input->post('DevelopmentActivityPlace'),
                'DevelopmentActivityHour' => $this->input->post('DevelopmentActivityHour'),
                'Organizer' => $this->input->post('Organizer'),
                'DevelopmentActivityStartDate' => $this->input->post('DevelopmentActivityStartDate'),
                'DevelopmentActivityEndDate' => $this->input->post('DevelopmentActivityEndDate'),
                'DevelopmentDocument'=> $DevelopmentDocument,
                'DeleteStatus' => 0 
            ];
            $result =  $this->TeacherDevelopmentActivity_model->insert_TeacherDevelopmentActivity($teacher_development_activity);
            
            if($result == 1 ){
                $this->session->set_flashdata('success',"??????????????????????????????????????????????????????");
                redirect(base_url('list-teacher_development_activity')); //????????????????????????????????? 
            }else{
                $this->session->set_flashdata('errors',"?????????????????????????????????????????????????????????????????????????????????????????????");
                redirect(base_url('forms-teacher_development_activity')); 
            }

        }else{
            $this->session->set_flashdata('errors',"?????????????????????????????????????????????????????????????????????????????????????????????");
            redirect(base_url('forms-teacher_development_activity')); 
         }
            
    }

     public function list_teacher_development_activity() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/TeacherDevelopmentActivity/list-teacher_development_activity.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = 'Teacher Development Activity'; // Capitalize the first letter
        $data['listTeacherDevelopmentActivity'] = $this->TeacherDevelopmentActivity_model->get_TeacherDevelopmentActivityAll();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/TeacherDevelopmentActivity/list-teacher_development_activity', $data);
        $this->load->view('templates/footer', $data);

    }


    public function do_upload($fileName , $field_name ) {
        $config['upload_path'] = APPPATH."documents/";  // ???????????????????????? ????????????????????????????????????????????? root ??????????????????????????????
        $config['allowed_types'] = 'jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|3gp'; // ?????????????????????????????? 
        $config['max_size']     = '0';  // ???????????????????????? (kb)  0 ????????????????????????????????? ?????????????????????????????????????????? php.ini ????????????????????????????????? 2MB
        $config['file_name'] = $fileName;  // ???????????????????????? ????????????????????????????????????????????????????????????????????????????????????

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            show_error($error);
            return -1 ;
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            return $this->upload->data('full_path') ;
        }

    }
    public function forms_edit_teacher_development_activity(){

        $TeacherID = $_GET['tid'];
        $DevelopmentActivityName = $_GET['name'];
        $DevelopmentActivityStartDate  = $_GET['sdate'];

        $data['TeacherDevelopmentActivity'] = $this->TeacherDevelopmentActivity_model->get_TeacherDevelopmentActivity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate );
        $data['listTeacher'] = $this->Teacher_model->get_teacher_All();
        $data['listDevelopmentActivityType'] = $this->Code_model->get_DevelopmentActivityType_All();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/TeacherDevelopmentActivity/edit-forms-teacher_development_activity',$data);
        $this->load->view('templates/footer');
    }

    public function edit_teacher_development_activity() {
        $Old_TeacherID = $this->input->post('Old_TeacherID');
        $Old_DevelopmentActivityName  = $this->input->post('Old_DevelopmentActivityName');
        $Old_DevelopmentActivityStartDate  = $this->input->post('Old_DevelopmentActivityStartDate');

        $DevelopmentDocument = $this->do_upload('DevelopmentDocument',"DevelopmentDocument");

        $teacher_development_activity = [] ;

        if($DevelopmentDocument != -1 ){
            $teacher_development_activity = [
                'DevelopmentActivityEducationYear' => $this->input->post('DevelopmentActivityEducationYear'),
                'DevelopmentActivitySemester' => $this->input->post('DevelopmentActivitySemester'),
                'TeacherID' => $this->input->post('TeacherID'),
                'DevelopmentActivityTypeCode' => $this->input->post('DevelopmentActivityTypeCode'),
                'DevelopmentActivityName' => $this->input->post('DevelopmentActivityName'),
                'DevelopmentActivityPlace' => $this->input->post('DevelopmentActivityPlace'),
                'DevelopmentActivityHour' => $this->input->post('DevelopmentActivityHour'),
                'Organizer' => $this->input->post('Organizer'),
                'DevelopmentActivityStartDate' => $this->input->post('DevelopmentActivityStartDate'),
                'DevelopmentActivityEndDate' => $this->input->post('DevelopmentActivityEndDate'),
                'DevelopmentDocument'=> $DevelopmentDocument,
                'DeleteStatus' => 0 
            ];
          
        }else{
            $teacher_development_activity = [
                'DevelopmentActivityEducationYear' => $this->input->post('DevelopmentActivityEducationYear'),
                'DevelopmentActivitySemester' => $this->input->post('DevelopmentActivitySemester'),
                'TeacherID' => $this->input->post('TeacherID'),
                'DevelopmentActivityTypeCode' => $this->input->post('DevelopmentActivityTypeCode'),
                'DevelopmentActivityName' => $this->input->post('DevelopmentActivityName'),
                'DevelopmentActivityPlace' => $this->input->post('DevelopmentActivityPlace'),
                'DevelopmentActivityHour' => $this->input->post('DevelopmentActivityHour'),
                'Organizer' => $this->input->post('Organizer'),
                'DevelopmentActivityStartDate' => $this->input->post('DevelopmentActivityStartDate'),
                'DevelopmentActivityEndDate' => $this->input->post('DevelopmentActivityEndDate'),
                'DeleteStatus' => 0 
            ];
         }

         $result =  $this->TeacherDevelopmentActivity_model->update_TeacherDevelopmentActivity( $Old_TeacherID, $Old_DevelopmentActivityName, $Old_DevelopmentActivityStartDate, $teacher_development_activity);
         if($result == 1 ){
             $this->session->set_flashdata('success',"???????????????????????????????????????????????????");
             redirect(base_url('list-teacher_development_activity'));
         }else{
             $this->session->set_flashdata('errors',"??????????????????????????????????????????????????????????????????????????????????????????");
             redirect(base_url('edit_forms-teacher_development_activity?tid='. $Old_TeacherID.'&&name='.$Old_DevelopmentActivityName.'&&sdate='.$Old_DevelopmentActivityStartDate)); 
         }
   
    }

    public function delete_teacher_development_activity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate ){
        show_error($TeacherID.' f: '.$DevelopmentActivityName.' : '.$DevelopmentActivityStartDate);
        $result =$this->TeacherDevelopmentActivity_model->delete_teacher_development_activity($TeacherID, $DevelopmentActivityName, $DevelopmentActivityStartDate);
        if($result == 1 ){
            $this->session->set_flashdata('success',"???????????????????????????????????????????????????");
            redirect(base_url('list-teacher_development_activity'));
        }else{
            $this->session->set_flashdata('errors',"?????????????????????????????????????????????????????????????????????????????????");
            redirect(base_url('list-teacher_development_activity'));
        }
        
    }

}
    
?>