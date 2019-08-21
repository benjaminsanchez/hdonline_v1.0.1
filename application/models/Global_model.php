<?php
class Global_model extends CI_Model {
		
    public function __construct() {
        
        
        
        parent::__construct();
        $this->CFG = load_class('Config', 'core')       ;
        $this->pais = $this->CFG->item('_pais_');
    }
	//	echo $this->db->last_query();
	private function _pais($col="localizacion",$db=null) {
             $db->where($col,$this->pais);
        }
	public function get_rows($fields,$table,$where = NULL) { // array, string
		$this->db->select($fields);
		$q = $this->db->get_where($table, $where);	
		
		return $q->result();
		
	}
	
	public function get_rows_select($fields,$table,$where = NULL) { // string (coma separated), string
		$this->db->select($fields);
		$q = $this->db->get_where($table, $where);	
		$rows =  $q->result();
		//echo $this->db->last_query()."";
		$fields_array = explode(",",$fields);
		$field_key = $fields_array[0];
		$field_value = $fields_array[1];
		$data = array();
		
		if ($rows):
			foreach ($rows as $row):
				$data[$row->$field_key] = $row->$field_value;
			endforeach; 
		endif; 
		
		return $data;
	}
	
	public function get_rows_select_unique($fields,$table,$where = NULL) { // string, string
		$this->db->select($fields);
		$q = $this->db->get_where($table, $where);	
		$rows =  $q->result();
		// echo $this->db->last_query();
		$field_value = $fields;
		$data = array();
		 
		if ($rows):
			foreach ($rows as $row):
				$data[] = $row->$field_value;
			endforeach; 
		endif; 
		//echo $this->db->last_query();
		return $data;
	}
	
