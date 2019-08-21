<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemDashboard extends CI_Controller {
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
		$this->data['active'] = 'dashboard';
		
		$this->data['sExport'] = $sExport;
		$this->data["detalle"] = $detalle;
		$this->data["ffile"] = ($detalle !='') ? 'dashboard_'.$detalle.'_bloque' : 'dashboard';
		$this->data["ffile_name"] = ($detalle !='') ? $detalle : '';
		
		$filtro_busqueda = array();
		$filtro_busqueda["catmax"] = 1;
		$filtro_busqueda["cat1"] = @$this->data["f_cat1"] ;
	
		// clean filters
		$filtro_busqueda["cat2"] ="" ;
		$filtro_busqueda["cat3"] = "" ;
		$filtro_busqueda["cat4"] ="";
		$filtro_busqueda["txt"] = "" ;
		$filtro_busqueda["fechas"] ="";
		$filtro_busqueda["catmax"] = 1;
		// end clean
			
		$filtro_busqueda["sort"] = "orden";
		
		$this->data["slider"] = $this->data["novedades"] = $this->Systemcustom_model->get_contenidos_master("slider_home","id_slider_home",$this->data["usuarioPerfil"],$filtro_busqueda); 
		
	
		if (count($this->data["secciones"])>0):  // secciones viene de Globals
			$count = 0;
			foreach ($this->data["secciones"] as $seccion):
				
				$this->data["secciones"][$count]->data = $this->set_box_data($seccion);
				$this->data["subseccion"][$seccion->id_seccion] = $this->Global_model->get_secciones('subseccion',$seccion->id_seccion,'',$this->data["usuarioPerfil"]);
				if (count($this->data["subseccion"][$seccion->id_seccion])>0): 
					$countss = 0; 
					foreach ($this->data["subseccion"][$seccion->id_seccion] as $ss):
						$this->data["subseccion"][$seccion->id_seccion][$countss]->data = $this->set_box_data($ss);
						$countss++;
					endforeach; 
				endif;
				$count++;
			endforeach;
		endif;
		
		$this->load->view('templates/dashboard/dashboard',$this->data);		
	
	}
	
	
	
	private function set_box_data($seccion) {
		$template = $seccion->template_codigo;
		$filtro_busqueda = array();
		$filtro_busqueda["cat1"] = @$this->data["f_cat1"] ;
		// clean filters
		$filtro_busqueda["cat2"] ="" ;
		$filtro_busqueda["cat3"] = "" ;
		$filtro_busqueda["cat4"] ="";
		$filtro_busqueda["txt"] = "" ;
		$filtro_busqueda["fechas"] ="";
		
		// end clean
		$filtro_busqueda["catmax"] = 1; //  @$this->data["f_catmax"];
		switch($template):
			case "promociones":
				$filtro_busqueda["vigencia"] = "on"; // solo los vigentes	
				$data = $this->Systemcustom_model->get_contenidos_master("promociones","id_promocion",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "novedades":
				$data = $this->Systemcustom_model->get_contenidos_master("novedades","id_novedad",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			
			case "incentivo":
				$filtro_busqueda["vigencia"] = "on"; // solo los vigentes				
				$data = $this->Systemcustom_model->get_contenidos_master("incentivos","id_incentivo",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "pop":
				$data = $this->Systemcustom_model->get_contenidos_master("material_pop","id_material_pop",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "eventos":
				$data = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "calendario":
				$filtro_busqueda["vigencia"] = "futuros"; // solo los vigentes	
				$data = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "video":
				$tipos_contenidos = $this->Systemcustom_model->get_seccion_tipo_contenido($seccion->id_seccion);
				if (count($tipos_contenidos)>0):
					//$biblioteca = new stdClass();
					
					foreach ($tipos_contenidos as $tc):
						$filtro_busqueda["tipos_archivos"] = "mp4|avi|asf|mov|m4v|wmv";
						$biblioteca[$tc->id_tipo_contenido] = $this->Systemcustom_model->get_biblioteca_from_template(array($tc),$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
					endforeach;
					$biblioteca["tipos_contenidos"] = $tipos_contenidos;
				endif;
				$data = $biblioteca;
			break;
			case "fotovideo":
				$tipos_contenidos = $this->Systemcustom_model->get_seccion_tipo_contenido($seccion->id_seccion);
				$biblioteca["tipos_contenidos"] = $tipos_contenidos;
				if (count($tipos_contenidos)>0):
					foreach ($tipos_contenidos as $tc):
						$filtro_busqueda["tipos_archivos"] = $this->data['ext_image'].$this->data['ext_video']; // mp4|avi|asf|mov|m4v|wmv|
						$biblioteca[$tc->id_tipo_contenido] = $this->Systemcustom_model->get_biblioteca_from_template(array($tc),$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
					endforeach;
				endif;
				$data = $biblioteca;
			break;
			default:
				$tipos_contenidos = $this->Systemcustom_model->get_seccion_tipo_contenido($seccion->id_seccion);
				//$biblioteca["tipos_contenidos"] = $tipos_contenidos;
				$biblioteca = $this->Systemcustom_model->get_biblioteca_from_template($tipos_contenidos,$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
				
				$data= $biblioteca;
			break;
		endswitch;
		
		return $data;
		
	}
	
	
	private function getVar($varname,$default="") {
	
			if (isset($_GET[$varname])) {	
		// echo "evaluando $varname";
			if (trim($this->input->get($varname)) != "") {
				$myvar = $this->input->get($varname); 	
				$this->nativesession->set($varname,$myvar);
			} else {
				$myvar = $default; 	$this->nativesession->set($varname,$myvar);
			}
		} else { 
			if ($this->nativesession->get($varname) != "") $myvar = $this->nativesession->get($varname); else $myvar = $default;
		}
		return $myvar;		
	}
	
	
}

