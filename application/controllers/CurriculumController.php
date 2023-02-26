<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CurriculumController extends CI_Controller{
    public function index() {
        
        if ( ! file_exists(APPPATH.'views/pages/forms/forms-Curriculum.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Forms Curriculum'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/forms-curriculum', $data);
        $this->load->view('templates/footer', $data);
    }
 /*

   // add data
    public function store() {
        $CurriculumModel = new CurriculumModel();
        $data = [
            'EDUCATION_YEAR' => $this->request->getVar('EDUCATION_YEAR'),
            'SEMESTER' => $this->request->getVar('SEMESTER'),
            'SCHOOL_ID' => $this->request->getVar('SCHOOL_ID'),
            'CURRICULUM_NAME' => $this->request->getVar('CURRICULUM_NAME'),
            'CURRICULUM_CODE' => $this->request->getVar('CURRICULUM_CODE'),
            'EDUCATION_LEVEL_CODE' => $this->request->getVar('EDUCATION_LEVEL_CODE'),
            'GRADE_LEVEL_CODE' => $this->request->getVar('GRADE_LEVEL_CODE'),
            'CURRICULUM_DOCUMENT' => $this->request->getVar('CURRICULUM_DOCUMENT'),
            'LOCAL_CURRICULUM_FLAG' => $this->request->getVar('LOCAL_CURRICULUM_FLAG'),
            'LOCAL_CURRICULUM_NAME' => $this->request->getVar('LOCAL_CURRICULUM_NAME'),
            'LOCAL_CURRICULUM_DOCUMENT' => $this->request->getVar('LOCAL_CURRICULUM_DOCUMENT'),
        ]
        $CurriculumModel->insert($data);
        return $this->response->redirect(site_url('test'));
        //return view('test');
    }
    */
}