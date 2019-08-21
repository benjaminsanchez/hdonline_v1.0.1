<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemList  extends CI_Controller {
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
		$this->load->model('Systemlist_model');
		$this->load->config('crud');
		
	}
	
	public function cargar_tabla($load,$sExport='',$pagina='',$startrec='',$recperpage='20',$sortfield=''){
		if ($this->common->check_access($this->data["current_access"],$this->data,$load)) {
		if (in_array($load,$this->tablas_permitidas)):
			
			$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
			
			
			if (@$this->config_crud->config->recperpage != ""):
				$recperpage= $this->config_crud->config->recperpage;
			endif;
			
			// Sort table by field
			$sortforce = ""; 
			$sortfieldmode = "";
			if ($sortfield!=""):
				if ($sortfield == "clear"):
					// borro el sortfieldmode y el sortfield y sentencia
					$sortforce = ""; 
					$this->nativesession->set('sortfield_'.$load,$sortfield,"");
					$this->nativesession->set('sortfieldmode_'.$load.'_'.$sortfield,"");
				else:
					// si existe la sesion sorfieldmode creado, lo cambio de asc a desc o viciversa
					$sortfieldmode = ($this->nativesession->get('sortfieldmode_'.$load.'_'.$sortfield) == "ASC")? "DESC":"ASC";
					// creo la sentencia
					$sortforce = $load.".".$sortfield." ".$sortfieldmode; 
					$this->nativesession->set('sortfield_'.$load,$sortfield,$sortfield);
					$this->nativesession->set('sortfieldmode_'.$load.'_'.$sortfield,$sortfieldmode);				
				endif;
			
			elseif ($this->nativesession->get('sortfield_'.$load) != ""): 
				// Veo si está guardada la sesion para sorfieldmode, si está guardada la asigno como modo y si no la creo como ASC
				$sortfieldmode = ($this->nativesession->get('sortfieldmode_'.$load.'_'.$sortfield) != "")? $this->nativesession->get('sortfieldmode_'.$load.'_'.$sortfield): "ASC";
				$this->nativesession->set('sortfieldmode_'.$load.'_'.$sortfield,$sortfieldmode);			
				// asigno a sorfield como la session que estaba guardada
				$sortfield = $this->nativesession->get('sortfield_'.$load); 
				if ($sortfield == "clear"):
					// borro el sortfieldmode y el sortfield y sentencia
					$sortforce = ""; 
					$this->nativesession->set('sortfield_'.$load,$sortfield,"");
					$this->nativesession->set('sortfieldmode_'.$load.'_'.$sortfield,"");
				else: 
					// creo la sentencia para ser ingresado				
					$sortforce = $load.".".$sortfield." ".$sortfieldmode;
				endif; 
			endif;
			$this->data["sortfield"] = $sortfield;
			$this->data["sortfieldmode"] = $sortfieldmode;
			// Ver abajo seteo de sentencia $orderBy = ($sortforce !="") ? $sortforce : $orderBy;  
			// End sort table by field
			
			$FilterActive = $this->checkFilterKey($load);
			$FilterListActive = $this->checkFilterKeyList($load);
		
			$this->data["configcrud"] = $this->config_crud;
			$this->data["ffile"] = $load;
			$this->data["current_menu_padre"] = @$this->Global_model->get_codigo_menu_padre($load);
			$this->data["sExport"] = $sExport;
			if ($this->data["sExport"] != ""):
				$recperpage= 10000;
			endif;
			$this->data["LANG"] = array();
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			$this->data["ewmsg"] = @$this->nativesession->get('ewmsg');
			$this->nativesession->set('ewmsg',"");
			if ($recperpage != "ALL"):
				$this->data["nDisplayRecs"] = $recperpage;
			else:
				$this->data["nDisplayRecs"] = '';
			endif;
			
			
			$this->data["keys"] = $this->setPrimaryKey($load);
			$this->data["keylink"] = ""; 
			
		
			$this->data["joins"] = $this->joinListField($this->config_crud);
			
			if ($this->data["joins"]):
			
				$this->data["custom_fields"] = $this->customListField($this->config_crud);
				$this->data["fields"] = $this->customFilterListField($this->config_crud);
			else:
				$this->data["fields"] = $this->filterListField($this->config_crud);
			endif;
			
			// start: Setting master data table
			 if (@$this->config_crud->config->mastertable):
			
			 	foreach ($this->config_crud->config->mastertable as $table=>$linkfield):
			 		$this->config_crud_master = json_decode($this->config->item('jsonCFG'))->$table;
					$this->data["master_configcrud"] = $this->config_crud_master;
					$this->data["master_joins"] = $this->joinListField($this->config_crud_master);
					$this->data["master_custom_fields"] = 
					$linkfield = explode(",",$linkfield);
					
					$master_where = array($table.".".$linkfield[0]=>@$this->data["filtermaster"][$linkfield[0]]);
					
					if ($this->data["master_joins"]):					
						$this->data["master_custom_fields"] = $this->customListField($this->config_crud_master,$table);
						$this->data["master_fields"] = $this->customFilterListField($this->config_crud_master);
					else:
						$this->data["master_fields"] = $this->filterListField($this->config_crud_master);
					endif;
					$this->data["master_record"] = $this->Systemlist_model->get_rows($table,$master_where,NULL,NULL,NULL,$this->data["master_joins"],NULL);	
					
					$lsi =  @$this->Global_model->get_lenguaje_sistema($table);
					$this->data["LSI"]["master"] = $this->common->get_lsi($table,$this->config_crud_master,$lsi);
					$this->data["master_ffile"] = $table;
					break; 
				endforeach;							
			 endif;
			// End: Setting master data table
			
			
			// start: paginacion
			$this->data["urlbase_paginacion"] = base_url()."list/".$load; 
			if ($pagina != ''):
				$this->data["pagina"] = $pagina;
				@$this->nativesession->set('pagina_'.$load,$pagina);
			else:
				if ( $this->nativesession->get('pagina_'.$load)>0):
					$this->data["pagina"] = $this->nativesession->get('pagina_'.$load);
				else:
					$this->data["pagina"] = $this->nativesession->get('pagina_'.$load);
				endif;
			endif; 
			
			$where = ($FilterActive) ? $this->data["filter"]: NULL;
			$extrawhere =($FilterListActive) ? $this->data["filterlist"] : NULL;		
			
			$limit = $this->data["nDisplayRecs"];
			if ($startrec != ''):
				$offset = $startrec-1;
			else:			
				$offset = ($pagina>1)?@intval((($pagina-1)*$this->data["nDisplayRecs"])-1):0;;
			endif;
			$cfg_orderby = @$this->config_crud->config->orderby;
			$orderBy = ($cfg_orderby!='') ? $cfg_orderby : $load.".".$this->data["keys"][0].' DESC';
			$orderBy = ($sortforce !="") ? $sortforce : $orderBy;
			// print_r( $where);
			
			$this->data["records"] = @$this->Systemlist_model->get_rows($load,$where, $limit, $offset,$orderBy,$this->data["joins"],$this->data["custom_fields"],$extrawhere);					
			//$this->data["nTotalRecs"] =    $this->Systemlist_model->get_total_rows($load,$where);
			$this->data["nTotalRecs"] =  $this->Systemlist_model->get_total_rows($load,$where, NULL, NULL,$orderBy,$this->data["joins"],@$this->data["custom_fields"],$extrawhere);
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
			// end: paginacion
			
			
			$this->data["filter_form"] = $this->LoadForm($this->config_crud,$this->data["LSI"]);
			
			
	
			//	print_r($this->data);	
			if ($sExport == "excel") {
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment; filename='.$load.'.xls');
			}	
			if (@$this->config_crud->config->template_list != ""):
				$this->load->view($this->config_crud->config->template_list,$this->data);
			else:
				$this->load->view('list2',$this->data);
			endif;
			
		else:
			// mostrar 404
		endif;	
		}
	}
	
	
	public function sort_table() {
		$newsort = explode(",", $this->input->post('newsort'));
		$recperpage =  $this->input->post('recperpage');;
		$pageno =  $this->input->post('pageno');
		$table =  $this->input->post('table');
		$fieldkey = $this->input->post('fieldkey');
		$countsort = ((($pageno-1)*$recperpage));
		if ($table != "" && $newsort):
			foreach ($newsort as $sort):
				$countsort++;
				$id = str_replace("data-","",$sort);
				@$this->Systemlist_model->sort_table($table,$countsort,$fieldkey,$id);
				
			endforeach;
		endif;
		echo "newsort $newsort recperpage $recperpage pageno $pageno start $start";		
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
	
	
	// Revisar y setear filtros para master details
	private function checkFilterKey($load) {
		$TableConfig = $this->config_crud;
		$keys=0;
		if ($TableConfig):
			foreach ($TableConfig->fields as $name=>$field):					
					if (($this->input->get($name))):
						$keys++;
						$this->data["filter"][$load.".".$name] = $this->input->get($name);
						$this->data["filtermaster"][$name] = $this->input->get($name);
						$this->nativesession->set($load."_s_".$name, $this->input->get($name));
					elseif ($this->nativesession->get($load."_s_".$name) != ""):
						$keys++;
						$this->data["filter"][$load.".".$name] = $this->nativesession->get($load."_s_".$name);
						$this->data["filtermaster"][$name] = $this->nativesession->get($load."_s_".$name);
					endif;
			endforeach;
		endif;
		if (@$TableConfig->config->filterfunction ):
			foreach ($TableConfig->config->filterfunction as $name => $value):
				$keys++;
				$data = explode(",",$value);
				$key = $data[0];
				$tipoFiltro = $data[1];
				$this->data["filter"][$load.".".$name. " ".$tipoFiltro] = $this->common->$data[2]();			
			endforeach;
		endif;
		if ($keys>0)return true;else return false;
	}
	
	// Revisar y setear filtros para filtros superior de listado 
	private function checkFilterKeyList($load) {
		if ($this->input->get("filter")!=1):
			return false;
		else:
			$TableConfig = $this->config_crud;
			$keys=0;
			if ($TableConfig):			
				if (@$TableConfig->config->filterfields):
					$count=0;
					
					foreach ($TableConfig->config->filterfields as $name => $value):
						$data = explode(",",$value);
						$key = $data[0];
						$tipoFiltro = $data[1];
						$input_name = $count."_".$key;
							
						if (($this->input->get($input_name))):								
							if (($this->input->get($input_name))):
								$keys++;
								if (strtoupper($tipoFiltro) == "LIKE"):
									$this->data["filterlist"][$load.".".$key. " ".$tipoFiltro] = "%".$this->input->get($input_name)."%";
								else:
									$this->data["filterlist"][$load.".".$key. " ".$tipoFiltro] =$this->input->get($input_name);
								endif;								
								$this->nativesession->set($load."_s_".$input_name, $this->input->get($input_name));
							elseif ($this->nativesession->get($load."_s_".$input_name) != ""):
								$keys++;
								$this->data["filterlist"][$load.".".$name. " ".$tipoFiltro] = $this->nativesession->get($load."_s_".$input_name);
							endif;
						endif;
						$count++;
					endforeach;
				endif;
			endif;
		endif;
		if ($keys>0)return true;else return false;		
	}
	
	// cargar campos
	private function LoadForm($config,$LSI) {	
		$listfields = array();
		if (@$config->config->filterfields):
			$count = 0; 
			foreach ($config->config->filterfields as $name => $value):
				$data = explode(",",$value);
				$key = $data[0];
				$listfields[$name] = $this->getFieldView($key,$config->fields->$key,$LSI,$count);
				$count++;
			endforeach;
		endif;
		return $listfields;	
	}
	
	
	
	
	
	// definir el tipo de campo
	private function getFieldView($name,$config,$LSI,$count) {
		$field_type = $config->mode;
		$this->mydata["name"] = $name; 
		$this->mydata["required"] = (@$config->null=="NO")? "required": ""; 
		$this->mydata["field_name"] = $count."_".$name;
		$this->mydata["size"] = (@$config->size!="")? @$config->size: "3,9"; 
		$this->mydata["ffile"] = $this->data["ffile"];
		
		
		$data_lang[$name] = $name;
	
		$this->mydata["LSI"] = $LSI;
		
		$view = '';	
		
		// SETUP DEFAULT
		if (@$this->data["load"]->$name != "") :
			$this->mydata["default"] = @$this->data["load"]->$name;
		else:
		// echo "load"; print_r($this->data["ffile"]);
			if ($this->nativesession->get($this->data["ffile"]."_s_".$count."_".$name) != ""): 				
				$this->mydata["default"] = (($this->input->get($count."_".$name))); //$this->nativesession->get($this->data["ffile"]."_s_".$count."_".$name); 			
			endif;
		endif;
		
		
	
		if (@$config->ftype != "") : //Tipo definido en la configuración
			if ($config->ftype == "select" || $config->ftype == "input_radio" || $config->ftype == "input_radio_rol" || $config->ftype == "select_multiple"):			 
				if ($config->fvalue=="table") : // cargar desde tabla 
					$explodejoin = explode(",",$config->fjoin);
					$datalist = $this->Global_model->get_rows_select($explodejoin[1].",".$explodejoin[2],$explodejoin[0]);
				
				else : //string de carga definida por comas en fvalue
					$datalist = new stdClass();
					$explodetype = explode(",",$config->fvalue);
					foreach ($explodetype as $row): 
						$datalist->$row = $row;
					endforeach;					
				endif;				
				$this->mydata["datalist"] = $datalist;			
			endif;
			$this->mydata["LS"] = $this->data["LS"];	
			$view = $this->load_form_row($config->ftype,$this->mydata);
		else:	
			if (strpos($field_type,"varchar") !== FALSE) :
				$view = $this->load_form_row("input_text",$this->mydata);
			elseif ($field_type=="text") :
				$view = $this->load_form_row("textarea",$this->mydata);
			else: // generico
				$view = $this->load_form_row("input_text",$this->mydata);
			endif;
		endif;		
		return $view;
	}


	// copiado y pegado desde systemedit (standarizar)
	private function getFieldView2($name,$config,$LSI,$curAction) {
		
		$field_type = $config->mode;
		$this->mydata["name"] = $name; 
		$this->mydata["required"] = (@$config->null=="NO")? "required": ""; 
		
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
							 $this->mydata["default"] = $this->common->$namefunction();
						endif;
					break;
					default: $this->mydata["default"] = @$config->default; break;
				endswitch;
			
			endif;
		endif;
		
		
	
		if (@$config->ftype != "") : //Tipo definido en la configuración
			if ($config->ftype == "select" || $config->ftype == "input_radio" || $config->ftype == "select_multiple" || substr($config->ftype,0,14)=="special_select" ):			
				if ($config->fvalue=="table") : // cargar desde tabla 
					$explodejoin = explode(",",$config->fjoin);
					$wheretemp = (@$explodejoin[3]!='')?$explodejoin[3]:NULL;
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

	
	// cargar vista de cada tipo de campo
	private function load_form_row($type,$mydata) {
		return $this->load->view('templates/form/'.$type,$mydata,TRUE);		
	}
}

