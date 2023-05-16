<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once '_sandboxcontroller.php';
class Fm_evaluation extends _sandboxcontroller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Evaluation_model');
        $this->load->library('session');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array();
$data = $this->session->userdata();

        if(!empty($data['UserRights'])){
            //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
            $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
            $data['R_701000'] = $R_701000;
        }else{
            $data['R_701000'] = NULL;
        }
        $data['query']=$this->Evaluation_model->show_index();

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh1()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_ass_ria();

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh2()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_ass_ria_lvl();//sh2

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }

    public function sh3()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_ass_ria_com();//sh3

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh4()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_ass_ria_com_lvl();//sh4

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh5()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_sc_ass();//sh5

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh6()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_sc_ass_ria();//sh6

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh7()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_sc_ass_res();//sh7

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    public function sh8()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        $data['query']=$this->Evaluation_model->show_achie_ass();//sh8

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/dashboard/EII/evaluation',$data);
        $this->load->view('templates/footer', $data);
        
    }
    
    public function forms()
    {
        $data = array();
        $data = $this->session->userdata();
        
                if(!empty($data['UserRights'])){
                    //'701000', 'ข้อมูลแนวปฏิบัติที่เป็นเลิศการจัดการศึกษา'
                    $R_701000 = $data['UserRights'][array_search('701000', array_column($data['UserRights'], 'UR_Code'))];		
                    $data['R_701000'] = $R_701000;
                }else{
                    $data['R_701000'] = NULL;
                }
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/forms/EII/forms-evaluation');
        $this->load->view('templates/footer', $data);
      
    }
    
    public function insert_ass_ria()
    {
        $this->Evaluation_model->insert_ass_ria();
    }
    public function edit_ass_ria()
    {
        $this->Evaluation_model->edit_ass_ria();
    }
    public function del_ass_ria()
    {
        $this->Evaluation_model->del_ass_ria();
    }
    public function insert_ass_ria_lvl()//sh2
    {
        $this->Evaluation_model->insert_ass_ria_lvl();
    }
    public function edit_ass_ria_lvl()//sh2
    {
        $this->Evaluation_model->edit_ass_ria_lvl();
    }
    public function del_ass_ria_lvl()//sh2
    {
        $this->Evaluation_model->del_ass_ria_lvl();
    }
    public function insert_ass_ria_com()//sh3
    {
        $this->Evaluation_model->insert_ass_ria_com();
    }
    public function edit_ass_ria_com()//sh3
    {
        $this->Evaluation_model->edit_ass_ria_com();
    }
    public function del_ass_ria_com()//sh3
    {
        $this->Evaluation_model->del_ass_ria_com();
    }
    public function insert_ass_ria_com_lvl()//sh4
    {
        $this->Evaluation_model->insert_ass_ria_com_lvl();
    }
    public function edit_ass_ria_com_lvl()//sh4
    {
        $this->Evaluation_model->edit_ass_ria_com_lvl();
    }
    public function del_ass_ria_com_lvl()//sh4
    {
        $this->Evaluation_model->del_ass_ria_com_lvl();
    }
    public function insert_sc_ass()//sh5
    {
        $this->Evaluation_model->insert_sc_ass();
    }
    public function edit_sc_ass()//sh5
    {
        $this->Evaluation_model->edit_sc_ass();
    }
    public function del_sc_ass()//sh5
    {
        $this->Evaluation_model->del_sc_ass();
    }
    public function insert_sc_ass_ria()//sh6
    {
        $this->Evaluation_model->insert_sc_ass_ria();
    }
    public function edit_sc_ass_ria()//sh6
    {
        $this->Evaluation_model->edit_sc_ass_ria();
    }
    public function del_sc_ass_ria()//sh6
    {
        $this->Evaluation_model->del_sc_ass_ria();
    }
    public function insert_sc_ass_res()//sh7
    {
        $this->Evaluation_model->insert_sc_ass_res();
    }
    public function edit_sc_ass_res()//sh7
    {
        $this->Evaluation_model->edit_sc_ass_res();
    }
    public function del_sc_ass_res()//sh7
    {
        $this->Evaluation_model->del_sc_ass_res();
    }
    public function insert_achie_ass()//sh8
    {
        $this->Evaluation_model->insert_achie_ass();
    }
    public function edit_achie_ass()//sh8
    {
        $this->Evaluation_model->edit_achie_ass();
    }
    public function del_achie_ass()//sh8
    {
        $this->Evaluation_model->del_achie_ass();
    }
    public function get_data() {
        // echo '<pre>';
		// print_r($_POST);
		// echo'</pre>';
		// exit;
        $option = $this->input->post('option');
        $data = $this->Evaluation_model->get_data($option);
        echo $data;
        exit;
      }
      public function get_ACHIEVEMENT_ASSESSMENT() {
        $SchoolAssessmentEducationYear = $this->input->post('key1');
        $SchoolAssessmentSemester = $this->input->post('key2');
        $SchoolID = $this->input->post('key3');
    
        $data = $this->Evaluation_model->get_ACHIEVEMENT_ASSESSMENT($SchoolAssessmentEducationYear, $SchoolAssessmentSemester, $SchoolID);
        $data1 = $this->Evaluation_model->get_ACHIEVEMENT_ASSESSMENT1($SchoolAssessmentEducationYear, $SchoolAssessmentSemester, $SchoolID);
        $result = array(
            'AssessmentorName' => $data['AssessmentorName'],
            'SchoolAssessmentScore' => $data['SchoolAssessmentScore'],
            'SchoolAssessmentName' => $data1['SchoolAssessmentName'],
            'SchoolAssessmentDescription' => $data1['SchoolAssessmentDescription']
        );
        echo json_encode($result);
        exit;
    }
    public function down_csv_criteria() {
        $this->Evaluation_model->down_csv_criteria();
    }

    public function uplod_criteria() {
        $this->Evaluation_model->uplod_criteria();
    }

}
?>