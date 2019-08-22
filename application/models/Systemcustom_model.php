<?php
class SystemCustom_model extends CI_Model {
	
	
	public function verificar_usuario_existe($tipo,$usuario,$id='') {
		switch ($tipo) :
			case "administradores":
				$sql = "SELECT COUNT(*) counter FROM administradores WHERE usuario = ".$this->db->escape($usuario); 
				if ($id != "") :
					$sql.=" AND usuario != ".$this->db->escape($id); 		
				endif;
			break;
			
			case "distribuidores_usuarios":
				$sql = "SELECT COUNT(*) counter FROM distribuidores_usuarios WHERE email = ".$this->db->escape($usuario);
				if ($id != "") :
					$sql.=" AND id_distribuidor_usuario != ".$this->db->escape($id); 		
				endif; 
			break;
			
			case "usuarios":
				$sql = "SELECT COUNT(*) counter FROM usuarios  WHERE email = ".$this->db->escape($usuario); 
				if ($id != "") :
					$sql.=" AND id_usuario != ".$this->db->escape($id); 		
				endif;
			
			break;	
			
		endswitch;
		// echo $sql;
		$q = $this->db->query($sql);
		$data = $q->row();
		return $data->counter; 
		
			
	}
	
	
	public function guardar_idiomas_sitio($data) {
		
		$sql = "SELECT * FROM localizaciones";
		$q = $this->db->query($sql);
		$localizaciones = $q->result();
		foreach ($localizaciones as $loc):  
			$datainsert = array(
					'localizacion' => $loc->codigo,
					'seccion' => $data['seccion'],
					'codigo' => $data['codigo'],
					'texto' => $data['texto']
							);
				
				
			$this->db->insert('idiomas_sitio', $datainsert);
		endforeach;
	}
	
	public function guardar_editar_idiomas_sitio($data) {	 	
		
			$dataupdate = array(
					'texto' => $data['texto']
							);
			$this->db->where('localizacion',$data['localizacion']);
			$this->db->where('seccion',$data['seccion']);
			$this->db->where('codigo', $data['codigo']);
				// echo $this->db->last_query();
			$this->db->update('idiomas_sitio', $dataupdate);
	
	}
	
	public function guardar_idiomas_sistema($data) {
		
		$sql = "SELECT * FROM localizaciones";
		$q = $this->db->query($sql);
		$localizaciones = $q->result();
		foreach ($localizaciones as $loc):  
			$datainsert = array(
					'localizacion' => $loc->codigo,
					'tabla' => $data['tabla'],
					'campo' => $data['campo'],
					'texto' => $data['texto']
							);
				
				
			$this->db->insert('idiomas_sistema', $datainsert);
		endforeach;
	}
	
	public function guardar_editar_idiomas_sistema($data) {	 	
		
			$dataupdate = array(
					'texto' => $data['texto']
							);
			$this->db->where('localizacion',$data['localizacion']);
			$this->db->where('tabla',$data['tabla']);
			$this->db->where('campo', $data['campo']);
				// echo $this->db->last_query();
			$this->db->update('idiomas_sistema', $dataupdate);
	
	}
	
	public function insert_noticia($data,$imagenes,$archivos) {
		
		$this->db->insert('novedades', $data); 	
		$id_novedad = $this->db->insert_id();	
		$this->db->flush_cache();
		
		$array_imagenes = explode(",",$imagenes);
		$array_archivos = explode(",",$archivos);
		
		// Imagenes
		$dataimg = array();
		$dataimg["id_novedad"] = $id_novedad;
		if (count($array_imagenes)>0):
			foreach ($array_imagenes as $img):
				if (intval($img)>0):
					$dataimg["id_biblioteca"] = $img;
					$this->db->insert('novedades_imagenes', $dataimg); 
				endif;
			endforeach;
		endif;
		
		// Archivos
		$dataarch = array();
		$dataarch["id_novedad"] = $id_novedad;
		if (count($array_archivos)>0):
			foreach ($array_archivos as $arch):
				if (intval($arch)>0):
					$dataarch["id_biblioteca"] = $arch;
					$this->db->insert('novedades_archivos', $dataarch); 
				endif;
			endforeach;
		endif;
		
		
		
	}
	public function get_log_movimientos($filter, $limit=20, $offset = 0,$orderBy = NULL) {
	
		if ($filter["fechas"] != ""): $arfecha = explode(" - ",$filter["fechas"]);
			$fecha_desde = ConvertDateToMysqlFormat($arfecha[0]). " 00:00:00";
			$fecha_hasta = ConvertDateToMysqlFormat($arfecha[1]). " 23:59:59";
		endif;
		$sql = "SELECT LOG.*,
				ADM.nombre adm_nombre, 
				DUS.nombre dus_nombre, 
				USU.nombre usu_nombre 
				FROM log_movimientos LOG
				LEFT JOIN administradores ADM ON (ADM.usuario = LOG.usuario AND LOG.tipo_usuario = 'administrador')
				LEFT JOIN distribuidores_usuarios DUS ON (DUS.email = LOG.usuario AND LOG.tipo_usuario = 'distribuidor')
				LEFT JOIN usuarios USU ON (USU.email = LOG.usuario AND LOG.tipo_usuario = 'usuario') 
				WHERE 1
				";
		if ($filter["fechas"] != ""):
			$sql.=" AND (LOG.fecha >= ".$this->db->escape($fecha_desde)." AND LOG.fecha <= ".$this->db->escape($fecha_hasta).")"; 
		endif;	
		
		if ($filter["usuario"] != ""):
			$sql.=" AND LOG.usuario = ".$this->db->escape($filter["usuario"]); 
		endif;		
		
		if ($filter["tipo_mov"] != ""):
			$sql.=" AND LOG.tipo_mov = ".$this->db->escape($filter["tipo_mov"]); 
		endif;		
		if ($filter["tabla_nombre"] != ""):
			$sql.=" AND LOG.tabla_nombre = ".$this->db->escape($filter["tabla_nombre"]); 
		endif;		
				
		$sql.="	ORDER BY LOG.id_movimiento DESC	";
		$sql.= " LIMIT ".intval($offset).",".intval($limit); 
	
		$q = $this->db->query($sql);
		return $q->result(); 
				
	}
	public function get_count_log_movimientos($filter) {

		if ($filter["fechas"] != ""): $arfecha = explode(" - ",$filter["fechas"]);
			$fecha_desde = ConvertDateToMysqlFormat($arfecha[0]). " 00:00:00";
			$fecha_hasta = ConvertDateToMysqlFormat($arfecha[1]). " 23:59:59";
		endif;
		$sql = "SELECT LOG.*,
				ADM.nombre adm_nombre, 
				DUS.nombre dus_nombre, 
				USU.nombre usu_nombre 
				FROM log_movimientos LOG
				LEFT JOIN administradores ADM ON (ADM.usuario = LOG.usuario AND LOG.tipo_usuario = 'administrador')
				LEFT JOIN distribuidores_usuarios DUS ON (DUS.email = LOG.usuario AND LOG.tipo_usuario = 'distribuidor')
				LEFT JOIN usuarios USU ON (USU.email = LOG.usuario AND LOG.tipo_usuario = 'usuario') 
				WHERE 1
				";
		if ($filter["fechas"] != ""):
			$sql.=" AND (LOG.fecha >= ".$this->db->escape($fecha_desde)." AND LOG.fecha <= ".$this->db->escape($fecha_hasta).")"; 
		endif;	
		
		if ($filter["usuario"] != ""):
			$sql.=" AND LOG.usuario = ".$this->db->escape($filter["usuario"]); 
		endif;		
		
		if ($filter["tipo_mov"] != ""):
			$sql.=" AND LOG.tipo_mov = ".$this->db->escape($filter["tipo_mov"]); 
		endif;		
		if ($filter["tabla_nombre"] != ""):
			$sql.=" AND LOG.tabla_nombre = ".$this->db->escape($filter["tabla_nombre"]); 
		endif;		
				
		$sql.="	ORDER BY LOG.id_movimiento DESC	";
		$q = $this->db->query($sql);
		return $q->num_rows(); 
				
	}
	
