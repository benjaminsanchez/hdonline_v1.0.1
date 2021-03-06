<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemDelete  extends CI_Controller {
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
		$this->load->model('Systemdelete_model');
		$this->load->config('crud');
		
	}
	
	public function delete($load,$errors='') {	
		global $sufix_action;
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		
		if (in_array($load,$this->tablas_permitidas)):
			$this->data["configcrud"] = $this->config_crud;
			$this->data["LANG"] = array();
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi );
			$this->data["ffile"] = $load;			
			$this->data["current_menu_padre"] = @$this->Global_model->get_codigo_menu_padre($load);
	
				
			$primaryKeyOk = $this->checkPrimaryKey($load);			
			if ($primaryKeyOk) {
				$this->data["curAction"] = "D"; // update							
				foreach ($this->input->get() as $key => $value)	$sufix_action.= "$key=$value&"; 
				$sufix_action = substr($sufix_action,0,-1);
				$this->data["actionform"] = "delete_execute/".$load."?".$sufix_action;			
				$this->data["load"] = $this->Systemdelete_model->load_data($load,$this->primaryKey);				
			} else {
				redirect(base_url().'list/'.$load);
			}
			$this->data["load_form"] = $this->LoadForm($this->config_crud,$this->data["LSI"]);
			$this->data["errors"] = $errors;		
			$this->load->view('delete',$this->data);
		else:
			// mostrar 404
		endif;			 
	}
	
		
	// procesar formulario
	public function delete_execute($load) {
		if (in_array($load,$this->tablas_permitidas)):
			if ($this->input->post("a_edit")):
				$a_edit = $this->input->post("a_edit");
				switch($a_edit):
					case "D":	$this->deleteData($load);break;
				endswitch;
			endif;
		endif;		
	}
	
	// eliminar registro
	private function deleteData($load) {
		if (in_array($load,$this->tablas_permitidas)):
			$this->load->helper('security');
			$this->load->library('form_validation');
			
			$data = $datakey = array();
			$config = json_decode($this->config->item('jsonCFG'))->$load;
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			$LSI = $this->common->get_lsi($load,$config,$lsi);
			
			// Validacion	
			if ($config->fields):
				foreach ($config->fields as $key =>$value):	
					$required =  (@$value->key=="PRI" ) ? "required|": "";
					$this->form_validation->set_rules('x_'.$key,$LSI[$key], 'trim|'.$required.'xss_clean');
				endforeach;
			endif;
			
			if($this->form_validation->run() == FALSE):	
				$this->delete($load,validation_errors()); // No pasó validación, carga formulario con errores
			else:
				// Datos para eliminar revisando claves primarias
				if ($config->fields):
					foreach ($config->fields as $key =>$value):		
						if (@$value->key=="PRI"):
							$datakey[$key]=$this->input->get($key);
						endif;
					endforeach;
					if ($this->Systemdelete_model->delete_data($load,$datakey)):
						
						// LOG
						$this->Global_model->logThis($this->data["usuarioPerfil"],"delete",$load,$datakey);
						
						if (@$config->config->action_after_delete != "") {
							$this->data["datakey"] = $datakey; 
							$function_name = $config->config->action_after_delete;
                                                        if(method_exists($this, $function_name)):
                                                            $this->$function_name( $datakey,$load);
                                                        endif;
							
						}
						$x_back = $this->input->post("x_back");
						if( @$config->config->backpage == "referer"):
							redirect($x_back);
						else:
							redirect(base_url().'list/'.$load);
						endif;
						
					endif;					
				endif;
			endif;
		endif;
	}
	
        private function distribuidores_usuarios_tmp_after_delete($id,$load)
        {
            if($load=="distribuidores_usuarios_tmp"):
                $this->Systemdelete_model->delete_data("distribuidores_usuarios",$id);
            endif;
            redirect(base_url().'listc/distribuidores_usuarios');
            return;
        }
	
	// cargar campos
	private function LoadForm($config,$LSI) {		
		$listfields = array();
		if ($config->fields):
			foreach ($config->fields as $key => $value):
				
					$listfields[$key] = $this->getFieldView($key,$value,$LSI[$key]);
			endforeach;
		endif;
		// print_r($listfields);
		return $listfields;	
	}
	
	
	// functiones after
	
	private function distribuidores_usuarios_after_delete($datakey) {
		$this->Systemdelete_model->delete_data("distribuidores_usuarios_tmp",$datakey); 
	}
	
	
	
	private function distribuidores_after_delete($datakey) {
		$this->Systemdelete_model->delete_data("distribuidores_usuarios_tmp",$datakey);
		$this->Systemdelete_model->delete_data("distribuidores_usuarios",$datakey);
	}
	
	
	// cargar campo
	private function getFieldView($name,$config,$LSI) {
		$field_type = $config->mode;
		$this->mydata["name"] = $name; 
		$this->mydata["field_name"] = "x_".$name;
		$data_lang[$name] = $LSI;
	
		$this->mydata["LSI"] = $data_lang;
		$view = '';		
		
		$this->mydata["default"] = @$this->data["load"]->$name;
		if (@$config->nodelete != "nodelete"): 
			if (@$config->keylink != "") :
				$explodekjoin = explode(",",$config->keylink);
				$datakeylink = $this->Global_model->get_row_select($explodekjoin[1].",".$explodekjoin[2],$explodekjoin[0], array($explodekjoin[1] => $this->data["load"]->$name));
				
				$this->mydata["default_display"] = @$datakeylink[$this->data["load"]->$name];
			else:
				$this->mydata["default_display"] = $this->mydata["default"];
			endif;
			if ($config->ftype=="input_hidden"):
			$view = $this->load_form_row("input_hidden",$this->mydata);
			else:
			$view = $this->load_form_row("input_primary",$this->mydata);
			endif;
		endif;
		
		return $view;
	}
	
	
	// cargar vista según tipo de campo
	private function load_form_row($type,$mydata) {
		return $this->load->view('templates/form/'.$type,$mydata,TRUE);		
	}
	
	// after delete
	
	
	
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
	
	// Action after delete custom::
	
	private function alertas_enviadas_delete() {
		$this->Global_model->delete_data("alertas_enviadas",$this->data["datakey"]);	
	}
	


}

