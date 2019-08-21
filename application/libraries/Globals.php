<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );

@$this->load->library( 'nativesession' );
@$this->load->library('common');
$this->load->model('Systemcustom_model');

$this->data["GMAPKEY"] = "AIzaSyDwCEOfHDHfzqptxeSlvpai6FjIXrBhGmQ";


$this->data["LS"] = ($this->lang->language);
$this->data["titleadmin"] = $this->config->config["titleadmin"]; 
$this->data["logoadmin"] = $this->config->config["logoadmin"]; 
$this->data["logoadmin_white"] = $this->config->config["logoadmin-white"];
$this->data["abs_path"] = $this->config->config["abs_path"];  
$this->data["upload_path"] = $this->data["abs_path"].$this->config->config["upload_folder"];  
$this->tablas_permitidas = $this->config->config["tablas_permitidas"];


$max_nivel_categorias = 4;
$this->data["max_nivel_categorias"] = $max_nivel_categorias;

// Menu administrador
$Menu = $this->Global_model->get_menu("0",$this->nativesession->get('HD_ONLINE_status_User'));
$this->data["Menu"] = $Menu;
$SubMenu = array();
foreach ($Menu as $menu):
	$SubMenu[$menu->codigo] = $this->Global_model->get_menu($menu->codigo);
endforeach; 

$this->data["SubMenu"] = $SubMenu; 

$this->data["current_access"] = $this->router->fetch_class()."-".$this->router->fetch_method();

$this->data["show_cat1"] = $this->common->show_cat1($this->data["current_access"]);

// Menú contenidos
$MenuContenidos = $this->Global_model->get_menu_contenidos("0",$this->nativesession->get('HD_ONLINE_status_User'));
$this->data["MenuContenidos"] = $MenuContenidos;
$SubMenuContenidos = array();
foreach ($MenuContenidos as $menu):
	$SubMenuContenidos[$menu->codigo] = $this->Global_model->get_menu_contenidos($menu->codigo);
endforeach; 
$this->data["SubMenuContenidos"] = $SubMenuContenidos;


$this->data["tipos_contenidos"] = $this->Global_model->get_tipos_contenidos();
$this->data["localizacion"] = localizacion();
$this->data["idioma"] = idioma();
$this->data["pais"] = pais();


$this->data["LG"] =  @$this->Global_model->get_textos_seccion("header_footer");

$this->data["config_localizacion"] = $this->Global_model->get_localizacion(localizacion());

$this->data["hexcolor"] =$this->data["config_localizacion"]->color; 
$this->data["darkcolor"] = bm_adjust_colour_brightness($this->data["hexcolor"],-30);
$this->data["extradarkcolor"] = bm_adjust_colour_brightness($this->data["hexcolor"],-100);
$this->data["lightcolor"] = bm_adjust_colour_brightness($this->data["hexcolor"],20);
$this->data["extralightcolor"] = bm_adjust_colour_brightness($this->data["hexcolor"],100);
// Secciones


$this->data['ext_image'] = $this->config->item('ext_image');
$this->data['arr_image'] = explode("|",$this->data['ext_image']);

$this->data['ext_video'] = $this->config->item('ext_video');
$this->data['arr_video'] = explode("|",$this->data['ext_video']);

