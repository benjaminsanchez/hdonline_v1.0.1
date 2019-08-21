<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemPromo extends CI_Controller {
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
	
	public function promo($detalle='',$sExport=''){
		$this->data['sExport'] = $sExport;
		$this->data['active'] = 'promo';
		$this->data["ffile"] = ($detalle !='') ? 'doc_list_'.$detalle.'' : 'doc_list';
		$this->load->view('promolist',$this->data);		
	
	}
	
	
	public function academy($detalle='',$sExport=''){
		$this->data['sExport'] = $sExport;
		$this->data['active'] = 'academy';
		$this->data["ffile"] = ($detalle !='') ? 'doc_list_'.$detalle.'' : 'doc_list';
		$this->load->view('academiaview',$this->data);		
	
	}
	
	
	public function promoview($detalle='',$sExport=''){
		$this->data['sExport'] = $sExport;
		$this->data['active'] = 'promo';
		$this->data["ffile"] = ($detalle !='') ? 'doc_list_'.$detalle.'' : 'doc_list';
		$this->load->view('promoview',$this->data);		
	
	}
	
}