	public function get_log_movimiento($id_movimiento) {
		$sql = "SELECT LOG.*,
				ADM.nombre adm_nombre, 
				DUS.nombre dus_nombre, 
				USU.nombre usu_nombre 
				FROM log_movimientos LOG
				LEFT JOIN administradores ADM ON (ADM.usuario = LOG.usuario AND LOG.tipo_usuario = 'administrador')
				LEFT JOIN distribuidores_usuarios DUS ON (DUS.email = LOG.usuario AND LOG.tipo_usuario = 'distribuidor')
				LEFT JOIN usuarios USU ON (USU.email = LOG.usuario AND LOG.tipo_usuario = 'usuario')
				WHERE LOG.id_movimiento = ".intval($id_movimiento)."
				ORDER BY LOG.id_movimiento DESC
				";
		$q = $this->db->query($sql);
		$data = $q->row();
		if ($data->key_name != ""): 
			$q2 = $this->db->get_where($data->tabla_nombre, array($data->key_name=>$data->key_value));				
			$data->movimiento = $q2->row();
		endif; 	 
		return $data; 
				
	}
	
	public function get_distinct_tipo_mov() {
		$sql = "SELECT DISTINCT tipo_mov FROM log_movimientos ORDER BY tipo_mov ASC "; 
		$q = $this->db->query($sql);
		return $q->result();
	}
	
	public function get_distinct_tabla_nombre() {
		$sql = "SELECT DISTINCT tabla_nombre FROM log_movimientos ORDER BY tabla_nombre ASC "; 
		$q = $this->db->query($sql);
		return $q->result();
	}
	
	public function get_log_movimientos_detalle($id_movimiento) {
		$sql = "SELECT * FROM log_movimientos_detalle WHERE id_movimiento = ".intval($id_movimiento);
		$q = $this->db->query($sql);
		return $q->result(); 
				
	}
	
	public function actualizar_estado_bloque_dashboard($id_seccion,$estado) {
		$sql = "UPDATE secciones SET estado_dashboard = '".intval($estado)."' WHERE id_seccion = ".$this->db->escape($id_seccion) ; 	
		$this->db->query($sql);
	}
	
	
	public function actualizar_estado($tabla,$accion,$id,$key) {
		switch ($accion):
			case "mantener_arriba":
				$sql = "UPDATE ".$tabla. " SET mantener_arriba = '1' WHERE ".addslashes($key)." = ".$this->db->escape($id);
			break;
			case "borrador":
				$sql = "UPDATE ".$tabla. " SET estado = '0' WHERE ".addslashes($key)." = ".$this->db->escape($id);
			break;
			
			case "quitar_borrador":
				$sql = "UPDATE ".$tabla. " SET estado = '1' WHERE ".addslashes($key)." = ".$this->db->escape($id);
			break;
		endswitch;
		
		if ($sql != ""):
			$this->db->query($sql);
			//echo $sql;
		endif;
	}
	
	public function get_bibliotecas($array_id_biblioteca) {
		if (count($array_id_biblioteca)>0):
			$sql = " SELECT B.* FROM biblioteca B WHERE 1 AND ( "; 
			$count = 0;
			foreach ($array_id_biblioteca as $id_biblioteca):
				if (intval($id_biblioteca)>0):
					$count++;
					if ($count >1)	$sql.=" OR "; 
					$sql.=" B.id_biblioteca = ".$this->db->escape($id_biblioteca); 
				endif;
			endforeach;
			$sql.=" ) "; 
			
			$q = $this->db->query($sql);
		return $q->result(); 
		else:
			return false;
		endif;		
	}
	