// Perfil de usuario (Profesional / Jefe / Admin)
if ($this->nativesession->get("HD_ONLINE_status") == "login"):

	$userExist =  $this->Global_model->get_usuario($this->nativesession->get('HD_ONLINE_status_User'),localizacion());	
	$distribuidorExist =  $this->Global_model->get_distribuidor_usuario($this->nativesession->get('HD_ONLINE_status_User'),localizacion());	
	
	
	$this->data["usuario_administrador"] = ($this->nativesession->get("HD_ONLINE_status_mode") == "administradores") ? 1 : 0;
	$this->data["usuario_normal"] = (@intval($userExist->id_usuario)>0) ? 1 : 0;
	$this->data["usuario_distribuidor"] = (@intval($distribuidorExist->id_distribuidor_usuario)>0) ? 1 : 0;
	
	$this->data["token_epedidos"] = @$this->nativesession->get('HD_ONLINE_status_token');
	$this->data["token_destruido"] = @$this->nativesession->get('HD_ONLINE_status_token_destruido');
	// Usuario normal
	if ($this->data["usuario_normal"] == 1): 
		$this->data["usuario_nombre"] = $userExist->nombre; 
		$this->data["usuarioPerfil"] = $userExist;
		$this->data["id_perfil_usuario"] = $userExist->id_perfil_usuario;
		$this->data["usuarioPerfil"]->tipo = "usuario";  // cambiar a array y usar in_array en system_custom_model en caso que permita multiperfil
		$this->data["usuarioPerfil"]->categorias =  $this->Global_model->get_usuarios_categorias($userExist->id_usuario);
	endif; 
	
	// Usuario distribuidor
	if ($this->data["usuario_distribuidor"] == 1):
		$this->data["usuarioPerfil"] =  $distribuidorExist; 
		$this->data["id_perfil_usuario"] = $distribuidorExist->id_perfil_usuario;
		$this->data["usuarioPerfil"]->tipo = "distribuidor";
		$this->data["usuarioPerfil"]->id_usuario = $distribuidorExist->id_distribuidor_usuario;
		$this->data["usuarioPerfil"]->categorias =  $this->Global_model->get_distribuidores_categorias($distribuidorExist->id_distribuidor);
		
		// print_r($this->data["usuarioPerfil"]);
	endif;
	
	// Usuario admin
	if ($this->data["usuario_administrador"] == 1):
		$this->data["usuarioPerfil"] = $this->Global_model->get_administrador($this->nativesession->get('HD_ONLINE_status_User'),localizacion());	
		$this->data["usuarioPerfil"]->tipo = "administrador";
		$this->data["usuarioPerfil"]->accesos = $this->Global_model->get_accesos_admin($this->nativesession->get('HD_ONLINE_status_User'));		
		$this->data["usuarioPerfil"]->categorias = $this->Global_model->get_categorias();
		$this->data["usuarioPerfil"]->email = $this->data["usuarioPerfil"]->usuario;
	endif;
	
	// Filtro de categorias
	$this->data["f_categoria"] = array();
	
	
	// categorias de usuario
	foreach ($this->data["usuarioPerfil"]->categorias as $categoria):
		$this->data["categorias_usuario"][$categoria->nivel][] = $categoria; 
	endforeach;
	
	// todas las categorias
	$todas_categorias = $this->Global_model->get_categorias();
	foreach ($todas_categorias as $categoria):
		$this->data["todas_categorias"][$categoria->nivel][] = $categoria; 
		$this->data["catnivel_nombre"][$categoria->nivel] = $categoria->descripcion;
	endforeach;
	
	
	// Alertas pendientes por tipo (excepto email)
	$this->data["alertas"] = $this->Global_model->get_alertas_pendientes($this->data["usuarioPerfil"]);
	$this->data["notificaciones"] = $this->Global_model->get_notificaciones($this->data["usuarioPerfil"]);

	
	// Asignacion de filtros segun permisos
	if (($this->data["usuarioPerfil"]->tipo == "distribuidor" || $this->data["usuarioPerfil"]->tipo == "usuario") && @count($this->data["usuarioPerfil"]->categorias)>0):
		for ($i=1;$i<=$max_nivel_categorias;$i++):
			if (@count(@$this->data["categorias_usuario"][$i])>0):
				$this->data["f_categoria"][$i] = $this->data["categorias_usuario"][$i];
			else:
				if ($i>1) $this->data["f_categoria"][$i] = $this->Global_model->get_categorias_hijo($this->data["f_categoria"][$i-1]);
			endif;
			
		endfor;
	
		
	elseif ($this->data["usuarioPerfil"]->tipo == "administrador"):
			$this->data["f_categoria"] = $this->data["todas_categorias"];
	endif;
	
	
	// Filtros por GET
	$this->data["f_cat1"] = $this->getVar("f_cat1",@$this->data["f_categoria"][1][0]->id_categoria);
	$this->data["f_cat2"] = $this->getVar("f_cat2");
	$this->data["f_cat3"] = $this->getVar("f_cat3");
	$this->data["f_cat4"] = $this->getVar("f_cat4");
	$this->data["f_id_tipo_contenido"] = $this->getVar("f_id_tipo_contenido");
	$this->data["f_txt"] = $this->getVar("f_txt");
	$this->data["f_fechas"] = $this->getVar("f_fechas");
	$this->data["f_sort"] = $this->getVar("f_sort");
	
	if (intval($this->data["f_cat1"])>0) $this->data["f_catmax"] = 1;
	if (intval($this->data["f_cat2"])>0) $this->data["f_catmax"] = 2;
	if (intval($this->data["f_cat3"])>0) $this->data["f_catmax"] = 3;
	if (intval($this->data["f_cat4"])>0) $this->data["f_catmax"]= 4;
	if ($this->input->get("cmd") == "resetall"):
	//	$this->data["f_cat1"] = "";		$this->nativesession->set("f_cat1","");
		$this->data["f_cat2"] =  "";	$this->nativesession->set("f_cat2","");
		$this->data["f_cat3"] = "";		$this->nativesession->set("f_cat3","");
		$this->data["f_cat4"] = "";		$this->nativesession->set("f_cat4","");
		$this->data["f_txt"] = "";		$this->nativesession->set("f_txt","");
		$this->data["f_fechas"] = "";	$this->nativesession->set("f_fechas","");
		$this->data["f_sort"] = "";		$this->nativesession->set("f_sort","");
		$this->data["f_id_tipo_contenido"] = ""; $this->nativesession->set("f_id_tipo_contenido","");
		redirect(current_url(), 'location', 302);
	endif;
	
	$this->data["secciones_menu"] =  $this->Global_model->get_secciones_menu('seccion','',$this->data["f_cat1"],$this->data["usuarioPerfil"]);
	$this->data["secciones"] =  $this->Global_model->get_secciones('seccion','',$this->data["f_cat1"],$this->data["usuarioPerfil"]);
	
	
	
	// Asignacion de filtros segun filtros
	$nextfilter = 0;
	$filter_rel = array();
	$filter_status = array();
	for ($i=1;$i<=$max_nivel_categorias;$i++):
		
		//echo "
		//__________________
		//ESTO HAY ANTES EN NIVEL".$i;
		// print_r($this->data["f_categoria"][$i]);
		if ($this->data["f_cat".$i] != ""):
			$filter_rel[$i] = $this->Systemcustom_model->get_categorias_relacionadas( $this->data["f_cat".($i)],$i);
			
			$this->data["f_categoria"][$i+1] = array();
			$this->data["f_categoria"][$i+1] = $this->Global_model->get_categorias_hijo_filtro( $this->data["f_cat".($i)],'',$i);
		 
			//echo "
			//nivel ".($i)." ASIGNANDO filtros para nivel ".($i+1)." de categorias hijo de ". $this->data["f_cat".($i)]." consiguiendo"; 
			//print_r($this->data["f_categoria"][$i+1]);
		elseif (is_array($this->data["f_categoria"][$i])>0):
			//echo "
			//nivel ".($i)." BUSCANDO categorias hijo de "; print_r($this->data["f_categoria"][$i]);
			$this->data["f_categoria"][$i+1] = $this->Global_model->get_categorias_hijo( $this->data["f_categoria"][$i],@$this->data["categorias_usuario"][$i+1],$i);
			//echo " consiguiendo "; print_r( $this->data["f_categoria"][$i+1]);
		endif;
	endfor;
	//print_r($filter_rel);
	if (count($filter_rel)>0):
		foreach ($filter_rel as $fil):
			if (count($fil)>0):
				foreach ($fil as $ff):
					if (count(@$finalfilter[$ff->nivel])>0)	array_push($finalfilter[$ff->nivel],$ff->id_categoria);
					else	$finalfilter[$ff->nivel] = array($ff->id_categoria);
				endforeach;
			endif;	
		endforeach;
		if (@count($finalfilter)>0):
			foreach ($finalfilter as $nivel=>$ff):
				$dataarray = $this->data["f_categoria"][$nivel];
				 $this->data["f_categoria"][$nivel] = '';
				foreach ($dataarray as $catfin):
					if (in_array($catfin->id_categoria,$ff)) {
						$this->data["f_categoria"][$nivel][] = $catfin;
					}
				endforeach;
				/*echo "
				--
				Tenemos: ";
				print_r($this->data["f_categoria"][$nivel]);
				echo "
				-- debemos filtrar solo:";
				print_r($ff);*/ 
			endforeach;
		endif;
		/*
		print_r($finalfilter);
		*/
	endif;
	
