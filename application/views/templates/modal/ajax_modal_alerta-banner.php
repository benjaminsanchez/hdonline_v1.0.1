<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
</div>
<div class="modal-body-noborder"><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/780x540-1/biblioteca/<?php echo @$alerta->archivo_nombre; ?>" width="780" height="540">
<?php if ($alerta->texto_boton != ""): ?>
<?php $url_btn = ($alerta->tipo_enlace == "externo")? $alerta->enlace_personalizado : base_url()."seccion/".$alerta->id_seccion."/".$alerta->url_seccion; ?>
<div class="btn-center-banner">
<a class="btn btn blue" href="<?php echo $url_btn; ?>"> <?php echo $alerta->texto_boton; ?></a>
</div>
<?php endif; ?> 
</div>
