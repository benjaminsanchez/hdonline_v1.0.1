<?php if (count($seccion->data)>0): ?>


    <div class="portlet-body"> 
      <!-- START CAROUSEL -->
      <div id="carousel-programs-box" class="carousel slide" data-ride="carousel"  style="overflow:hidden"> 
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php
		 	  $count = 0;
			  foreach ($seccion->data as $prog): ?>
          <li data-target="#carousel-programs-box" data-slide-to="<?php echo $count; ?>" <?php if ($count==0): ?> class="active" <?php endif; ?>></li>
        <?php $count++; 
			  endforeach; ?>
        </ol>
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox" >
        <?php
		 	  $count = 0;
			  foreach ($seccion->data as $prog): ?>
        <!-- start item -->
          <div class="item <?php if ($count==0): ?>active<?php endif; ?>"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $prog->id_incentivo; ?>/<?php echo $prog->url_titulo; ?>"><img src="<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/889x392-1/biblioteca/<?php echo $prog->archivo_nombre; ?>" alt="<?php echo $prog->titulo; ?>" height="392">
            <div class="carousel-caption"> <?php echo $prog->titulo; ?></div>
            </a>
          </div>
        <!-- end item -->  
           <?php 
		   		$count++; 
		   		endforeach; ?>
         
        </div>
         
        <!-- Controls --> 
        
        <a class="left carousel-control" href="#carousel-programs-box" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-programs-box" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
      <!-- END CAROUSEL --> 
      
    </div>
    <div class="scroller-footer" style="margin-top:30px">
      <div class="btn-arrow-link text-center">
        <button type="button" class="btn blue pad"  onClick="window.location.href='<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>'"> VER TODOS </button>
      </div>
    </div>
<?php 
endif; ?>