endif; 


/*
$this->data['shareurl'] = rawurlencode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$this->data['redes_sociales'] = $this->Global_model->get_redes_sociales();
*/

// INNFORMACION DE CATEGORIAS
$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
// print_r($datalist);

foreach ($this->data["datalist"] as $row):
	$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;			
	$cat[$row->id_categoria_tipo][$row->id_categoria]->sub = $this->Systemcustom_model->get_categorias_sub($row->id_categoria,$row->nivel);
	$cat[$row->id_categoria_tipo][$row->id_categoria]->rel = $this->Systemcustom_model->get_categorias_relacionadas($row->id_categoria,$row->nivel);
	$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre;
	$cat[$row->id_categoria_tipo]["genero"] = $row->genero; 
	$cat[$row->id_categoria_tipo]["nivel"] = $row->nivel; 
endforeach;  
$this->data["cat"] = $cat; 





// INFORMACION DE ALCANCE DISTRIBUIDOR
$this->data["perfiles"] = $this->Systemcustom_model->get_perfiles();
$this->data["zonas_geograficas"] = $this->Systemcustom_model->get_zonas();
$this->data["distribuidores"] = $this->Systemcustom_model->get_distribuidores();
$this->data["usuarios"] = $this->Systemcustom_model->get_usuarios();



?>