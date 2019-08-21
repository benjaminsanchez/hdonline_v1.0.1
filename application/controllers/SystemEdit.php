<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemEdit  extends CI_Controller {
	public $data = array();
	var $config;
	var $tablas_permitidas;
	var $config_crud  = array();
	var $primaryKey = array();
	var $sufix_action = "";
	
	public function __construct(){
		parent::__construct();
		global $config_crud;
		global $primaryKey;
		$this->load->model('Global_model');
		require_once(APPPATH.'libraries/Globals.php');		
		if (@$this->nativesession->get('HD_ONLINE_status')!="login"):
			redirect('/login', 'location', 302);
			exit();
		endif;
		
		$this->load->model('Systemedit_model');
		$this->load->config('crud');
		
	}
	
	public function edit($load,$errors='') {	
		if ($this->common->check_access($this->data["current_access"],$this->data,$load)) {
		global $sufix_action;
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
	
		if (in_array($load,$this->tablas_permitidas)):
			$this->data["configcrud"] = $this->config_crud;
			$this->data["LANG"] = array();
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			//print_r($lsi);
			$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			// print_r($this->data["LSI"]);
			$this->data["ffile"] = $load;		
			$this->data["current_menu_padre"] = @$this->Global_model->get_codigo_menu_padre($load);	
			$this->keydata = array();
			$primaryKeyOk = $this->checkPrimaryKey($load);	
			
			
			
			if ($primaryKeyOk) {
				$this->data["curAction"] = "U"; // update							
				foreach ($this->input->get() as $key => $value): 
					$sufix_action.= "$key=$value&";
					$this->keydata[$key]=$value;
				endforeach; 
				$sufix_action = substr($sufix_action,0,-1);
				$this->data["sufix_action"] = ($sufix_action);
				$this->data["actionform"] = "save/".$load."?".$sufix_action;	
						
				$this->data["load"] = $this->Systemedit_model->load_data($load,$this->primaryKey);				
			} else {
				$this->data["curAction"] = "A"; // add
				
				$this->data["LS"]["Edit"] = $this->data["LS"]["Add"];	
				$this->data["LS"]["EditBtn"] = $this->data["LS"]["AddBtn"];
				
				$this->data["sufix_action"] = ($sufix_action);
				$this->data["actionform"] = "save/".$load;			
				$this->data["load"] = $this->Systemedit_model->load_data($load,$this->primaryKey);		
			}
			
			// CATEGORIA CUSTOM EXTEND
			
			if (@$this->config_crud->config->sidebar_cat == "1" && $this->data["curAction"] == "U"):
		
				$this->data["categorias"] = $this->Global_model->get_rows_select("id_categoria,id_categoria",$load."_categorias",array($key=>$value)); 
			endif;
			// END
			$this->data["load_form"] = $this->LoadForm($this->config_crud,$this->data["LSI"],$this->data["curAction"]);
			$this->data["errors"] = $errors;	
			
			
			// start: Setting master data table
			 if (@$this->config_crud->config->mastertable):
				$FilterActive = $this->checkFilterKey($load);
				//print_r($this->config_crud->config->mastertable);
			 	foreach ($this->config_crud->config->mastertable as $table=>$linkfield):
			 		$this->config_crud_master = json_decode($this->config->item('jsonCFG'))->$table;
					$this->data["master_configcrud"] = $this->config_crud_master;
					$this->data["master_joins"] = $this->joinListField($this->config_crud_master);
					$this->data["master_custom_fields"] = 
					$linkfield = explode(",",$linkfield);
					
					$master_where = array($table.".".$linkfield[0]=>$this->data["filtermaster"][$linkfield[0]]);
					
					if ($this->data["master_joins"]):					
						$this->data["master_custom_fields"] = $this->customListField($this->config_crud_master,$table);
						$this->data["master_fields"] = $this->customFilterListField($this->config_crud_master);
					else: 
						$this->data["master_fields"] = $this->filterListField($this->config_crud_master);
					endif;
					$this->data["master_record"] = $this->Systemedit_model->get_rows($table,$master_where,NULL,NULL,NULL,$this->data["master_joins"],NULL);	
					
					$lsi =  @$this->Global_model->get_lenguaje_sistema($table);
					$this->data["LSI"]["master"] = $this->common->get_lsi($table,$this->config_crud_master,$lsi);
					$this->data["master_ffile"] = $table;
					break; 
				endforeach;							
			 endif;
			// End: Setting master data table
			
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["sidebar_cat"] = (@$this->config_crud->config->sidebar_cat == "0")? 0 : 1 ;
			$this->data["sidebar_dis"] = (@$this->config_crud->config->sidebar_dis == "0")? 0 : 1;
		
		
			
			
			// -----------------------------------
			// CATEGORIAS CUSTOM EXTEND
		
		
			
			if (@$this->config_crud->config->sidebar_cat == "1") :
			
				$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
				$this->data["esquema_arboledit_html"] = $this->Global_model->esquema_arboledit_html($this->data["arbol"],$this->data["catnivel_nombre"],$this->data["max_nivel_categorias"],'',1,$this->data["categorias"] );
			endif;
			// END CATEGORIAS
			// -----------------------------------
			
			
			// -----------------------------------
			// ALCANCE DISTRIBUIDOR CUSTOM EXTEND
			if (@$this->config_crud->config->sidebar_dis == "1" && $this->data["curAction"] == "U"):				
				
				$this->data["x_categorias"] = $this->Global_model->get_rows_select("id_referencia,id_referencia",$load."_permisos",array($key=>$value,"tipo_permiso"=>"categoria")); 
					
				$this->data["x_perfiles"] = $this->Global_model->get_rows_select("id_referencia,id_referencia",$load."_permisos",array($key=>$value,"tipo_permiso"=>"perfil")); 
				
				$this->data["x_zonas_geograficas"] = $this->Global_model->get_rows_select("id_referencia,id_referencia",$load."_permisos",array($key=>$value,"tipo_permiso"=>"zona_geografica")); 
				
				$this->data["x_distribuidores"] = $this->Global_model->get_rows_select("id_referencia,id_referencia",$load."_permisos",array($key=>$value,"tipo_permiso"=>"distribuidor")); 
				
				$this->data["x_usuarios"] = $this->Global_model->get_rows_select("id_referencia,id_referencia",$load."_permisos",array($key=>$value,"tipo_permiso"=>"usuario")); 
				
			endif;
			// END CATEGORIAS
			// -----------------------------------
			
			if (@$this->config_crud->config->template_edit != ""):
				$this->load->view($this->config_crud->config->template_edit,$this->data);
			else:
				$this->load->view('edit2',$this->data);
			endif;
		else:
			// mostrar 404
		endif;	
		}
	}
	
	private function customFilterListField($fields) {		
		$listfields = array();
		if ($fields):
			foreach ($fields->fields as $key => $value):
				if (!property_exists($value,'nolist')):
					if (property_exists($value,'keylink')):
						$keylink = explode(",",$value->keylink);
						$listfields[] = $keylink[0].$keylink[2] ;
					else:
						$listfields[] =$key;
					endif;
				endif;
			endforeach;
		endif;
		return $listfields;
		
	}
	
	private function customListField($fields,$table='') {
		
		$table =  ($table!='')?$table: $this->data["ffile"];
		$listfields = array();
		if ($fields):
			foreach ($fields->fields as $key => $value):
				if (!property_exists($value,'nolist')):
					if (property_exists($value,'keylink')):
						$keylink = explode(",",$value->keylink);
						$listfields[] = $keylink[0].".".$keylink[2]. " ". $keylink[0].$keylink[2] ;
					else:
						$listfields[] =$table.".".$key. " ".$key;
					endif;
				endif;
				if (@$value->key== "PRI"):
					$listfields[] = $table.".".$key. " ".$key;
				endif;
			endforeach;
		endif;
		return $listfields;
	}
	
	
	
	

		
	// procesar formulario
	public function save($load) {
		if (in_array($load,$this->tablas_permitidas)):
		//print_r($this->input->post());
		//die();
			if ($this->input->post("a_edit")):
				$a_edit = $this->input->post("a_edit");
				$config = json_decode($this->config->item('jsonCFG'))->$load;
				
                                
				if (@$config->config->action_before_save != "") {
					$function_name = $config->config->action_before_save;
					$this->$function_name($load,$a_edit);
				}
				switch($a_edit):
					case "A":	
                                            $this->insertData($load);
                                                 
                                            ;break;
					case "U": 	$this->updateData($load); break;				
				endswitch;				
				
			endif;
		endif;		
                
                
               
	}
	
	// Insertar registro
	private function insertData($load) {
		if (in_array($load,$this->tablas_permitidas)):
			$this->load->helper('security');
			$this->load->library('form_validation');
			$array_biblioteca = array();
			$x_back = $this->input->post("x_back");
			$data = $datakey = array();
			$incrementkey = '';
			$config = json_decode($this->config->item('jsonCFG'))->$load;
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			$LSI = $this->common->get_lsi($load,$config,$lsi);
			
			// Validacion	
			if ($config->fields):
				foreach ($config->fields as $key =>$value):					
					if (@$value->ftype!="ckeditor"):
						$required =  ((@$value->key=="PRI" && @$value->extra!="autoincrement") || (@$value->key!="PRI" && @$value->null == "NO") ) ? "required|": "";
						$this->form_validation->set_rules('x_'.$key,$LSI[$key], 'trim|'.$required.'xss_clean');
					endif;	
				endforeach;
			endif;
			
			if($this->form_validation->run() == FALSE):	
				// header("Location: " . $_SERVER["HTTP_REFERER"]);
				$this->edit($load,validation_errors()); // No pasó validación, carga formulario con errores				
			else:
				// Datos para insert
				if ($config->fields):
					
					foreach ($config->fields as $key =>$value):	
					
						switch (@$value->extra):
						
							case "multijoin":
								$mydatamultijoin = array();
								if (@$value->ftype =="special_select_categorias"):
									$datamultijoin[$value->multijoin] =explode(",",$this->input->post("categoriasv2"));	
								else:									
									$datamultijoin[$value->multijoin] =$this->input->input_stream("x_".$key,FALSE);	
								endif;
								
							break;
							case "skip":
								// nothing to do
							break;
							
							default:
								if (@$this->input->post('x_'.$key) != ""): 	
									//$data[$key]=$this->input->post('x_'.$key);
									$data[$key]=str_replace(array("'"),array("''"),$this->input->post('x_'.$key));
								endif;
								if (@$value->extra == "md5"):
									if ($this->input->post('x_'.$key) != ""):
										$data[$key]=md5($this->input->post('x_'.$key));
									else:
										unset($data[$key]);
									endif;
								endif;
								if (@$value->key == "PRI" && @$value->extra== "autoincrement"):
									$incrementkey = $key;
									$id = $key;
									unset($data[$key]);
								endif;
								break;
						endswitch;
						
						// ---------------------------
						// biblioteca multiple extend
						// ---------------------------
						
						if (@$value->ftype == "biblioteca_multiple"):
							$array_biblioteca[$key] = (explode(",",$this->input->post('x_'.$key)));
							unset($data[$key]);
						endif;							
						// ---------------------------
						// END biblioteca multiple extend
						// ---------------------------
						if (@$value->ftype == "image"):
							$data[$key]=str_replace(array($this->config->item('base_upload_fldr')."/".$this->nativesession->get('HD_ONLINE_status_localizacion')),array(""),$this->input->post('x_'.$key));
						endif;
					endforeach;
					
				
					
					if ($this->Systemedit_model->insert_data($load,$data)):	
						$insertid = @$this->Systemedit_model->get_max_field($incrementkey,$load);
						
						if (count(@$datamultijoin)>0):	
						
							switch ($load):
								case "administradores": $datakey = array("usuario"=>$data["usuario"]); break;
								default:$datakey =  array($incrementkey=>$insertid->$incrementkey); break;
							
							endswitch;
							foreach ($datamultijoin as $joinkey=>$values):
									 $this->Systemedit_model->multijoin_insert_data($joinkey,$datakey,$values);
							endforeach;
						endif;
						
						// ---------------------------
						// biblioteca multiple extend
						// ---------------------------
						
						if (@count($array_biblioteca)>0):
							foreach ($array_biblioteca as $key => $array_valores):
								$array_valores = array_unique($array_valores);
								if (count($array_valores)>0):
								
									foreach ($array_valores as $id_biblioteca): 
										if (intval($id_biblioteca)>0):
											$databiblioteca[$id] = $insertid->$incrementkey;
											$databiblioteca["id_biblioteca"] = $id_biblioteca;
											$this->Systemedit_model->insert_data($key,$databiblioteca);
										endif;
									endforeach;
								endif;
							endforeach; 
							unset($array_biblioteca);
						endif;							
						// ---------------------------
						// END biblioteca multiple extend
						// ---------------------------
						
						// -----------------------------------
						// CATEGORIAS CUSTOM EXTEND
						if (@$config->config->sidebar_cat == "1"):
							$campos = $this->input->post();
							
							$this->data["categorias"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
							foreach ($this->data["categorias"] as $row):
								$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
								$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
							endforeach; 
							 
							// con EL ID insertar categorias del archivo	
							/*		
							foreach ($cat as $value=>$display):
								if (count(@$campos["final_cat_".$value])):
									
									foreach (@$campos["final_cat_".$value] as $idcat):
										$datacategorias[$id] = $insertid->$incrementkey;
										$datacategorias["id_categoria"] = $idcat;
										$this->Systemedit_model->insert_data($load."_categorias",$datacategorias);
									endforeach;
								endif;
							endforeach;
							
							// END V1
							*/
								// Inicio V2
						
							$tabla_categorias = $load."_categorias";
							$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
							$seleccionados = explode(",",$this->input->post("categoriasv2"));
							
							if (count($seleccionados)>0): 
								foreach ($seleccionados as $idcat):
									$datacategorias[$id] = $insertid->$incrementkey;
									$datacategorias["id_categoria"] = $idcat;
									$this->Systemedit_model->insert_data($tabla_categorias,$datacategorias);
								endforeach;
							endif;
						
							// End V2
							
						endif;
						// END CATEGORIAS
						// -----------------------------------
						
						
							
						// -----------------------------------
						// ALCANCE DISTRIBUIDOR CUSTOM EXTEND
						if (@$config->config->sidebar_dis == "1"):				
							$campos = $this->input->post();
						
							$tipos_permisos = array("categoria","perfil","zona_geografica","distribuidor","usuario");
							foreach ($tipos_permisos as $permiso): 
								if (count(@$campos["permisos_".$permiso])>0):
									foreach (@$campos["permisos_".$permiso] as $id_referencia):
										$data_insert[$id] = $insertid->$incrementkey;
										$data_insert["id_referencia"] = $id_referencia;
										$data_insert["tipo_permiso"] = $permiso;
										$this->Systemedit_model->insert_data($load."_permisos",$data_insert);
									endforeach;
								endif;
							endforeach;	
						
							
						endif;
						// END ALCANCE DISTRIBUIDOR
						// -----------------------------------
					
						// LOG
						$this->Global_model->logThis($this->data["usuarioPerfil"],"add",$load,'',$data);
						
						
						// AFTER SAVE
						if (@$config->config->action_after_save != "") {
							$function_name = $config->config->action_after_save;
							$this->$function_name($insertid->$incrementkey);
						}
						
						//$this->load->model("Oqo_model_epedidos");
                                                $this->load->model("Oqo_model_epedidos","OQO");
                                                if($_SESSION["HD_ONLINE_status_mode"]=="administradores"):
						$this->OQO->aprobar_epedido($_POST,$insertid->id_distribuidor_usuario);
                                                endif;
						if ($x_back==""):				
							redirect(base_url().'list/'.$load);
						else:
							if ($incrementkey != "" && @$config->config->backpage != "referer"):							
								redirect($x_back.$incrementkey."=".$insertid->$incrementkey );
							elseif( @$config->config->backpage == "referer"):
								redirect($x_back);
							else:
								redirect(base_url().'list/'.$load);
							endif;
						endif;
					endif;					
				endif;
			endif;
		endif;
	}
	
	
	// actualizar registro
	private function updateData($load) {
		if (in_array($load,$this->tablas_permitidas)):
		
	//	print_r($this->input->post());
	
			$array_biblioteca = array();
						
			$this->load->helper('security');
			$this->load->library('form_validation');
			$x_back = $this->input->post("x_back");
	
			$data = $datakey = $datamultijoin = array();

			$config = json_decode($this->config->item('jsonCFG'))->$load;
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			
			$LSI = $this->common->get_lsi($load,$config,$lsi);
			
			
			
			// Validacion	
			if ($config->fields):
				foreach ($config->fields as $key =>$value):	
					if (@$value->ftype!="ckeditor"):
						$required =  (@$value->key=="PRI" || @$value->null == "NO") ? "required|": "";
						$xss_clean = (@$value->ftype=="ckeditor") ? "" : "xss_clean"; 
						$this->form_validation->set_rules('x_'.$key,$LSI[$key], 'trim|'.$required.$xss_clean);	
					endif;				
				endforeach;
			endif;
			
			
			if($this->form_validation->run() == FALSE):	
				$this->edit($load,validation_errors()); // No pasó validación, carga formulario con errores
				print_r(validation_errors());
			else:
				// Datos para update
				if ($config->fields):
				
					foreach ($config->fields as $key =>$value):	
					
						switch (@$value->extra):
							case "multijoin":
								$mydatamultijoin = array();
								if (@$value->ftype =="special_select_categorias"):
									$datamultijoin[$value->multijoin] =explode(",",$this->input->post("categoriasv2"));	
								else:									
									$datamultijoin[$value->multijoin] =$this->input->input_stream("x_".$key,FALSE);	
								endif;							
							break;
							case "skip": /* nothing to do */ break;
							default: 
								if (@$value->key!="PRI"):
									// $data[$key]=$this->input->post('x_'.$key);
									$data[$key]=str_replace(array("'"),array("''"),$this->input->post('x_'.$key));
									
								elseif (@$value->key=="PRI"):
									$datakey[$key]=$this->input->get($key);
									$id = $key;
								endif;
								if (@$value->extra== "md5"):
									if ($this->input->post('x_'.$key) != ""):
										$data[$key]=md5($this->input->post('x_'.$key));
									else:
										unset($data[$key]);
									endif;
								endif;
							break;
						endswitch;
					
													
						if (@$value->ftype == "image"):
							$data[$key]=str_replace(array($this->config->item('base_upload_fldr')."/".$this->nativesession->get('HD_ONLINE_status_localizacion')),array(""),$this->input->post('x_'.$key));
						endif;
						
						// ---------------------------
						// biblioteca multiple extend
						// ---------------------------
						if (@$value->ftype == "biblioteca_multiple"):
							$array_biblioteca[$key] = explode(",",$this->input->post('x_'.$key));
							
							unset($data[$key]);
						endif;							
						// ---------------------------
						// END biblioteca multiple extend
						// ---------------------------
						
					endforeach;
				
					if ($this->Systemedit_model->update_data($load,$datakey,$data)):	
						if (count($datamultijoin)>0):						
							foreach ($datamultijoin as $joinkey=>$values):
								 $this->Systemedit_model->multijoin_insert_data($joinkey,$datakey,$values);
							endforeach;
						endif;
						
						
						// ---------------------------
						// biblioteca multiple extend
						// ---------------------------
				
						if (@count($array_biblioteca)>0):
						
							foreach ($array_biblioteca as $key => $array_valores):
								$this->Global_model->delete_data($key,array($id=> $this->input->post("x_".$id)));
								$array_valores = array_unique($array_valores);
								if (count($array_valores)>0):
									foreach ($array_valores as $id_biblioteca):
										if (intval($id_biblioteca)>0): 									
											$databiblioteca[$id] = $this->input->post("x_".$id);
											$databiblioteca["id_biblioteca"] = $id_biblioteca;
											
											$this->Systemedit_model->insert_data($key,$databiblioteca);
										endif;
									endforeach;
								endif;
							endforeach; 
							unset($array_biblioteca);
						endif;							
						// ---------------------------
						// END biblioteca multiple extend
						// ---------------------------
						
						// -----------------------------------
						// CATEGORIAS CUSTOM EXTEND
						if (@$config->config->sidebar_cat == "1"):
							$tabla_categorias = $load."_categorias";
							$campos = $this->input->post();
							// delete
							$this->Global_model->delete_data($tabla_categorias,array($id=> $campos["x_".$id]));
							
							$this->data["categorias"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());
							foreach ($this->data["categorias"] as $row):
								$cat[$row->id_categoria_tipo][$row->id_categoria] = $row;
								$cat[$row->id_categoria_tipo]["tipo_nombre"] = $row->tipo_nombre; 
							endforeach; 
							 
							// con EL ID insertar categorias del archivo			
							/*
							foreach ($cat as $value=>$display):
								if (count(@$campos["final_cat_".$value])):
									
									foreach (@$campos["final_cat_".$value] as $idcat):
										$datacategorias[$id] = $campos["x_".$id];
										$datacategorias["id_categoria"] = $idcat;
										$this->Systemedit_model->insert_data($tabla_categorias,$datacategorias);
									endforeach;
								endif;
							endforeach;
							// End V1
							*/
							
							// Inicio V2
						
							$tabla_categorias = $load."_categorias";
							$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
							$seleccionados = explode(",",$this->input->post("categoriasv2"));
							
							if (count($seleccionados)>0): 
								foreach ($seleccionados as $idcat):
									$datacategorias[$id] = $campos["x_".$id];
									$datacategorias["id_categoria"] = $idcat;
									$this->Systemedit_model->insert_data($tabla_categorias,$datacategorias);
									//print_r($datacategorias);
									//print_r($tabla_categorias);
									//die();
								endforeach;
							endif;
						
							// End V2
						endif;
						// END CATEGORIAS
						// -----------------------------------
						
						// -----------------------------------
						// ALCANCE DISTRIBUIDOR CUSTOM EXTEND
						if (@$config->config->sidebar_dis == "1"):				
							$campos = $this->input->post();
						//	print_r($campos);
						//	die();
						
							$tipos_permisos = array("categoria","perfil","zona_geografica","distribuidor","usuario");
							foreach ($tipos_permisos as $permiso): 
								$this->Global_model->delete_data($load."_permisos",array($id=> $campos["x_".$id],"tipo_permiso" =>$permiso));
								if (count(@$campos["permisos_".$permiso])>0):
									foreach (@$campos["permisos_".$permiso] as $id_referencia):
										$data_insert[$id] = $campos["x_".$id];
										$data_insert["id_referencia"] = $id_referencia;
										$data_insert["tipo_permiso"] = $permiso;
										$this->Systemedit_model->insert_data($load."_permisos",$data_insert);
									endforeach;
								endif;
							endforeach;	
						
							
						endif;
						// END CATEGORIAS
						// -----------------------------------
						
						// LOG
						$this->Global_model->logThis($this->data["usuarioPerfil"],"edit",$load,$datakey,$data);
						
						//die();
						if (@$config->config->action_after_save != "") {
							$function_name = $config->config->action_after_save;
							$this->$function_name($this->input->post("x_".$id));
						}
												
						
						if ($x_back==""):				
							redirect(base_url().'list/'.$load);
						else:						
							redirect($x_back);
						endif;
					endif;	
					
									
				endif;
			endif;
		endif;
	}
	
	
	// cargar campos
	private function LoadForm($config,$LSI,$curAction) {	

		$listfields = array();
		if (@$config->fields):
			foreach ($config->fields as $key => $value):
					$listfields[$key] = $this->getFieldView($key,$value,$LSI[$key],$curAction);
			endforeach;
		endif;
		// print_r($listfields);
		return $listfields;	
	}
	
	private function joinListField($fields) {
		$listfields = array();
		if ($fields):	
			foreach ($fields->fields as $key => $value):
				if (property_exists($value,'keylink')):
					$listfields[$key] = $value->keylink;
				endif;
			endforeach;
		endif;
		return $listfields;
	}
	
	
	
	// definir el tipo de campo
	private function getFieldView($name,$config,$LSI,$curAction) {
		
		$field_type = $config->mode;
		$this->mydata["name"] = $name; 
		$this->mydata["required"] = (@$config->null=="NO")? "required": ""; 
		$this->mydata["extra"] = (@$config->extra!="")? $config->extra: ""; 
		
		$this->mydata["size"] = (@$config->size!="")? @$config->size: "3,9"; 
		
		$this->mydata["field_name"] = "x_".$name;
		$this->mydata["ffile"] = $this->data["ffile"];
		$data_lang[$name] = $LSI;
	
		$this->mydata["LSI"] = $data_lang;
		$view = '';	
		
		
		// SETUP DEFAULT
		if (@$this->data["load"]->$name != "") :
			$this->mydata["default"] = @$this->data["load"]->$name;
		else:
		// echo "load"; print_r($this->data["ffile"]);
			if ($this->nativesession->get($this->data["ffile"]."_s_".$name) != ""):
				
				$this->mydata["default"] = $this->nativesession->get($this->data["ffile"]."_s_".$name); 
			else:
				switch (@$config->default):
					case "CURDATE":$this->mydata["default"] = @date("Y-m-d"); break;
					case "CURDATETIME":$this->mydata["default"] = @date("Y-m-d H:i:s"); break;
					case "MULTIJOIN": 
						$explodemultijoin = explode(",",$config->multijoin);
						if ($this->keydata):
							$this->mydata["default"] = $this->Global_model->get_rows_select_unique($explodemultijoin[2],$explodemultijoin[0],$this->keydata);
						endif;
					break;
					case "FUNCTION":
						if (@$config->default_function !=""):
							$namefunction = $config->default_function;
							$this->mydata["default"] = $this->common->$namefunction($this->data);
						endif;
					break;
					default: $this->mydata["default"] = @$config->default; break;
				endswitch;
			
			endif;
		endif;
		
		
	
		if (@$config->ftype != "") : //Tipo definido en la configuración
			//print_r($config);
			// ---------------------------
			// biblioteca multiple extend
			// ---------------------------
			if ($config->ftype == "biblioteca_multiple"):
				$biblioteca = $this->Systemedit_model-> get_rows($name,array($config->keylinkbib=>$this->input->get($config->keylinkbib)));
				
			//	print_r($biblioteca);
				if (count($biblioteca) > 0) :
					foreach ($biblioteca as $bib):
						$this->mydata["default"].= $bib->id_biblioteca.",";
					endforeach;
				endif;
			endif;
			// ---------------------------
			// END biblioteca multiple extend
			// ---------------------------
			
			if ($config->ftype == "select" || $config->ftype == "input_radio" || $config->ftype == "input_radio_rol" || $config->ftype == "select_multiple" || substr($config->ftype,0,14)=="special_select" ):			
				if ($config->fvalue=="table") : // cargar desde tabla 
					$explodejoin = explode(",",$config->fjoin);
					$wheretemp = (@$explodejoin[3]!='')?$explodejoin[3]:NULL;
					
					
					// V2
					if ($config->ftype == "special_select_categorias"):
						$seleccionadas = array();
						foreach ($this->mydata["default"] as $key=>$val):
							$seleccionadas[$val] = $val;
							
						endforeach;
						$this->mydata["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
						$this->mydata["esquema_arboledit_html"]= $this->Global_model->esquema_arboledit_html($this->mydata["arbol"],$this->data["catnivel_nombre"],$this->data["max_nivel_categorias"],'',1,$seleccionadas );
						// print_r($seleccionadas);
					endif;

					// END v2
					
					
					if (@$config->custom_sqlfunction != ""): 
						$namefunc = $config->custom_sqlfunction;
						$datalist = $this->Global_model->get_custom_query($this->common->$namefunc());
						
					else:
						$datalist = $this->Global_model->get_rows_select($explodejoin[1].",".$explodejoin[2],$explodejoin[0],$wheretemp);
					endif;
				
				else : //string de carga definida por comas en fvalue
				
					$datalist = new stdClass();
					$explodetype = explode(",",$config->fvalue);
					foreach ($explodetype as $row): 
						$datalist->$row = $row;
					endforeach;					
				endif;
				
				$this->mydata["datalist"] = $datalist;			
			endif;
			if (@$config->keylink != "") :
			
				$explodekjoin = explode(",",$config->keylink);
				$datakeylink = $this->Global_model->get_row_select($explodekjoin[1].",".$explodekjoin[2],$explodekjoin[0], array($explodekjoin[1] => @$this->data["load"]->$name));
				
				$this->mydata["default_display"] = @$datakeylink[$this->data["load"]->$name];
			endif;
			$view = $this->load_form_row($config->ftype,$this->mydata);
		else:	
			
			if ($config->key=="PRI"): // PRIMARY KEY  			
				
				if (@$config->keylink != "") :
					$explodekjoin = explode(",",$config->keylink);
					$datakeylink = $this->Global_model->get_row_select($explodekjoin[1].",".$explodekjoin[2],$explodekjoin[0], array($explodekjoin[1] => $this->data["load"]->$name));
					
					$this->mydata["default_display"] = $datakeylink[$this->data["load"]->$name];
				else:
					$this->mydata["default_display"] = $this->mydata["default"];
				endif;
				if ($curAction=="U") :
					$view = $this->load_form_row("input_primary",$this->mydata);
				else:
					$view = $this->load_form_row("input_text",$this->mydata);
				endif;		
			else:
		
				if (@$config->keylink != "") :
				
					$explodekjoin = explode(",",$config->keylink);
					$datakeylink = $this->Global_model->get_row_select($explodekjoin[1].",".$explodekjoin[2],$explodekjoin[0], array($explodekjoin[1] => $this->data["load"]->$name));
					
					$this->mydata["default_display"] = $datakeylink[$this->data["load"]->$name];
				endif;
				
				if (strpos($field_type,"varchar") !== FALSE) :
					$view = $this->load_form_row("input_text",$this->mydata);
				elseif ($field_type=="text") :
					$view = $this->load_form_row("textarea",$this->mydata);
				else: // generico
					$view = $this->load_form_row("input_text",$this->mydata);
				endif;
			endif; 
			
		endif;
		
		
		return $view;
	}
	
	
	// cargar vista de cada tipo de campo
	private function load_form_row($type,$mydata) {
		// print_r($mydata);
		$this->mydata["LS"] = ($this->lang->language);
	
		return $this->load->view('templates/form/'.$type,$mydata,TRUE);		
	}
	

	
	// Revisar y setear clave primaria
	private function checkPrimaryKey($load) {
		$TableConfig = $this->config_crud;
		if ($TableConfig):
			foreach ($TableConfig->fields as $name=>$field):
				if (@$field->key== "PRI"):
					if (!($this->input->get($name))):
						return false;
					else:
						$this->data["x_".$name] = $this->input->get($name);
						$this->primaryKey[$name] = $this->input->get($name);
					endif;
				endif;
			endforeach;
		endif;
		
		return true;
	}
	
	// Revisar y setear filtros 
	private function checkFilterKey($load) {
		$TableConfig = $this->config_crud;
		$keys=0;
		if ($TableConfig):
			foreach ($TableConfig->fields as $name=>$field):					
					if (($this->input->get($name))):
						$keys++;
						$this->data["filter"][$name] = $this->input->get($name);
						$this->data["filtermaster"][$name] = $this->input->get($name);
					//	$this->nativesession->set($load."_s_".$name, $this->input->get($name));
					elseif ($this->nativesession->get($load."_s_".$name) != ""):
						$keys++;
						$this->data["filter"][$name] = $this->nativesession->get($load."_s_".$name);
						$this->data["filtermaster"][$name] = $this->nativesession->get($load."_s_".$name);
					endif;
			endforeach;
		endif;
		if ($keys>0)return true;else return false;
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
	
	// AFTER SAVE FUNCTION action_after_save
	private function check_alertas_enviar_ahora($id='') {
		// seleccionar todas las alertas en estado enviar_ahora
		$alertas = $this->Global_model->get_rows("*","alertas",array("estado"=>"enviar_ahora","localizacion"=>localizacion()));

		if (count($alertas)>0):
		 	
			$data["fecha_envio"] = date("Y-m-d H:i:s");
			foreach ($alertas as $alerta):
				$this->Global_model->delete_data("alertas_enviadas",array("id_alerta"=>$alerta->id_alerta)); // Limpiar por si acaso es segunda vez
				
				$tipos_alerta = $this->Global_model->get_rows("tipo","alertas_tipos",array("id_alerta"=>$alerta->id_alerta));
				$data["id_alerta"] = $alerta->id_alerta;	
				
				if (count($tipos_alerta)>0):
					foreach ($tipos_alerta as $tipo): 
						$data["tipo"] = $tipo->tipo;				
						// seleccionar todos los usuarios admin
						$usuarios = $this->Global_model->get_rows("*","administradores",array("localizacion"=>localizacion(),"estado"=>"1"));
						if (count($usuarios)>0):
							$data["tipo_usuario"] = 'administrador';
							foreach ($usuarios as $usr): 
								$data["usuario"] = $usr->usuario;
								$this->Global_model->insert_data("alertas_enviadas",$data); // insertar la alerta al usuario
							endforeach;
						endif;				
						
						// seleccionar todos los usuarios distribuidor
						$usuarios = $this->Global_model->get_rows("*","distribuidores_usuarios",array("localizacion"=>localizacion(),"estado"=>"1"));
						if (count($usuarios)>0):
							$data["tipo_usuario"] = 'distribuidor';
							foreach ($usuarios as $usr): 
								$data["usuario"] = $usr->email;
								$this->Global_model->insert_data("alertas_enviadas",$data); // insertar la alerta al usuario
							endforeach;
						endif;
						
						// seleccionar todos los usuarios externos
						$usuarios = $this->Global_model->get_rows("*","usuarios",array("localizacion"=>localizacion(),"estado"=>"1"));
						if (count($usuarios)>0):
							$data["tipo_usuario"] = 'usuario';
							foreach ($usuarios as $usr): 
								$data["usuario"] = $usr->email;
								$this->Global_model->insert_data("alertas_enviadas",$data); // insertar la alerta al usuario
							endforeach;
						endif;
						
						if ($tipo->tipo == "email"):
							// enviar email con una funcion comun en global
							$this->Global_model->enviar_alertas_tipo_email_pendientes();
						endif;				
						
					endforeach; // tipos				
				endif;// tipos
				
				
				// marcar la alerta como enviada 
				$this->Global_model->update_data("alertas",array("estado"=>"enviado"),array("id_alerta"=>$alerta->id_alerta)); 
			endforeach;
		endif;
		
		
		
		// seleccionar todas las alertas en estado enviar_prueba_ahora
		$alertas = $this->Global_model->get_rows("*","alertas",array("estado"=>"enviar_prueba_ahora","localizacion"=>localizacion()));

		if (count($alertas)>0):
		 	
			$data["fecha_envio"] = date("Y-m-d H:i:s");
			foreach ($alertas as $alerta):
				$this->Global_model->delete_data("alertas_enviadas",array("id_alerta"=>$alerta->id_alerta)); // Limpiar por si acaso es segunda vez
				
				$tipos_alerta = $this->Global_model->get_rows("tipo","alertas_tipos",array("id_alerta"=>$alerta->id_alerta));
				$data["id_alerta"] = $alerta->id_alerta;	
				
				if (count($tipos_alerta)>0):
					foreach ($tipos_alerta as $tipo): 
						$data["tipo"] = $tipo->tipo;				
						// seleccionar todos los usuarios admin
						
						$data["tipo_usuario"] = $this->data["usuarioPerfil"]->tipo;						
						$data["usuario"] = $this->data["usuarioPerfil"]->email;
						$this->Global_model->insert_data("alertas_enviadas",$data); // insertar la alerta al usuario
						
						
						if ($tipo->tipo == "email"):
							// enviar email con una funcion comun en global
							$this->Global_model->enviar_alertas_tipo_email_pendientes();
						endif;				
						
					endforeach; // tipos				
				endif;// tipos
				
				
				// marcar la alerta como enviada 
				$this->Global_model->update_data("alertas",array("estado"=>"enviado"),array("id_alerta"=>$alerta->id_alerta)); 
				
				redirect(base_url().'edit/alertas/?id_alerta='.$alerta->id_alerta, 'location', 302);
				exit();
				
			endforeach;
		endif;
		
	}
	
	private function distribuidores_after_save($id='') {
		
		
		// obtener todos los usuarios de ese distribuidor y 
		$tabla = "distribuidores_usuarios"; $key="id_distribuidor"; 
		$dataupdte["estado_epedidos"] = "0";
		$this->Global_model->update_data($tabla,$dataupdte,array($key=>$id));	
		
	}
	
	private function distribuidores_usuarios_after_save($id='') {
		
		// Campos base
		$this->data_email["nombre"] = $this->input->post("x_nombre"); 
		$this->data_email["celular"] = $this->input->post("x_celular"); 
		$this->data_email["telefono"] = $this->input->post("x_telefono"); 
		$this->data_email["direccion"] = $this->input->post("x_direccion"); 
		$this->data_email["id_perfil_usuario"] = $this->input->post("x_id_perfil_usuario"); 
		$this->data_email["genero"] = $this->input->post("x_genero"); 
		$this->data_email["fecha_nacimiento"] = ($this->input->post("x_fecha_nacimiento") != "" && $this->input->post("x_fecha_nacimiento") != "0000-00-00") ? $this->input->post("x_fecha_nacimiento") : NULL;
		$this->data_email["id_distribuidor"] = $this->input->post("x_id_distribuidor"); 
		$this->data_email["localizacion"] = localizacion();
		$this->data_email["email"] = $this->input->post("x_email"); 
		$this->data_email["password"] = md5($this->input->post("x_password")); 
		
				
		// Revisar si existe en la tabla distribuidores_usuarios_tmp
		$id_distribuidor_usuario_tmp = $this->Systemedit_model->get_field("id_distribuidor_usuario","distribuidores_usuarios_tmp","id_distribuidor_usuario = ".intval($id));
		
		
		if ($id_distribuidor_usuario_tmp != ""):  // Si existe, actualizar
			$this->Global_model->update_data("distribuidores_usuarios_tmp",$this->data_email,array("id_distribuidor_usuario"=>$id));
		else: // Si no existe, crear 
			$this->Global_model->insert_data_return_id("distribuidores_usuarios_tmp",$this->data_email);	
		endif;
		
		// Start: WS
		$tabla = "distribuidores_usuarios"; $key="id_distribuidor_usuario"; 
		$dataupdte["user_epedidos"] = $this->input->post("x_email");
		$dataupdte["pass_epedidos"] = $this->input->post("x_password");
		$dataupdte["estado_epedidos"] = "0";
		$this->Global_model->update_data($tabla,$dataupdte,array($key=>$id));
		/*		
		if ($this->input->post("x_password") != "" && $this->input->post("x_acceso_epedidos") == "on"):
			$distribuidorExist =  $this->Global_model->get_distribuidor_usuario($this->input->post("x_email"),localizacion());	
			
			// actualizar en ws1 epedidos, esperar respuesta y si es respuesta true, hacer lo siguiente:						
			$dataWS["paramIdCliente"] = limpiarCodigoClienteEpedidos($distribuidorExist->codigo); // rut cliente
			$dataWS["paramEmail"] = $this->input->post("x_email"); // email usuario
			$dataWS["paramIdUsuario"] = $this->input->post("x_email"); // email usuario
			$dataWS["paramPassword"] = $this->input->post("x_password"); // password max 10 digitos
			$dataWS["paramNombreUsuario"] = $this->input->post("x_nombre"); // nombre usuario
			$dataWS["paramIdPerfil"] = $distribuidorExist->id_perfil_epedidos; // id perfil de epedidos
			$dataWS["paramActivo"] = $this->input->post("x_estado");  // 1 activo 0 desactivo o eliminado	
			
			//print_r($dataWS);
			//die("DETENGO JUSTO ANTES DE INGRESAR A WS USUARIO EPEDIDOS");				
			$ingresarUsuarioEpedidos = ingresarUsuarioEpedidos($dataWS);						
			if ($ingresarUsuarioEpedidos): // Devolvió true								
				// actualizar bd
				$dataupdte["user_epedidos"] = $this->input->post("x_email");
				$dataupdte["pass_epedidos"] = $this->input->post("x_password");
				$dataupdte["estado_epedidos"] = "1";
				$this->Global_model->update_data($tabla,$dataupdte,array($key=>$this->data["usuarioPerfil"]->id_usuario));
			else: // Devolvió false
				$consultar_token = false;
			endif; 
		endif;
		*/
		// End: WS
			
		
		// send email		
		if (@$this->input->post("x_enviar_clave") == "on" && @$this->input->post("x_password")!= ""):
		 	
			$this->data_email["password"] = $this->input->post("x_password"); 
		
			$this->data_email["distribuidor"] = $this->Systemedit_model->get_field("nombre","distribuidores","id_distribuidor = ".intval($this->data_email["id_distribuidor"]));
			$this->data_email["perfil_usuario"] = $this->Systemedit_model->get_field("nombre","perfiles_usuarios","id_perfil_usuario = ".intval($this->data_email["id_perfil_usuario"]));
			$this->data_email["enlace"] = base_url();	
				
			$message = 	$this->load->view('emails/usuario-info',$this->data_email, true);			
			$subject = 'Cuenta de Usuario';
			$this->enviar_email($this->data_email["email"], $subject, $message);
			
		endif;
	}
	
	
	private function usuarios_after_save($id='') {
		
		// Campos base
		$this->data_email["nombre"] = $this->input->post("x_nombre"); 
		$this->data_email["celular"] = $this->input->post("x_celular"); 
		$this->data_email["telefono"] = $this->input->post("x_telefono"); 
		$this->data_email["direccion"] = $this->input->post("x_direccion"); 
		$this->data_email["id_perfil_usuario"] = $this->input->post("x_id_perfil_usuario"); 
		$this->data_email["genero"] = $this->input->post("x_genero"); 
		$this->data_email["fecha_nacimiento"] = $this->input->post("x_fecha_nacimiento"); 
		$this->data_email["localizacion"] = localizacion();
		$this->data_email["email"] = $this->input->post("x_email"); 
		$this->data_email["password"] = md5($this->input->post("x_password")); 
		
	 
		
		// send email		
		if (@$this->input->post("x_enviar_clave") == "on" && @$this->input->post("x_password")!= ""):
		 	
			$this->data_email["password"] = $this->input->post("x_password"); 
		
		
			$this->data_email["perfil_usuario"] = $this->Systemedit_model->get_field("nombre","perfiles_usuarios","id_perfil_usuario = ".intval($this->data_email["id_perfil_usuario"]));
			$this->data_email["enlace"] = base_url();	
				
			$message = 	$this->load->view('emails/usuario-info',$this->data_email, true);			
			$subject = 'Cuenta de Usuario';
			$this->enviar_email($this->data_email["email"], $subject, $message);
			
		endif;
	}
	
	
	private function distribuidores_usuarios_tmp_after_save($id='') {
		
		// Campos base
		$this->data_email["nombre"] = ""; 
		$this->data_email["localizacion"] = localizacion();
		$this->data_email["id_distribuidor"] = $this->input->post("x_id_distribuidor"); 
		
		// Revisar si existe en la tabla distribuidores_usuarios
		$id_distribuidor_usuario = $this->Systemedit_model->get_field("id_distribuidor_usuario","distribuidores_usuarios","id_distribuidor_usuario = ".intval($id));
		
		if ($id_distribuidor_usuario != ""):  // Si existe, enviar alerta
			
		else: // Si no existe, crear 
			$this->Global_model->insert_data_return_id("distribuidores_usuarios",$this->data_email);
			// enviar alerta
				
		endif;
		
		// campos base
		$this->data_email["nombre"] = $this->input->post("x_nombre"); 
		$this->data_email["celular"] = $this->input->post("x_celular"); 
		$this->data_email["telefono"] = $this->input->post("x_telefono"); 
		$this->data_email["direccion"] = $this->input->post("x_direccion"); 
		$this->data_email["id_perfil_usuario"] = $this->input->post("x_id_perfil_usuario"); 
		$this->data_email["genero"] = $this->input->post("x_genero"); 
		$this->data_email["fecha_nacimiento"] = $this->input->post("x_fecha_nacimiento"); 
		$this->data_email["id_distribuidor"] = $this->input->post("x_id_distribuidor"); 
		$this->data_email["localizacion"] = localizacion();
		$this->data_email["email"] = $this->input->post("x_email"); 
		$this->data_email["password"] = md5($this->input->post("x_password")); 
		$this->data_email["password"] = $this->input->post("x_password"); 
		$this->data_email["id_distribuidor"] = $this->input->post("x_id_distribuidor"); 
		$this->data_email["distribuidor"] = $this->Systemedit_model->get_field("nombre","distribuidores","id_distribuidor = ".intval($this->data_email["id_distribuidor"]));
		$this->data_email["perfil_usuario"] = $this->Systemedit_model->get_field("nombre","perfiles_usuarios","id_perfil_usuario = ".intval($this->data_email["id_perfil_usuario"]));
		
		// ENVIAR ALERTA
		$administradores = $this->Global_model->get_rows("*","administradores",array("localizacion"=>localizacion(),"estado"=>"1"));
		if (count($administradores)>0):
			foreach ($administradores as $adm): 
				if ($adm->moderacion_usuarios== "1"):
					$this->data_alerta["nombre"] = $adm->nombre;
					$subject = "Solicitud de moderación de colaborador de distribuidor";
					$this->data_alerta["texto_abajo_nombre"] = $subject;
					$this->data_alerta["texto"] = "El distribuidor <b>".$this->data_email["distribuidor"]. "</b> a través del usuario <b>".$this->data["usuarioPerfil"]->nombre. "</b> solicita cambio en su listado de usuarios. <br><br>Ingrese a 'Acceso administración', 'Usuarios', 'Pendientes de moderación' para revisar la solicitud. "; 
					$this->data_alerta["url_btn"] = base_url()."list/usuarios_moderacion"; 
					$this->data_alerta["texto_boton"] = "Ingresar al sistema";
					$message = 	$this->load->view('emails/moderacion',$this->data_alerta, true);			
					$this->enviar_email($adm->usuario, $subject, $message);
				endif;
			endforeach;
		endif;		
		
		
		// ACTUALIZAR SIEMPRE CONTRASEÑA
		if ($this->input->post("x_password") != ""):
			$this->Global_model->update_data("distribuidores_usuarios",array("password"=>md5($this->input->post("x_password")),"pass_epedidos"=>$this->input->post("x_password")),array("id_distribuidor_usuario"=>$id));
		endif;
			
		
		// send email		
		if (@$this->input->post("x_enviar_clave") == "on" && @$this->input->post("x_password")!= ""):
		 	
			$this->data_email["enlace"] = base_url();	
				
			$message = 	$this->load->view('emails/usuario-info',$this->data_email, true);			
			$subject = 'Cuenta de Usuario';
			$this->enviar_email($this->data_email["email"], $subject, $message);
			
		endif;
	}
	
	
	
	public function enviar_email($to, $subject, $message, $reply_email = '', $reply_name = '', $cc_email = '', $bcc_email = ''){
		
		require(APPPATH.'config/email.php');
		$from_email = $config['smtp_sender_email'];
		$from_name =$config['smtp_sender_name'];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($from_email, $from_name);
		if($reply_email && $reply_name) $this->email->reply_to($reply_email, $reply_name); 
		
		$this->email->to(trim($to)); 
		
		
		if ($cc_email != ""):
			$this->email->cc($cc_email);
		endif;
		/*if($cc_email) {
			$cc_email = explode(",",$cc_email);
			foreach ($cc_email as $temp) {
				if (trim($temp)!="")
				 $this->email->cc(trim($temp));
			}
		}*/
		if ($bcc_email != ""):
			$this->email->bcc($bcc_email);
		endif;
		/*if($bcc_email) {
			$bcc_email = explode(",",$bcc_email);
			foreach ($bcc_email as $temp) {
				if (trim($temp)!="")
				$this->email->bcc(trim($temp));
			}
		}*/
		
		$this->email->subject($subject);
		$this->email->message($message);
		
		$this->email->send();
		
		// print_r( $this->email);
		
	
		@$this->email->clear();
		return true;
	}
	
}

