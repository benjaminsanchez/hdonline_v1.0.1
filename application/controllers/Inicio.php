<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public $data = array();
	var $config;
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Global_model');
		require_once(APPPATH.'libraries/Globals.php');
	
		$this->data['menu_active'] = 'inicio';
	}
	
	
	public function index($load=NULL){
		$seccion = 'home';
		if (@$this->nativesession->get( 'HD_ONLINE_status' )!="login"): 
			redirect('/login', 'location', 302);
			//$this->load->view('login', $this->data);
			exit();
		else: 
			redirect('/dashboard', 'location', 302);
		endif;		
	}
	
	
	
	// Pantalla login
	public function login() {
		$this->data['ewmsg'] = @$this->nativesession->get("ewmsg");
		$this->load->view('login', $this->data);
		$this->nativesession->set("ewmsg","");
	}
	
	// Enviar login	
	public function enviar_login() {	
		$bValidPwd = false;
		
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('userid', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('passwd', 'Contraseña', 'trim|required|xss_clean');
		
		
		if($this->form_validation->run() == FALSE){
			$this->data["ewmsg"] =  validation_errors();
			$this->load->view('login',$this->data);
		}else{
			
			if (trim($this->input->post('userid')) == "" ||  trim($this->input->post('passwd')) == "" ) die("error validando ");
			
			$adminExist =  $this->Global_model->get_administrador($this->input->post('userid'),$this->data["localizacion"]);			
			$sPassWd = $this->input->post('passwd');
			
			if (trim(@$adminExist->password) != "" && @$adminExist->password == md5($sPassWd)) {
				$this->nativesession->set("HD_ONLINE_status_User",$adminExist->usuario);
				$this->nativesession->set("HD_ONLINE_status_Name",$adminExist->nombre);
				$this->nativesession->set("HD_ONLINE_status","login");
				$this->nativesession->set("HD_ONLINE_status_mode","administradores");
				$this->nativesession->set("HD_ONLINE_status_localizacion",$this->data["localizacion"]);
				$this->nativesession->set("HD_ONLINE_status_idioma",$this->data["idioma"]);
				$this->nativesession->set("HD_ONLINE_status_pais",$this->data["pais"]);
				//$this->nativesession->set("HD_ONLINE_status_Passwd",$sPassWd);
				$bValidPwd = true;
				
				// LOG
				$adminExist->email = $adminExist->usuario;
				$adminExist->tipo = "administrador";
				$this->Global_model->logThis($adminExist,"login","system");
				//die($this->nativesession->get("HD_ONLINE_status_User"));
			}
			
			
			$userExist =  $this->Global_model->get_usuario($this->input->post('userid'),$this->data["localizacion"]);			
			
			if (trim(@$userExist->password) != "" && @$userExist->password == md5($sPassWd) && $bValidPwd != true) {
				$this->nativesession->set("HD_ONLINE_status_User",$userExist->email);
				$this->nativesession->set("HD_ONLINE_status_Name",$userExist->nombre);
				$this->nativesession->set("HD_ONLINE_status_id_perfil_usuario",$userExist->id_perfil_usuario);
				$this->nativesession->set("HD_ONLINE_status","login");
				$this->nativesession->set("HD_ONLINE_status_mode","usuarios");
				$this->nativesession->set("HD_ONLINE_status_localizacion",$this->data["localizacion"]);
				$this->nativesession->set("HD_ONLINE_status_idioma",$this->data["idioma"]);
				$this->nativesession->set("HD_ONLINE_status_pais",$this->data["pais"]);
				
				//$this->nativesession->set("HD_ONLINE_status_Passwd",$sPassWd);
				$bValidPwd = true;
				// LOG
			
				$userExist->tipo = "usuario";
				$userExist->usuario = $userExist->email;
				$this->Global_model->logThis($userExist,"login","system");
				//die($this->nativesession->get("HD_ONLINE_status_User"));
			}
			
			$distribuidorExist =  $this->Global_model->get_distribuidor_usuario($this->input->post('userid'),$this->data["localizacion"]);			
			
			if (trim(@$distribuidorExist->password) != "" && @$distribuidorExist->password == md5($sPassWd) && $bValidPwd != true) {
				$this->nativesession->set("HD_ONLINE_status_User",$distribuidorExist->email);
				$this->nativesession->set("HD_ONLINE_status_Name",$distribuidorExist->nombre);
				$this->nativesession->set("HD_ONLINE_status_id_perfil_usuario",$distribuidorExist->id_perfil_usuario);
				$this->nativesession->set("HD_ONLINE_status","login");
				$this->nativesession->set("HD_ONLINE_status_mode","usuarios");
				$this->nativesession->set("HD_ONLINE_status_localizacion",$this->data["localizacion"]);
				$this->nativesession->set("HD_ONLINE_status_idioma",$this->data["idioma"]);
				$this->nativesession->set("HD_ONLINE_status_pais",$this->data["pais"]);
				$this->nativesession->set("HD_ONLINE_status_Passwd",$sPassWd);
				$bValidPwd = true;
			 
				
				$distribuidorExist->tipo = "distribuidor";
				$distribuidorExist->usuario = $distribuidorExist->email;
				$this->Global_model->logThis($distribuidorExist,"login","system");
				//die($this->nativesession->get("HD_ONLINE_status_User"));
			}
			
		
		}	
		if ($bValidPwd){
			redirect('/dashboard', 'location', 302);
		} else {
			$this->nativesession->set("ewmsg","Email o clave incorrecta");
			redirect('/login', 'location', 302);
		}
	}
	public function logout() {
		session_unset();
		session_destroy();
		redirect('/', 'location', 302);
	}
	
	
	// Recuperar contraseña
	function login_recuperar($step) {
		if ($step == "1") {
			$res = array();
			
			// nuevo
			$adminExist =  $this->Global_model->get_administrador($this->input->post('email'),$this->data["localizacion"]);
			if (@$adminExist->usuario != "") $adminExist->email = @$adminExist->usuario; 	
			$userExist =  $this->Global_model->get_usuario($this->input->post('email'),$this->data["localizacion"]);	
			$distribuidorExist =  $this->Global_model->get_distribuidor_usuario($this->input->post('email'),$this->data["localizacion"]);
			
			 
		
			if (@$adminExist->usuario != "" || @$userExist->email != "" || @$distribuidorExist->email != "") {
				$token = generarCodigoTransaccional(64);	
					
				$dataupdate["token"] = md5($token);
				$dataupdate["token_fecha"] = @date('Y-m-d H:i:s'); 
							
				if(@$adminExist->usuario != ""){				
					$Profile = $adminExist;					
					$this->Global_model->update_data('administradores',$dataupdate,array('usuario'=>@$adminExist->usuario)); 
				}
				if(@$userExist->email != ""){				
					$Profile = $userExist;					
					$this->Global_model->update_data('usuarios',$dataupdate,array('email'=>@$userExist->email)); 
				}
				if(@$distribuidorExist->email != ""){
					$Profile = $distribuidorExist;				
					$this->Global_model->update_data('distribuidores_usuarios',$dataupdate,array('email'=>@$distribuidorExist->email)); 
				}
				
				
				$destino = $Profile->email; 
				$this->data["enlace_boton"] =  base_url()."login_recuperar2?token=".$token;
				
				$this->data["profile"] = $Profile;
				$subject = 'Recuperar clave - '.$this->data["titleadmin"];
							
				$this->data['fecha'] = @date("d").".".@date("m").".".@date("Y");
				$msg = $this->load->view('emails/olvido-contrasena',$this->data, true);				
				$this->enviar_email($destino, $subject, $msg);		
				$resp = "Hemos enviado un e-mail con las instrucciones para recuperar su clave. <br>Validez 24Hrs.";
				
			} else {						
				$resp = "No hemos podido encontrar tu cuenta, revisa el correo ingresado o comunícate con un administrador";
			}			
			echo ($resp);
		} else if ($step == 2) {
			
			if (trim(@$this->input->get('token')=="")) die("token incorrecto, contáctese con administrador");
			
			// Administrador
			$adminExist = $this->Global_model->get_user_token("administradores",$this->data["localizacion"],md5($this->input->get('token')));	
			if (@$administrador->usuario != "") $administrador->email = @$administrador->usuario; 		
			$distribuidorExist = $this->Global_model->get_user_token("distribuidores_usuarios",$this->data["localizacion"],md5($this->input->get('token')));	
			$userExist = $this->Global_model->get_user_token("usuarios",$this->data["localizacion"],md5($this->input->get('token')));	
				
			if (@$adminExist->usuario != "" || @$distribuidorExist->email != "" || @$userExist->email != "") {
				$this->data["token"] = $this->input->get('token');	
				$this->load->view('login', $this->data);
				
			} else {				
				$this->nativesession->set("ewmsg","El enlace generado no es válido, intente solicitar nuevamente un cambio de clave o comuníquese con un administrador");
				redirect(base_url().'login', 'location', 302);
			}
			
			
			
		} else if ($step == 3) {
			
			if (trim(@$this->input->post('token')=="")) die("token incorrecto, contáctese con administrador");
	
			$passwdNuevo = @$this->input->post('passwd');
			
			// Administrador
			$adminExist = $this->Global_model->get_user_token("administradores",$this->data["localizacion"],md5($this->input->post('token')));	
			if (@$administrador->usuario != "") $administrador->email = @$administrador->usuario; 
			$distribuidorExist = $this->Global_model->get_user_token("distribuidores_usuarios",$this->data["localizacion"],md5($this->input->post('token')));	
			$userExist = $this->Global_model->get_user_token("usuarios",$this->data["localizacion"],md5($this->input->post('token')));	
	
	
			if (@$adminExist->usuario != "" || @$distribuidorExist->email != "" || @$userExist->email != "") {
				$dataupdate["password"] = md5($passwdNuevo);
				$dataupdate["token"] = '';
				$dataupdate["token_fecha"] = '';
				if(@$adminExist->usuario != ""){				
					$Profile = $userExist;
					$this->Global_model->update_data('administradores',$dataupdate,array('usuario'=>@$adminExist->usuario)); 
				} elseif(@$distribuidorExist->email != ""){
					$Profile = $distribuidorExist;
					
					$dataupdate["estado_epedidos"] = "0";
					$dataupdate["pass_epedidos"] = $passwdNuevo;
									
					$this->Global_model->update_data('distribuidores_usuarios',$dataupdate,array('email'=>@$distribuidorExist->email)); 
				}elseif(@$userExist->email != ""){
					$Profile = $userExist;
					$this->Global_model->update_data('usuarios',$dataupdate,array('email'=>@$userExist->email)); 
				}
				
				// Email
								
				$this->nativesession->set("ewmsg","Su nueva clave fue asignada correctamente, ingrese a su cuenta");
				
				redirect(base_url().'login', 'location', 302);
			} else {
				$this->nativesession->set("ewmsg","Hubo un problema al intentar asignar su clave, comuníquese con un administrador");
				redirect(base_url().'login', 'location', 302);	
			}
			
		}


	}
	
	public function show_404($page = ''){ // error page logic
		$this->data['menu_active'] = '';

		$this->load->view('error-404', $this->data);
	
	}
	
	
	private function enviar_email($to, $subject, $message, $reply_email = '', $reply_name = '', $cc_email = '', $bcc_email = ''){
		require(APPPATH.'config/email.php');
	
		$from_email = $config['smtp_sender'];
		$from_name = $this->data["titleadmin"];
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->from($from_email, $from_name);
		if($reply_email && $reply_name) $this->email->reply_to($reply_email, $reply_name); 
		
		$toemail = explode(",",$to);
		foreach ($toemail as $temp) {
			if (trim($temp)!="")
			$this->email->to(trim($temp)); 
		}
		$this->email->to($toemail); 
		$this->email->cc($cc_email);
		/*if($cc_email) {
			$cc_email = explode(",",$cc_email);
			foreach ($cc_email as $temp) {
				if (trim($temp)!="")
				 $this->email->cc(trim($temp));
			}
		}*/
		 $this->email->bcc($bcc_email);
		/*if($bcc_email) {
			$bcc_email = explode(",",$bcc_email);
			foreach ($bcc_email as $temp) {
				if (trim($temp)!="")
				$this->email->bcc(trim($temp));
			}
		}*/
		
		$this->email->subject($subject);
		$this->email->message($message);
		$r = @$this->email->send();
		// $this->email->print_debugger();
		// print_r($this->email); 
		if (!$r) $this->email->print_debugger();	
		return $r;
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

