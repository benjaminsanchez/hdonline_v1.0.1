<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biblioteca  extends CI_Controller {
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
	
		$this->load->config('crud');
		
	}
	

	public function index($sExport='') {
		$this->load->model('Systemlist_model');
		$load = "biblioteca";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = @json_decode(@$this->config->item('jsonCFG'))->$load;
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		$this->load->view('biblioteca/index',$this->data);
	}
	
	public function ajax_query() {
		
		$this->data['selected_items'] = @$this->input->post('selected_items');
		$this->data['field'] = @$this->input->post('field');
		$this->data['type'] = @$this->input->post('type');
		$this->data['mode'] = @$this->input->post('mode');
		$this->data['values'] = @$this->input->post('values');
		$json = array();
		
		$array_biblioteca = explode(",",$this->data['selected_items']);
		if (count($array_biblioteca)>0):
			foreach ($array_biblioteca as $id_biblioteca):
				if (intval($id_biblioteca)>0):
					$json[] = $this->Systemcustom_model->get_biblioteca_by_id($id_biblioteca);
				endif;
			endforeach;
		endif;
		
		$this->nativesession->set("HD_ONLINE_biblioteca_mode",""); 
		
		echo json_encode($json);
		
	}
	public function ajax_verifica_archivo() {
		$this->data['archivo'] = @$this->input->post('archivo');
		$localizacion = localizacion();
		$existe = $this->Systemcustom_model->get_biblioteca_archivo_nombre($this->data['archivo'],$localizacion);
		echo (intval($existe)>0) ? "SI" : "NO";		
	}
	
	public function bibliotecalist($sExport='',$pagina='',$startrec='',$recperpage='20') {
		
		$this->load->model('Systemlist_model');
		$load = "biblioteca";
		
	//	die($this->nativesession->get("HD_ONLINE_biblioteca_type"));
	
		$this->data["mode"] =  isset($_GET['mode']) ? $this->input->get('mode') : $this->nativesession->get("HD_ONLINE_biblioteca_mode"); 
		$this->data["field"] = isset($_GET['field']) ? $this->input->get('field') : $this->nativesession->get("HD_ONLINE_biblioteca_field"); 
		$this->data["type"] =	isset($_GET['type']) ? $this->input->get('type') : $this->nativesession->get("HD_ONLINE_biblioteca_type"); 
		
		$this->nativesession->set("HD_ONLINE_biblioteca_mode",$this->data["mode"]);
		$this->nativesession->set("HD_ONLINE_biblioteca_field",$this->data["field"]);
		$this->nativesession->set("HD_ONLINE_biblioteca_type",$this->data["type"]);
		
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = @json_decode(@$this->config->item('jsonCFG'))->$load;
		$this->data["tipos_contenidos"] = $this->Global_model->get_tipos_contenidos();
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
		
		

		
		$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
		// print_r($datalist);
		
	
		
		foreach ($this->data["datalist"] as $row):
			$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;			
			$cat[$row->id_categoria_tipo][$row->id_categoria]->sub = $this->Systemcustom_model->get_categorias_sub($row->id_categoria,$row->nivel);
			$cat[$row->id_categoria_tipo][$row->id_categoria]->rel = $this->Systemcustom_model->get_categorias_relacionadas($row->id_categoria,$row->nivel);
			$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
			$cat[$row->id_categoria_tipo]["nivel"] = $row->nivel; 
		endforeach;   
		
		// Creacion de filtros	 
		$filter_array = array();
		if (@$this->input->get("cmd") != "reset"):			
			$filter_array["nombre_tag"] = $this->input->get("nombre_tag");
			$this->data["f_nombre_tag"] =  $this->security->xss_clean($filter_array["nombre_tag"]);
			$filter_array["tipo_contenido"] = $this->input->get("tipo_contenido");	
			$this->data["f_tipo_contenido"] =  $this->security->xss_clean($filter_array["tipo_contenido"]);
			$filter_array["fechas"] = $this->input->get("fechas");
			$this->data["f_fechas"] = $filter_array["fechas"];
			foreach ($cat as $value=>$display):
				if (@$this->input->get("cat_".$display["nivel"]) != ""):
					$filter_array["cat_".$display["nivel"]] = $this->input->get("cat_".$display["nivel"]);
					$this->data["f_cat"][$display["nivel"]] = $filter_array["cat_".$display["nivel"]];
				endif;
			endforeach;	
		endif;
		
		$filter_array["tipo_archivo"] = $this->data["type"];
		
		//print_r($filter_array);
		if (@$this->input->get("cannot_delete") != ""):
			
			$this->data["cannot_delete"] = $this->Systemcustom_model->get_biblioteca_by_id(intval($this->input->get("cannot_delete")));
			$this->data["contador"] = $this->nativesession->get("cannot_delete");
		endif;
		
		
		
		$this->nativesession->set("HD_ONLINE_filter_array",$filter_array);
	
		$this->data["now"] = strtotime("now");
		
		// START Pagination
		$loadid = "bibliotecalist";
		
	
			// nuevo codigo
	
	
	//$f_cat[$display["nivel"]]
	
	
	// Asignacion de filtros segun filtros
	$nextfilter = 0;
	$filter_rel = array();
	$filter_status = array();
//	echo "ESTO HAY ANTES EN NIVEL".$i;
	for ($i=1;$i<=$this->data["max_nivel_categorias"];$i++):
		
		//echo "ESTO HAY ANTES EN NIVEL".$i;
		if ($this->data["f_cat"][$i] != ""):
		// echo "se encontro filtro en ".$i;
			$filter_rel[$i] = $this->Systemcustom_model->get_categorias_relacionadas( $this->data["f_cat"][$i],$i);
			
			$this->data["f_categoria"][$i+1] = array();
			$this->data["f_categoria"][$i+1] = $this->Global_model->get_categorias_hijo_filtro( $this->data["f_cat"][$i],'',$i);
		 
		elseif (is_array($this->data["f_categoria"][$i])>0):
		
			$this->data["f_categoria"][$i+1] = $this->Global_model->get_categorias_hijo( $this->data["f_categoria"][$i],@$this->data["categorias_usuario"][$i+1],$i);
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
		
			endforeach;
		endif;
		
	endif;
	
	
	// end nuevo codigo 

		$recperpage = ($recperpage == "") ? @$this->nativesession->get('recperpage_'.$loadid) : $recperpage ;
		
		if ($recperpage != "ALL"):
			$this->data["nDisplayRecs"] = $recperpage;
		else:
			$this->data["nDisplayRecs"] = '';
		endif;
		$this->data["urlbase_paginacion"] = base_url()."biblioteca/list"; 
		
		$this->data["postfix_pagination"] = ""; 
		if (count($this->input->get())>0):
			$countget = 0; 
			foreach ($this->input->get() as $keyget=> $valget):
				$this->data["postfix_pagination"].= ($countget == 0)?"?":"&";
				$this->data["postfix_pagination"].= $keyget."=". $valget;
				$countget++;
			endforeach;
		endif;
			
		@$this->nativesession->set('recperpage_'.$loadid,$recperpage);
			
		if ($pagina != ''):
			$this->data["pagina"] = $pagina;
			@$this->nativesession->set('pagina_'.$loadid,$pagina);
		else:
			if ( $this->nativesession->get('pagina_'.$loadid)>0):
				$this->data["pagina"] = $this->nativesession->get('pagina_'.$loadid);
			else:
				$this->data["pagina"] = $this->nativesession->get('pagina_'.$loadid);
			endif;
		endif; 
		
		
		$this->data["nTotalRecs"] =   $this->Systemcustom_model->get_biblioteca_master($filter_array,$cat,"num_rows");
			
		
		$this->data["original_recperpage"] = $recperpage;
		$recperpage = ($recperpage == "ALL") ? $this->data["nTotalRecs"] : $recperpage;
		$this->data["nDisplayRecs"] = $recperpage;
		
		$limit = $this->data["nDisplayRecs"];
		
		if ($startrec != ''):
			$offset = $startrec-1;
		else:			
			$offset = ($pagina>1)?@intval((($pagina-1)*$this->data["nDisplayRecs"])-1):0;;
		endif;
		// print_r( $where);
		
						
		
		
		$this->data["nDisplayRecs"] = ($this->data["nDisplayRecs"]=='')?$this->data["nTotalRecs"]:$this->data["nDisplayRecs"];
		$this->data["nStartRec"] =$offset+1;
		$this->data["PrevStart"] = $this->data["nStartRec"] - $this->data["nDisplayRecs"];
		if ($this->data["PrevStart"] < 1) { $this->data["PrevStart"] = 1; }
		$this->data["NextStart"] = $this->data["nStartRec"] + $this->data["nDisplayRecs"];
		if ($this->data["NextStart"] > $this->data["nTotalRecs"]) { $this->data["NextStart"] = $this->data["nStartRec"] ; }
		$this->data["LastStart"] = intval(($this->data["nTotalRecs"]-1)/$this->data["nDisplayRecs"])*$this->data["nDisplayRecs"]+1;
		$this->data["rsEof"] = ($this->data["nTotalRecs"] < ($this->data["nStartRec"] + $this->data["nDisplayRecs"]));
		if ($this->data["nStartRec"] > $this->data["nTotalRecs"]) { $this->data["nStartRec"] = $this->data["nTotalRecs"]; }
		$this->data["nStopRec"] = $this->data["nStartRec"] + $this->data["nDisplayRecs"]- 1;
		$this->data["nRecCount"] = $this->data["nTotalRecs"] - 1;
		if ($this->data["rsEof"]) { $this->data["nRecCount"] = $this->data["nTotalRecs"]; }
		if ($this->data["nStopRec"] > $this->data["nRecCount"]) { $this->data["nStopRec"] = $this->data["nRecCount"]; }	
		
		
		$this->data["biblioteca"] = $this->Systemcustom_model->get_biblioteca_master($filter_array,$cat,"list",$limit, $offset);
		
		// END Pagination
		
		
		
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		$this->load->view('biblioteca/list',$this->data);
	}
	
	
	public function bibliotecaupload($sExport='') {
		$this->load->model('Systemlist_model');
		$load = "biblioteca";
		
		
		$this->data["mode"] =  isset($_GET['mode']) ? $this->input->get('mode') : $this->nativesession->get("HD_ONLINE_biblioteca_mode"); 
		$this->data["field"] = isset($_GET['field']) ? $this->input->get('field') : $this->nativesession->get("HD_ONLINE_biblioteca_field"); 
		$this->data["type"] =	isset($_GET['type']) ? $this->input->get('type') : $this->nativesession->get("HD_ONLINE_biblioteca_type"); 
		
		$this->nativesession->set("HD_ONLINE_biblioteca_mode",$this->data["mode"]);
		$this->nativesession->set("HD_ONLINE_biblioteca_field",$this->data["field"]);
		$this->nativesession->set("HD_ONLINE_biblioteca_type",$this->data["type"]);
		
		
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = @json_decode(@$this->config->item('jsonCFG'))->$load;
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["sExport"] = $sExport;
		if ($this->data["sExport"] != ""):
			$recperpage= 10000;
		endif;
		$this->data["ffile"] = $load;
		
		
		// V2
		$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
		$this->data["categorias"] = "";		
		$this->data["esquema_arboledit_html"] = $this->Global_model->esquema_arboledit_html($this->data["arbol"],$this->data["catnivel_nombre"],$this->data["max_nivel_categorias"],'',1,$this->data["categorias"] );
		// END v2
			
		$this->data["tipos_contenidos"] = $this->Global_model->get_tipos_contenidos();
	
		
		
		$this->load->view('biblioteca/upload',$this->data);
	} 
	
	
	public function bibliotecaedit($ids_biblioteca) {
		$this->load->model('Systemlist_model');
		$load = "biblioteca";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = @json_decode(@$this->config->item('jsonCFG'))->$load;
		
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		$this->data["tipos_contenidos"] = $this->Global_model->get_tipos_contenidos();
	
		
		$this->data["ffile"] = $load;
		
		$array_id_biblioteca = explode(",",$ids_biblioteca);
		
		$this->data["ids_biblioteca"] = $ids_biblioteca;
		$this->data["bibliotecas"] = $this->Systemcustom_model->get_bibliotecas($array_id_biblioteca);
		$count = 0;
		if (count($this->data["bibliotecas"])>0):
			$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
			foreach ($this->data["bibliotecas"] as $bib):
				$this->data["bibliotecas"][$count]->etiquetas = $this->Systemcustom_model->get_biblioteca_etiquetas($bib->id_biblioteca);
				$this->data["bibliotecas"][$count]->categorias = $this->Systemcustom_model->get_biblioteca_categorias_array($bib->id_biblioteca);
				$this->data["bibliotecas"][$count]->tipos_contenido = $this->Systemcustom_model->get_biblioteca_tipos_contenido_array($bib->id_biblioteca);
				
				
				// V2
				$this->data["categorias"] = $this->Global_model->get_rows_select("id_categoria,id_categoria","biblioteca_categorias",array("id_biblioteca"=>$bib->id_biblioteca));
			
			
				$this->data["esquema_arboledit_html"][$bib->id_biblioteca] = $this->Global_model->esquema_arboledit_html($this->data["arbol"],$this->data["catnivel_nombre"],$this->data["max_nivel_categorias"],'',1,$this->data["categorias"] );
				// END v2
				
				
				$count++;
			endforeach;
		endif;
		$this->data["tipos_contenidos"] = $this->Global_model->get_tipos_contenidos();
	
		
		
		$this->load->view('biblioteca/edit',$this->data);
	} 
	
	
	public function bibliotecasave_edit() {
		$campos = $this->input->post();
		
		//print_r($campos);
		//die();
		$ids_biblioteca = $this->input->post("ids_biblioteca");
		$array_id_biblioteca = explode(",",$ids_biblioteca);
		
		if (count($array_id_biblioteca)>0):
			$this->load->model('Systemedit_model');
			$this->data["categorias"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
			foreach ($this->data["categorias"] as $row):
				$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
				$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
			endforeach;  
			foreach ($array_id_biblioteca as $id_biblioteca):
				if (intval($id_biblioteca)>0):
				
					$dataupdate["fecha_modificacion"] = date("Y-m-d H:i:s");
					$dataupdate["usuario_modificacion"] =  $this->nativesession->get("HD_ONLINE_status_User");

					$dataupdate["nombre"] = $campos[$id_biblioteca."_nombre"];
					$dataupdate["comentario"] = $campos[$id_biblioteca."_comentario"];
					$dataupdate["vigencia_desde"] = ConvertDateToMysqlFormat($campos[$id_biblioteca."_vigencia_desde"]);
					$dataupdate["vigencia_hasta"] = ConvertDateToMysqlFormat($campos[$id_biblioteca."_vigencia_hasta"]);
					$dataupdate["programar_desde"] = ConvertDateToMysqlFormat($campos[$id_biblioteca."_programar_desde"]);
					$dataupdate["programar_hasta"] = ConvertDateToMysqlFormat($campos[$id_biblioteca."_programar_hasta"]);
					$dataupdate["mantener_arriba"] = (@$campos[$id_biblioteca."_mantener_arriba"] == "")?"0":"1";
					
					$this->Systemedit_model->update_data("biblioteca",array("id_biblioteca"=>$id_biblioteca),$dataupdate);
					
					// LOG
					$this->Global_model->logThis($this->data["usuarioPerfil"],"edit","biblioteca",array("id_biblioteca"=>$id_biblioteca),$dataupdate);
					
					// con EL ID insertar etiquetas - eliminar primero
					$etiquetas = explode(",",@$campos[$id_biblioteca."_etiquetas"]);
					$this->Global_model->delete_data("biblioteca_etiquetas",array("id_biblioteca"=>$id_biblioteca)); 
					if (count($etiquetas)>0):
						foreach ($etiquetas as $etiqueta):
							if ($etiqueta != ""): 
								$dataetiquetas["id_biblioteca"] = $id_biblioteca;
								$dataetiquetas["etiqueta"] = $etiqueta;
								$this->Systemedit_model->insert_data("biblioteca_etiquetas",$dataetiquetas);
							endif;
						endforeach;
					endif;
					
					// con EL ID insertar tipos de contenidos
					$tipos_contenidos = @$campos[$id_biblioteca."_tipos_contenidos"]; // <-- array
					$this->Global_model->delete_data("biblioteca_tipos_contenido",array("id_biblioteca"=>$id_biblioteca)); 
					
					
					//print_r($tipos_contenidos);
					// die();
					if (count($tipos_contenidos)>0):
						foreach ($tipos_contenidos as $tipo):
							$datatipos_contenido["id_biblioteca"] = $id_biblioteca;
							$datatipos_contenido["id_tipo_contenido"] = $tipo;
							$this->Systemedit_model->insert_data("biblioteca_tipos_contenido",$datatipos_contenido);
						endforeach;
					endif;
					
					// con EL ID insertar categorias del archivo	
					$this->Global_model->delete_data("biblioteca_categorias",array("id_biblioteca"=>$id_biblioteca)); 	
					
					
					// START v1
					/*
					foreach ($cat as $value=>$display):
						if (count(@$campos[$id_biblioteca."_cat_".$value])):
							
							foreach (@$campos[$id_biblioteca."_cat_".$value] as $idcat):
								$datacategorias["id_biblioteca"] = $id_biblioteca;
								$datacategorias["id_categoria"] = $idcat;
								$this->Systemedit_model->insert_data("biblioteca_categorias",$datacategorias);
							endforeach;
						endif;
					endforeach;
					*/
					// END V1
					
					
					// Inicio V2
						
					$tabla_categorias = "biblioteca_categorias";
					$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
					$seleccionados = explode(",",$this->input->post("categoriasv2_".$id_biblioteca));
					if (count($seleccionados)>0): 
						foreach ($seleccionados as $idcat):
							if (intval($idcat)>0):
							$datacategorias["id_biblioteca"] = $id_biblioteca;
							$datacategorias["id_categoria"] = $idcat;
							$this->Systemedit_model->insert_data($tabla_categorias,$datacategorias);
							endif;
						endforeach;
					endif;
				
					// End V2
					
					
					
				endif;		
			endforeach;
		endif;
		
		
		
		
									
				


		  redirect('/biblioteca/list', 'refresh');
		
	}
	
	
	// Guardar archivo solo upload
	public function bibliotecasave($sExport='') { 
		$this->load->model('Systemlist_model');
		
		$this->load->helper(array('form', 'url'));
		
		$load = "biblioteca";
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->config_crud = @json_decode(@$this->config->item('jsonCFG'))->$load;
		
		
		// codeigniter upload

		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$this->data["localizacion"].'/biblioteca';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|xls|xlsx|html|csv|xlsc|mp4|mp3|mov';
		$config['max_size']             = 504800000;
		$config['overwrite']             = FALSE;
		$this->load->library('upload', $config);
		
		
		///
		$files = $_FILES;
		$data = '';
		for($i=0; $i< count($files['userfile']['name']); $i++)	{
			           
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			
			if($this->upload->do_upload()) {
				$data[]= $this->upload->data();
			
			} else {
				
				$data[] = array('error' => $this->upload->display_errors(),'archivo'=>$_FILES['userfile']['name']);
				
				
			}
		}
		
		echo json_encode($data);
		

	}
	
	public function bibliotecasave_end() {
	
		$campos = $this->input->post();
		
		
		$cantidad = count($this->input->post("archivo_nombre"));
		
		
		//print_r($campos);
		//die("cantidad".$cantidad);
		
		
		$this->load->model('Systemedit_model');
		$this->data["categorias"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
		foreach ($this->data["categorias"] as $row):
			$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
			$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
		endforeach;  
		
		for ($i=0;$i<=$cantidad;$i++):
			if (@$campos["numero_correlativo"][$i] != ""):
				$datainsert["fecha_subida"] = date("Y-m-d H:i:s");
				$datainsert["fecha_modificacion"] = date("Y-m-d H:i:s");
				$datainsert["usuario_subida"] = $this->nativesession->get("HD_ONLINE_status_User");
				$datainsert["usuario_modificacion"] =  $this->nativesession->get("HD_ONLINE_status_User");
				$datainsert["archivo_nombre"] = $campos["archivo_nombre"][$i];
				$datainsert["archivo_original"] = $campos["archivo_original"][$i];
				$datainsert["archivo_peso"] = $campos["archivo_peso"][$i];
				$datainsert["archivo_extension"] = $campos["archivo_extension"][$i];
	
				$datainsert["archivo_imagen"] = ($campos["archivo_imagen"][$i] === true)?'1':'0';
				
				$datainsert["archivo_imagen_ancho"] = $campos["archivo_imagen_ancho"][$i];
				$datainsert["archivo_imagen_alto"] = $campos["archivo_imagen_alto"][$i];
				$datainsert["archivo_imagen_tipo"] = $campos["archivo_imagen_tipo"][$i];
				$datainsert["nombre"] = $campos["nombre"][$i];
				$datainsert["comentario"] = $campos["comentario"][$i];
				if (@in_array($i,@$campos["seleccion_multiple"])) : // <-- SELECCION MULTIPLE FECHAS VIGENCIA
					$datainsert["vigencia_desde"] = ConvertDateToMysqlFormat($campos["vigencia_desde"][$cantidad]);
					$datainsert["vigencia_hasta"] = ConvertDateToMysqlFormat($campos["vigencia_hasta"][$cantidad]);
					$datainsert["programar_desde"] = ConvertDateToMysqlFormat($campos["programar_desde"][$cantidad]);
					$datainsert["programar_hasta"] = ConvertDateToMysqlFormat($campos["programar_hasta"][$cantidad]);
					$datainsert["mantener_arriba"] = (@$campos["mantener_arriba_todos"] == "")?"0":"1";
					$seleccionados = explode(",",$campos["categoriasv2"][$cantidad]); // V2
				else:
					$datainsert["vigencia_desde"] = ConvertDateToMysqlFormat($campos["vigencia_desde"][$i]);
					$datainsert["vigencia_hasta"] = ConvertDateToMysqlFormat($campos["vigencia_hasta"][$i]);
					$datainsert["programar_desde"] = ConvertDateToMysqlFormat($campos["programar_desde"][$i]);
					$datainsert["programar_hasta"] = ConvertDateToMysqlFormat($campos["programar_hasta"][$i]);
					$datainsert["mantener_arriba"] = (@in_array($i,@$campos["mantener_arriba"]))?"1":"0";
					$seleccionados = explode(",",$campos["categoriasv2"][$i]); // V2
				endif;
				
				$datainsert["estado"] = "1";
					
				// Insertar datos en biblioteca, devuelve ID
				$id_biblioteca = $this->Systemedit_model->insert_data_return_id("biblioteca",$datainsert);
				
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"add","biblioteca",'',$datainsert);
									
				// con EL ID insertar etiquetas
				$etiquetas = explode(",",@$campos["etiquetas"][$i]);
				if (count($etiquetas)>0):
					foreach ($etiquetas as $etiqueta):
						$dataetiquetas["id_biblioteca"] = $id_biblioteca;
						$dataetiquetas["etiqueta"] = $etiqueta;
						$this->Systemedit_model->insert_data("biblioteca_etiquetas",$dataetiquetas);
					endforeach;
				endif;
				// con EL ID insertar tipos de contenidos
				$tipos_contenidos = @$campos["tipos_contenidos"]; // <-- array
				if (count($tipos_contenidos)>0):
					foreach ($tipos_contenidos as $tipo):
						$datatipos_contenido["id_biblioteca"] = $id_biblioteca;
						$datatipos_contenido["id_tipo_contenido"] = $tipo;
						$this->Systemedit_model->insert_data("biblioteca_tipos_contenido",$datatipos_contenido);
					endforeach;
				endif;
				
				// con EL ID insertar categorias del archivo
				// Inicio v1
				if (@in_array($i,@$campos["seleccion_multiple"])) :  // <-- SELECCION MULTIPLE CATEGORIAS
					foreach ($cat as $value=>$display):
						if (count(@$campos["final_cat_".$value])): 
							
							foreach (@$campos["final_cat_".$value] as $idcat):
								if (intval($idcat)>0):
								$datacategorias["id_biblioteca"] = $id_biblioteca;
								$datacategorias["id_categoria"] = $idcat;
								$this->Systemedit_model->insert_data("biblioteca_categorias",$datacategorias);
								endif;
							endforeach;
						endif;
					endforeach;
				else:
					$numero_correlativo = @$campos["numero_correlativo"][$i];			
					foreach ($cat as $value=>$display):
						if (count(@$campos[$numero_correlativo."_cat_".$value])):
							
							foreach (@$campos[$numero_correlativo."_cat_".$value] as $idcat):
								if (intval($idcat)>0):
								$datacategorias["id_biblioteca"] = $id_biblioteca;
								$datacategorias["id_categoria"] = $idcat;
								$this->Systemedit_model->insert_data("biblioteca_categorias",$datacategorias);
								endif;
							endforeach;
						endif;
					endforeach;
				endif;
				// Fin v1
				
				
				// Inicio V2
				$tabla_categorias = "biblioteca_categorias";
				if (count($seleccionados)>0): 
					foreach ($seleccionados as $idcat):
						if (intval($idcat)>0):
						$datacategorias["id_biblioteca"] = $id_biblioteca;
						$datacategorias["id_categoria"] = $idcat;
						$this->Systemedit_model->insert_data($tabla_categorias,$datacategorias);
						endif;
					endforeach;
				endif;			
				// End V2
				
				
			endif;
		endfor;
		
		  redirect('/biblioteca/list', 'refresh');
		
	}
	
	
	
	public function quitar_vigencia($id_biblioteca) {		
		$this->Systemcustom_model->biblioteca_quitar_vigencia($id_biblioteca);
		// LOG
		$this->Global_model->logThis($this->data["usuarioPerfil"],"remove_validity","biblioteca",array("id_biblioteca"=>$id_biblioteca));
		redirect('/biblioteca/list', 'refresh');
	}
	
	public function enviar_arriba($id_biblioteca) {		
		$this->Systemcustom_model->biblioteca_enviar_arriba($id_biblioteca);
		// LOG
		$this->Global_model->logThis($this->data["usuarioPerfil"],"send_top","biblioteca",array("id_biblioteca"=>$id_biblioteca));
		redirect('/biblioteca/list', 'refresh');
	}
	
	public function eliminar($id_biblioteca) {		
		$contador = $this->Systemcustom_model->biblioteca_eliminar($id_biblioteca);
		
		// LOG
		$this->Global_model->logThis($this->data["usuarioPerfil"],"delete","biblioteca",array("id_biblioteca"=>$id_biblioteca));
				
		if (intval(array_sum($contador))==0):
			redirect('/biblioteca/list', 'refresh');
		else:	
			$this->nativesession->set("cannot_delete",$contador);
			redirect('/biblioteca/list?cannot_delete='.$id_biblioteca, 'refresh');
		endif;
	}
	
	
	
	
	public function quitar_vigencia_multiple($ids_biblioteca) {
		$array_id = explode(",",$ids_biblioteca);
		if (count($array_id)):
			foreach ($array_id as $id_biblioteca):
				if (intval($id_biblioteca)>0):
				$this->Systemcustom_model->biblioteca_quitar_vigencia($id_biblioteca);
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"remove_validity","biblioteca",array("id_biblioteca"=>$id_biblioteca));
				endif;
			endforeach;
		endif;
		redirect('/biblioteca/list', 'refresh');
	}
	
	public function enviar_arriba_multiple($ids_biblioteca) {	
		$array_id = explode(",",$ids_biblioteca);
		if (count($array_id)):
			foreach ($array_id as $id_biblioteca):	
				if (intval($id_biblioteca)>0):
					$this->Systemcustom_model->biblioteca_enviar_arriba($id_biblioteca);
					// LOG
					$this->Global_model->logThis($this->data["usuarioPerfil"],"send_top","biblioteca",array("id_biblioteca"=>$id_biblioteca));
				endif;
			endforeach;
		endif;
		redirect('/biblioteca/list', 'refresh');
	}
	
	public function eliminar_multiple($ids_biblioteca) {
		$array_id = explode(",",$ids_biblioteca);
		if (count($array_id)):
			foreach ($array_id as $id_biblioteca):	
				if (intval($id_biblioteca)>0):
					$contador = $this->Systemcustom_model->biblioteca_eliminar($id_biblioteca);
					// LOG
					$this->Global_model->logThis($this->data["usuarioPerfil"],"delete","biblioteca",array("id_biblioteca"=>$id_biblioteca));
					if (intval(array_sum($contador))>0):
						
						$this->nativesession->set("cannot_delete",$contador);
						redirect('/biblioteca/list?cannot_delete='.$id_biblioteca, 'refresh');
						break;
					endif;
				endif;
			endforeach;
		endif;
		redirect('/biblioteca/list', 'refresh');
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

