<?php

class DocumentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper(array('form', 'url'));
    }

    public function load_file(){
        $this->load->helper('download');
       // $data = file_get_contents(APPPATH . 'documents/DevelopmentDocument.pdf'); // Read the file's contents
       $filePath= $_GET['file']; 
       $data = file_get_contents($filePath);

       $arr = explode('documents/', $filePath); 
       $name =  $arr[1];
        force_download($name, $data);
    }

}
?>