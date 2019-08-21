<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemEmail extends CI_Controller {
	public $data = array();
	var $config;
	var $tablas_permitidas;
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Global_model');		
		require_once(APPPATH.'libraries/Globals.php');
	
		
	}
	
	public function index($tpl=''){		
		$this->data['active'] = '';
		$this->data["ffile"] = '';
		$this->load->view('emails/'.$tpl,$this->data);		
	}
	
	
	
}

