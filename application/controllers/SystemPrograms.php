<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemPrograms extends CI_Controller {
	public $data = array();
	var $config;
	var $tablas_permitidas;
	
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Global_model');		
		require_once(APPPATH.'libraries/Globals.php');
		if (@$this->nativesession->get('HD_ONLINE_status')!="login"):
			@ob_end_clean();
			redirect('/login', 'location', 302);
			exit();
		endif;
		//$this->load->model('Systemlist_model');
		$this->load->config('crud');
		
	}
	
	public function index($detalle='',$sExport=''){
		$this->data['sExport'] = $sExport;
		$this->data['active'] = 'programs';
		$this->data["ffile"] = ($detalle !='') ? 'doc_list_'.$detalle.'' : 'doc_list';
		$this->load->view('programslist',$this->data);		
	
	}
	
	
	public function view($detalle='',$sExport=''){
		$this->data['sExport'] = $sExport;
		$this->data['active'] = 'programs';
		$this->data["ffile"] = ($detalle !='') ? 'doc_list_'.$detalle.'' : 'doc_list';
		$this->load->view('programsview',$this->data);		
	
	}
	
	
}

