<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenidos  extends CI_Controller {
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
		$this->load->model('Contenidos_model');
		$this->load->config('crud');
		
	}
	
	
	public function noticiasadd(){
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data['active'] = ''; 
		$this->data['ffile'] = 'maquetas';
		$this->data["sidebar_cat"] = 1;
		$this->data["sidebar_dis"] = 0;
		$this->load->view('contenidos/agregar-noticia', $this->data);	 	
	
	}
	
	public function noticiassave(){
		
		
		$data["localizacion"] = localizacion();
		$data["titulo"] = $this->input->post("titulo");
		$data["imagen_principal"] = $this->input->post("imagen_principal");	
		$data["programar_desde"] = $this->input->post("programar_desde");	
		$data["programar_hasta"] = $this->input->post("programar_hasta");	
		$data["texto"] = $this->input->post("texto");	
		$data["mantener_arriba"] = $this->input->post("mantener_arriba");	
		$data["estado"] = (@$this->input->post("estado")=='0')?'0':'1';
		
		$this->Systemcustom_model->insert_noticia($data, $this->input->post("imagenes"), $this->input->post("archivos"));
		redirect(base_url().'seccion/4', 'location', 302);
	
	}
	
	public function incentivosadd(){
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data['active'] = ''; 
		$this->data['ffile'] = 'maquetas';
		$this->data["sidebar_dis"] = 1;
		$this->data["sidebar_cat"] = 0;
		$this->load->view('contenidos/agregar-incentivo', $this->data);	 	
	
	}
	
	public function slidesadd(){
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data['active'] = ''; 
		$this->data['ffile'] = 'maquetas';
		$this->data["sidebar_cat"] = 1;
		$this->data["sidebar_dis"] = 1;
		$this->load->view('contenidos/agregar-slide', $this->data);	 	
	
	}
	
	public function eventosadd(){
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data['active'] = ''; 
		$this->data['ffile'] = 'maquetas';
		$this->data["sidebar_cat"] = 1;
		$this->data["sidebar_dis"] = 1;
		$this->load->view('contenidos/agregar-evento', $this->data);	 	
	
	}
	
	
	
	public function categoriaslist() {
		$this->data["ffile"] = "categorias";
		$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
		$this->data["sExport"] = '';
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->data["nTotalRecs"] = count($this->data["datalist"]);
		$this->load->view('custom/categoriaslist',$this->data);
	}
	
	public function seccioneslist($marca='') {
		$this->load->model('Systemlist_model');
		$load = "secciones";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["sExport"] = @$sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		$where = ' 1 ';
		
		// Start Filtro
		
		$marca = ($marca != "") ? intval($marca) : intval(@$this->nativesession->get($load."_s_id_marca"));
	//	die($marca);
		if ($marca > 0):
			$this->nativesession->set($load."_s_id_marca", $marca);		
		else: // Marca por defecto
			$marca = $this->Systemcustom_model->get_id_categoria_principal();
		endif;
		$this->data["s_id_marca"] = $marca;
		$this->data["categorias"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
		// End filtro
		
		$this->data["templates"] =  $this->Systemcustom_model->get_templates();
		
		
		$this->data["secciones"] = @$this->Systemcustom_model->get_secciones($marca);		
		if (count($this->data["secciones"])>0):
			foreach ($this->data["secciones"] as $seccion):
				$this->data["subsecciones"][$seccion->id_seccion] = @$this->Systemcustom_model->get_subsecciones_by_seccion($seccion->id_seccion);	
				
			endforeach;
		endif;
		
		
		$this->data["nTotalRecs"] =  $this->Systemlist_model->get_total_rows($load);
		$this->data["fields"] = $this->filterListField($this->config_crud);
		$this->data["keys"] = $this->setPrimaryKey($load);
		$this->load->view('custom/seccioneslist',$this->data);
	}
	
	public function zonas_geograficaslist($sExport='') {
		$this->load->model('Systemlist_model');
		$load = "zonas_geograficas";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$Zonas_geograficas = $this->get_zonas_geograficas(0);
		
		
		$this->data["ffile"] = $load;
		$this->data["records"] = @$Zonas_geograficas;					
		$this->data["nTotalRecs"] =  $this->Systemlist_model->get_total_rows($load);
		$this->data["fields"] = $this->filterListField($this->config_crud);
		$this->data["keys"] = $this->setPrimaryKey($load);
		$this->load->view('custom/zonas_geograficaslist',$this->data);
	}
	
	private function get_zonas_geograficas($id_padre = ''){ 
		$where = array("id_padre"=>$id_padre);
		$zonas = $this->Systemlist_model->get_rows("zonas_geograficas",$where);	
		$ZonasFinal = NULL;
		if (count($zonas)>0):
			$ZonasFinal = array();
			foreach ($zonas as $zona):
				$hijas =  $this->get_zonas_geograficas($zona->id_zona_geografica);
				$ZonasFinal[$zona->id_zona_geografica]["data"] = $zona;
				$ZonasFinal[$zona->id_zona_geografica]["child"] = (count($hijas)>0)?$hijas:NULL;
			
			endforeach; 
		endif;
		return $ZonasFinal;	
	}
	
	
	public function log_actividades($sExport='') {
		$this->load->model('Systemlist_model');
		$load = "log_actividades";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		// $this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		
		//$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		$where = ' 1 ';
		//	$this->data["records"] = @$this->Systemlist_model->get_rows($load);					
		//	$this->data["nTotalRecs"] =  $this->Systemlist_model->get_total_rows($load);
		//	$this->data["fields"] = $this->filterListField($this->config_crud);
		//	$this->data["keys"] = $this->setPrimaryKey($load);
		$this->load->view('custom/log_actividadeslist',$this->data);
	}
	
	public function estadisticas($tipo=1,$sExport='') {
		$this->load->model('Systemlist_model');
		$load = "estadisticas".$tipo;
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
				$this->data["current_menu_padre"] = "estadisticas_todas"; 
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		$where = ' 1 ';
		$this->load->view('custom/estadisticas'.$tipo.'list',$this->data);
	}
	
	
	
	public function parametrosedit() {
		
		
		$this->data["ffile"] = "parametros";
	//	$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->load->view('parametrosedit',$this->data);
		
	}
	
	private function filterListField($fields) {		
		$listfields = array();
		if ($fields):
			foreach ($fields->fields as $key => $value):
				if (!property_exists($value,'nolist')):
					$listfields[] = $key;
				endif;
			endforeach;
		endif;
		return $listfields;
		
	}
	
		// Revisar y setear clave primaria
	private function setPrimaryKey($load) {
		$arraykeys = array();
		$TableConfig = $this->config_crud;
		if ($TableConfig):
			foreach ($TableConfig->fields as $name=>$field):
				if (@$field->key== "PRI"):
					$arraykeys[] = $name;
				endif;
			endforeach;
		endif;
		
		return $arraykeys;
	}
	
}

