<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body-noborder evento" ><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/780x540-1/biblioteca/<?php echo @$alerta->evento_imagen; ?>" width="780" height="419">
  <div class="content-evento font-white">
    <span class="badge badge-roundless bg-blue-oleo"> Evento </span><br><h3><?php echo $alerta->evento_titulo; ?></h3>
    <h4><i class="fa fa-map-marker"></i> <?php echo $alerta->evento_ubicacion; ?></h4>
    <h4><i class="fa fa-user"></i> (<?php echo intval($alerta->evento_cantidad_sesiones_presenciales+$alerta->evento_cantidad_sesiones_online); ?>) Sesiones: <?php echo ($alerta->evento_cantidad_sesiones_presenciales>0)?"Presencial/":""; ?> <?php echo ($alerta->evento_cantidad_sesiones_online>0)?"Online":""; ?> <i class="fa fa-tags"></i> <?php echo ($alerta->evento_costo>0)?currency($alerta->evento_costo):"Gratuito"; ?></h4>
    <?php if ($alerta->texto_boton != ""): ?>
    <?php $url_btn = ($alerta->tipo_enlace == "externo")? $alerta->enlace_personalizado : base_url()."seccion/".$alerta->id_seccion."/".$alerta->url_seccion; ?>
    <a class="btn btn blue" href="<?php echo $url_btn; ?>"> <?php echo $alerta->texto_boton; ?></a>
    <?php endif; ?>
  </div>
</div>
