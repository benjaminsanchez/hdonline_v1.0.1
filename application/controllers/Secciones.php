<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones  extends CI_Controller {
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
	
	
	
	public function seccionshow($id_seccion='',$sExport='',$pagina='',$startrec='',$recperpage='') {
		$this->load->model('Systemlist_model');
		$load = "seccionshow";
		$loadid = 'seccion'.$id_seccion;
		$paginacion = "";
		
		$recperpage = ($recperpage == "") ? @$this->nativesession->get('recperpage_'.$loadid) : $recperpage ;
		
		
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$this->data["LSI"] = $lsi;
		
		
		
		
		$this->data["sExport"] = $sExport;
	
		$this->data["current_id_seccion"] = $id_seccion;
		
		$seccion = $this->Systemcustom_model->get_seccion($id_seccion); 
		$this->data["seccion"] = $seccion;
		$this->data["ffile"] = $load;	
		
		
		$idiomas_sitio =  @$this->Global_model->get_textos_seccion($seccion->template_codigo);
		$this->data["L"] = $idiomas_sitio;
		
		// secciones campos
		$this->data["secciones_campos"] = $this->Systemcustom_model->get_seccion_campos($id_seccion); 
		
		// secciones tipo contenido
		$tipos_contenidos = $this->Systemcustom_model->get_seccion_tipo_contenido($id_seccion);
		$this->data["secciones_tipos_contenidos"] = $tipos_contenidos; 
		
		// secciones perfiles de usuario
		$this->data["secciones_perfiles"] = $this->Systemcustom_model->get_seccion_perfiles($id_seccion); 
		
		
		// Tipos de template personalizados (no DEL TIPO biblioteca)
		
		
		// Asignacion de filtros
		$getfilters = true;
		if (@$this->nativesession->get("lastseccion") != ""):
			if (@$this->nativesession->get("lastseccion") != $id_seccion):
				$getfilters=false;
				$this->nativesession->set("lastseccion",$id_seccion);
			endif;
		else:
			$this->nativesession->set("lastseccion",$id_seccion);
		endif;
		
		
		$filtro_busqueda = array();
		$filtro_busqueda["cat1"] = @$this->data["f_cat1"] ;
		
		if ($getfilters):
			$filtro_busqueda["txt"] = @$this->data["f_txt"] ;
			
			$filtro_busqueda["fechas"] = @$this->data["f_fechas"];
			
			$filtro_busqueda["sort"] = @$this->data["f_sort"] ;
			
			$filtro_busqueda["cat2"] = @$this->data["f_cat2"] ;
			$filtro_busqueda["cat3"] = @$this->data["f_cat3"] ;
			$filtro_busqueda["cat4"] = @$this->data["f_cat4"] ;
			
			$filtro_busqueda["catmax"] =  @$this->data["f_catmax"];
			
			$filtro_busqueda["id_tipo_contenido"] = @$this->data["f_id_tipo_contenido"];
		else:
			$filtro_busqueda["catmax"] = 1;
			$this->data["f_fechas"] ="";
			$this->data["f_cat2"] = "";
			$this->data["f_cat3"] = "";
			$this->data["f_cat4"] = "";
			$this->data["f_txt"] = "";
			$this->data["f_sort"] ="";
			$this->data["f_id_tipo_contenido"] = ""; 
		
		endif;
		
		switch($seccion->template_codigo):
			case "promociones":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$this->data["add_active"] = base_url()."add/promociones";
				
				$filtro_busqueda["vigencia"] = "on"; // solo los vigentes	
				$this->data["promociones_vigentes"] = $this->Systemcustom_model->get_contenidos_master("promociones","id_promocion",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$filtro_busqueda["vigencia"] = "pasados"; // solo los pasados	
				$this->data["promociones_pasadas"] = $this->Systemcustom_model->get_contenidos_master("promociones","id_promocion",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$paginacion = "promociones_vigentes";
				$recperpage=($recperpage=='')?'10':$recperpage;
				
			break;
			case "pop":
				$this->data["tipos_contenidos"] = $this->Systemcustom_model->get_tipos_contenidos_pop();
				$this->data["add_active"] = base_url()."add/material_pop";
				
				$filtro_busqueda["mantener_arriba"] = "1";				
				$this->data["material_pop_destacados"] = $this->Systemcustom_model->get_contenidos_master("material_pop","id_material_pop",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				$filtro_busqueda["mantener_arriba"] = "0";
				$this->data["material_pop"] = $this->Systemcustom_model->get_contenidos_master("material_pop","id_material_pop",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$this->data["count_material_pop_destacados"] = count($this->data["material_pop_destacados"]);
				$this->data["count_material_pop"] = count($this->data["material_pop"]);
				
				$paginacion = "material_pop";
				$recperpage=($recperpage=='')?'10':$recperpage;
				
			break;
			
			case "novedades":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$this->data["add_active"] = base_url()."add/novedades";
				$this->data["novedades"] = $this->Systemcustom_model->get_contenidos_master("novedades","id_novedad",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				$paginacion = "novedades";
				$recperpage=($recperpage=='')?'10':$recperpage;
				
			break;
			
			case "incentivo":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$this->data["add_active"] = base_url()."add/incentivos";
				$filtro_busqueda["vigencia"] = "on"; // solo los vigentes				
				$this->data["programas"] = $this->Systemcustom_model->get_contenidos_master("incentivos","id_incentivo",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$filtro_busqueda["vigencia"] = "pasados"; // no con fecha de vigencia 
				$this->data["programas_pasados"] = $this->Systemcustom_model->get_contenidos_master("incentivos","id_incentivo",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
			break;
			
			case "eventos":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$this->data["add_active"] = base_url()."add/eventos";
				$this->data["eventos"] = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$paginacion = "eventos";
				$recperpage=($recperpage=='')?'10':$recperpage;
			break;
			
			case "calendario":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$this->data["add_active"] = base_url()."add/eventos";
				$filtro_busqueda["vigencia"] = "futuros"; // solo los vigentes	
				$this->data["eventos"]["futuros"] = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$filtro_busqueda["vigencia"] = "pasados"; // solo los pasados	
				$this->data["eventos"]["pasados"] = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
			break;
			case "video":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				if (count($tipos_contenidos)>0):					
					foreach ($tipos_contenidos as $tc):
						$filtro_busqueda["tipos_archivos"] = "mp4|avi|asf|mov|m4v|wmv";
						$biblioteca[$tc->id_tipo_contenido] = $this->Systemcustom_model->get_biblioteca_from_template(array($tc),$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
					endforeach;
				endif;
				$this->data["biblioteca"] = $biblioteca;
			break;
			case "fotovideo":
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				if (count($tipos_contenidos)>0):
					foreach ($tipos_contenidos as $tc):
						$filtro_busqueda["tipos_archivos"] = $this->data['ext_image'].$this->data['ext_video']; // mp4|avi|asf|mov|m4v|wmv|
						$biblioteca[$tc->id_tipo_contenido] = $this->Systemcustom_model->get_biblioteca_from_template(array($tc),$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
					endforeach;
				endif;
				@$this->data["biblioteca"] = @$biblioteca;
				$paginacion = "biblioteca";
				$recperpage=($recperpage=='')?'10':$recperpage;
			break;
			default:
				$filtro_busqueda["id_tipo_contenido"] = ""; 
				$biblioteca = $this->Systemcustom_model->get_biblioteca_from_template($tipos_contenidos,$this->data["usuarioPerfil"],$filtro_busqueda,$seccion);
				$this->data["biblioteca"] = $biblioteca;
				$paginacion = "biblioteca";
				
				$recperpage=($recperpage=='')?'10':$recperpage;
			break;
		endswitch;
		
			
		
		// start: paginacion
		$this->data["urlbase_paginacion"] = base_url()."seccion/".$seccion->id_seccion."/".$seccion->url; 
		if ($paginacion != ""):
			
			
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
			
		//	print_r($this->data[$paginacion]);
			
			switch ($seccion->template_codigo):
				case "fotovideo":
				
					if (count($tipos_contenidos)>0):
						$totalcount = 0;
						foreach ($tipos_contenidos as $tc):
							$totalcount = $totalcount+ count($biblioteca[$tc->id_tipo_contenido]); 							
						endforeach;
						$this->data["nTotalRecs"] = $totalcount;
					endif;
				break;
				default: $this->data["nTotalRecs"] = count($this->data[$paginacion]);
			endswitch;
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
			
							
			
			switch ($seccion->template_codigo):
				case "fotovideo":				
					if (count($tipos_contenidos)>0):
						$totalcount = 0;
						$finalbiblioteca = array();
						foreach ($tipos_contenidos as $tc):							
							$finalbiblioteca[$tc->id_tipo_contenido] = $this->paginate($biblioteca[$tc->id_tipo_contenido],$limit, $offset);
						endforeach;
						$this->data["biblioteca"] = $finalbiblioteca;
					endif;
				break;
				default:$this->data[$paginacion] = $this->paginate($this->data[$paginacion],$limit, $offset);
			endswitch;
			
			
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
		endif;
		// end: paginacion
		
		// print_r($filtro_busqueda);
		
		switch ($seccion->tipo):
			case "seccion": 
				$this->data["sidebar_secciones"] = $this->Global_model->get_secciones_menu('subseccion',$seccion->id_seccion,'',$this->data["usuarioPerfil"]);
			break;
			case "subseccion":
				$this->data["sidebar_secciones"] = $this->Global_model->get_secciones_menu('subseccion',$seccion->id_seccion_padre,'',$this->data["usuarioPerfil"]);
			break;
		endswitch;
	
		
		$this->load->view('tpl/'.$seccion->template_codigo,$this->data);
	}
	
	public function paginate($records,$limit, $offset) {
		//	print_r($records);
		// echo "limit:".$limit. " - offset:".$offset;
		
		//if ($limit == "ALL") $limit = count($records);
		
		$limitefinal = $limit+$offset;
		$finaldata =  array();
		$count = 0;
		foreach ($records as $rec):
			$count++;
			if ($count>$offset) $finaldata[] = $rec;
			if ($count>=$limitefinal)  break;
		endforeach;
		return $finaldata;
	}
	
	public function seccionshow_interior($id_seccion,$id) {
		$lsi =  @$this->Global_model->get_lenguaje_sistema($load);
		$filtro_busqueda = array();
		$this->data["LSI"] = $lsi;
		$this->data["sExport"] = '';
		$filtro_busqueda["cat1"] = @$this->data["f_cat1"] ;
		$filtro_busqueda["cat2"] = @$this->data["f_cat2"] ;
		$filtro_busqueda["cat3"] = @$this->data["f_cat3"] ;
		$filtro_busqueda["cat4"] = @$this->data["f_cat4"] ;
		
		$filtro_busqueda["catmax"] =  @$this->data["f_catmax"];
		
		
		$seccion = $this->Systemcustom_model->get_seccion($id_seccion); 
		$this->data["seccion"] = $seccion;
		
		
		$idiomas_sitio =  @$this->Global_model->get_textos_seccion($seccion->template_codigo);
		$this->data["L"] = $idiomas_sitio;
		
		
		switch ($seccion->tipo):
			case "seccion": 
				$this->data["sidebar_secciones"] = $this->Global_model->get_secciones('subseccion',$seccion->id_seccion,'',$this->data["usuarioPerfil"]);
			break;
			case "subseccion":
				$this->data["sidebar_secciones"] = $this->Global_model->get_secciones('subseccion',$seccion->id_seccion_padre,'',$this->data["usuarioPerfil"]);
			break;
		endswitch;
		
		
		switch($seccion->template_codigo):
		
			
			case "eventos":
				$this->data["eventos"] = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$this->data["evento"] =  $this->Systemcustom_model->get_evento($id);
				$this->data["sesiones_presenciales"] =  $this->Systemcustom_model->get_evento_sesiones($id,"presencial");
				$this->data["sesiones_online"] =  $this->Systemcustom_model->get_evento_sesiones($id,"online");
				$this->data["count_sesiones_presenciales"] = count($this->data["sesiones_presenciales"]);
				$this->data["count_sesiones_online"] = count($this->data["sesiones_online"]);
				
				
				$this->data["evento_documentos"] =  $this->Systemcustom_model->get_evento_biblioteca("documentos",$id);
				$this->data["evento_imagenes"] =  $this->Systemcustom_model->get_evento_biblioteca("imagenes",$id);
				
				// Inscripcion de eventos
				
				if (@intval($this->input->post("sesion"))>0):
					$id_sesion = intval($this->input->post("sesion",TRUE));				
					$inscripcion = $this->Systemcustom_model->inscribir_evento($id_sesion,$this->data["usuarioPerfil"]->tipo,$this->nativesession->get("HD_ONLINE_status_User"));
					if ($inscripcion): // Enviar email de inscripcion
							$this->data_email["nombre_usuario"] = $this->data["usuarioPerfil"]->nombre;
							$this->data_email["evento"] = $this->data["evento"];
							$this->data_email["sesion"] = $this->Systemcustom_model->get_evento_sesion($id_sesion);
							$message = 	$this->load->view('emails/evento',$this->data_email, true);			
							$subject = 'Inscripción de evento '.$this->data["evento"]->titulo.' - '.name_system();
							$ical = $this->generar_ics_evento_sesion($this->data["evento"],$this->data_email["sesion"]);
							$this->enviar_email_adjunto($this->nativesession->get("HD_ONLINE_status_User"), $subject, $message,$ical);
							
					else:
						die($inscripcion);
					endif; 
					@ob_end_clean();
					redirect(base_url(uri_string()), 'location', 302);
					exit();
				
					
				endif;
				
				// Verificar si estoy inscrito y entregar mensaje de inscripcion
				$this->data["inscripcion"] =  $this->Systemcustom_model->verificar_incripcion($id,$this->data["usuarioPerfil"]->tipo,$this->nativesession->get("HD_ONLINE_status_User"));
				$this->data["count_inscripcion"] = count($this->data["inscripcion"]);
				$this->load->view('tpl/eventos-interior',$this->data);	
			break;
			case "calendario":
				$this->data["eventos"] = $this->Systemcustom_model->get_contenidos_master("eventos","id_evento",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$this->data["evento"] =  $this->Systemcustom_model->get_evento($id);
				$this->data["sesiones_presenciales"] =  $this->Systemcustom_model->get_evento_sesiones($id,"presencial");
				$this->data["sesiones_online"] =  $this->Systemcustom_model->get_evento_sesiones($id,"online");
				$this->data["count_sesiones_presenciales"] = count($this->data["sesiones_presenciales"]);
				$this->data["count_sesiones_online"] = count($this->data["sesiones_online"]);
				
				
				$this->data["evento_documentos"] =  $this->Systemcustom_model->get_evento_biblioteca("documentos",$id);
				$this->data["evento_imagenes"] =  $this->Systemcustom_model->get_evento_biblioteca("imagenes",$id);
				
				
				// Inscripcion de eventos
				
				if (@intval($this->input->post("sesion"))>0):
					$id_sesion = intval($this->input->post("sesion",TRUE));				
					$inscripcion = $this->Systemcustom_model->inscribir_evento($id_sesion,$this->data["usuarioPerfil"]->tipo,$this->nativesession->get("HD_ONLINE_status_User"));
					if ($inscripcion): // Enviar email de inscripcion
							$this->data_email["nombre_usuario"] = $this->data["usuarioPerfil"]->nombre;
							$this->data_email["evento"] = $this->data["evento"];
							$this->data_email["sesion"] = $this->Systemcustom_model->get_evento_sesion($id_sesion);
							$message = 	$this->load->view('emails/evento',$this->data_email, true);			
							$subject = 'Inscripción de evento '.$this->data["evento"]->titulo.' - '.name_system();
							$ical = $this->generar_ics_evento_sesion($this->data["evento"],$this->data_email["sesion"]);
							$this->enviar_email_adjunto($this->nativesession->get("HD_ONLINE_status_User"), $subject, $message,$ical);
							
					else:
						die($inscripcion);
					endif; 
					@ob_end_clean();
					redirect(base_url(uri_string()), 'location', 302);
					exit();
				
					
				endif;
				
				// Verificar si estoy inscrito y entregar mensaje de inscripcion
				$this->data["inscripcion"] =  $this->Systemcustom_model->verificar_incripcion($id,$this->data["usuarioPerfil"]->tipo,$this->nativesession->get("HD_ONLINE_status_User"));
				$this->data["count_inscripcion"] = count($this->data["inscripcion"]);
				$this->load->view('tpl/eventos-interior',$this->data);	
			break;
			case "novedades":
				$this->data["novedades"] = $this->Systemcustom_model->get_contenidos_master("novedades","id_novedad",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				$this->data["novedad"] =  $this->Systemcustom_model->get_novedad($id);
				$this->data["novedad_archivos"] =  $this->Systemcustom_model->get_novedad_biblioteca("archivos",$id);
				$this->data["novedad_imagenes"] =  $this->Systemcustom_model->get_novedad_biblioteca("imagenes",$id);
				$this->load->view('tpl/novedades-interior',$this->data);	
				
			break;
			
			case "promociones":
			
				$this->data["promocion"] =  $this->Systemcustom_model->get_promocion($id);
				$this->data["pdf_interior"] = $this->Systemcustom_model->get_biblioteca_by_id($this->data["promocion"]->pdf_interior);
				$this->data["promocion_documentos"] =  $this->Systemcustom_model->get_promocion_biblioteca("documentos",$id);
				$this->data["count_promocion_documentos"] = count($this->data["promocion_documentos"]);
				$this->load->view('tpl/promociones-interior',$this->data);	
				
			break;
			
			case "incentivo":
				$this->data["programa"] =  $this->Systemcustom_model->get_programa($id);
				$this->data["programa_documentos"] =  $this->Systemcustom_model->get_programa_biblioteca("documentos",$id);
				$this->data["programa_documentos_ganadores"] =  $this->Systemcustom_model->get_programa_biblioteca("documentos_ganadores",$id);
				$this->data["programa_imagenes"] =  $this->Systemcustom_model->get_programa_biblioteca("imagenes",$id);
			
				$filtro_busqueda["vigencia"] = "on"; // solo los vigentes				
				$this->data["programas"] = $this->Systemcustom_model->get_contenidos_master("incentivos","id_incentivo",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$filtro_busqueda["vigencia"] = "off"; // no con fecha de vigencia 
				$this->data["programas_pasados"] = $this->Systemcustom_model->get_contenidos_master("incentivos","id_incentivo",$this->data["usuarioPerfil"],$filtro_busqueda,$seccion); 
				
				$this->load->view('tpl/incentivo-interior',$this->data);		
			break;
		endswitch;
		
		
		
	
		
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
	
	public function generar_ics_evento_sesion($evento,$sesion) {
		require(APPPATH.'config/email.php');
		$from_email = $config['smtp_sender_email'];
		$from_name =$config['smtp_sender_name'];
		$location = ($sesion->tipo_sesion == "presencial")?$sesion->ubicacion:"Sesión Online";
		$hora_fin = date('H:i', strtotime(substr($sesion->hora,0,4)) + 60*60);


		$transaccion = generarCodigoTransaccional(10);
			$content = "BEGIN:VCALENDAR
PRODID:-//Google Inc//Google Calendar 70.9054//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
BEGIN:VEVENT
DTSTART:".only_number($sesion->fecha)."T".only_number($sesion->hora)."
DTEND:".only_number($sesion->fecha)."T".only_number($hora_fin)."00
DTSTAMP:".date("Ymd")."T".date("His")."
ORGANIZER;CN=".name_system().":mailto:".$from_email."
UID:".$transaccion."
ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=
 TRUE;CN=".$this->nativesession->get("HD_ONLINE_status_User").";X-NUM-GUESTS=0:mailto:".$this->nativesession->get("HD_ONLINE_status_User")."
CREATED:".date("Ymd")."T".date("His")."Z
DESCRIPTION:".$evento->titulo."
LAST-MODIFIED:".date("Ymd")."T".date("His")."Z
LOCATION:".$location."
SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:".$evento->titulo."
TRANSP:OPAQUE
END:VEVENT
END:VCALENDAR
";
			
			$path = $this->data["upload_path"]."/".localizacion()."/eventos/".$evento->id_evento."/".$transaccion;
			
			
			
			if (!@mkdir($path, 0777, true)) {
				$error = error_get_last();
				die($path.$error['message']);
			
			}
			$fp = fopen($path . "/invite.ics","wb");
			fwrite($fp,$content);
			fclose($fp);
			return $path."/invite.ics";

	}
	
	
	public function enviar_email_adjunto($to, $subject, $message,$archivo = '', $reply_email = '', $reply_name = '', $cc_email = '', $bcc_email = ''){
		
		require(APPPATH.'config/email.php');
		$from_email = $config['smtp_sender_email'];
		$from_name =$config['smtp_sender_name'];
		$this->load->library('email');
		$this->email->initialize($config);
		
		$this->email->from($from_email, $from_name);
		
		if($reply_email && $reply_name) $this->email->reply_to($reply_email, $reply_name);
		

		$this->email->to($to); 
		if ($archivo != ""):
			$this->email->attach($archivo);
		endif;
	
		
		$this->email->subject($subject);
		$this->email->message($message);
		//return @$this->email->send();
		
		  if(!$this->email->send()){
				print_r($this->email->print_debugger());
				die($this->email->print_debugger());
			} else 	{
				return false;
			}
			
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

