<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '_sandboxcontroller.php';

class Logout extends _sandboxcontroller {
    public function __construct() {
        parent::__construct();
    }

    function index() {

        $this->session->sess_destroy();

        echo "<script>localStorage.clear();window.location = '" . base_url() . 'Main' . "' </script>";

        redirect(base_url()  . 'Main');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */