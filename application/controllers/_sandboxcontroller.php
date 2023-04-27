<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class _sandboxcontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        define('BASEURL', base_url());
        define('ASSETURL', BASEURL . 'assets/');
		
		$this->load->library('session');
        $this->load->model('Config_model');	
		
        $data = array(
            'UserID' => $this->session->userdata('UserID'),
            'UserName' => $this->session->userdata('UserName'),
            'UserFullName' => $this->session->userdata('UserFullName'),
            'UserSchoolID' => $this->session->userdata('UserSchoolID')
        );		
		
    }

	public function sandb_encode($string) {
		
		$config_encrypt_key = $this->Config_model->getitem(array('service' => 'encrypt_key', 'x' => 'encrypt_key'));
		$encrypt_key = $config_encrypt_key['y'];
		
		$key = sha1($encrypt_key);
		$strLen = strlen($string);
		$keyLen = strlen($key);
		$j = 0;
		$hash = '';
		for ($i = 0; $i < $strLen; $i++) {
			$ordStr = ord(substr($string,$i,1));
			if ($j == $keyLen) { $j = 0; }
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
		}
		return $hash;
	}

	public function sandb_decode($string) {
		
		$config_encrypt_key = $this->Config_model->getitem(array('service' => 'encrypt_key', 'x' => 'encrypt_key'));
		$encrypt_key = $config_encrypt_key['y'];
		
		$key = sha1($encrypt_key);		
		$strLen = strlen($string);
		$keyLen = strlen($key);
		$j = 0;		
		$hash = '';
		for ($i = 0; $i < $strLen; $i+=2) {
			$ordStr = hexdec(base_convert(strrev(substr($string,$i,2)),36,16));
			if ($j == $keyLen) { $j = 0; }
			$ordKey = ord(substr($key,$j,1));
			$j++;
			$hash .= chr($ordStr - $ordKey);
		}
		return $hash;
	}
		
}