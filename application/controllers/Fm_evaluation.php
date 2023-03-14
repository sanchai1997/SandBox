<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fm_evaluation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('evaluation_model');
    }
    public function index()
    {
        $data['query']=$this->evaluation_model->show_index();

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh1()
    {
        $data['query']=$this->evaluation_model->show_ass_ria();

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh2()
    {
        $data['query']=$this->evaluation_model->show_ass_ria_lvl();//sh2

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }

    public function sh3()
    {
        $data['query']=$this->evaluation_model->show_ass_ria_com();//sh3

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh4()
    {
        $data['query']=$this->evaluation_model->show_ass_ria_com_lvl();//sh4

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh5()
    {
        $data['query']=$this->evaluation_model->show_sc_ass();//sh5

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh6()
    {
        $data['query']=$this->evaluation_model->show_sc_ass_ria();//sh6

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh7()
    {
        $data['query']=$this->evaluation_model->show_sc_ass_res();//sh7

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    public function sh8()
    {
        $data['query']=$this->evaluation_model->show_achie_ass();//sh8

        // 		echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // exit;
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/dashboard/evaluation',$data);
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    
    public function forms()
    {
        
        // 		echo '<pre>';
        // print_r($data_q_member . $data_q_committee);
        // echo '</pre>';
        // exit;
        
        $this->load->view('mycss');
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pages/forms/EII/forms-evaluation');
        $this->load->view('templates/footer');
        $this->load->view('myjs');
    }
    
    public function insert_ass_ria()
    {
        $this->evaluation_model->insert_ass_ria();
    }
    public function edit_ass_ria()
    {
        $this->evaluation_model->edit_ass_ria();
    }
    public function del_ass_ria()
    {
        $this->evaluation_model->del_ass_ria();
    }
    public function insert_ass_ria_lvl()//sh2
    {
        $this->evaluation_model->insert_ass_ria_lvl();
    }
    public function edit_ass_ria_lvl()//sh2
    {
        $this->evaluation_model->edit_ass_ria_lvl();
    }
    public function del_ass_ria_lvl()//sh2
    {
        $this->evaluation_model->del_ass_ria_lvl();
    }
    public function insert_ass_ria_com()//sh3
    {
        $this->evaluation_model->insert_ass_ria_com();
    }
    public function edit_ass_ria_com()//sh3
    {
        $this->evaluation_model->edit_ass_ria_com();
    }
    public function del_ass_ria_com()//sh3
    {
        $this->evaluation_model->del_ass_ria_com();
    }
    public function insert_ass_ria_com_lvl()//sh4
    {
        $this->evaluation_model->insert_ass_ria_com_lvl();
    }
    public function edit_ass_ria_com_lvl()//sh4
    {
        $this->evaluation_model->edit_ass_ria_com_lvl();
    }
    public function del_ass_ria_com_lvl()//sh4
    {
        $this->evaluation_model->del_ass_ria_com_lvl();
    }
    public function insert_sc_ass()//sh5
    {
        $this->evaluation_model->insert_sc_ass();
    }
    public function edit_sc_ass()//sh5
    {
        $this->evaluation_model->edit_sc_ass();
    }
    public function del_sc_ass()//sh5
    {
        $this->evaluation_model->del_sc_ass();
    }
    public function insert_sc_ass_ria()//sh6
    {
        $this->evaluation_model->insert_sc_ass_ria();
    }
    public function edit_sc_ass_ria()//sh6
    {
        $this->evaluation_model->edit_sc_ass_ria();
    }
    public function del_sc_ass_ria()//sh6
    {
        $this->evaluation_model->del_sc_ass_ria();
    }
    public function insert_sc_ass_res()//sh7
    {
        $this->evaluation_model->insert_sc_ass_res();
    }
    public function edit_sc_ass_res()//sh7
    {
        $this->evaluation_model->edit_sc_ass_res();
    }
    public function del_sc_ass_res()//sh7
    {
        $this->evaluation_model->del_sc_ass_res();
    }
    public function insert_achie_ass()//sh8
    {
        $this->evaluation_model->insert_achie_ass();
    }
    public function edit_achie_ass()//sh8
    {
        $this->evaluation_model->edit_achie_ass();
    }
    public function del_achie_ass()//sh8
    {
        $this->evaluation_model->del_achie_ass();
    }
    

}
