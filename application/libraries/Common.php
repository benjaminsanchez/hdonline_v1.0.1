<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

class Common
{
    public function __construct()   {
        
	}
	public function localizacion($data='') {
		
		$dominio = $_SERVER["HTTP_HOST"];
		
		switch ($dominio):
			case "myhd.s1.cl": 		$localizacion = 'cl'; break;
			case "hunterdouglasonline.cl": 		$localizacion = 'cl'; break;
			default:					$localizacion = 'cl'; break;
		endswitch;
		
		return $localizacion;
	}
	
	public function distribuidores_usuarios($data='') {
		return "";
		
	}
	public function default_distribuidor($data='') {
	
		return $data["usuarioPerfil"]->id_distribuidor;
		
	}
	
	public function idioma($localizacion) {				
		switch ($idioma):
			case "br": 		$idioma = 'pt'; break;
			default:		$idioma = 'es'; break;
		endswitch;
		
		return $idioma;
	}
	
	
		
	public function check_access($controller_method,$data,$load='') {
		$array_cm = explode("-",$controller_method);
		
	/*	echo '$controller_method:'.$controller_method."<br>";
		echo '$data:'.$data;
		echo '$load:'.$load; */
		// ('edit',$load,$this->data)
		/*
		Esquema algoritmo de acceso
		
		- por defecto todo bloqueado.	
		- esquema: 
			->Tipo de usuario
				->Controlador
					->load (para auto)
					->method (para custom) (se debe implementar check_access() en cada método)
		*/
		$acceso = FALSE; // por defecto todo restringido
		if ($data["usuario_administrador"] == 1):
			
			if ($array_cm[0] == "SystemList" || $array_cm[0] == "SystemEdit" || $array_cm[0] == "SystemDelete"):
				if ($load == "administradores"):					
					if (in_array('administradores',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load == "secciones"):
					if (in_array('secciones',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load== "categorias" || $load == "categorias_tipo" || $load == "tipos_contenidos"):
					if (in_array('categorias_de_contenidos',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load == "distribuidores" || $load == "distribuidores_usuarios" || $load == "usuarios" || $load == "perfiles_usuarios"):
					if (in_array('distribuidores_y_usuarios',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load == "idiomas_sitio" || $load == "idiomas_sistema"): 
					if (in_array('etiquetado_sitio',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load == "zonas_geograficas"):
					if (in_array('zonas_geograficas',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($load == "novedades" || $load == "incentivos" || $load == "eventos" || $load == "eventos_sesiones" || $load == "slider_home" || $load == "promociones" || $load == "promociones_documentos" || $load == "material_pop"):
					if ($data["usuarioPerfil"]->admin_colaborador=="on"):						
						$acceso = TRUE;
					endif;
				elseif ($load == "alertas"):
					if (in_array('alertas',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				endif;
			elseif ($array_cm[0] == "SystemCustom") :
				if ($array_cm[1] == "profile" || $array_cm[1] == "profilesave"):
					$acceso = TRUE; 
				elseif ($array_cm[1] == "seccioneslist"):
					if (in_array('secciones',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "distribuidores_usuarios_pendienteslist" || $array_cm[1] == "distribuidores_usuarios_pendientes_detail" || $array_cm[1] == "distribuidores_usuarios_pendientes_detail_save"): 				
					if (in_array('distribuidores_y_usuarios',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($array_cm[1] == "categoriaslist" || $array_cm[1] == "recurso_categoriasv2" || $array_cm[1] == "categoriaslistv2" || $array_cm[1] == "categoriasedit" || $array_cm[1] == "categoriassave" || $array_cm[1] == "categoriasadd"):
					if (in_array('categorias_de_contenidos',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "zonas_geograficaslist"):
					if (in_array('zonas_geograficas',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "parametrosedit" || $array_cm[1] == "visualsave"):
					if (in_array('parametros',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "estadisticas"):
					if (in_array('estadisticas_todas',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;		
										
				elseif($array_cm[1] == "log_actividades" || $array_cm[1] == "log_movimientos" || $array_cm[1] == "log_actividades_detalle"):					
					if (in_array('log_movimientos',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "eventos_asistencialist"):					
					if ($data["usuarioPerfil"]->admin_colaborador=="on"):						
						$acceso = TRUE;
					endif;
				elseif($array_cm[1] == "tipos_contenidosdelete"):					
					if (in_array('categorias_de_contenidos',$data["usuarioPerfil"]->accesos)):						
						$acceso = TRUE;
					endif;
				elseif ($array_cm[1] =="test_ws"):
					if ($data["usuarioPerfil"]->admin_colaborador=="on"):						
						$acceso = TRUE;
					endif;
				endif;
				
			endif;	
			
			if (!$acceso):
			echo "<h2>Acceso Denegado</h2>";//.($load."-");print_r($array_cm);
			endif;
			
		endif;
		if ($data["usuario_normal"] == 1 || $data["usuario_distribuidor"] == 1):
		
			if ($array_cm[0] == "SystemList" || $array_cm[0] == "SystemEdit" || $array_cm[0] == "SystemDelete"):
				
				if($load == "distribuidores_usuarios_tmp" ): // Colaboradores de distribuidores
				
					if ($data["usuario_distribuidor"] == 1 && $data["usuarioPerfil"]->crear_usuarios == 1):
						
						$acceso = TRUE; 
					endif;		
				endif;
			elseif ($array_cm[0] == "SystemCustom") :
				if ($array_cm[1] == "profile" || $array_cm[1] == "profilesave"):
					$acceso = TRUE; 
				elseif($array_cm[1] == "distribuidores_usuarioslist"): // Colaboradores de distribuidores
					if ($data["usuario_distribuidor"] == 1 && $data["usuarioPerfil"]->crear_usuarios == 1):
						$acceso = TRUE; 
					endif;		
				endif;
			endif;
		
		
		endif;
		if (!$acceso) die("Acceso denegado - ".$controller_method);
		return $acceso;
	}
	
	
	public function show_cat1($controller_method) { // $controller_method -->also called $this->data["current_access"] in globals
		$array_cm = explode("-",$controller_method);
		$acceso = FALSE;

		if ($array_cm[0] == "Secciones") :
			$acceso = TRUE; 
			/*if ($array_cm[1] == "profile" || $array_cm[1] == "profilesave"):
				$acceso = TRUE; 
			endif;*/
		endif;
		if ($array_cm[0] == "SystemDashboard") :
			$acceso = TRUE; 
		
		endif;
		
		
		return $acceso;
	}

	
	
    public function get_lsi($load, $config,$lsi )   {
		$listfields = array();
		$listfields = $lsi;
		if ($config):
			foreach ($config->fields as $key => $value):
				if (property_exists($value,'keylink')):
					//echo "here"; print_r($value);
					//$keylink = explode(",",$value->keylink);
				//	$listfields[$keylink[0].$keylink[2]] = (@$lsi[$keylink[0].$keylink[2]]!="")? @$lsi[$keylink[0].$keylink[2]]:$this->lang($keylink[0].$keylink[2]);
					//$listfields[$key] = (@$lsi[$key]!="")? @$lsi[$key]:$this->lang($key);
					//$listfields[$key] = $this->lang($key);
					$listfields[$key] = (@$lsi[$key]!="")? @$lsi[$key]:$this->lang($key);
				else:
					$listfields[$key] = (@$lsi[$key]!="")? @$lsi[$key]:$this->lang($key);
				endif;
			endforeach;
			if (@$config->config->childtable): foreach ($config->config->childtable as $key => $value):
				$listfields["table_".$key] = (@$lsi["table_".$key]!="")? @$lsi["table_".$key]:$this->lang($key);
			endforeach;endif;
		endif;	
		$listfields["table_name"] =  (@$lsi["table_name"] != "") ? $lsi["table_name"] : $this->lang($load);
		return $listfields;
    }
	
	private function lang($string) { // Genera palabras a partir de uppelcamelcase
		$origen = array("id_","_",'Q','W','E','R','T','Y','U','I','O',
						'P','A','S','D','F','G','H','J','K','L','Ñ',
						'Z','X','C','V','B','N','M');
		$destino   = array(""," ",' Q',' W',' E',' R',' T',' Y',' U',' I',' O',
						' P',' A',' S',' D',' F',' G',' H',' J',' K',' L',' Ñ',
						' Z',' X',' C',' V',' B',' N',' M');	
		$prefijo =  ucfirst(substr($string,0,1));	
		$string = substr($string,1,strlen($string));	
		$newstring = $prefijo.str_replace($origen, $destino, $string);	
		return $newstring;
	}
	
	private function camel_case($str) {
		 $noStrip = array();
		// non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = ucfirst($str);

        return $str;		 
	}
	
	
	
	/* database crud CUSTOM utilities */
	public function get_all_categorias() {
	
		$sql = "SELECT C.id_categoria, C.nombre, C.id_categoria_tipo, CT.descripcion tipo_nombre, 
					CT.genero genero, CT.nivel
					FROM categorias C  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo = C.id_categoria_tipo)
					WHERE C.localizacion = '".$this->localizacion()."'
					ORDER BY CT.nivel, C.orden ASC 				"; 	
		return $sql;
	}


   
}