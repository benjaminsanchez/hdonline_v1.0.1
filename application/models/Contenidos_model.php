<?php
class Contenidos_model extends CI_Model {
	
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
	
	public function get_novedades() {
		$sql = "SELECT novedades.*, biblioteca.archivo_nombre  FROM novedades 
				LEFT JOIN biblioteca ON (biblioteca.id_biblioteca=novedades.imagen_principal)
				ORDER BY id_novedad DESC ";
		$q = $this->db->query($sql);
		return $q->result(); 
	}
	
	
	
	public function get_secciones($id_categoria = '') {
		$sql = "SELECT S.*, T.nombre as template_nombre, T.codigo as template_codigo
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
	
	public function get_subsecciones_by_seccion($id_seccion) {
		$sql = "SELECT S.*, T.nombre as template_nombre, T.codigo as template_codigo
					FROM secciones S 
					INNER JOIN templates T on (T.id_template = S.id_template)		
					WHERE S.localizacion = ".$this->db->escape(localizacion())." 
					AND S.id_seccion_padre = ".$this->db->escape($id_seccion). " 
					AND S.tipo = 'subseccion' 
					ORDER BY S.orden ASC ";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	
	public function get_seccion_campos($id_seccion) {
		$sql = "SELECT nombre FROM `secciones_campos` WHERE id_seccion = ".$this->db->escape($id_seccion);
		$q = $this->db->query($sql);
		return $q->result(); 
		
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
	
	public function get_biblioteca_from_template($tipos_contenido = '') {
		$tccount=0;
		$sql = " SELECT * FROM `biblioteca` WHERE estado = '1' ";
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
		 
		// ojo con fecha_programacion, perfiles,
		$sql.=" order by mantener_arriba DESC";
		// Ojo con ordenar por...
		
		// echo $sql;
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_seccion($id_seccion) {
		$sql = "SELECT S.*, T.codigo template_codigo, T.nombre template_nombre, SS.nombre seccion_padre_nombre
				FROM secciones S 
				INNER JOIN templates T ON (T.id_template=S.id_template)
				LEFT JOIN secciones SS ON (SS.id_seccion=S.id_seccion_padre)
				WHERE S.id_seccion = ".$this->db->escape($id_seccion); 
		$q = $this->db->query($sql);
		return $q->row();
		
		
	}
	
	public function get_biblioteca_master($filter_array,$cat) {
		$sql = "SELECT * FROM biblioteca WHERE 1  ";
		
		if (@$filter_array["nombre_tag"] != ""):
			$sql.=" AND ( nombre = ".$this->db->escape($filter_array["nombre_tag"]);
			$sql.= " OR id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_etiquetas WHERE etiqueta = ".$this->db->escape($filter_array["nombre_tag"])." ))";
		endif;
		
		if (@$filter_array["tipo_contenido"] != ""):
			$sql.=" AND id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_tipos_contenido WHERE id_tipo_contenido = ".$this->db->escape($filter_array["tipo_contenido"])." )";
		endif;
		
		if (@$filter_array["fechas"] != ""):
			$array_fecha = explode(" - ",$filter_array["fechas"]);
			$desde = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[0]);
			$hasta = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$2-$1',$array_fecha[1]);
			$sql.=" AND fecha_modificacion >= ".$this->db->escape($desde);
			$sql.=" AND fecha_modificacion <= ".$this->db->escape($hasta);
		endif;
		
		foreach ($cat as $value=>$display):
			if (@$filter_array["cat_".$display["nivel"]] != ""):
				$sql.=  " AND id_biblioteca IN (SELECT id_biblioteca FROM biblioteca_categorias WHERE id_categoria = ".$this->db->escape($filter_array["cat_".$display["nivel"]]).")"; 
			endif;
		endforeach;	
		
		$sql.=" ORDER BY fecha_subida DESC ";
		
		// echo $sql;
		
		$q = $this->db->query($sql);
		return $q->result(); 
		
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
		// OJO SE DEBE ELIMINAAR TODO LO RELACIONADO
		$q = $this->db->query($sql);
		return $q; 
		
	}
	
	public function get_categorias_sub($id_categoria) {
		$sql = "SELECT CAT.* FROM categorias_sub CATSUB
				INNER JOIN categorias CAT ON(CAT.id_categoria=CATSUB.id_categoria_sub)
				WHERE CATSUB.id_categoria = ".$this->db->escape($id_categoria)."
				";
		$q = $this->db->query($sql);
		return $q->result(); 
		
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
	
	public function get_templates() {
		$sql = "SELECT * FROM templates";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
	public function get_tipos_contenidos() {
		$sql = "SELECT * FROM tipos_contenidos order by nombre ASC";
		$q = $this->db->query($sql);
		return $q->result(); 
		
	}
	
}