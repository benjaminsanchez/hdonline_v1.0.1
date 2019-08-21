<?php if (count($seccion->data)>0): ?>
<?php foreach ($seccion->data as $pop): ?>
<!-- start item -->

<div class="mt-action item-bn">
  <div class="bn-action-img"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/120x80-2/biblioteca/<?php echo $pop->archivo_nombre; ?>" /> </div>
  <div class="mt-action-body">
    <div class="caption"> <span class="label label-sm label-default label-box "><?php echo $pop->etiqueta; ?> </span>
      <div>
        <?php if ( $pop->titulo != ""): ?>
        <span class="text-uppercase font-bold"><strong><?php echo $pop->titulo; ?></strong></span>
        <?php endif; ?>
        <div class="txt-costo font-blue">Precio Lista: <?php echo ($pop->costo_distribuidor); ?> </div>
      </div >
    </div>
  </div>
</div>
<!-- end item -->
<?php endforeach; ?>
<?php endif; ?>
