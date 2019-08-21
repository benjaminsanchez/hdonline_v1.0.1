<div class="modal-body libre" >
<div class="img-libre"><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/250x0-1/biblioteca/<?php echo @$alerta->archivo_nombre; ?>" width="250"></div>
  <div class="content-libre">
   <h3 class="text-bold bold bolder"><?php echo $alerta->titulo; ?></h3>
    <?php echo $alerta->texto; ?>
    
    
    
    <?php if ($alerta->texto_boton != ""): ?>
    <?php $url_btn = ($alerta->tipo_enlace == "externo")? $alerta->enlace_personalizado : base_url()."seccion/".$alerta->id_seccion."/".$alerta->url_seccion; ?>
    <a class="btn btn blue btn-alerta-obligatorio" href="<?php echo $url_btn; ?>"> <?php echo $alerta->texto_boton; ?></a>
    <?php endif; ?>
  </div>
</div>
 