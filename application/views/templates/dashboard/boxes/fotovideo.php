<?php
$arr_video = explode("|",$ext_video); 
if (count($seccion->data["tipos_contenidos"])>0): 
	foreach ($seccion->data["tipos_contenidos"] as $tc): 
		$counttipo = count(@$seccion->data[$tc->id_tipo_contenido]);
		if ($counttipo>0): ?>

<!-- start item -->

<div class="item-bp row">
  <h5 class="font-blue bold"><?php echo ($tc->tipo_contenido_nombre); ?></h5>
  <?php $count=0; foreach ($seccion->data[$tc->id_tipo_contenido] as $bib): $count++; ?>
  <div class="col-md-4">
    <div class="mt-widget-4"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>">
      <div class="mt-img-container">
        <?php if (in_array(substr($bib->archivo_extension,1,3),$arr_video)): ?>
        <!-- controlsList="nodownload" -->
        <video controls  width="170" height="97">
          <source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $bib->archivo_nombre; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
          </source>
        </video> 
        <?php else: ?>
         <img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/170x97-1/biblioteca/<?php echo @$bib->archivo_nombre; ?>" />
        <?php endif; ?>
      </div>
      <?php if ($count != 3): ?>
      <div class="font-grey-gallery"><?php echo $bib->nombre; ?> </div>
      </a> </div>
  </div>
  <?php else: ?>
  <?php if (intval($counttipo-3)>0): ?>
  <div class="mt-container bg-blue-opacity">
    <div class="mt-head-title">
      <h2><?php echo intval($counttipo-3); ?>+</h2>
      <?php echo ($tc->tipo_contenido_nombre); ?></div>
  </div>
  </a> </div>
</div>
	<?php else: ?>
  <div class="font-grey-gallery"><?php echo $bib->nombre; ?> </div>
      </a> </div>
  </div>
    <?php endif; ?>
<?php break;
	  endif; ?>
<?php endforeach; ?>
</div>
<div class="clear-fix"></div>

<!-- end item -->
<?php 				endif;
			endforeach;
		endif; ?>
