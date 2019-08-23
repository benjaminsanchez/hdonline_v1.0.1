<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemCustom  extends CI_Controller {
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
		$this->load->model('Systemcustom_model');
		$this->load->config('crud');
		
	}
	
	public function ajax_login_epedidos() {
		if (@$this->nativesession->get( 'HD_ONLINE_status' )=="login"): 
			if (@$this->data["usuarioPerfil"]->acceso_epedidos == "on"):
				$consultar_token = true;
				if ($this->data["usuarioPerfil"]->estado_epedidos == "0"): // Está registrado en hdonline pero no en WS1 Epedidos
				
					switch ($this->data["usuarioPerfil"]->tipo):
						case "distribuidor": 
							$tabla = "distribuidores_usuarios"; $key="id_distribuidor_usuario"; 
							// actualizar en ws1 epedidos, esperar respuesta y si es respuesta true, hacer lo siguiente:						
							$dataWS["paramIdCliente"] = limpiarCodigoClienteEpedidos($this->data["usuarioPerfil"]->codigo); // rut cliente
							$dataWS["paramEmail"] = $this->nativesession->get("HD_ONLINE_status_User"); // email usuario
							$dataWS["paramIdUsuario"] = $this->nativesession->get("HD_ONLINE_status_User"); // email usuario
							$dataWS["paramPassword"] = $this->nativesession->get("HD_ONLINE_status_Passwd"); // password max 10 digitos
							$dataWS["paramNombreUsuario"] = $this->data["usuarioPerfil"]->nombre; // nombre usuario
							$dataWS["paramIdPerfil"] = $this->data["usuarioPerfil"]->id_perfil_epedidos; // id perfil de epedidos
							$dataWS["paramActivo"] = "1";  // 1 activo porque pudo entrar 0 desactivo o eliminado							
							$ingresarUsuarioEpedidos = ingresarUsuarioEpedidos($dataWS);
							//	print_r($dataWS);  // <!-- Parametros enviados
							//	var_dump($ingresarUsuarioEpedidos);			// <-- resultado WS Usuarios			
							if ($ingresarUsuarioEpedidos): // Devolvió true								
								// actualizar bd
								$dataupdte["user_epedidos"] = $this->nativesession->get("HD_ONLINE_status_User");
								$dataupdte["pass_epedidos"] = $this->nativesession->get("HD_ONLINE_status_Passwd");
								$dataupdte["estado_epedidos"] = "1";
								$this->Global_model->update_data($tabla,$dataupdte,array($key=>$this->data["usuarioPerfil"]->id_usuario));
							else: // Devolvió false
								$consultar_token = false;
							endif; 
						break;
						case "usuario": break;
						case "administrador": break;
					endswitch;					
				endif;
				
				
				// OBTENER TOKEN
				if ($consultar_token == true && @$this->nativesession->get("HD_ONLINE_status_token") == ""):
					$distribuidorExist =  $this->Global_model->get_distribuidor_usuario($this->nativesession->get('HD_ONLINE_status_User'),localizacion());
					
					
					
					$dataTK["customerId"] = limpiarCodigoClienteEpedidos($distribuidorExist->codigo); // "503";
					$dataTK["userName"] =  $distribuidorExist->email;
					$dataTK["password"] = $distribuidorExist->pass_epedidos;// ($distribuidorExist->clave_epedidos); 
				//	print_r($dataTK); // <-- datos enviados al WS2
					$token = getTokenEpedidos($dataTK);
				//	print_r($dataTK); // <-- datos enviados al WS2
				//	print_r($token);  //<!-- resultado token
					$this->nativesession->set("HD_ONLINE_status_token",$token->GetTokenResult);
					echo $token->GetTokenResult;
				elseif ($consultar_token == true &&  @$this->nativesession->get("HD_ONLINE_status_token") != ""): 
					echo $this->nativesession->get("HD_ONLINE_status_token");
					
				endif;
				
			endif;			
		endif; 	
	}
	
	public function ajax_destruir_token_epedidos() {
		@$this->nativesession->set('HD_ONLINE_status_token_destruido','on');
		$this->nativesession->set("HD_ONLINE_status_token","");
	}
	
	public function ajax_modulos_utilizados($a_edit, $id_seccion = "", $id_template = "", $id_categoria = "") {
		$secciones_utilizadas = $this->Systemcustom_model->get_modulos_utilizados($a_edit,$id_seccion,$id_template,$id_categoria);
		echo json_encode($secciones_utilizadas);
	}
	
	public function ajax_actualizar_estado_bloque_dashboard() {
		$id_seccion = intval($this->input->post("id_seccion"));
		$estado = intval($this->input->post("estado"));
		$this->Systemcustom_model->actualizar_estado_bloque_dashboard($id_seccion,$estado);
		
		// LOG
		$this->Global_model->logThis($this->data["usuarioPerfil"],"edit","secciones",array("id_seccion"=>$id_seccion),array("estado_dashboard"=>$estado));
		
	}
	
	public function ajax_actualizar_alertas_leidas() {
		$id_alertas_enviadas = $this->input->post("ids");
		$data["estado"] = "2";
		$where["usuario"] = $this->data["usuarioPerfil"]->email;
		if (count($id_alertas_enviadas)>0): 
			foreach ($id_alertas_enviadas as $id_alerta_enviada):
				$where["id_alerta_enviada"] = $id_alerta_enviada;
				$this->Global_model->update_data("alertas_enviadas",$data,$where);
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"edit","alertas_enviadas",$where,$data);
			endforeach; 
		endif; 
	}
	
	public function ajax_solicitar_imagen_alta() {
		$id_biblioteca = intval($this->input->post("id_biblioteca"));
		$this->data_email["comentario"] = $this->input->post("comentario",TRUE);
		$this->data_email["nombre_usuario"] = $this->data["usuarioPerfil"]->nombre;
		$this->data_email["id_biblioteca"] = $id_biblioteca;
		$this->data_email["email_usuario"] = $this->data["usuarioPerfil"]->email;
		$biblioteca = $this->Systemcustom_model->get_biblioteca_by_id($id_biblioteca);
		
		if ( isValidEmail($biblioteca->usuario_modificacion)) { 
			// LOG
			$this->Global_model->logThis($this->data["usuarioPerfil"],"send_image_request","biblioteca",array("id_biblioteca"=>$id_biblioteca),$this->data_email);
			
			$this->data_email["biblioteca"] = $biblioteca;
			$message = 	$this->load->view('emails/solicitud-imagen',$this->data_email, true);			
			$subject = 'Solicitud de imagen en alta resolución - '.name_system();
			$this->enviar_email($biblioteca->usuario_modificacion, $subject, $message);
			
			
			
			echo 'OK*Mensaje enviado correctamente a '.$biblioteca->usuario_modificacion;		
		} else {
			echo 'OK*Mensaje no se pudo enviar, el administrador que subió esta imagen no tiene registrado un email válido <b>'.$biblioteca->usuario_modificacion.'</b>';
		}
		
	}
	
	public function ajax_modal_alerta($id_alerta) {
		$this->data["alerta"] = $this->Global_model->get_alerta_enviada($this->data["usuarioPerfil"],$id_alerta);
		
		
		$this->load->view('templates/modal/ajax_modal_alerta-'.$this->data["alerta"]->tipo,$this->data);
	}
	
	
	public function ajax_secciones_padre_en_categoria($id_categoria) {
		$secciones = $this->Systemcustom_model->get_secciones_padre_en_categoria($id_categoria);
		echo json_encode($secciones);
		
	}
	


	public function ajax_consulta_user_disponible() {
		// validar que no se repitan los usuarios en distribuidores_usuarios, usuarios y administradores
		$mode = $this->input->post("mode");
		$a_edit = $this->input->post("a_edit");
		$usuario = $this->input->post("usuario");
		$x_id = $this->input->post("id");
		if ($a_edit != "U") $x_id='';
		
		
		$msg = 'OK'; 
		$max_count = 1;
		//if ($e_edit=="U")$max_count=2;
		
		if (!isValidEmail($usuario)){
			$msg =  "ERROR*El email <b>$usuario</b> no es válido"; 
		}
		
		$count_administradores = $this->Systemcustom_model->verificar_usuario_existe("administradores",$usuario,$x_id);
		if ($count_administradores>=$max_count):
			$msg =  "EXISTE*El email <b>$usuario</b> está previamente registrado como administrador"; 
		endif;
		$count_distribuidores_usuarios = $this->Systemcustom_model->verificar_usuario_existe("distribuidores_usuarios",$usuario,$x_id);
		if ($count_distribuidores_usuarios>=$max_count):
			$msg =  "EXISTE*El email <b>$usuario</b> está previamente registrado como usuario de distribuidor"; 
		endif;
		
		$count_usuarios = $this->Systemcustom_model->verificar_usuario_existe("usuarios",$usuario,$x_id);
		
		if ($count_usuarios>=$max_count):
			$msg =  "EXISTE*El email <b>$usuario</b> está previamente registrado como usuario"; 
		endif;
		
		echo $msg;
	}

	public function save_idiomas_sitio() {
		
		if ($this->input->post("a_edit")):
			$a_edit = $this->input->post("a_edit");
			
			switch($a_edit):
				case "A":	
					$data = array(
						'seccion' => $this->input->post('x_seccion'),
						'codigo' => $this->input->post('x_codigo'),
						'texto' => $this->input->post('x_texto')
					);
					$this->Systemcustom_model->guardar_idiomas_sitio($data);
					redirect(base_url().'edit/idiomas_sitio');
				break;
				case "U": 	
					$data = array(
						'localizacion' => localizacion(),
						'seccion' => $this->input->post('x_seccion'),
						'codigo' => $this->input->post('x_codigo'),
						'texto' => $this->input->post('x_texto')
					);
					$this->Systemcustom_model->guardar_editar_idiomas_sitio($data);
					redirect(base_url().'list/idiomas_sitio');
				 break;				
			endswitch;
			
		endif;
		
		
	}
	
	
	
	public function save_idiomas_sistema() {
		
		if ($this->input->post("a_edit")):
			$a_edit = $this->input->post("a_edit");
			
			switch($a_edit):
				case "A":	
					$data = array(
						'tabla' => $this->input->post('x_tabla'),
						'campo' => $this->input->post('x_campo'),
						'texto' => $this->input->post('x_texto')
					);
					$this->Systemcustom_model->guardar_idiomas_sistema($data);
					redirect(base_url().'edit/idiomas_sistema');
				break;
				case "U": 	
					$data = array(
						'localizacion' => localizacion(),
						'tabla' => $this->input->post('x_tabla'),
						'campo' => $this->input->post('x_campo'),
						'texto' => $this->input->post('x_texto')
					);
					$this->Systemcustom_model->guardar_editar_idiomas_sistema($data);
					redirect(base_url().'list/idiomas_sistema');
				 break;				
			endswitch;
			
		endif;
		
		
	}

	public function custom_export_distribuidores() {
		$this->load->config('crud');
		$load = "distribuidores";
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		$this->data["LANG"] = array();
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
			
		$lsiB =  @$this->Global_model->get_lenguaje_sistema("distribuidores_usuarios");
		$this->data["LSIB"] = $this->common->get_lsi("distribuidores_usuarios",$this->config_crud,$lsiB);
		$this->data["datos"] = $this->Systemcustom_model->get_distribuidores();
		
		foreach ($this->data["datos"] as $distribuidor):
			$this->data["usuarios"][$distribuidor->id_distribuidor] = $this->Systemcustom_model->get_distribuidores_usuarios_by_id_distribuidor($distribuidor->id_distribuidor);
		endforeach;
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$load.' '.date("Y-m-d-H:i:s").'.xls');
		
		$this->load->view('custom/export-'.$load,$this->data);
		
	}
	
	
	public function custom_export_usuarios() {
		$this->load->config('crud');
		$load = "usuarios";
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		$this->data["LANG"] = array();
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		
		$this->data["datos"] = $this->Systemcustom_model->get_usuarios();
		
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$load.' '.date("Y-m-d-H:i:s").'.xls');
		
		$this->load->view('custom/export-'.$load,$this->data);
		
	}
	
	public function custom_export_distribuidores_usuarios() {
		$this->load->config('crud');
		$load = "distribuidores_usuarios";
		$this->config_crud = json_decode($this->config->item('jsonCFG'))->$load;
		$this->data["LANG"] = array();
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi);
			
		
		$this->data["datos"] = $this->Systemcustom_model->get_distribuidores_usuarios();
		
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename='.$load.' '.date("Y-m-d-H:i:s").'.xls');
		
		$this->load->view('custom/export-'.$load,$this->data);
		
	}
	
	public function profile() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "profile";
			$this->data["sExport"] = "";
			$this->data["msg_respuesta"] = $this->nativesession->get("msg_respuesta");
	
			$this->data["profile"] =$this->data["usuarioPerfil"];
	
	
			$this->nativesession->set("msg_respuesta","");
			$this->load->view('custom/profile',$this->data);
		} else {
			// mostrar 404	
			redirect(base_url().'login', 'location', 302);
		}
		
		
	}
	
	public function test_ws() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			
			// start ws
	
			// end ws
			
			
			/*,
				array(
					"trace" => 1,
					"location" => "http://64.76.139.7:8086/wsingreso.asmx?wsdl",
					'exceptions' => 1,
					'soap_version' => SOAP_1_1,
					"stream_context" => stream_context_create(
						array(
							'ssl' => array(
								'verify_peer'       => false,
								'verify_peer_name'  => false,
							)
						)
					)
				) 
				*/
			
			// start ws2
			$client = new SoapClient("http://64.76.139.7:8086/wsingreso.asmx?wsdl");
			
			
			$soapmsg["paramCodigo"] = "72.10.50.35";
			$soapmsg["paramUsuario"] = "oqo";
			$soapmsg["paramClave"] = "oqo2598";
			
			
			$result = $client->GetListaUsuariosDS($soapmsg);
			
			print_r($result);
			//$ServiceContent = $result->returnval;
			
		//	$soapmsg = NULL;
		//	$soapmsg["_this"] = $ServiceContent->sessionManager;
			
			/*$result = $client->Login($soapmsg);
			$UserSession = $result->returnval;
			
			echo "User, " . $UserSession->userName . ", successfully logged in!\n";
			
			$soapmsg = NULL;
			$soapmsg["_this"] = $ServiceContent->sessionManager;
			$result = $client->Logout($soapmsg);
			*/
			// end ws 2
			
			
		}
		
		
		
		
		
		
	}
	
	
	public function ajax_actualizar_estado() {
		$acciones_permitidas = array("mantener_arriba","borrador");
		$tablas_permitidas = array("eventos","biblioteca","eventos","incentivos","novedades","slider_home","promociones");
		$accion = $this->input->post("accion");
		$tabla = $this->input->post("table");
		$id = intval($this->input->post("id"));
		$key = $this->input->post("key");
		if (!in_array($accion,$acciones_permitidas)) die("accion no permitida");
		if (!in_array($tabla,$tablas_permitidas)) die("tabla $tabla no permitida");
		$this->Systemcustom_model->actualizar_estado($tabla,$accion,$id,$key);
		
	}
	
	
	
	public function visualsave() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->load->helper(array('form'));
			$this->data["ffile"] = "profile";
			$this->data["sExport"] = "";
			$this->load->library('form_validation');
			
			
			// $this->form_validation->set_rules('x_logo', 'Logo', 'trim|required');
			$this->form_validation->set_rules('x_color', 'Color', 'trim|required');
			$this->form_validation->set_rules('x_texto_footer', 'Texto Footer', 'trim');
			$this->form_validation->set_rules('x_footer_email', 'Texto Footer email', 'trim');
			
			if($this->form_validation->run() == FALSE){
			
				$this->data["msg_respuesta"] =  validation_errors();
				
			}else {
				if ($this->input->post('x_logo') != ""):
					$dataupdte["logo"] = $this->input->post('x_logo');
				endif;
				$dataupdte["color"] = $this->input->post('x_color');
				$dataupdte["texto_footer"] = $this->input->post('x_texto_footer');
				$dataupdte["footer_email"] = $this->input->post('x_footer_email');
				
				
				$this->Global_model->update_data('localizaciones',$dataupdte,array('codigo'=>localizacion()));
				
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"update","localizaciones",array('codigo'=>localizacion()),$dataupdte);
				
				$this->data["msg_respuesta"]  = "Datos actualizados correctamente"; 
			}
			
			$this->data["ffile"] = "parametros";
	//	$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			redirect(base_url().'edit_custom/parametros');
			
			
		}
		
	}
	
	
	
	
	
	public function profilesave() {
			$this->load->helper(array('form'));
			$this->data["ffile"] = "profile";
			$this->data["sExport"] = "";
			switch ($this->input->post("action")):
				
				case "changepass":			
					$this->load->library('form_validation');
					$this->form_validation->set_rules('clave_actual', 'Clave actual', 'trim|required');
					$this->form_validation->set_rules('clave_nueva', 'Clave nueva', 'required');
					$this->form_validation->set_rules('clave_nueva_2', 'Re-ingrese Clave nueva', 'required|matches[clave_nueva]');
					
					if($this->form_validation->run() == FALSE || @trim(@$this->input->post('clave_actual')) == ""){
			
						$this->data["msg_respuesta"] =  validation_errors();
						$this->data["profile"] =$this->data["usuarioPerfil"];
						$this->load->view('custom/profile', $this->data);
					}elseif ($this->input->post('clave_nueva')!=$this->input->post('clave_nueva_2')){
						$this->data["msg_respuesta"] = "Claves no coinciden";
						$this->data["profile"] =$this->data["usuarioPerfil"];
						$this->load->view('custom/profile', $this->data);
					} else {					
						$this->data["profile"] =$this->data["usuarioPerfil"];
						
												
						$sPassWd = $this->input->post('clave_actual');
						$sPassWdNuevo = $this->input->post('clave_nueva');
						
						// Revisar si la contraseña actual coincide
						if  ((trim(@$this->data["profile"]->password) != "" && @$this->data["profile"]->password == md5($sPassWd))) {
							if ($this->data["usuario_administrador"] == 1):
								// actualizar clave en la base de datos: si es admin en admin, si es profesional, si es ambos
								$dataadministradores["password"] = md5($sPassWdNuevo);
								$this->Global_model->update_data('administradores',$dataadministradores,array('usuario'=>$this->nativesession->get("HD_ONLINE_status_User")));
								$this->data["msg_respuesta"] = "Clave administrador actualizada";
								
								// LOG
								$this->Global_model->logThis($this->data["usuarioPerfil"],"changepass","administradores",array('usuario'=>$this->nativesession->get("HD_ONLINE_status_User")),'');
								
								if ($this->data["usuario_distribuidor"] == 1):
									$dataprofesional["password"] = md5($sPassWdNuevo);
									$dataprofesional["estado_epedidos"] = "0";
									$dataprofesional["pass_epedidos"] = $sPassWdNuevo;
									
									$this->Global_model->update_data('distribuidores_usuarios',$dataprofesional,array('id_distribuidor_usuario'=>$this->data["usuarioPerfil"]->id_distribuidor_usuario)); 
									$this->data["msg_respuesta"].= "<br>Clave Usuario Distribuidor actualizada";							
								endif;  
								if ($this->data["usuario_normal"] == 1):
									// actualizar clave en la base de datos: si es admin en admin, si es profesional, si es ambos
									$dataprofesional["password"] = md5($sPassWdNuevo);
									$this->Global_model->update_data('usuarios',$dataprofesional,array('id_usuario'=>$this->data["usuarioPerfil"]->id_usuario)); 
									$this->data["msg_respuesta"].= "<br>Clave Usuario actualizada";	
								endif;									
							elseif ($this->data["usuario_distribuidor"] == 1):
								// actualizar clave en la base de datos: si es admin en admin, si es profesional, si es ambos
								$dataprofesional["password"] = md5($sPassWdNuevo);
								$dataprofesional["estado_epedidos"] = "0";
								$dataprofesional["pass_epedidos"] = $sPassWdNuevo;
								$this->Global_model->update_data('distribuidores_usuarios',$dataprofesional,array('id_distribuidor_usuario'=>$this->data["usuarioPerfil"]->id_distribuidor_usuario)); 
								// LOG
								$this->Global_model->logThis($this->data["usuarioPerfil"],"changepass","distribuidores_usuarios",array('id_distribuidor_usuario'=>$this->data["usuarioPerfil"]->id_distribuidor_usuario),'');
								
								$this->data["msg_respuesta"]= "<br>Clave Usuario Distribuidor actualizada";				
							elseif ($this->data["usuario_normal"] == 1):
								// actualizar clave en la base de datos: si es admin en admin, si es profesional, si es ambos
								$dataprofesional["password"] = md5($sPassWdNuevo);
								$this->Global_model->update_data('usuarios',$dataprofesional,array('id_usuario'=>$this->data["usuarioPerfil"]->id_usuario)); 
								// LOG
								$this->Global_model->logThis($this->data["usuarioPerfil"],"changepass","usuarios",array('id_usuario'=>$this->data["usuarioPerfil"]->id_usuario),'');
								$this->data["msg_respuesta"]= "<br>Clave Usuario actualizada";	
							endif;						
							// redirigir a profile 
							$this->nativesession->set("msg_respuesta",@$this->data["msg_respuesta"]);
							redirect(base_url().'profile', 'location', 302);
						} else {
							$this->data["msg_respuesta"] = "La Clave actual ingresada es incorrecta";
							$this->data["profile"] =$this->data["usuarioPerfil"];
							$this->load->view('custom/profile', $this->data);
						}
					
					}
				break;
				

				
			endswitch;
	
		
	}
	
	
	public function categoriaslist() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "categorias";
			$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
			$this->data["sExport"] = '';
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["nTotalRecs"] = count($this->data["datalist"]);
			$this->load->view('custom/categoriaslist',$this->data);
		}
	}
	
	public function categoriaslistv2() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "categorias";
			$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
			$this->data["sExport"] = '';
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["nTotalRecs"] = count($this->data["datalist"]);
			// estructura de categorias tipo arbol solo categorias lineas
			$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
			
			$this->data["esquema_arbol_html"] = $this->esquema_arbol_html($this->data["arbol"],$this->data["catnivel_nombre"],$this->data["max_nivel_categorias"],'',1);
			// end arbol
			$this->load->view('custom/categoriaslistv2',$this->data);
			
		}
	}
	
	
	public function categoriasadd() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "categorias";
			$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
			$this->data["sExport"] = '';
			$this->data["actionform"] = "A";
			$this->data["errors"] = '';
			
			if (intval(@$this->input->get("id_categoria_tipo"))>0): 
				$this->data["id_categoria_tipo"] = intval(@$this->input->get("id_categoria_tipo"));
				$this->data["categoria_tipo"] = $this->Systemcustom_model->get_categoria_tipo($this->data["id_categoria_tipo"]);
			endif;
			
			if (intval(@$this->input->get("nivel"))>0): 
				$this->data["nivel"] = intval(@$this->input->get("nivel"));
				$this->data["categoria_tipo"] = $this->Systemcustom_model->get_categoria_tipo_by_nivel($this->data["nivel"]);
				$this->data["id_categoria_tipo"] = $this->data["categoria_tipo"]->id_categoria_tipo;
			endif;
			
			if (intval(@$this->input->get("id_categoria_padre"))>0):
				$this->data["id_categoria_padre"] = intval(@$this->input->get("id_categoria_padre"));
				$this->data["categoria_padre"] =  $this->Systemcustom_model->get_categoria($this->data["id_categoria_padre"]);
			endif; 
			
			$this->data["categoria_tipo_nombre"] = $this->data["categoria_tipo"]->descripcion;
			
			$this->data["categorias_padre"] =  $this->Systemcustom_model->get_categorias_padre_disponibles(@$this->data["id_categoria"],$this->data["categoria_tipo"]->nivel);
			$this->data["arbol"] =$this->Global_model->get_arbol_lineal_categorias();
			$this->data["options_categorias_padre"] = $this->options_categorias_padre($this->data["arbol"],$this->data["catnivel_nombre"],intval(@$this->data["nivel"]),1);
			
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["nTotalRecs"] = count($this->data["datalist"]);
			$this->load->view('custom/categoriasedit',$this->data);
		}
	}
	
	
	private function options_categorias_padre($arbol,$catnivel_nombre,$max_nivel_categorias,$nivel=1) {		
		if ($max_nivel_categorias>=$nivel):		
			//$html = ' <optgroup label="'.$catnivel_nombre[$nivel].'">';
		
			$nivel++;
			foreach ($arbol as $row):
				$html.= '<option value="'.$row->nombre.'">';
				
				for ($i=2;$i<=$nivel;$i++):
					$html.="&nbsp; &nbsp; &nbsp; "; 
				endfor;
				
				$html.=$row->nombre.'</option>'; 
				$html.= $this->options_categorias_padre($row->sub,$catnivel_nombre,$max_nivel_categorias,$nivel);
			endforeach;
			//$html.= '</optgroup>';
		endif;
		return $html;	
		
	}
	
	
	
	
	public function categoriassave() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
		//print_r($this->input->post());die();
		$action = $this->input->post("a_edit");
		switch ($action):
			case "U":
				$dataupdate["nombre"] = $this->input->post("x_nombre");
				$where = array("id_categoria"=>$this->input->post("x_id_categoria"));
				$this->Global_model->update_data("categorias",$dataupdate,$where);
				
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"edit","categorias",$where,$dataupdate);
				
				// actualizar las categorias (eliminar e insertar)
				if (count($this->input->post("x_id_categoria_top"))):
					$cat_top = $this->input->post("x_id_categoria_top");
					$wheredelete = array("id_categoria_sub"=>$this->input->post("x_id_categoria"));
					$this->Global_model->delete_data("categorias_sub",$wheredelete);
					foreach ($cat_top as $cat):
						$datainsertcat["id_categoria_sub"] = $this->input->post("x_id_categoria");
						$datainsertcat["id_categoria"] = $cat;
						$this->Global_model->insert_data("categorias_sub",$datainsertcat);
						
					endforeach;				
				endif;
			break;
			case "A":
				$datainsert["nombre"] = $this->input->post("x_nombre");
				$datainsert["localizacion"] = localizacion();
				$datainsert["id_categoria_tipo"] = $this->input->post("x_id_categoria_tipo");
				
				$x_id_categoria = $this->Global_model->insert_data_return_id("categorias",$datainsert);
				// LOG
				$this->Global_model->logThis($this->data["usuarioPerfil"],"add","categorias",'',$datainsert);
				// actualizar las categorias (eliminar e insertar)
				if (count($this->input->post("x_id_categoria_top"))):
					$cat_top = $this->input->post("x_id_categoria_top");
                                       // print_r($cat_top);die;
					$wheredelete = array("id_categoria_sub"=>$x_id_categoria);
					$this->Global_model->delete_data("categorias_sub",$wheredelete);
					foreach ($cat_top as $cat):
                                            
						$datainsertcat["id_categoria_sub"] = $x_id_categoria;
						$datainsertcat["id_categoria"] = $cat;
                                                if( $cat != ""):
                                                $this->Global_model->insert_data("categorias_sub",$datainsertcat);
						endif;
					endforeach;	
                                      //  die;
				endif;
			break;
		endswitch;
		$x_back = $this->input->post("x_back");
		redirect($x_back);
		}
		
	}
	
	
	public function recurso_categoriasv2() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "categorias";
			$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
			$this->data["sExport"] = '';
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["nTotalRecs"] = count($this->data["datalist"]);
			$this->load->view('custom/recurso_categoriasv2',$this->data);
		}
		
	}
	
	
	public function tipos_contenidosdelete() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->load->model('Systemdelete_model');
			
			$this->data["ffile"] = "tipos_contenidos";
			$load = $this->data["ffile"];
			
			$this->config_crud = json_decode($this->config->item('jsonCFG'))->$this->data["ffile"];
			
			$this->data["LANG"] = array();
			$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
			$this->data["LSI"] = $this->common->get_lsi($load,$this->config_crud,$lsi );
			$this->data["ffile"] = $load;			
			$this->data["current_menu_padre"] = @$this->Global_model->get_codigo_menu_padre($load);
			$this->data["LS"]["Edit"] = $this->data["LS"]["Delete"];	
			$this->data["LS"]["EditBtn"] = $this->data["LS"]["DeleteBtn"];	
			
	
			$this->data["curAction"] = "D"; // update	
			$id_tipo_contenido = intval($this->input->get("id_tipo_contenido"));
			$this->data["id_tipo_contenido"] = $id_tipo_contenido;
			$this->data["actionform"] = "delete_execute/".$load."?id_tipo_contenido=".$this->data["id_tipo_contenido"];
			// .$sufix_action;			
			
			$this->data["current_menu_padre"] = "categorias_de_contenidos";
	
			if ($id_tipo_contenido>0):
				$this->data["load"] = $this->Systemdelete_model->load_data($this->data["ffile"],array("id_tipo_contenido"=>$id_tipo_contenido));	
				$this->data["contenido_relacionado"] = $this->Systemcustom_model->get_biblioteca_by_tipo_contenido($id_tipo_contenido);
				$this->data["count_contenido_relacionado"] = count($this->data["contenido_relacionado"]);
				$this->load->view('custom/tipos_contenidosdelete',$this->data);
			endif;		
		}
	}
	
	public function distribuidores_usuarios_pendienteslist() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["current_menu_padre"] = "distribuidores_y_usuarios";
			$this->data["ffile"] = "pendientes_moderacion";
			$distintos = $this->Systemcustom_model->get_distribuidores_usuarios_distintos();
		//	print_r($distintos);
			$records = array();
			if (count($distintos)>0):
				foreach ($distintos as $id_distribuidor_usuario):
					$records["tmp"][$id_distribuidor_usuario] = $this->Systemcustom_model->get_distribuidores_usuarios_tmp_by_id_distribuidor_usuario($id_distribuidor_usuario);
					$records["usuario"][$id_distribuidor_usuario] = $this->Systemcustom_model->get_distribuidores_usuarios_by_id_distribuidor_usuario($id_distribuidor_usuario);
				endforeach;
			endif;
			$this->data["records"] = $records;
			$this->load->view('custom/distribuidores_usuarios_pendienteslist',$this->data);
			
		}		
	}
	
	public function distribuidores_usuarios_pendientes_detail($id_distribuidor_usuario) {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$load = "distribuidores_usuarios_pendientes_detail";				
			$this->data["ffile"] = "distribuidores_y_usuarios";
			
			
			$this->data["id_distribuidor_usuario"] = $id_distribuidor_usuario;
			$this->data["tmp"] = $this->Systemcustom_model->get_distribuidores_usuarios_tmp_by_id_distribuidor_usuario($id_distribuidor_usuario);
			$this->data["usuario"] = $this->Systemcustom_model->get_distribuidores_usuarios_by_id_distribuidor_usuario($id_distribuidor_usuario);
			
			$this->data["comparar"] = comparar_usuarios($this->data["usuario"],$this->data["tmp"]);

			$this->load->view('templates/modal/ajax_modal_usuarios_pendientes',$this->data);
		}
	}
	
	public function distribuidores_usuarios_pendientes_detail_save() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$modo = $this->input->post("modo");
			$comentarios = $this->input->post("comentarios");
			$id_distribuidor_usuario = $this->input->post("id_distribuidor_usuario");
			if ($modo == "aprobar"):
				// actualizar tabla distribuidores_usuarios
				$this->Systemcustom_model->aprobar_distribuidor_usuario("aprobar",$id_distribuidor_usuario,$comentarios);
				
				
				// ENVIAR EMAIL APROBAR
				$distribuidor_usuario = $this->Global_model->get_distribuidor_usuario_by_id($id_distribuidor_usuario,localizacion());
					
				$admin_colaboradores =  $this->Systemcustom_model->get_admin_colaboradores_by_id_distribuidor($distribuidor_usuario->id_distribuidor);
				if (count($admin_colaboradores)>0):
					foreach ($admin_colaboradores as $adm): 
					
						$this->data_alerta["nombre"] = $adm->nombre;
						$subject = "Solicitud de moderación - Aprobada";
						$this->data_alerta["texto_abajo_nombre"] = $subject;
						$this->data_alerta["texto"] = "Su solicitud de moderación de usuario colaborador para <b>".$distribuidor_usuario->nombre."</b> ha sido aprobada. "; 
						if ($comentarios != ""):
							$this->data_alerta["texto"].="<br><br><b>Comentarios de administrador:</b><br>".$comentarios."<br>";
						endif;
						$this->data_alerta["url_btn"] = base_url()."list/usuarios_moderacion"; 
						$this->data_alerta["texto_boton"] = "Ingresar al sistema";
						$message = 	$this->load->view('emails/moderacion',$this->data_alerta, true);			
						$this->enviar_email($adm->email, $subject, $message);
				
					endforeach;
				endif;		
				// END ENVIAR MAIL
				
				
				if (@$this->input->post("mode_dist") == "new"):
		 	
			
					$this->data_email["nombre"] = $distribuidor_usuario->nombre;
					$this->data_email["email"] = $distribuidor_usuario->email;
					$this->data_email["password"] = $distribuidor_usuario->pass_epedidos;
				
					$this->data_email["distribuidor"] = $this->Global_model->get_field("nombre","distribuidores","id_distribuidor = ".intval($distribuidor_usuario->id_distribuidor));
					$this->data_email["perfil_usuario"] = $this->Global_model->get_field("nombre","perfiles_usuarios","id_perfil_usuario = ".intval($distribuidor_usuario->id_perfil_usuario));
					$this->data_email["enlace"] = base_url();	
						
					$message = 	$this->load->view('emails/usuario-info',$this->data_email, true);			
					$subject = 'Cuenta de Usuario';
					$this->enviar_email($distribuidor_usuario->email, $subject, $message);
					
				endif;
				
				
				
			else:
				// actualizar tabla distribuidores_usuarios_tmp
				$this->Systemcustom_model->aprobar_distribuidor_usuario("rechazar",$id_distribuidor_usuario,$comentarios);
				
				// ENVIAR EMAIL RECHAZAR
				$distribuidor_usuario = $distribuidor_usuario = $this->Global_model->get_distribuidor_usuario_by_id($id_distribuidor_usuario,localizacion());
				
				$admin_colaboradores =  $this->Systemcustom_model->get_admin_colaboradores_by_id_distribuidor($distribuidor_usuario->id_distribuidor);
				if (count($admin_colaboradores)>0):
					foreach ($admin_colaboradores as $adm): 
					
						$this->data_alerta["nombre"] = $adm->nombre;
						$subject = "Solicitud de moderación - Rechazada";
						$this->data_alerta["texto_abajo_nombre"] = $subject;
						$this->data_alerta["texto"] = "Su solicitud de moderación de usuario colaborador <b>".$distribuidor_usuario->nombre."</b> ha sido rechazada. "; 
						if ($comentarios != ""):
							$this->data_alerta["texto"].="<br><br><b>Comentarios de administrador:</b><br><br>".$comentarios;
						endif;
						
						$this->data_alerta["texto"].=" <br><hr><br>Puede realizar la solicitud nuevamente corrigiendo los datos requeridos.";
						$this->data_alerta["url_btn"] = base_url()."add/distribuidores_usuarios_tmp"; 
						$this->data_alerta["texto_boton"] = "Agregar Colaborador";
						$message = 	$this->load->view('emails/moderacion',$this->data_alerta, true);			
						$this->enviar_email($adm->email, $subject, $message);
				
					endforeach;
				endif;		
				
				// END ENVIAR MAIL
			endif;
			
			@ob_end_clean();
			redirect('/list/usuarios_moderacion', 'location', 302);
			exit();
		}
	}
	
	
	
	public function distribuidores_usuarioslist() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			
			$usuarios = $this->Systemcustom_model->get_distribuidores_usuarios_by_id_distribuidor($this->data["usuarioPerfil"]->id_distribuidor);
			
			
			$usuarios_tmp = $this->Systemcustom_model->get_distribuidores_usuarios_tmp_by_id_distribuidor($this->data["usuarioPerfil"]->id_distribuidor);
			
			$records = array();
			foreach ($usuarios_tmp as $usuario):
				$records["tmp"][$usuario->id_distribuidor_usuario] = $usuario;
			endforeach;
			
			foreach ($usuarios as $usuario):
				$records["usuario"][$usuario->id_distribuidor_usuario] = $usuario;
			endforeach;
			$this->data["records"] = $records;
			
			
			$this->load->view('custom/distribuidores_usuarioslist',$this->data);
			
		}		
	}
	
	
	public function categoriasedit() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$this->data["ffile"] = "categorias";
			$this->data["current_menu_padre"] = "categorias_de_contenidos"; 
			$this->data["sExport"] = '';
			$this->data["actionform"] = "U";
			$this->data["errors"] = '';
			$this->data["id_categoria"] = intval($this->input->get("id_categoria"));
			$this->data["categoria"] = $this->Systemcustom_model->get_categoria($this->data["id_categoria"]);
			$this->data["categoria_tipo_nombre"] = $this->data["categoria"]->descripcion;
			
			$this->data["categorias_padre"] =  $this->Systemcustom_model->get_categorias_padre_disponibles($this->data["id_categoria"],$this->data["categoria"]->nivel);
			
			$this->data["categorias_relacionadas"] =  $this->Systemcustom_model->get_categorias_padre_asociadas($this->data["id_categoria"]);
			
			$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
			$this->data["nTotalRecs"] = count($this->data["datalist"]);
			$this->load->view('custom/categoriasedit',$this->data);
		}
	}
	
	
	
	public function seccioneslist($marca='') {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
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
				$this->data["subsecciones"][$seccion->id_seccion] = @$this->Systemcustom_model->get_subsecciones_by_seccion($seccion->id_seccion,$marca);	
				
			endforeach;
		endif;
		
		
		$this->data["nTotalRecs"] =  $this->Systemlist_model->get_total_rows($load);
		$this->data["fields"] = $this->filterListField($this->config_crud);
		$this->data["keys"] = $this->setPrimaryKey($load);
		$this->load->view('custom/seccioneslist',$this->data);
		
		}
	}
	
	public function zonas_geograficaslist($sExport='') {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
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
	
	public function eventos_asistencialist($sExport='') {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$load = "eventos_asistencia";
			$id_evento = intval($this->getVar("id_evento"));
			$this->data["ffile"] = "eventos_asistencia";
			$this->data["current_menu_padre"] = "eventos"; 
			$this->data["sExport"] = $sExport;
			if ($sExport == "excel") {
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment; filename='.$load.'.xls');
			}	
			$this->data["evento"] = $this->Systemcustom_model->get_evento($id_evento);
			$this->data["records"] = $this->Systemcustom_model->get_evento_asistencia($id_evento);
			
			
			
	 
			
			$this->load->view('custom/eventos_asistencialist',$this->data);
		}
	}
	
	public function log_actividades($sExport='',$pagina='',$startrec='',$recperpage='20',$sortfield='') {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$load = "log_movimientos";
			$this->load->model('Systemlist_model');
				
			$this->data["sExport"] = $sExport;
			if ($this->data["sExport"] != ""):
				$recperpage= 10000;
			endif;
			$this->data["ffile"] = "log_movimientos";
			
			// Filtros
			$this->data["fechas"] = $this->getVar("fechas");
			$this->data["usuario"] = $this->getVar("usuario");
			$this->data["tipo_mov"] = $this->getVar("tipo_mov");
			$this->data["tabla_nombre"] = $this->getVar("tabla_nombre");
			
			
			
			($this->data["fechas"]!="")?$filter["fechas"]=$this->data["fechas"]:"";
			($this->data["usuario"]!="")?$filter["usuario"]=$this->data["usuario"]:"";
			($this->data["tipo_mov"]!="")?$filter["tipo_mov"]=$this->data["tipo_mov"]:"";
			($this->data["tabla_nombre"]!="")?$filter["tabla_nombre"]=$this->data["tabla_nombre"]:"";
			
			// start: paginacion
			if ($recperpage != "ALL"):
				$this->data["nDisplayRecs"] = $recperpage;
			else:
				$this->data["nDisplayRecs"] = '';
			endif;
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
			
			
			$limit = $this->data["nDisplayRecs"];
			if ($startrec != ''):
				$offset = $startrec-1;
			else:			
				$offset = ($pagina>1)?@intval((($pagina-1)*$this->data["nDisplayRecs"])-1):0;;
			endif;
			
			
			$this->data["records"] = @$this->Systemcustom_model->get_log_movimientos($filter,$limit,$offset);	
			$this->data["nTotalRecs"] = @$this->Systemcustom_model->get_count_log_movimientos($filter);	
			
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
			
			// END PAGINACION
			
			$this->data["administradores"] = @$this->Global_model->get_rows("usuario,nombre","administradores",array("localizacion"=>localizacion()));
			
			$this->data["tipos_movimientos"] = @$this->Systemcustom_model->get_distinct_tipo_mov();
			$this->data["secciones"] = @$this->Systemcustom_model->get_distinct_tabla_nombre();
				
			
			$this->load->view('custom/log_actividadeslist',$this->data);
		}
	}
	
	
	public function log_actividades_detalle($id_movimiento) {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
			$load = "log_movimientos_detalle";
				
			$this->data["ffile"] = "log_actividades";
			
			$this->data["movimiento"] = @$this->Systemcustom_model->get_log_movimiento($id_movimiento);
			$this->data["detalle"] = $this->Systemcustom_model->get_log_movimientos_detalle($id_movimiento);
			

			$this->load->view('templates/modal/ajax_log_movimientos_detalle',$this->data);
		}
	}
	
	public function estadisticas($tipo=1,$sExport='') {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
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
	}
	
	
	
	public function parametrosedit() {
		if ($this->common->check_access($this->data["current_access"],$this->data)) {
		
		$this->data["ffile"] = "parametros";
	//	$this->data["datalist"] =  $this->Global_model->get_custom_query($this->common->get_all_categorias());;
		$this->load->view('parametrosedit',$this->data);
		}
		
	}
	
	private function esquema_arbol_html($arbol,$catnivel_nombre,$max_nivel_categorias,$id_categoria_padre,$nivel=1) {
		
		if ($max_nivel_categorias>=$nivel):
			
			$html = '<ul>';
			
			$html.= '<li data-jstree=\'{ "type" : "file", "icon":"fa fa-plus font-blue" }\'> <a href="'. base_url().'add/categorias?filter=1&nivel='.$nivel.'&id_categoria_padre='.$id_categoria_padre.'">'.$catnivel_nombre[$nivel].'</a> </li>';
			$nivel++;
			foreach ($arbol as $row):
				$html.= '<li data-jstree=\'{ "icon":false}\'> 
				<div class="btn-group">
					<button type="button" class="btn btn-xs dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear"></i> </button>
					<ul class="dropdown-menu pull-right" role="menu">
					  <li> <a class="catbtn" href="'. base_url().'edit/categorias/?id_categoria='.$row->id_categoria.'" title="'.@$LS['Edit'].'" ><i class="fa fa-pencil"></i>'. @$LS['Edit'].'Editar </a></li>
					  <li> <a class="catbtn" href="'. base_url()."delete/categorias/?id_categoria=".$row->id_categoria.'"  title="'.$LS['DeleteLink'].'"  ><i class="fa fa-trash-o"></i>'. @$LS['DeleteLink'] .'Eliminar</a></li>
					</ul>
				  </div> '.$row->nombre; 
				$html.= $this->esquema_arbol_html($row->sub,$catnivel_nombre,$max_nivel_categorias,$row->id_categoria,$nivel);
				$html.= '</li>';
			endforeach;
			$html.= '</ul>';
		endif;
		return $html;	
		
	}

	
	
	private function enviar_email($to, $subject, $message, $reply_email = '', $reply_name = '', $cc_email = '', $bcc_email = ''){
		
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