	public function get_biblioteca_by_id($id_biblioteca) {
		$sql = "SELECT * FROM biblioteca WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 	
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_biblioteca_archivo_nombre($archivo,$localizacion) {
		
		$sql = "SELECT archivo_peso FROM biblioteca WHERE 1
				AND archivo_original = ".$this->db->escape($archivo); 	
		$q = $this->db->query($sql);
		return $q->row()->archivo_peso; 
		
	}
	
	
	public function get_novedades() {
		$sql = "SELECT novedades.*, biblioteca.archivo_nombre  FROM novedades 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=novedades.imagen_principal)
				ORDER BY id_novedad DESC ";
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
	
	public function get_programa($id_incentivo) {
		$sql = "SELECT incentivos.*, biblioteca.archivo_nombre  FROM incentivos 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=incentivos.imagen_principal)
				WHERE incentivos.id_incentivo = ".$this->db->escape($id_incentivo);
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_biblioteca_by_tipo_contenido($id_tipo_contenido) {
		$sql = "SELECT B.* 
				FROM biblioteca_tipos_contenido  BTC
				INNER JOIN biblioteca B ON (B.id_biblioteca = BTC.id_biblioteca)
				WHERE id_tipo_contenido = ".intval($id_tipo_contenido); 
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
	// Programas de incentivo
	public function get_programa_biblioteca($tipo,$id_incentivo) {
		$sql = "SELECT * FROM incentivos_".$tipo." IT 
					INNER JOIN biblioteca B ON (IT.id_biblioteca = B.id_biblioteca)
				WHERE IT.id_incentivo = ".$this->db->escape($id_incentivo); 
		$q = $this->db->query($sql);
		return $q->result(); 		
	}
	
	
	
	public function get_evento($id_evento) {
		$sql = "SELECT eventos.*, biblioteca.archivo_nombre  FROM eventos 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=eventos.imagen_principal)
				WHERE eventos.id_evento = ".$this->db->escape($id_evento);
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_evento_sesion($id_sesion) {
		$sql = "SELECT * FROM `eventos_sesiones` WHERE id_evento_sesion =  ".$this->db->escape($id_sesion);
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	
	public function get_evento_asistencia($id_evento) {
		$sql = "SELECT 
				EA.fecha_inscripcion,
				EA.tipo_usuario,
				ES.*,
				ADM.nombre adm_nombre,
				US.nombre us_nombre,
				DIS.nombre dis_nombre,
				DU.nombre du_nombre
				FROM eventos_asistencia EA
				INNER JOIN eventos_sesiones ES ON (ES.id_evento_sesion=EA.id_evento_sesion)
				INNER JOIN eventos EV ON (ES.id_evento=EV.id_evento)
				LEFT JOIN administradores ADM ON (EA.usuario=ADM.usuario)
				LEFT JOIN distribuidores_usuarios DU ON (EA.usuario=DU.email)
				LEFT JOIN distribuidores DIS ON (DIS.id_distribuidor=DU.id_distribuidor)
				LEFT JOIN usuarios US ON (EA.usuario=US.email)
				WHERE EV.id_evento = ".$this->db->escape($id_evento);
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	// Programas de incentivo
	public function get_evento_biblioteca($tipo,$id_evento) {
		$sql = "SELECT * FROM eventos_".$tipo." IT 
					INNER JOIN biblioteca B ON (IT.id_biblioteca = B.id_biblioteca)
				WHERE IT.id_evento = ".$this->db->escape($id_evento);
		$sql.="  ORDER BY case when B.archivo_extension = '.mp4' OR B.archivo_extension = '.mov' then 1 else 2 end, B.fecha_subida desc"; 
		$q = $this->db->query($sql);
		return $q->result(); 		
	}
	
	public function get_evento_sesiones($id_evento,$tipo_sesion) {
		$sql = "SELECT *,
					(SELECT count(*) from eventos_asistencia WHERE eventos_asistencia.id_evento_sesion = eventos_sesiones.id_evento_sesion) inscritos
					FROM eventos_sesiones 
					WHERE id_evento = ".$this->db->escape($id_evento). " 
					AND tipo_sesion = ".$this->db->escape($tipo_sesion)." "; 
		$q = $this->db->query($sql);
		return $q->result(); 		
		
	}
	
	public function inscribir_evento($id_sesion,$tipo_usuario,$usuario) {
		$sql = "SELECT *,
					(SELECT count(*) FROM eventos_asistencia WHERE eventos_asistencia.id_evento_sesion = eventos_sesiones.id_evento_sesion) inscritos
					FROM eventos_sesiones 
					WHERE id_evento_sesion = ".$this->db->escape($id_sesion). "  "; 
			
		$q = $this->db->query($sql);
		$row = $q->row();
		$cupos = ($row->cupos - $row->inscritos);	
		$id_evento = $row->id_evento;	
		$InscripcionActual = $this->verificar_incripcion($id_evento,$tipo_usuario,$usuario);
		// Insertar al usuario y enviar mensaje
		if (intval($cupos)>0 && count($InscripcionActual) == 0): // InscripcionActual quitar si permite inscribirse en varias sesiones del mismo evento.
			$datainscripcion["id_evento_sesion"] = intval($id_sesion);
			$datainscripcion["tipo_usuario"] = $tipo_usuario;
			$datainscripcion["usuario"] = $usuario;		
			return $this->db->insert('eventos_asistencia', $datainscripcion);
			
		else:
			return "CUPOS_AGOTADOS";
		endif;
	}
	
	public function verificar_incripcion($id,$tipo,$user) {
		$sql = "SELECT * FROM eventos_sesiones ES 
					INNER JOIN eventos_asistencia EA ON (EA.id_evento_sesion=ES.id_evento_sesion)
					WHERE ES.id_evento = ".$this->db->escape($id)."
					AND EA.tipo_usuario =  ".$this->db->escape($tipo)."
					AND EA.usuario =  ".$this->db->escape($user).""; 
		
		$q = $this->db->query($sql);
		return $q->result();
	}
	
	
	public function get_novedad($id_novedad) {
		$sql = "SELECT novedades.*, biblioteca.archivo_nombre  FROM novedades 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=novedades.imagen_principal)
				WHERE novedades.id_novedad = ".$this->db->escape($id_novedad);
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_promocion($id_promocion) {
		$sql = "SELECT promociones.*, biblioteca.archivo_nombre  FROM promociones 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=promociones.imagen_principal)
				WHERE promociones.id_promocion = ".$this->db->escape($id_promocion);
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	
	// Programas de incentivo
	public function get_novedad_biblioteca($tipo,$id_novedad) {
		$sql = "SELECT * FROM novedades_".$tipo." IT 
					INNER JOIN biblioteca B ON (IT.id_biblioteca = B.id_biblioteca)
				WHERE IT.id_novedad = ".$this->db->escape($id_novedad); 
		$sql.="  ORDER BY case when B.archivo_extension = '.mp4' OR B.archivo_extension = '.mov' then 1 else 2 end, B.fecha_subida desc"; 
		$q = $this->db->query($sql);
		return $q->result(); 		
	}
	
	public function get_promocion_biblioteca($tipo,$id_novedad) {
		$sql = "SELECT * FROM promociones_".$tipo." IT 
					INNER JOIN biblioteca B ON (IT.id_biblioteca = B.id_biblioteca)
				WHERE IT.id_promocion = ".$this->db->escape($id_novedad); 
		$sql.="  ORDER BY case when B.archivo_extension = '.mp4' OR B.archivo_extension = '.mov' then 1 else 2 end, B.fecha_subida desc"; 
		$q = $this->db->query($sql);
		return $q->result(); 		
	}
	
	
	public function get_contenidos_master($table,$keyname,$usuarioPerfil,$filtro_busqueda = "",$seccion="") {
		// Falta filtrar por programar desde y programar hasta
		// Falta filtrar por los permisos perfiles de la $seccion
		// falta ordenar según el orden de slider home (orden asc)
		
		
		// Revisar titulo en la $tabla
		$query = $this->db->query("SHOW COLUMNS FROM `".$table."` LIKE 'titulo'");
		$titulo_exists = ($query->num_fields()>0)?TRUE:FALSE;
		
		$sql = "SELECT N.*, biblioteca.archivo_nombre , ";
		if ($titulo_exists) $sql.=" string_to_url(N.titulo) url_titulo,  "; 
		$sql.="		(SELECT max(CT.nivel)  FROM ".$table."_categorias NC 
					INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE NC.".$keyname." = N.".$keyname." 
					) max_nivel	";
		if ($table == "eventos"):
			$sql.=", (SELECT ubicacion FROM eventos_sesiones WHERE id_evento = N.id_evento AND tipo_sesion = 'presencial' ORDER BY tipo_sesion DESC, fecha ASC LIMIT 1 ) evento_ubicacion "; 
			$sql.=", (SELECT fecha FROM eventos_sesiones WHERE id_evento = N.id_evento ORDER BY tipo_sesion DESC, fecha ASC LIMIT 1 ) evento_fecha "; 
			$sql.=", (SELECT hora FROM eventos_sesiones WHERE id_evento = N.id_evento ORDER BY tipo_sesion DESC, fecha ASC LIMIT 1 ) evento_hora "; 
		endif;
		$sql.="	FROM ".$table." N
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=N.imagen_principal) WHERE 1 AND N.estado = '1' ";
				
		if (@$filtro_busqueda["txt"] != ""):
			$sql.= " AND (N.titulo LIKE '%".$this->db->escape_like_str($filtro_busqueda["txt"])."%')"; 
		endif;
		
                $sql .= " AND N.localizacion = '". localizacion()."'";
		// filtro vigencia 
		if (@$filtro_busqueda["vigencia"] == "on"):
			$sql.= " AND (N.vigencia_desde <= '".@date("Y-m-d")."' AND N.vigencia_hasta >= '".@date("Y-m-d")."')";
		elseif(@$filtro_busqueda["vigencia"] == "off"):
			$sql.= " AND (N.vigencia_desde >= '".@date("Y-m-d")."' OR N.vigencia_hasta <= '".@date("Y-m-d")."')";
		elseif(@$filtro_busqueda["vigencia"] == "futuros"):
			$sql.= " AND (N.vigencia_desde >= '".@date("Y-m-d")."' )";
		elseif(@$filtro_busqueda["vigencia"] == "pasados"):
			$sql.= " AND (N.vigencia_hasta < '".@date("Y-m-d")."' )";
		endif;
		
		// filtro destacados (mantener_arriba)
		if (@$filtro_busqueda["mantener_arriba"] != ""):
			$sql.= " AND (N.mantener_arriba = '".intval($filtro_busqueda["mantener_arriba"])."' )";
		endif;
		
			// print_r($filtro_busqueda);
		if (@$filtro_busqueda["fechas"] != ""):
			$array_fecha = explode(" - ",$filtro_busqueda["fechas"]);
			$desde = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[0]);
			$hasta = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[1]);
			$sql.=" AND fecha_publicacion >= ".$this->db->escape($desde." 00:00:00");
			$sql.=" AND fecha_publicacion <= ".$this->db->escape($hasta." 23:59:59");
		endif;
		
		if (@$filtro_busqueda["id_tipo_contenido"] != ""):
		// Perfil/Usuario
			$sql.= "AND 
					(".$keyname." IN 
						(SELECT ".$keyname." FROM ".$table."_tipos_contenidos WHERE id_tipo_contenido = ".$this->db->escape($filtro_busqueda["id_tipo_contenido"]).")
					
					) ";	
		endif;

		if ($usuarioPerfil->tipo == "distribuidor" || $usuarioPerfil->tipo == "usuario" ):
			// Perfil/Usuario
			$sql.= "AND 
					(".$keyname." IN 
						(SELECT ".$keyname." FROM ".$table."_permisos WHERE tipo_permiso = 'perfil' AND id_referencia = ".$this->db->escape($usuarioPerfil->id_usuario).")
					 OR (SELECT count(*) from ".$table."_permisos WHERE tipo_permiso = 'perfil' AND ".$keyname." = N.".$keyname.") = 0
					) ";			
		endif;
		
		if ($usuarioPerfil->tipo == "usuario"):
			// Perfil
			$sql.= "AND 
					(".$keyname." IN 
						(SELECT ".$keyname." FROM ".$table."_permisos WHERE tipo_permiso = 'perfil' AND id_referencia = ".$this->db->escape($usuarioPerfil->id_usuario).")
					 OR (SELECT count(*) from ".$table."_permisos WHERE tipo_permiso = 'perfil' AND ".$keyname." = N.".$keyname.") = 0
					) "; 			
		endif;
		
		
		if ($usuarioPerfil->tipo == "distribuidor"):		
			// Zona Geografica
			$sql.= "AND 
					(".$keyname." IN 
						(SELECT ".$keyname." FROM ".$table."_permisos WHERE tipo_permiso = 'zona_geografica' AND ( 
						id_referencia = ".$this->db->escape($usuarioPerfil->id_zona_geografica1)." 
						OR id_referencia = ".$this->db->escape($usuarioPerfil->id_zona_geografica2)." 
						OR id_referencia = ".$this->db->escape($usuarioPerfil->id_zona_geografica3)."))
					 OR (SELECT count(*) FROM ".$table."_permisos WHERE tipo_permiso = 'zona_geografica' AND ".$keyname." = N.".$keyname.") = 0
					) "; 
				
			// Distribuidor
			$sql.= "AND 
					(".$keyname." IN 
						(SELECT ".$keyname." FROM ".$table."_permisos WHERE tipo_permiso = 'distribuidor' AND id_referencia = ".$this->db->escape($usuarioPerfil->id_distribuidor).")
					 OR (SELECT count(*) from ".$table."_permisos WHERE tipo_permiso = 'distribuidor' AND ".$keyname." = N.".$keyname.") = 0
					) "; 
		endif;
		
	

		
		// ORDEN
		
		// por defecto seccion
		if (@$seccion->orden_de_contenido != ""):
		
			switch($seccion->orden_de_contenido):
				case "sort_desc":
					$default_sort = $keyname." DESC ";
				break;
				case "sort_asc":
					$default_sort = $keyname." ASC ";
					
				break;	
				case "sort_manual":
					$default_sort = $keyname." DESC ";
				break;
				case "sort_alpha":
					if (@$seccion->orden_alfabetico_criterio == "A-Z"):
						$default_sort = "titulo ASC ";
					else:
						$default_sort = "titulo DESC ";
					endif;
					
				break;
				case "sort_popular":
					$default_sort = "mantener_arriba DESC";
				break;	
				default: $default_sort =  $keyname." DESC ";
			
			endswitch;
			
		endif;
		// por filtro
		if (@$filtro_busqueda["sort"]!= ""):
			switch ($filtro_busqueda["sort"]):
				case "top":
					$sql.=" ORDER BY mantener_arriba DESC , ".$default_sort; 
				break;
				case "a-z":
					$sql.=" ORDER BY titulo DESC , ".$default_sort; 
				break;
				case "z-a":
					$sql.=" ORDER BY titulo ASC , ".$default_sort; 
				break;
				case "orden":
					$sql.=" ORDER BY orden ASC "; 
				break;
			
			endswitch;
		else:
		if (@$default_sort != ""):
		$sql.=" ORDER BY ".$default_sort;
		endif;
		
		endif;
	//	print_r($filtro_busqueda);
		// echo $sql; 
		
	
		$q = $this->db->query($sql);
		$result = $q->result();


		// Start: Categorias filtro
		if (count($result)>0 && @intval(@$filtro_busqueda["catmax"])>0):
			$keyarray = 0;
			foreach ($result as $keya=>$row):
				if (@$row->max_nivel >0):
					$nivel_consulta = ($filtro_busqueda["catmax"]>$row->max_nivel) ? $row->max_nivel : $filtro_busqueda["catmax"];
					$sql = "SELECT COUNT(*) counter 
								FROM  ".$table."_categorias NC 
								INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
								INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo) 
								WHERE 1
								AND NC.".$keyname." = ".$this->db->escape($row->$keyname)."
								AND CT.nivel = ".$this->db->escape($nivel_consulta)."
							"; 
							$countcat = 0; $countcattotal = 0; 
					$sql.= "AND NC.id_categoria = ".$this->db->escape($filtro_busqueda["cat".$filtro_busqueda["catmax"]]); 						 
							
					if (@$this->db->query($sql)->row()->counter>0):
						
					else:
						//	unset($result[$keyarray]);	
						unset($result[$keya]);		
					
					endif;
				endif;
				$keyarray++;
			endforeach;
		endif;
		// End: Categorias filtro
		
		// Start: Categorias usuario
		$total_categorias_usuario =  count($usuarioPerfil->categorias);
		if (count($result)>0 && $total_categorias_usuario>0):
			$keyarray = 0;
			foreach ($result as $keyb=>$row):
				if (@$usuarioPerfil->max_nivel > 0 && @$row->max_nivel >0):
					$nivel_consulta = ($usuarioPerfil->max_nivel>$row->max_nivel) ? $row->max_nivel : $usuarioPerfil->max_nivel;
					$sql = "SELECT COUNT(*) counter 
								FROM  ".$table."_categorias NC 
								INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
								INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo) 
								WHERE 1
								AND NC.".$keyname." = ".$this->db->escape($row->$keyname)."
								AND CT.nivel = ".$this->db->escape($nivel_consulta)."
							"; 
							$countcat = 0; $countcattotal = 0; 
							foreach ($usuarioPerfil->categorias as $cat):
								if ($cat->nivel == $nivel_consulta ):
									$countcat++;
									if ($countcat==1) $sql.= " AND ("; 
									if ($countcat>1) $sql.=" OR ";
									$sql.= " NC.id_categoria = ".$this->db->escape($cat->id_categoria); 						 
								endif;
								$countcattotal++;
								if ($countcattotal == $total_categorias_usuario) $sql.=" ) "; 
							endforeach;
							
					if (@$this->db->query($sql)->row()->counter>0):
						
					else:
						//unset($result[$keyarray]);
						unset($result[$keyb]);		
					endif;
				endif;
				$keyarray++;
			endforeach;
		endif;
		// End: Categorias usuario
		
		
		return $result; 
	}
	
	
	
	public function get_secciones($id_categoria = '') {
		$sql = "SELECT S.*, T.nombre as template_nombre, T.codigo as template_codigo, string_to_url(S.nombre) url
				FROM secciones S 
				INNER JOIN templates T on (T.id_template = S.id_template)
				WHERE S.localizacion = ".$this->db->escape(localizacion())." ";
				
		if ($id_categoria != ""):
			$sql.= " AND S.id_categoria = ".$this->db->escape($id_categoria);
		endif;
		$sql.= " AND S.tipo = 'seccion'  ORDER BY S.orden ASC ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_subsecciones_by_seccion($id_seccion,$id_categoria) {
		$sql = "SELECT S.*, T.nombre as template_nombre, T.codigo as template_codigo
					FROM secciones S 
					INNER JOIN templates T on (T.id_template = S.id_template)		
					WHERE S.localizacion = ".$this->db->escape(localizacion())." 
					AND S.id_seccion_padre = ".$this->db->escape($id_seccion). " 
					AND S.id_categoria = ".$this->db->escape($id_categoria). " 
					AND S.tipo = 'subseccion' 
					ORDER BY S.orden ASC ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_secciones_padre_en_categoria($id_categoria) {		
		$sql = "SELECT S.id_seccion, S.nombre
					FROM secciones S
					INNER JOIN categorias C ON (C.id_categoria=S.id_categoria)
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo =C.id_categoria_tipo)
					WHERE 
					S.id_categoria = ".$this->db->escape($id_categoria)."
					AND S.id_seccion_padre = 0  
					AND CT.nivel = '1' 
                                        AND S.localizacion = '". localizacion(). //fix localizacion
                        "' ORDER BY S.orden ASC 
					";
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	public function get_tipos_contenidos_pop() {
		$sql = "SELECT DISTINCT TC.id_tipo_contenido, TC.nombre, TC.orden
					FROM `material_pop_tipos_contenidos` MTC
				INNER JOIN tipos_contenidos TC ON (TC.id_tipo_contenido = MTC.id_tipo_contenido)
                INNER JOIN material_pop MP ON (MP.id_material_pop=MTC.id_material_pop)
				WHERE TC.localizacion = '".localizacion()."'
				order by TC.orden ASC";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_modulos_utilizados($a_edit,$id_seccion,$id_template,$id_categoria) {	
		$array_modulos =  get_template("modulos");	
		$sql = "SELECT distinct id_template FROM secciones 
				WHERE localizacion = '".localizacion()."'	";
		$sql.="	AND ( ";
		$count = 0;
		foreach ($array_modulos as $id_template): $count++;
			if ($count>1) $sql.=" OR "; 
			$sql.="  id_template = ".$id_template." ";  
		endforeach;
		$sql.=")";
		if ($a_edit == "U" && $id_seccion != ""):
			$sql.=" AND id_seccion != ".intval($id_seccion)." "; 
		endif;
		if ($id_categoria != ""):
			$sql.= " AND id_categoria = ".intval($id_categoria)." "; 
		endif;
		$sql.=" AND estado = '1' "; 
		//   echo $sql; 
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
	
	public function get_seccion_campos($id_seccion) {
		$sql = "SELECT nombre FROM `secciones_campos` WHERE id_seccion = ".$this->db->escape($id_seccion);
		$q = $this->db->query($sql);
		$data = $q->result();
		$campos = array();
		if (count($data)>0){
			foreach ($data as $row):
				$campos[] = $row->nombre;
			endforeach;
		} 
		return $campos;
		
	}
	
	public function get_seccion_tipo_contenido($id_seccion) {
		$sql = "SELECT STC.*, TC.nombre as tipo_contenido_nombre
				FROM `secciones_agrupar_tipo_contenido` STC 
				INNER JOIN tipos_contenidos TC ON (TC.id_tipo_contenido=STC.id_tipo_contenido)
				WHERE STC.id_seccion  = ".$this->db->escape($id_seccion);
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_seccion_perfiles($id_seccion) {
		$sql = " SELECT * FROM `secciones_perfiles_usuarios` WHERE id_seccion = ".$this->db->escape($id_seccion);
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	
	public function get_seccion($id_seccion) {
		$sql = "SELECT S.*, T.codigo template_codigo, T.nombre template_nombre, 
						SS.nombre seccion_padre_nombre,  string_to_url(SS.nombre) url_padre, SS.id_seccion id_seccion_padre,
						string_to_url(S.nombre) url, string_to_url(SS.nombre) ss_url
				FROM secciones S 
				INNER JOIN templates T ON (T.id_template=S.id_template)
				LEFT JOIN secciones SS ON (SS.id_seccion=S.id_seccion_padre)
				WHERE S.id_seccion = ".$this->db->escape($id_seccion); 
				
		$q = $this->db->query($sql);
		return $q->row();
		
		
	}
	
	
	
	public function get_biblioteca_etiquetas($id_biblioteca) {
		$sql = "SELECT etiqueta FROM biblioteca_etiquetas WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_biblioteca_categorias_array($id_biblioteca) {
		$sql = "SELECT id_categoria FROM biblioteca_categorias WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		$q = $this->db->query($sql);
		$result = $q->result();
		$data = array(); 
		if (count($result)>0):
			foreach ($result as $row):
				$data[] = $row->id_categoria;
			endforeach;
		endif;
		return $data;
		
	}
	
	public function get_biblioteca_tipos_contenido_array($id_biblioteca) {
		
		$sql = "SELECT id_tipo_contenido FROM biblioteca_tipos_contenido WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		$q = $this->db->query($sql);
		$result = $q->result();
		$data = array(); 
		if (count($result)>0):
			foreach ($result as $row):
				$data[] = $row->id_tipo_contenido;
			endforeach;
		endif;
		return $data;
	}
	
	public function get_biblioteca_master($filter_array,$cat,$mode = "list",$limit = 20, $offset=0) {
		$sql = "SELECT * FROM biblioteca WHERE 1  ";
		
		// Tipos de archivos - extensiones
		if (@$filter_array["tipo_archivo"] != ""):
			$ext["archivos"] = explode("|","pdf|xls|xlsx|html|csv|xlsc"); 
			$ext["images"] = explode("|","gif|jpg|png|jpeg");
			$ext["images_videos"] = explode("|","gif|jpg|png|jpeg|mp4|mov");
			
			$count_opciones = count($ext[$filter_array["tipo_archivo"]]);
			if ($count_opciones>0):
				$countp = 0;
				$sql.= " AND ( ";
				foreach ($ext[$filter_array["tipo_archivo"]] as $ext):
					$countp++;
					if ($countp>1) $sql.= " or "; 
					$sql.= " archivo_extension = '.".$ext."'"; 				
				endforeach;
				$sql.= " ) ";
			endif;
		endif;
		
		
		// tag
		if (@$filter_array["nombre_tag"] != ""):
			$sql.=" AND ( nombre LIKE '%".$this->db->escape_like_str($filter_array["nombre_tag"])."%' ";
			$sql.= " OR id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_etiquetas WHERE etiqueta = ".$this->db->escape($filter_array["nombre_tag"])." ))";
		endif;
		
		if (@$filter_array["tipo_contenido"] != ""):
			$sql.=" AND id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_tipos_contenido WHERE id_tipo_contenido = ".$this->db->escape($filter_array["tipo_contenido"])." )";
		endif;
		
		if (@$filter_array["fechas"] != ""):
			$array_fecha = explode(" - ",$filter_array["fechas"]);
			$desde = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[0]);
			$hasta = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[1]);
			$sql.=" AND fecha_subida >= ".$this->db->escape($desde." 00:00:00");
			$sql.=" AND fecha_subida <= ".$this->db->escape($hasta." 23:59:59");
		endif;
		
		foreach ($cat as $value=>$display):
			if (@$filter_array["cat_".$display["nivel"]] != ""):
				$sql.=  " AND id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_categorias WHERE id_categoria = ".$this->db->escape($filter_array["cat_".$display["nivel"]]).")"; 
			endif;
		endforeach;	
		
		$sql.=" ORDER BY fecha_subida DESC ";
		
		if ($mode == "list"):
			$sql.= " LIMIT ".intval($offset).",".intval($limit); 
		endif;
		//echo $sql;
		$q = $this->db->query($sql);
		
		
		
		if ($mode == "list"):
			return $q->result(); 
		elseif ($mode == "num_rows"):
			return $q->num_rows();
		endif;
	}
	
	public function get_biblioteca_from_template($tipos_contenido = '',$usuarioPerfil,$filtro_busqueda = "",$seccion="") {
		$tccount=0;
		$sql = " SELECT *, biblioteca.id_biblioteca, (SELECT max(CT.nivel)  FROM biblioteca_categorias NC 
					INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
					INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
					WHERE NC.id_biblioteca = biblioteca.id_biblioteca 
					) max_nivel	 FROM `biblioteca` WHERE estado = '1' ";
		if ($tipos_contenido != "" && count($tipos_contenido)>0):
			$sql.=" AND id_biblioteca in (SELECT id_biblioteca FROM biblioteca_tipos_contenido WHERE  (";
			foreach ($tipos_contenido as $tc): if (intval($tccount)>0) $sql.=" OR";
				$sql.= "  id_tipo_contenido = ".$this->db->escape($tc->id_tipo_contenido); 
				$tccount++;
			endforeach; 
			$sql.=") )";
		else:
			$sql.=" AND id_biblioteca=0 "; // devuelve vacio si no tiene contenido
		endif;
		
		if (@$filtro_busqueda["txt"] != ""):
			$sql.= " AND ((biblioteca.nombre LIKE '%".$this->db->escape_like_str($filtro_busqueda["txt"])."%') OR biblioteca.id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_etiquetas WHERE etiqueta LIKE '%".$this->db->escape_like_str($filtro_busqueda["txt"])."%'))"; 
		endif;
		
		// Filtro tipos de archivo
		$tipos_archivos = @explode("|",@$filtro_busqueda["tipos_archivos"]);
		if (@count($tipos_archivos)>0 && @$filtro_busqueda["tipos_archivos"] != ""):
			$sql.=" AND ( "; 
			$countta = 0;
			foreach ($tipos_archivos as $tipo):
				if ($tipo != ""):
					$countta++;
					if ($countta>1) $sql.=" OR ";
					$sql.= " archivo_extension = '.".$tipo."' "; 
				endif;
			endforeach;		
			$sql.=" ) "; 
		endif;
		
		
		if (@$filtro_busqueda["fechas"] != ""):
			$array_fecha = explode(" - ",$filtro_busqueda["fechas"]);
			$desde = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[0]);
			$hasta = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[1]);
			$sql.=" AND fecha_subida >= ".$this->db->escape($desde." 00:00:00");
			$sql.=" AND fecha_subida <= ".$this->db->escape($hasta." 23:59:59");
		endif;
		
		 
		// Fecha_programacion
		$today = date("Y-m-d");
		$sql.= " AND (programar_desde = '0000-00-00' OR programar_desde <= ".$this->db->escape($today).") "; 
		$sql.= " AND (programar_hasta = '0000-00-00' OR programar_hasta >= ".$this->db->escape($today).") "; 
		
		
		// Orden order sort 
		$sql.=" order by mantener_arriba DESC ";
		switch($seccion->orden_de_contenido):
			case "sort_desc":
				$sql.=",  fecha_subida DESC ";
			break;
			
			case "sort_asc":
				$sql.=",  fecha_subida ASC ";
			break;
			case "sort_alpha":
				if (@$seccion->orden_alfabetico_criterio == "A-Z"):
					$sql.=",  nombre ASC ";
				else:
					$sql.=",  nombre DESC ";
				endif;
			break;
		endswitch;
		
		
		//	echo $sql;
		$q = $this->db->query($sql);
		$result =  $q->result(); 
		
		
		$table = "biblioteca";
		$keyname = "id_biblioteca"; 
		
		// Start: Categorias filtro
		if (count($result)>0 && $filtro_busqueda["catmax"]>0):
			$keyarray = 0;
			
			foreach ($result as $keya=>$row):
				if (@$row->max_nivel >0):
					$nivel_consulta = ($filtro_busqueda["catmax"]>$row->max_nivel) ? $row->max_nivel : $filtro_busqueda["catmax"];
					$sql = "SELECT COUNT(*) counter 
								FROM  ".$table."_categorias NC 
								INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
								INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo) 
								WHERE 1
								AND NC.".$keyname." = ".$this->db->escape($row->$keyname)."
								AND CT.nivel = ".$this->db->escape($nivel_consulta)."
							"; 
							$countcat = 0; $countcattotal = 0; 
					$sql.= "AND NC.id_categoria = ".$this->db->escape($filtro_busqueda["cat".$nivel_consulta]); 						 					
					// echo $sql; 
					
					if (@$this->db->query($sql)->row()->counter>0):
						
					else:
					//	unset($result[$keyarray]);	
						unset($result[$keya]);		
					endif;
				endif;
				$keyarray++;
			endforeach;
		endif;
		// End: Categorias filtro
		
	
		// Start: Categorias usuario
		$total_categorias_usuario =  count($usuarioPerfil->categorias);
		
		
		if (count($result)>0 && $total_categorias_usuario>0):
			$keyarray = 0;
			
			foreach ($result as $keyone=>$row):
			
				if (@$usuarioPerfil->max_nivel > 0 && @$row->max_nivel >0):
			//	echo "SI".$usuarioPerfil->max_nivel."-".@$row->max_nivel;
					$nivel_consulta = ($usuarioPerfil->max_nivel>$row->max_nivel) ? $row->max_nivel : $usuarioPerfil->max_nivel;
					$sql = "SELECT COUNT(*) counter 
								FROM  ".$table."_categorias NC 
								INNER JOIN categorias C ON (C.id_categoria=NC.id_categoria)  
								INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo) 
								WHERE 1
								AND NC.".$keyname." = ".$this->db->escape($row->$keyname)."
								AND CT.nivel = ".$this->db->escape($nivel_consulta)."
							"; 
							$openflag =0;
							$countcat = 0; $countcattotal = 0; 
							foreach ($usuarioPerfil->categorias as $cat):
								if ($cat->nivel == $nivel_consulta ):
									$countcat++;
									if ($countcat==1): $sql.= " AND ("; $openflag = 1; endif; 
									if ($countcat>1) $sql.=" OR ";
									$sql.= " NC.id_categoria = ".$this->db->escape($cat->id_categoria); 						 
								endif;
								
								$countcattotal++;
								if ($countcattotal == $total_categorias_usuario && $openflag == 1 ): $sql.=" ) "; $openflag = 0; endif; 
							endforeach;
				
					if (@$this->db->query($sql)->row()->counter>0):
					
					else:
				//	echo "UNSET:"; print_r($result[$keyarray]);
						
						//unset($result[$keyarray]);
						unset($result[$keyone]);		
					endif;
				endif;
				$keyarray++;
			endforeach;
		endif;
		// End: Categorias usuario
		
		if ($result): 
		
			foreach ($result as $key=>$value): 
				//echo "final:.";print_r($value);
				$result[$key]->tipos_contenidos = $this->get_tipos_contenidos_from_biblioteca($value->id_biblioteca);
			endforeach;
		endif;
		
		return $result;
		
	}
	
