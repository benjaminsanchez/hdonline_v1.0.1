
  <h5 class="bold">PRÓXIMOS</h5>
  <?php if (count($seccion->data)>0): ?>
  <?php foreach ($seccion->data as $evento): ?>
  <!-- start item -->
  <div class="item-bd row">
  <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $evento->id_evento; ?>/<?php echo $evento->url_titulo; ?>">
    <div class="col-xs-2 date-event"> <span><?php echo substr($evento->vigencia_desde,8,2); ?></span><br>
      <?php echo mes_nombre(substr($evento->vigencia_desde,5,2)); ?> </div>
    <div class="col-xs-10">
      <p class="bold"><?php echo $evento->titulo; ?></p>
      <p><?php echo $evento->texto_resumen; ?></p>
    </div>
  </a>
  </div>
  
  <!-- end item --> 
  <?php
	endforeach;
	?>
  <?php else: ?>
  <h5 class="">No hay eventos próximos</h5>
  <?php endif; ?>
