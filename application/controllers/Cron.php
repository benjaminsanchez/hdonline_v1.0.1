<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron  extends CI_Controller {
	public $data = array();
	var $config;
	var $tablas_permitidas;
	
	
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Santiago');
		$this->load->model('Global_model');		
		require_once(APPPATH.'libraries/Globals.php');
		
		
		
	}
	
	
	public function check_cron() {
		
		$refresh = 5; // Considerando cada $refresh minutos 		
	
		// Consultar alertas programadas para esta fecha
		// seleccionar todas las alertas en estado enviar_ahora
		$alertas = $this->Global_model->get_rows("*","alertas",array("estado"=>"programado","localizacion"=>localizacion()));

		if (count($alertas)>0):
		 	
			$data["fecha_envio"] = date("Y-m-d H:i:s");
			foreach ($alertas as $alerta):
				// consultar rango de horarios permitidos para enviar alerta
				
				$hora_desde = @date("Hi00");
				$hora_hasta = $hora_desde+ intval($refresh*100);
				
				echo '$alerta->hora_programacion:'.$alerta->hora_programacion.'<br>'; 
				echo '$hora_desde:'.$hora_desde.'<br>'; 
				echo '$hora_hasta:'.$hora_hasta.'<br>'; 				
		
				$hora_programada = str_replace(":","",$alerta->hora_programacion);
				if ($hora_programada >=$hora_desde && $hora_programada<=$hora_hasta):
				// Califica para consultar
					echo "SE ENVÍA ALERTA".$alerta->id_alerta;
					
					// Procesamiento para enviar alerta
					
			
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
							
							// enviar email con una funcion comun en global
							if ($tipo->tipo == "email"):								
								$this->Global_model->enviar_alertas_tipo_email_pendientes();
							endif;				
							
						endforeach; // tipos				
					endif;// tipos
					
					
					// marcar la alerta como enviada 
					$this->Global_model->update_data("alertas",array("estado"=>"enviado"),array("id_alerta"=>$alerta->id_alerta)); 
					
					// END procesamiento para enviar alerta
					
				else:
					echo "NO SE ENVÍA ALERTA".$alerta->id_alerta;
				endif;
			
		
		
			endforeach;
		endif;	
	}
	
	
	public function enviar_email($to, $subject, $message, $reply_email = '', $reply_name = '', $cc_email = '', $bcc_email = ''){
		
		require(APPPATH.'config/email.php');
		$from_email = $config['smtp_sender'];
		$from_name = $this->data["titleadmin"];
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
		
		print_r( $this->email);
		
	
		@$this->email->clear();
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

}

