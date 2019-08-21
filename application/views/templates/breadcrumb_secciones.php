 <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
      <ol class="breadcrumb">
        <li> <a href="<?php echo base_url(); ?>dashboard"><?php echo $LG["mi_escritorio"]; ?></a> </li>
        <?php if ($seccion->url_padre != ""): ?>
         <li><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion_padre."/".$seccion->url_padre;  ?>"><?php echo $seccion->seccion_padre_nombre; ?></a></li>
        <?php endif; ?>
      
        <?php if (@$evento->titulo != "" || @$novedad->titulo != "" || @$programa->contenido_titulo != "" || @$promocion->titulo != ""): ?>
        <li class="active"><a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion."/".$seccion->url;  ?>"><?php echo $seccion->nombre; ?></a></li>
        <li class="active"><?php echo @$evento->titulo.@$novedad->titulo.@$programa->contenido_titulo.@$promocion->titulo ; ?></li>
        <?php else: ?>
          <li class="active"><?php echo $seccion->nombre; ?></li>
		<?php endif; ?>
      </ol>
      <h1 class="<?php echo (@$promocion->titulo != "") ?"relative" :""; ?>"><?php echo (@$promocion->titulo != "") ? @$promocion->titulo : $seccion->nombre; ?></h1>
    </div>
    
    <!-- END BREADCRUMBS --> 