	public function get_row_select($fields,$table,$where = NULL) { // array, string
		$this->db->select($fields);
		$q = $this->db->get_where($table, $where);	
		$rows =  $q->result();
		// echo $this->db->last_query();
		$fields_array = explode(",",$fields);
		$field_key = $fields_array[0];
		$field_value = $fields_array[1];
		$data = array();
		
		if ($rows):
			foreach ($rows as $row):
				$data[$row->$field_key] = $row->$field_value;
			endforeach; 
		endif; 
		return $data;
	}
	
	
	// lenguaje de sistema iterno
	public function get_lenguaje_sistema($table){
		$data = array();
		$query = $this->db->get_where('idiomas_sistema', array('tabla' =>$table));
		$rows = $query->result();	
		// echo $this->db->last_query();
		if ($rows): foreach ($rows as $row):
			$data[$row->campo] = $row->texto;
		endforeach; endif;
		return $data;
	}
	
	
	// Obtener textos de idiomas para zonas estáticas
	public function get_textos_seccion($seccion=''){
		$L = array();
		$sql = "SELECT * FROM idiomas_sitio WHERE 
				localizacion = '".localizacion()."' AND (seccion = 'general' ";
		if (trim($seccion) != ''):
		
			$sql.="  OR seccion = ".$this->db->escape(trim($seccion))." ";
		endif;
		$sql.=" ) "; 
		$q = $this->db->query($sql);
		// echo $this->db->last_query();
		$data = $q->result();
	
		if ($data) {
			foreach ($data as $row) {
				$L[$row->codigo] = $row->texto; 
			}
		}
		return $L;		
	}
	
	// Obtener administrador por usuario
	public function get_administrador($usuario,$localizacion){
		$query = $this->db->get_where('administradores', array('usuario' =>$usuario,'localizacion'=>$localizacion));
		// echo $this->db->last_query();
		return $query->row();	
	}
	
	
	// Obtener datos de localizacion 
	public function get_localizacion($localizacion) {
		$sql = "SELECT localizaciones.*, biblioteca.archivo_nombre  FROM localizaciones 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=localizaciones.logo) WHERE localizaciones.codigo = ".$this->db->escape($localizacion); 
		
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	// Obtener usuario
	public function get_usuario($usuario,$localizacion){
		$sql = "SELECT U.*, P.nombre perfil_nombre, 	(SELECT max(CT.nivel)  FROM usuarios_categorias UC2 
					INNER JOIN categorias C ON (C.id_categoria=UC2.id_categoria)  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE UC2.id_usuario = U.id_usuario
					) as max_nivel
				   FROM usuarios U 
					LEFT JOIN perfiles_usuarios P ON (P.id_perfil_usuario=U.id_perfil_usuario) 
					WHERE U.localizacion = ".$this->db->escape($localizacion). " 
					AND U.email = ".$this->db->escape($usuario); 
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_tipos_contenidos() {
		$sql = "SELECT * FROM tipos_contenidos where localizacion like '".$this->pais."'"
                        . " order by orden ASC";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	

	
	
	
	// Obtener distribuidor_usuario
	public function get_distribuidor_usuario($usuario,$localizacion){
		$sql = "SELECT D.nombre distribuidor_nombre, D.*, U.*, encripta_texto_epedidos(U.pass_epedidos) clave_epedidos, PU.crear_usuarios , PU.id_perfil_epedidos,  (SELECT max(CT.nivel)
				  FROM distribuidores_categorias DC2 
					INNER JOIN categorias C ON (C.id_categoria=DC2.id_categoria)  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					
				
					WHERE DC2.id_distribuidor = U.id_distribuidor
					) as max_nivel
					FROM distribuidores_usuarios U 
					LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)
					LEFT JOIN distribuidores D ON (D.id_distribuidor = U.id_distribuidor)
					WHERE U.localizacion = ".$this->db->escape($localizacion). " 
					AND U.email = ".$this->db->escape($usuario); 
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	// Obtener distribuidor_usuario
	public function get_distribuidor_usuario_by_id($id_distribuidor_usuario,$localizacion){
		$sql = "SELECT D.nombre distribuidor_nombre, D.*, U.*, encripta_texto_epedidos(U.pass_epedidos) clave_epedidos, PU.crear_usuarios , PU.id_perfil_epedidos,  (SELECT max(CT.nivel)
				  FROM distribuidores_categorias DC2 
					INNER JOIN categorias C ON (C.id_categoria=DC2.id_categoria)  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					
				
					WHERE DC2.id_distribuidor = U.id_distribuidor
					) as max_nivel
					FROM distribuidores_usuarios U 
					LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)
					LEFT JOIN distribuidores D ON (D.id_distribuidor = U.id_distribuidor)
					WHERE U.localizacion = ".$this->db->escape($localizacion). " 
					AND U.id_distribuidor_usuario = ".$this->db->escape($id_distribuidor_usuario); 
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	
	// Obtener usuarios_categorias
	public function get_usuarios_categorias($id_usuario){
		$sql = "SELECT CT.*, C.*, UC.*
					FROM `usuarios_categorias` UC 
					INNER JOIN categorias C ON (C.id_categoria=UC.id_categoria)
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE UC.id_usuario = ".$this->db->escape($id_usuario);
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
	// Obtener distribuidores_categorias
	public function get_distribuidores_categorias($id_distribuidor){
		$sql = "SELECT CT.*, C.*, DC.*  
					FROM `distribuidores_categorias` DC 
					INNER JOIN categorias C ON (C.id_categoria=DC.id_categoria)
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE DC.id_distribuidor = ".$this->db->escape($id_distribuidor); 
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	public function delete_data($table,$datakey) {
		$this->db->where($datakey);
		if ($this->db->delete($table)): 
			return true;
		else:
			return false;
		endif; 	
	}
	
	public function insert_data_return_id($table,$data) {	
	//	print_r($data);
	//	die();
		if ($this->db->insert($table, $data)): 
			return $this->db->insert_id();
		else:
		
			return false;
		endif; 	
	}
	public function insert_data($table,$data) {	
	//	print_r($data);
	//	die();
		if ($this->db->insert($table, $data)): 
			return true;
		else:
			return false;
		endif; 	
	}
	public function get_menu($codigoPadre = '0', $user ='') {
		@$this->load->library( 'nativesession' );
	
		$this->db->order_by('orden', 'ASC');
		$arraywhere['administradores_menu.codigo_padre'] =$codigoPadre;
		if ($codigoPadre== 0 && $user != ""):
			//$this->db->join('administradores_accesos', 'administradores_accesos.codigo=administradores_menu.codigo');
			//$arraywhere['administradores_accesos.usuario'] = $user;
		endif;
                
               
		// $this->db->where("localizacion",$this->pais);
                 $this->_pais("localizacion", $this->db);
                 $query =$this->db->get_where('administradores_menu',$arraywhere);
                $laquery=$this->db->last_query(); 
		$data =$query->result();
		// echo $this->db->last_query(); 
		return $data;	 
	}
	
	public function get_menu_contenidos($codigoPadre = '0', $user ='') {
		@$this->load->library( 'nativesession' );
	
		$this->db->order_by('orden', 'ASC');
		$arraywhere['administradores_menu_contenidos.codigo_padre'] =$codigoPadre;
		if ($codigoPadre== 0 && $user != ""):
			//$this->db->join('administradores_accesos', 'administradores_accesos.codigo=administradores_menu.codigo');
			//$arraywhere['administradores_accesos.usuario'] = $user;
		endif;
                $this->_pais("localizacion", $this->db);
		$query = $this->db->get_where('administradores_menu_contenidos',$arraywhere);
		$data =$query->result();
		// echo $this->db->last_query(); 
		return $data;	 
	}
	
	public function get_secciones($tipo = 'seccion',$id_seccion_padre='',$id_categoria='',$usuarioPerfil) {
		@$this->load->library( 'nativesession' );
		$sql = "SELECT S.*, T.codigo template_codigo, T.nombre template_nombre,
				SS.nombre seccion_padre_nombre, string_to_url(S.nombre) url, string_to_url(SS.nombre) ss_url
				FROM secciones S 
				INNER JOIN templates T ON (T.id_template=S.id_template)
				LEFT JOIN secciones SS ON (SS.id_seccion=S.id_seccion_padre)
				WHERE S.localizacion = ".$this->db->escape(localizacion())."
				AND S.estado = '1' ";
		if (intval($id_categoria)>0):
			$sql.= " AND S.id_categoria = ".$id_categoria; 
		endif;		
		if ($tipo == 'seccion'):
			$sql.= " AND S.tipo = 'seccion'";
			
		elseif ($tipo == 'subseccion' && intval($id_seccion_padre)>0):
			$sql.= " AND S.tipo = 'subseccion'";
			$sql.= " AND S.id_seccion_padre = ".$this->db->escape($id_seccion_padre);
		else:
			$sql.= " AND '1' = '2'";
		endif; 
		
		if ($this->data["usuarioPerfil"]->tipo == "distribuidor" || $this->data["usuarioPerfil"]->tipo == "usuario"):
			$sql.= " AND S.id_seccion IN (SELECT id_seccion FROM secciones_perfiles_usuarios WHERE id_perfil_usuario = ".$this->db->escape($usuarioPerfil->id_perfil_usuario)." ) ";
		endif;
	
		$sql.="	ORDER BY S.orden ASC";
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	public function get_secciones_menu($tipo = 'seccion',$id_seccion_padre='',$id_categoria='',$usuarioPerfil) {
		@$this->load->library( 'nativesession' );
		$sql = "SELECT S.*, T.codigo template_codigo, T.nombre template_nombre,
				SS.nombre seccion_padre_nombre, string_to_url(S.nombre) url, string_to_url(SS.nombre) ss_url
				FROM secciones S 
				INNER JOIN templates T ON (T.id_template=S.id_template)
				LEFT JOIN secciones SS ON (SS.id_seccion=S.id_seccion_padre)
				WHERE S.localizacion = ".$this->db->escape(localizacion())."
				AND S.estado = '1' AND S.menu = 'on' ";
		if (intval($id_categoria)>0):
			$sql.= " AND S.id_categoria = ".$id_categoria; 
		endif;		
		if ($tipo == 'seccion'):
			$sql.= " AND S.tipo = 'seccion'";
			
		elseif ($tipo == 'subseccion' && intval($id_seccion_padre)>0):
			$sql.= " AND S.tipo = 'subseccion'";
			$sql.= " AND S.id_seccion_padre = ".$this->db->escape($id_seccion_padre);
		else:
			$sql.= " AND '1' = '2'";
		endif; 
		
		if ($this->data["usuarioPerfil"]->tipo == "distribuidor" || $this->data["usuarioPerfil"]->tipo == "usuario"):
			$sql.= " AND S.id_seccion IN (SELECT id_seccion FROM secciones_perfiles_usuarios WHERE id_perfil_usuario = ".$this->db->escape($usuarioPerfil->id_perfil_usuario)." ) ";
		endif;
	
		$sql.="	ORDER BY S.orden ASC";
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	public function get_categorias_hijo($categorias,$categorias_usuario='',$nivel='') {
		$data = '';
		if (count($categorias)>0):
			$sql = "SELECT DISTINCT C.*, CT.*
						FROM categorias_sub CS
						INNER JOIN categorias C ON (C.id_categoria=CS.id_categoria_sub)
						INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
						WHERE 1 ";
			if ($nivel!="") $sql.="	AND CT.nivel = ".$this->db->escape($nivel+1)."";
			$sql.=" AND ( "; 
			$councat=0;			
			foreach ($categorias as $cat):
				$councat++;
				if ($councat>1) $sql.=" OR "; 
				$sql.=" CS.id_categoria = ".$cat->id_categoria;
				
			endforeach;
			$sql.=" )";
			if ($categorias_usuario != "" && count($categorias_usuario)>0):
				$sql.= " AND ( "; 
				$countcatusuario = 0;
				foreach ($categorias_usuario as $cat):
					$countcatusuario++;
					if ($countcatusuario>1) $sql.= " or ";
					$sql.= "CS.id_categoria_sub = ".$cat->id_categoria; 
				endforeach;
				$sql.= " ) ";
			endif;
			// echo $sql;
			$q = $this->db->query($sql);
			return $q->result(); 
		else:
			return false;
		endif;
		
	}
	
	public function get_categorias_hijo_filtro($id_categoria,$categorias_usuario='',$nivel='') {
		$sql = "SELECT DISTINCT C.*, CT.*
					FROM categorias_sub CS
					INNER JOIN categorias C ON (C.id_categoria=CS.id_categoria_sub)
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE  CS.id_categoria = ".$this->db->escape($id_categoria)."					";
		if ($nivel!="") $sql.="	AND CT.nivel = ".$this->db->escape($nivel+1)."";
		
		if ($categorias_usuario != "" && count($categorias_usuario)>0):
			$sql.= " AND ( "; 
			$countcatusuario = 0;
			foreach ($categorias_usuario as $cat):
				$countcatusuario++;
				if ($countcatusuario>1) $sql.= " or ";
				$sql.= "CS.id_categoria_sub = ".$cat->id_categoria; 
			endforeach;
			$sql.= " ) ";
		endif;
		$q = $this->db->query($sql);
		return $q->result(); 	
	}
	
	public function get_categorias() {
		$sql = "SELECT C.*, CT.* FROM categorias C 
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
				WHERE C.localizacion = ".$this->db->escape(localizacion())."
				ORDER BY C.orden ";
	
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	public function get_accesos_admin($usuario) {
		$sql = "SELECT codigo FROM administradores_accesos WHERE usuario = ".$this->db->escape($usuario)." ";	
		$q = $this->db->query($sql);
		$data = array();
		if ($q->num_rows()>0):
			foreach ($q->result() as $row):
				$data[] = $row->codigo;
			endforeach;
		endif;
		return $data;
	}
	
	
	public function enviar_alertas_tipo_email_pendientes() {
		// Recorro todos los alertas_enviadas de tipo email y envío...easy way
		$alertas = $this->get_alertas_pendientes_email();
		
		$emails_permitidos = array("aperez1982@gmail.com","andres@softone.cl","miguel.salazar@oqo.cl","claudio.cerpa@oqo.cl");
		if (count($alertas)>0):
			foreach ($alertas as $alerta):
				$msg = ''; 
				switch ($alerta->tipo_usuario):
					case "administrador": $dataemail["nombre"] = $alerta->adm_nombre; break;
					case "distribuidor": $dataemail["nombre"] = $alerta->dus_nombre; break;
					case "usuario":$dataemail["nombre"] =  $alerta->usu_nombre;  break;
				endswitch;
				$dataemail["texto_abajo_nombre"]= $alerta->texto_abajo_nombre;
				$dataemail["texto"] = $alerta->texto;
				$dataemail["texto_boton"] = $alerta->texto_boton;
				$dataemail["imagen"] = base_url().'img/'.localizacion().'/780x540-1/biblioteca/'.$alerta->archivo_nombre;
				$dataemail["url_btn"] = ($alerta->tipo_enlace == "externo")? $alerta->enlace_personalizado : base_url()."seccion/".$alerta->id_seccion."/".$alerta->url_seccion;
				// marco el estado de cada alerta como enviada (3)
				$buscar = array_keys($dataemail);
				$reemplazar = array_values($dataemail);
				$msg = $this->load->view('emails/notificacion',$dataemail, true); 
				// $this->load->view('emails/notificacion',$this->dataemail);
				
				if (in_array($alerta->usuario,$emails_permitidos)):  // <-------- QUITAR MODO PRUEBA
					$this->enviar_email($alerta->usuario , $alerta->asunto, $msg);
					$this->update_data("alertas_enviadas",array("estado"=>"3"),array("id_alerta_enviada"=>$alerta->id_alerta_enviada)); 
				endif;
			endforeach;
		endif;
	}
	
	public function get_alertas_pendientes_email() {
		$sql = "SELECT AE.*, AE.estado estado_leido, A.*, string_to_url(S.nombre) url_seccion,
				ADM.nombre adm_nombre, 
				DUS.nombre dus_nombre, 
				USU.nombre usu_nombre ,
				B.archivo_nombre
				FROM alertas_enviadas AE
				INNER JOIN alertas A ON (A.id_alerta = AE.id_alerta)
				LEFT JOIN secciones S ON (S.id_seccion = A.id_seccion) 
				LEFT JOIN biblioteca B ON (B.id_biblioteca = A.imagen)
				LEFT JOIN administradores ADM ON (ADM.usuario = AE.usuario AND AE.tipo_usuario = 'administrador')
				LEFT JOIN distribuidores_usuarios DUS ON (DUS.email = AE.usuario AND AE.tipo_usuario = 'distribuidor')
				LEFT JOIN usuarios USU ON (USU.email = AE.usuario AND AE.tipo_usuario = 'usuario')
				WHERE 1
				AND AE.tipo = 'email'
				AND AE.estado = '1'
				ORDER BY AE.fecha_envio ASC, AE.estado ASC
	
				";
					
		$q = $this->db->query($sql);
		return $q->result();
	}
	
	
	public function get_alerta_enviada($usuarioPerfil,$id_alerta_enviada) {
		$sql = "SELECT AE.*, A.*, string_to_url(S.nombre) url_seccion, B.archivo_nombre
				FROM alertas_enviadas AE
				INNER JOIN alertas A ON (A.id_alerta = AE.id_alerta)
				LEFT JOIN secciones S ON (S.id_seccion = A.id_seccion) 
				LEFT JOIN biblioteca B ON (B.id_biblioteca = A.imagen)
				WHERE AE.usuario = ".$this->db->escape($usuarioPerfil->email)."
				AND AE.tipo_usuario =  ".$this->db->escape($usuarioPerfil->tipo)." 
				AND (AE.estado = '1') 
				AND AE.id_alerta_enviada = ".$this->db->escape($id_alerta_enviada)."
				";
					
		$q = $this->db->query($sql);
		return  $q->row(); 
	}
	
	public function get_alertas_pendientes($usuarioPerfil,$modo='alertas') {
		$sql = "SELECT AE.*, A.*, string_to_url(S.nombre) url_seccion , B.archivo_nombre,
				
				E.titulo evento_titulo, BEV.archivo_nombre evento_imagen,
				(SELECT ubicacion FROM eventos_sesiones WHERE id_evento = E.id_evento AND tipo_sesion = 'presencial' ORDER BY tipo_sesion DESC, fecha ASC LIMIT 1 ) evento_ubicacion ,
				(SELECT COUNT(*) FROM eventos_sesiones WHERE id_evento = E.id_evento AND  tipo_sesion = 'presencial') evento_cantidad_sesiones_presenciales,
				(SELECT COUNT(*) FROM eventos_sesiones WHERE id_evento = E.id_evento AND  tipo_sesion = 'online') evento_cantidad_sesiones_online,
				(SELECT max(costo_evento) FROM `eventos_sesiones` WHERE id_evento = E.id_evento) evento_costo
				
				FROM alertas_enviadas AE
				INNER JOIN alertas A ON (A.id_alerta = AE.id_alerta)
				LEFT JOIN secciones S ON (S.id_seccion = A.id_seccion) 
				LEFT JOIN biblioteca B ON (B.id_biblioteca = A.imagen)
				LEFT JOIN eventos E ON (E.id_evento = A.id_evento)
				LEFT JOIN biblioteca BEV ON (BEV.id_biblioteca = E.imagen_principal)
				WHERE AE.usuario = ".$this->db->escape($usuarioPerfil->email)."
				AND AE.tipo_usuario =  ".$this->db->escape($usuarioPerfil->tipo)." 
				AND (AE.estado = '1') 
				AND AE.tipo != 'email' AND AE.tipo != 'notificacion'
				ORDER BY AE.fecha_envio DESC, AE.estado ASC
				";
					
		$q = $this->db->query($sql);
	
		return $q->result();
	}
	
	public function get_notificaciones($usuarioPerfil) {
		$sql = "SELECT AE.*, AE.estado estado_leido, A.*, string_to_url(S.nombre) url_seccion 
				FROM alertas_enviadas AE
				INNER JOIN alertas A ON (A.id_alerta = AE.id_alerta)
				LEFT JOIN secciones S ON (S.id_seccion = A.id_seccion) 
				WHERE AE.usuario = ".$this->db->escape($usuarioPerfil->email)."
				AND AE.tipo_usuario =  ".$this->db->escape($usuarioPerfil->tipo)." 
				AND AE.tipo = 'notificacion'
				ORDER BY AE.fecha_envio DESC, AE.estado ASC
				LIMIT 5
				";
					
		$q = $this->db->query($sql);
		$alertas = array();
		if ($q->num_rows()>0):
			$data = $q->result();
			foreach ($data as $row):
				$alertas[$row->estado_leido][] = $row; // alertas[1] = no leida   alertas[2] = leidas
			endforeach;		
		endif;
		return $alertas;
	}
	
	
	

	
	
	public function update_data($table,$data,$where ) {
		$this->db->where($where);
		$this->db->update($table, $data); 
		
	}
	public function get_custom_query($sql) {
		$q = $this->db->query($sql);
		return  $q->result();	
	}
	
	public function get_codigo_menu_padre($codigo) {
		$this->db->select("codigo_padre");
		$query = $this->db->get_where('administradores_menu', array('codigo' =>$codigo));
		return $query->row()->codigo_padre;	
	}
	
	
	public function logThis($usuarioPerfil,$tipo_mov,$tabla_nombre='',$datakey='',$fieldList='') {
		
		$data["ip"] = getIP();
		$data["usuario"] = $usuarioPerfil->email;
		$data["tipo_usuario"] = $usuarioPerfil->tipo;
		$data["fecha"] = date("Y-m-d H:i:s");
		$data["tipo_mov"] = $tipo_mov;
		$data["tabla_nombre"] = $tabla_nombre;
		$data["key_name"] = @key($datakey);
		$data["key_value"] = @reset($datakey);
		$id_movimiento = $this->insert_data_return_id("log_movimientos",$data);
		
		if ($fieldList && is_array($fieldList) && $fieldList!="") {		 
			foreach ($fieldList as $key=>$temp) {
				
				// Revisar si este movimiento ya se ha producido antes
				$sql = "SELECT log_movimientos_detalle.id_movimiento_detalle 
								FROM 
								log_movimientos_detalle
								INNER JOIN log_movimientos ON (log_movimientos.id_movimiento = log_movimientos_detalle.id_movimiento)  
								WHERE log_movimientos.tabla_nombre = ".$this->db->escape($tabla_nombre)."
								AND log_movimientos.key_name = ".@$this->db->escape(@key($datakey))."
								AND log_movimientos.key_value = ".@$this->db->escape(@reset($datakey))."
								AND log_movimientos_detalle.campo = ".$this->db->escape($key)."
								AND log_movimientos_detalle.valor = ".$this->db->escape(@$temp)." ";
								
				$existe = $this->get_custom_query($sql);
				 
				if (count($existe)==0):
					$datadetail["id_movimiento"] = $id_movimiento; 
					$datadetail["campo"] = $key;
					$datadetail["valor"] = $temp;	
					$this->insert_data("log_movimientos_detalle",$datadetail);
				endif;
			}
		}
		
		
	}
	
	public function esquema_arboledit_html($arbol,$catnivel_nombre,$max_nivel_categorias,$id_categoria_padre,$nivel=1,$seleccionadas) {
	//	print_r($arbol);
		
		if ($max_nivel_categorias>=$nivel):
			
			$html = '<ul>';
			$nivel++;
			foreach ($arbol as $row):
				$html.= '<li data-cat=\''.$row->id_categoria.'\' ';

				if (in_array($row->id_categoria,$seleccionadas) && (intval(count(array_diff($seleccionadas,array_keys($row->sub))))==count($seleccionadas))):	$html.= ' data-checkstate="checked" '; else:  $html.= ' data-checkstate="none" '; endif;
				
				$html.='>'.strtolower($row->nombre); 
				$html.= $this->esquema_arboledit_html($row->sub,$catnivel_nombre,$max_nivel_categorias,$row->id_categoria,$nivel,$seleccionadas);
				$html.= '</li>';
			endforeach;
			$html.= '</ul>';
		endif;
		return @$html;	
		
	}
	
		
	public function get_arbol_lineal_categorias($nivel =1) {
		 $finaldata = array();
		$sql = "SELECT CAT.*, CT.* FROM categorias CAT 
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE 1 ";
	
		if ($nivel!=""): $sql.="	AND CT.nivel = ".$this->db->escape($nivel).""; endif;
		$sql.= " GROUP BY CAT.id_categoria ";
		$sql.= " ORDER BY CAT.orden ";
		
		//	echo $sql;
		$q = $this->db->query($sql);
		$data =  $q->result(); 
		if (count($data)>0):
			foreach ($data as $row):
				$finaldata[$row->id_categoria] = $row;
				$finaldata[$row->id_categoria]->sub = $this->get_categorias_sub_arbol( $row->id_categoria,$nivel,$finaldata);
			endforeach;
		endif; 
		return $finaldata;
	}
	
	public function get_categorias_sub_arbol($id_categoria_padre = '',$nivel =1) {
		$finaldata = array();
		$sql = "SELECT CAT.*, CT.* FROM categorias_sub CATSUB
				INNER JOIN categorias CAT ON(CAT.id_categoria=CATSUB.id_categoria_sub)
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE CATSUB.id_categoria = ".$this->db->escape($id_categoria_padre)."";
	
		 
		$nivel = $nivel+1;
		if ($nivel!="") $sql.="	AND CT.nivel = ".$this->db->escape($nivel)."";
		$sql.= " ORDER BY CAT.orden ";
		//		echo $sql;
		$q = $this->db->query($sql);
		$data =  $q->result();
		if (count($data)>0):
			foreach ($data as $row):
				$finaldata[$row->id_categoria] = $row;
				$finaldata[$row->id_categoria]->sub = $this->get_categorias_sub_arbol( $row->id_categoria,$nivel,$finaldata);
			endforeach;
		endif;
		return $finaldata;
		
	}
	
	public function get_field($field,$table,$where) {
		$q = $this->db->get_where($table, $where);	
		$rows =$q->num_rows();
		if ($rows>0)
			return $q->row()->$field;		
		else 
			return false;
	}
	// Obtener usuario por token
	public function get_user_token($tipo,$localizacion,$token){
		$sql = "SELECT * FROM ".$tipo." 
				WHERE localizacion = ".$this->db->escape($localizacion)." 
				AND token = ".$this->db->escape($token)." 
				AND token_fecha >= NOW() - INTERVAL 1 DAY";
				
		$q = $this->db->query($sql);
		return $q->row();
	}
	
	public function generarCodigoTransaccional($length=35,$uc=TRUE,$n=TRUE,$sc=FALSE,$min=TRUE)	{
		if($min==1)  $source  = 'abcdefghijklmnopqrstuvwxyz'; 
		 if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 if($n==1)  $source .= '1234567890';
		 if($sc==1) $source .= '-';
		 if($length>0)	{
			 $rstr = ""; $source = str_split($source,1);
			 for($i=1; $i<=$length; $i++)				 {
				mt_srand((double)microtime() * 100000000);
				$num  = mt_rand(1,count($source));
				$rstr .= $source[$num-1];
			 }
		}
		return $rstr;
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