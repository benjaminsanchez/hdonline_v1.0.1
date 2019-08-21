<?php if (count($seccion->data)>0): ?>
<?php foreach ($seccion->data as $item): ?>
<!-- start item -->
<div class="item-be" style="background:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/830x400-1/biblioteca/<?php echo $item->archivo_nombre; ?>');">
  <div class="content-be">
    <div class="text-be">
      <div class="blog-title"><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $item->id_evento; ?>/<?php echo $item->url_titulo; ?>" class="font-white"> <span class="badge badge-roundless bg-blue-oleo"> Evento </span>
        <h3 class="blog-banner-title"><?php echo $item->titulo; ?></h3>
        <h4 class="blog-address"><i class="icon-pointer"></i> <?php echo $item->evento_ubicacion; ?></h4>
        <h4 class="blog-date"><i class="fa fa-calendar-check-o"></i> <?php echo fecha( $item->evento_fecha); ?> <span aria-hidden="true" class="icon-clock"></span> <?php echo hora($item->evento_hora); ?> hrs</h4>
        </a> </div>
    </div>
  </div>
</div>
<!-- end item --> 
<?php endforeach; ?>
<?php endif; ?>