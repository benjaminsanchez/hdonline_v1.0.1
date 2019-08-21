  <div class="portlet light portlet-fit">
              <div class="portlet-body font-blue-dark">
                <h4 class="caption-subject bold"><?php echo $seccion->nombre; ?></h4>
                <div class="caption-desc ">
                 <?php echo limitStrlen($seccion->contenido_enriquecido,150); ?>
            
      <div class="btn-arrow-link text-center margin-top-30">
        <button type="button" class="btn blue pad" onClick="window.location.href='<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>'"> LEER MÁS </button>
      </div>
   
                </div>
              </div>
            </div>