	public function biblioteca_quitar_vigencia($id_biblioteca) {
		$sql = "UPDATE biblioteca SET vigencia_hasta = DATE_ADD(CURDATE(), INTERVAL -1 DAY) WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		//die($sql);
		$q = $this->db->query($sql);
		return $q; 
		
	}
	
	public function biblioteca_enviar_arriba($id_biblioteca) {
		$sql = "UPDATE biblioteca SET mantener_arriba = '1' WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		$q = $this->db->query($sql);
		return $q; 
		
	}
	public function biblioteca_eliminar($id_biblioteca) {
		$sql = "DELETE FROM biblioteca WHERE id_biblioteca = ".$this->db->escape($id_biblioteca); 
		$contador["Evento"] = $this->get_registros_asociados_biblioteca("eventos","imagen_principal",$id_biblioteca);
		$contador["Evento -> Documentos"]	= $this->get_registros_asociados_biblioteca("eventos_documentos","id_biblioteca",$id_biblioteca);
		$contador["Evento -> Imágenes"] = $this->get_registros_asociados_biblioteca("eventos_imagenes","id_biblioteca",$id_biblioteca);
		$contador["Programa de incentivo"] = $this->get_registros_asociados_biblioteca("incentivos","imagen_principal",$id_biblioteca);
		$contador["Programa de incentivo -> Documento"] = $this->get_registros_asociados_biblioteca("incentivos_documentos","id_biblioteca",$id_biblioteca);
		$contador["Programa de incentivo -> Documento de ganadores"] = $this->get_registros_asociados_biblioteca("incentivos_documentos_ganadores","id_biblioteca",$id_biblioteca);
		$contador["Programa de incentivo -> Imágenes"] = $this->get_registros_asociados_biblioteca("incentivos_imagenes","id_biblioteca",$id_biblioteca);
		$contador["Novedades"] = $this->get_registros_asociados_biblioteca("novedades","imagen_principal",$id_biblioteca);
		$contador["Novedades -> Archivos"] = $this->get_registros_asociados_biblioteca("novedades_archivos","id_biblioteca",$id_biblioteca);
		
		$contador["Novedades -> Imágenes"] = $this->get_registros_asociados_biblioteca("novedades_imagenes","id_biblioteca",$id_biblioteca);
		$contador["Slider Home"] = $this->get_registros_asociados_biblioteca("slider_home","imagen_principal",$id_biblioteca);
		
		$contador["Logo principal"] = $this->get_registros_asociados_biblioteca("localizaciones","logo",$id_biblioteca);
		
		
		if (intval(array_sum($contador))==0):
			$q = $this->db->query($sql);	
		endif;
		
		return $contador;
		
	}
	
