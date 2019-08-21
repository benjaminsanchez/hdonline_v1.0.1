<?php if (count($seccion->data)>0): ?>
<?php foreach ($seccion->data as $nov): ?>
<!-- start item -->

<div class="mt-action item-bn"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $nov->id_novedad; ?>/<?php echo $nov->url_titulo; ?>">
  <div class="bn-action-img"> <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/120x80-1/biblioteca/<?php echo $nov->archivo_nombre; ?>" /> </div>
  <div class="mt-action-body">
    <p class="mt-action-desc font-blue-sharp font-lg font-bold"><?php echo $nov->titulo; ?></p>
    <p><?php echo fecha($nov->fecha_publicacion); ?></p>
  </div>
  </a> </div>
<!-- end item --> 
<?php endforeach; ?>
<?php endif; ?>
