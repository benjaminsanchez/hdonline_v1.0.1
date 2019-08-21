<?php
if ( ! defined('BASEPATH') )
    exit( 'No direct script access allowed' );


// SEO Tags
if (@$seccion == "") $seccion = "home";

$this->data['metas'] = $this->Global_model->get_tags_seccion($seccion,$this->data);

switch ($seccion):
	case "novedades_detalle": 
		$this->data['metas']->title = $this->data['novedad']->titulo; 
		$this->data['metas']->description = @$this->data['metas']->description . " " .  $this->data['novedad']->texto_breve; 
	break;
	case "galeria_detalle":	 
		$this->data['metas']->title = @$this->data['metas']->title . " ". $this->data['producto']->title; 
		$this->data['metas']->description = $this->data['metas']->description . " " .  $this->data['producto']->description; 
		$this->data['metas']->imagen = base_url().'img/cl/galerias_imagenes/600x400-2/'.$this->data['imagen']->imagen;
	break;
	case "productos_detalle":
		$this->data['metas']->title = @$this->data['metas']->title . " ". $this->data['producto']->title; 
		$this->data['metas']->description = $this->data['metas']->description . " " .  $this->data['producto']->description; 
		$this->data['metas']->imagen =  base_url().'img/cl/productos_imagenes/600x400-2/'.@$this->data['imagenes'][0]->imagen;
	break;
	case "generica": // agregar title y description personalizado 
		$this->data['metas']->title = $this->data['pagina']->title; 
		$this->data['metas']->description = $this->data['pagina']->description;
	break;
endswitch;

// End SEO Tags

?>