	public function get_registros_asociados_biblioteca($tabla,$keyname,$id_biblioteca) {
		$sql = "SELECT COUNT(*) total FROM ".$tabla." WHERE ".$keyname." = ".$id_biblioteca ;
		
		$q = $this->db->query($sql);
		return $q->row()->total; 
		
	}

	
	public function get_categorias_sub($id_categoria,$nivel='') {
		$sql = "SELECT CAT.* FROM categorias_sub CATSUB
				INNER JOIN categorias CAT ON(CAT.id_categoria=CATSUB.id_categoria_sub)
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE CATSUB.id_categoria = ".$this->db->escape($id_categoria)."";
	
		
		if ($nivel!="") $sql.="	AND CT.nivel = ".$this->db->escape($nivel+1)."";
		
			//	echo $sql;
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_categorias_relacionadas($id_categoria,$nivel='') {
		$sql = "SELECT CAT.*, CT.* FROM categorias_sub CATSUB
				INNER JOIN categorias CAT ON(CAT.id_categoria=CATSUB.id_categoria_sub)
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE CATSUB.id_categoria = ".$this->db->escape($id_categoria)."";
	
		
		if ($nivel!="") $sql.="	AND CT.nivel != ".$this->db->escape($nivel+1)."";
		
			//	echo $sql;
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_categorias_padre_asociadas($id_categoria,$nivel='') {
		$sql = "SELECT C.*, CT.*
				FROM `categorias_sub` CS
				INNER JOIN categorias C ON (CS.id_categoria = C.id_categoria)
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
				WHERE `id_categoria_sub` = ".$this->db->escape($id_categoria)."";
			//	echo $sql;
		$q = $this->db->query($sql);
		$data = $q->result();
		$array = array();
		if (count($data)>0): 
			foreach ($data as $row):
				//	$array[] = $row->id_categoria; // antes para realizar in_array
					$array[] = $row;
			endforeach;
		endif;
		return $array;
		
	}
	
	public function get_categoria_tipo_nombre($id_categoria_tipo) {
		$sql = "SELECT descripcion FROM `categorias_tipo` WHERE id_categoria_tipo = ".$this->db->escape($id_categoria_tipo); 
		$q = $this->db->query($sql);
		return $q->row()->descripcion;
		
	}
	
	public function get_categoria_tipo($id_categoria_tipo) {
		$sql = "SELECT * FROM `categorias_tipo` WHERE id_categoria_tipo = ".$this->db->escape($id_categoria_tipo); 
		$q = $this->db->query($sql);
		return $q->row();
		
	}
	
	public function get_categoria_tipo_by_nivel($nivel) {
		$sql = "SELECT * FROM `categorias_tipo` WHERE localizacion = '".localizacion()."' AND nivel = ".$this->db->escape($nivel); 
		$q = $this->db->query($sql);
		return $q->row();
		
	}
	
	
	
	public function get_categorias_padre_disponibles($id_categoria='',$nivel='') {
            if($nivel==""):
                $nivel=0;
            endif;
		$sql = "SELECT C.* FROM categorias C
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
                WHERE CT.nivel < ".$nivel." ";
		if ($id_categoria != ""):
			$sql.=" AND C.id_categoria != ".$this->db->escape($id_categoria)."";
		endif;
			//	echo $sql;
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_categorias_padre_disponibles_por_tipo($id_categoria,$nivel='') {
		$sql = "SELECT C.* FROM categorias C
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=C.id_categoria_tipo)
                WHERE CT.nivel < ".$nivel." 
				AND C.id_categoria != ".$this->db->escape($id_categoria)."";
			//	echo $sql;
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_categoria($id_categoria) {
		$sql = "SELECT CAT.*, CT.* FROM categorias CAT
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE CAT.id_categoria = ".$this->db->escape($id_categoria); 
		$q = $this->db->query($sql);
		return $q->row(); 
	}
	
	public function get_id_categoria_principal() {
		$sql = "SELECT CAT.id_categoria id_categoria FROM categorias CAT
				INNER JOIN categorias_tipo CT ON (CT.id_categoria_tipo=CAT.id_categoria_tipo)
				WHERE CAT.localizacion  = ".$this->db->escape(localizacion())."
				AND CT.nivel = 1
				ORDER BY CAT.orden ASC
				LIMIT 1
				 ";
		//	 echo $sql;
		$q = $this->db->query($sql);
		return @$q->row()->id_categoria; 
	}
	
	public function get_perfiles() {
		$sql = "SELECT * FROM perfiles WHERE localizacion  = ".$this->db->escape(localizacion())."";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	public function get_distribuidores() {
		$sql = "SELECT D.*, ZG1.nombre zg1, ZG2.nombre zg2, ZG3.nombre zg3
					FROM `distribuidores` D
					LEFT JOIN zonas_geograficas ZG1 ON (ZG1.id_zona_geografica = D.id_zona_geografica1) 
					LEFT JOIN zonas_geograficas ZG2 ON (ZG2.id_zona_geografica = D.id_zona_geografica2) 
					LEFT JOIN zonas_geograficas ZG3 ON (ZG3.id_zona_geografica = D.id_zona_geografica3) 
					WHERE D.localizacion = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	public function get_usuarios() {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre FROM usuarios U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)		
				WHERE U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function aprobar_distribuidor_usuario($modo,$id_distribuidor_usuario,$comentarios='') {
		
		if ($modo == "aprobar"): 
			$tabla1 = "distribuidores_usuarios_tmp"; $tabla2 = "distribuidores_usuarios";
		else:					
			$tabla1 = "distribuidores_usuarios";	  $tabla2 = "distribuidores_usuarios_tmp";	
		endif;

		$sql = "SELECT * FROM ".$tabla1." WHERE id_distribuidor_usuario = ".$this->db->escape($id_distribuidor_usuario); 
		$q = $this->db->query($sql);
		$tmp = $q->row();
		
		$campos = array("nombre","celular","telefono","direccion","id_perfil_usuario","genero","fecha_nacimiento","acceso_epedidos","email","password");
		$sqlu = "UPDATE ".$tabla2." SET ";
		$count=0; 
		foreach ($campos as $campo):
			if ($count>0) $sqlu.= " , ";
			$sqlu.=" $campo = ".$this->db->escape($tmp->$campo); 
			$count++;
		endforeach;
		if ($modo == "aprobar"):
			$sqlu.="  , estado = '1'  ";
		endif;
		$sqlu.= "  WHERE  id_distribuidor_usuario = ".$this->db->escape($id_distribuidor_usuario); 
		$this->db->query($sqlu);
		
		// acá se debe enviar email solo a los usuarios 
		
		
	}
	
	public function get_admin_colaboradores_by_id_distribuidor($id_distribuidor) {
		$sql = "SELECT DU.* FROM distribuidores_usuarios DU 
					INNER JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario=DU.id_perfil_usuario)
					WHERE 1 
					AND DU.id_distribuidor = ".$this->db->escape($id_distribuidor)."
					AND PU.crear_usuarios = '1' "; 
		$q = $this->db->query($sql);
		return $q->result(); 		
	}
	
	
	
	public function get_distribuidores_usuarios_distintos() {
		
		// obtengo los id que son diferentes
		$sql = "SELECT id_distribuidor_usuario	FROM
					(
					SELECT dut.id_distribuidor_usuario, dut.localizacion, dut.nombre, dut.celular, dut.telefono, dut.direccion, dut.id_perfil_usuario, dut.genero, dut.fecha_nacimiento,  dut.acceso_epedidos, dut.email
					FROM distribuidores_usuarios_tmp dut
					INNER JOIN distribuidores ON (distribuidores.id_distribuidor=dut.id_distribuidor)
					UNION ALL
					
					SELECT du.id_distribuidor_usuario, du.localizacion, du.nombre, du.celular, du.telefono, du.direccion, du.id_perfil_usuario, du.genero, du.fecha_nacimiento, du.acceso_epedidos, du.email
					FROM distribuidores_usuarios du
					INNER JOIN distribuidores ON (distribuidores.id_distribuidor=du.id_distribuidor)
					)  t
					WHERE localizacion = ".$this->db->escape(localizacion())."
					GROUP BY  id_distribuidor_usuario, nombre, celular, telefono, direccion, id_perfil_usuario, genero, acceso_epedidos, email
					HAVING count(*) = 1
					ORDER BY nombre";	
		$q = $this->db->query($sql);
		$data = $q->result(); 
		
		$distintos = array();
		if (count($data)>0):
			foreach ($data as $row):
				if (!in_array($row->id_distribuidor_usuario,$distintos)):
					$distintos[] = $row->id_distribuidor_usuario;
				endif;
			endforeach;
		endif;
		return $distintos;
		
	}
	
	public function get_distribuidores_usuarios_by_id_distribuidor_usuario($id_distribuidor_usuario) {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre, D.nombre distribuidor_nombre FROM distribuidores_usuarios U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)	
				INNER JOIN distribuidores D ON (D.id_distribuidor=U.id_distribuidor)	
				WHERE U.id_distribuidor_usuario = ".$this->db->escape($id_distribuidor_usuario)." 
				AND U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->row(); 
		
	}
	
	public function get_distribuidores_usuarios_tmp_by_id_distribuidor_usuario($id_distribuidor_usuario) {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre, D.nombre distribuidor_nombre FROM distribuidores_usuarios_tmp U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)	
				INNER JOIN distribuidores D ON (D.id_distribuidor=U.id_distribuidor)	
				WHERE U.id_distribuidor_usuario = ".$this->db->escape($id_distribuidor_usuario)." 
				AND U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->row(); 
		
	}
	
	
	
	public function get_distribuidores_usuarios() {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre, D.nombre distribuidor_nombre FROM distribuidores_usuarios U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)	
				INNER JOIN distribuidores D ON (D.id_distribuidor=U.id_distribuidor)	
				WHERE U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_distribuidores_usuarios_by_id_distribuidor($id_distribuidor) {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre, D.nombre distribuidor_nombre FROM distribuidores_usuarios U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)	
				INNER JOIN distribuidores D ON (D.id_distribuidor=U.id_distribuidor)	
				WHERE D.id_distribuidor = ".$this->db->escape($id_distribuidor)." 
				AND U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_distribuidores_usuarios_tmp_by_id_distribuidor($id_distribuidor) {
		$sql = "SELECT U.*, PU.nombre as perfil_nombre, D.nombre distribuidor_nombre FROM distribuidores_usuarios_tmp U
				LEFT JOIN perfiles_usuarios PU ON (PU.id_perfil_usuario = U.id_perfil_usuario)	
				INNER JOIN distribuidores D ON (D.id_distribuidor=U.id_distribuidor)	
				WHERE D.id_distribuidor = ".$this->db->escape($id_distribuidor)." 
				AND U.localizacion  = ".$this->db->escape(localizacion())." ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_zonas() {
		$sql = "SELECT * FROM zonas_geograficas WHERE localizacion  = ".$this->db->escape(localizacion())." AND id_padre = 0";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_templates() {
		$sql = "SELECT * FROM templates";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	

	
	public function get_tipos_contenidos_from_biblioteca($id_biblioteca) {		
		$sql = "SELECT TC.* 
				FROM biblioteca_tipos_contenido BTC
				INNER JOIN tipos_contenidos TC ON (TC.id_tipo_contenido=BTC.id_tipo_contenido)
				WHERE BTC.id_biblioteca = ".$this->db->escape($id_biblioteca)."
				ORDER BY TC.orden ASC";
				
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
		
	
	
}