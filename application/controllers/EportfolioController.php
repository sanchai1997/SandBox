<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EportfolioController extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        // Your own constructor code
        $this->load->library('session');
        $this->load->model('School_model');
        $this->load->model('Student_model');
        $this->load->model('Eportfolio_model');
    }
    public function do_upload($fileName , $field_name ) {
        $config['upload_path'] = 'assets/Eportfolio/document/';   // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
        
        $config['allowed_types'] = 'jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|3gp'; // ปรเเภทไฟล์ 
        $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
        $config['file_name'] = $fileName;  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเดิม

        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($field_name)) {
            $error = array('error' => $this->upload->display_errors());
            return -1 ;
        }
        else {
            $data = $this->upload->data();
            return $data['file_name'];
        }

    }

 #eportfolio   
    public function forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Eportfolio/forms-eportfolio.php'))
        {
            show_404();
        }

        $data['STUDENT'] = $this->Student_model->get_STUDENT_All();
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Eportfolio/forms-eportfolio',$data);
        $this->load->view('templates/footer');

    }

    public function add_eportfolio() {
        $eportfolio = [
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'),
            'STUDENT_PROJECT' => $this->input->post('STUDENT_PROJECT'),
            'STUDENT_GOODNESS' => $this->input->post('STUDENT_GOODNESS'),
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Eportfolio_model->insert_eportfolio($eportfolio);

        if($result_eportfolio == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-eportfolio'));
        }else{
            redirect(base_url('forms_eportfolio'));
        }

    }

    public function list_eportfolio() {
            
        if ( ! file_exists(APPPATH.'views/pages/dashboard/Eportfolio/list-eportfolio.php'))
        {
            show_404();
        }
        $data["EPORTFOLIO"] = $this->Eportfolio_model->get_EPORTFOLIO_ALL();        
  
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/Curriculum/list-eportfolio',$data);
        $this->load->view('templates/footer');

    }
    public function edit_forms_eportfolio() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/Eportfolio/edit_forms-eportfolio.php'))
        {
            show_404();
        }
        $data['EPORTFOLIO_ID'] = $_GET['ep']; 
        $data['STUDENT'] = $this->Student_model->get_STUDENT_All();
        
        $data["EPORTFOLIO"] = $this->Eportfolio_model->get_EPORTFOLIO($data['EPORTFOLIO_ID']);
       
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/Eportfolio/edit_forms-eportfolio',$data);
        $this->load->view('templates/footer');




    }
    public function edit_eportfolio() {
        $EPORTFOLIO_ID = $this->input->post('EPORTFOLIO_ID');
        
        $eportfolio = [
            'STUDENT_LIKE' => $this->input->post('STUDENT_LIKE'),
            'STUDENT_NO' => $this->input->post('STUDENT_NO'),
            'STUDENT_DREAM' => $this->input->post('STUDENT_DREAM'),
            'STUDENT_HOPE' => $this->input->post('STUDENT_HOPE'),
            'STUDENT_TARGET' => $this->input->post('STUDENT_TARGET'),
            'STUDENT_LEARNING' => $this->input->post('STUDENT_LEARNING'),
            'STUDENT_PROJECT' => $this->input->post('STUDENT_PROJECT'),
            'STUDENT_GOODNESS' => $this->input->post('STUDENT_GOODNESS'),
            'STUDENT_USEFULNESS' => $this->input->post('STUDENT_USEFULNESS'),
            'STUDENT_PRIDE' => $this->input->post('STUDENT_PRIDE'),
            'STUDENT_SUMMARY' => $this->input->post('STUDENT_SUMMARY'),
        ];
        $result_eportfolio = $this->Eportfolio_model->update_EPORTFOLIO($EPORTFOLIO_ID ,$eportfolio);

        if($result_eportfolio == 1 ){    
            $this->session->set_flashdata('success',"บันทึกข้อมูลสำเร็จ");
            redirect(base_url('list-eportfolio'));
        }else{
            redirect(base_url('forms_eportfolio'));
        }

    }
    public function delete_eportfolio($EPORTFOLIO_ID){


        $result =$this->Eportfolio_model->delete_eportfolio($EPORTFOLIO_ID);

        if($result == 1 ){
            $this->session->set_flashdata('success',"ลบข้อมูลสำเร็จ");
            redirect(base_url('list-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID ));
        }else{
            $this->session->set_flashdata('errors',"เกิดข้อผิดพลาดในการลบข้อมูล");
            redirect(base_url('list-curriculum_activity?pid='. $PLAN_ID.'&&sid='. $SubjectCode.'&&cid='. $CurriculumID ));
        }
    }
}

?>