<?php

class UploadController extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }

        public function do_upload($fileName, $field_name ) {
            $config['upload_path'] = FCPATH."application/files/";  // โฟลเดอร์ ตำแหน่งเดียวกับ root ของโปรเจ็ค
            //$config['allowed_types'] = 'gif|jpg|png'; // ปรเเภทไฟล์ 
            $config['max_size']     = '0';  // ขนาดไฟล์ (kb)  0 คือไม่จำกัด ขึ้นกับกำหนดใน php.ini ปกติไม่เกิน 2MB
            //$config['max_width'] = '1024';  // ความกว้างรูปไม่เกิน
            //$config['max_height'] = '768'; // ความสูงรูปไม่เกิน
            $config['file_name'] = $fileName;  // ชื่อไฟล์ ถ้าไม่กำหนดจะเป็นตามชื่อเดิม

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($field_name)) {
                $error = array('error' => $this->upload->display_errors());
                return -1 ;
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                return $this->upload->data('full_path') ;
            }
        }
}
?>