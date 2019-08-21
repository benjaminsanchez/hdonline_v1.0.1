<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquetas extends CI_Controller {
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
	
	public function index($seccion = ''){
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data['active'] = ''; 
		$this->data['ffile'] = 'maquetas';
		$this->data["sidebar_cat"] = 1;
		$this->data["sidebar_dis"] = 1;
		switch ($seccion):
			case "agregar-incentivo": 
				$this->data["sidebar_cat"] = 0;
			break;
		endswitch;
		$this->load->view('maquetas/'.$seccion, $this->data);	 	
	
	}
	
	
	
}

