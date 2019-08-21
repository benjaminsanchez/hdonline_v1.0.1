<?php if (count($seccion->data)>0): ?>
<?php foreach ($seccion->data as $archivo): 
	$vigente = checkVigencia($archivo->vigencia_desde,$archivo->vigencia_hasta);
?><!-- start item -->
              <div class="item-bd row">
                <div class="col-xs-7">  <?php  if ($vigente): ?><span class="label label-sm label-default label-box "> Vigente </span><?php endif; ?>
                  <p class="bold"><?php echo $archivo->nombre; ?></p>
                  <p> Publicado el  <?php echo fecha($archivo->fecha_subida); ?>  </p>
                </div>
                <div class="col-xs-2">  <?php echo  strtoupper(substr($archivo->archivo_extension,1,strlen($archivo->archivo_extension))); ?> </div>
                <div class="col-xs-2">  <?php echo $archivo->archivo_peso; ?>Kb </div>
                <div class="col-xs-1"><a href="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $archivo->archivo_nombre; ?>" download="<?php echo $archivo->archivo_nombre; ?>"><i class="fa fa-download"></i></a> </div>
              </div>
              
              <!-- end item --> 
<?php endforeach; ?>
<?php endif; ?>
