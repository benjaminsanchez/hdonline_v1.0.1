<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="page-content white">
    <?php $this->load->view('templates/breadcrumb_secciones'); ?>
    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
    <div class="page-content-container">
      <div class="page-content-row">
        <?php $this->load->view("templates/sidebar_tpl.php"); ?>
        <div class="page-content-col"> 
          <!-- BEGIN PAGE BASE CONTENT -->
          <div class="blog-page blog-content-1 videolist"> 
            
            <!-- FILTER -->
            <?php $this->load->view("templates/filters"); ?>
            <!-- END FILTER -->
            
            <?php
			if (count($secciones_tipos_contenidos)>0):
			if ($secciones_tipos_contenidos): 
				foreach ($secciones_tipos_contenidos as $tc): 
					$counttipo = count($biblioteca[$tc->id_tipo_contenido]);
					if ($counttipo>0): ?>
            
            <!-- BEGIN BREADCRUMBS -->
            <?php if (in_array("categoria",$secciones_campos)) : ?>
            <h4 class="relative bold text-bold uppercase text-uppercase"><?php echo ($tc->tipo_contenido_nombre); ?></h4>
            <?php endif; ?>
            <!-- END BREADCRUMBS --> 
            <!-- START CAROUSEL -->
            <div class="row">
              <div class="col-md-12"> 
                
                <!-- Wrapper for slides -->
                <div class="row" role="">
                  <?php $count=0; foreach ($biblioteca[$tc->id_tipo_contenido] as $bib): $count++; ?>
                  
                  <!-- item -->
                  <div class="col-md-3 ">
                       
                    <video controls controlsList="nodownload" width="100%" height="153">
                      <source src="<?php echo base_url(); ?>uploads/<?php echo $localizacion; ?>/biblioteca/<?php echo $bib->archivo_nombre; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                      </source>
                    </video>
                    <div class="caption">
                      <?php if (in_array("titulo",$secciones_campos)) : ?>
                      <h4><?php echo $bib->nombre; ?></h4>
                      <?php endif; ?>
                      <?php if (in_array("descripcion",$secciones_campos)) : ?>
                      <?php echo $bib->comentario; ?>
                      <?php endif; ?>
                    </div>
                    
                       <!-- blog config --> 
                    <div class="blog-config">
                      <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                      <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                          <li> <a href="javascript:;" class="biblioteca" data-url="<?php echo base_url(); ?>biblioteca/edit/<?php echo $bib->id_biblioteca; ?>?open=fotovideo"><?php echo $L["editar"]; ?></a></li>
                          <?php if ($bib->mantener_arriba == "0"): ?>
                              <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="biblioteca" data-key="id_biblioteca" data-id="<?php echo $bib->id_biblioteca; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                              
							  <?php endif; ?>
                 
                        </ul>
                      </div>
                      <?php endif; ?>
                    </div>
                    <!-- end blog config --> 
                  </div>
                  <!-- item -->
                  
                  <?php endforeach; ?>
                  <!-- Controls --> 
                  
                </div>
                <hr>
              </div>
            </div>
            <?php else: ?>
            <?php endif; ?>
            <?php
				endforeach;
			endif;
			
			 ?>
            <?php else: ?>
            <div class="note note-info note-bordered">
              <p><?php echo $L["sin_resultados"]; ?> </p>
            </div>
            <?php endif; ?>
            <?php if (@$count == 0): ?>
            <div class="note note-info note-bordered">
              <p><?php echo $L["sin_resultados"]; ?> </p>
            </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-12" style="height:200px;">&nbsp;</div>
            </div>
          </div>
          <!-- END CAROUSEL --> 
        </div>
        <!-- END PAGE BASE CONTENT --> 
      </div>
      <!-- END PAGE BASE CONTENT --> 
    </div>
  </div>
</div>
<!-- END SIDEBAR CONTENT LAYOUT -->
</div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script language="javascript">
$(document).ready(function(e) {
   $('.slider').slick({
		infinite: false,
		slidesToShow: 4,
		slidesToScroll: 2,
		dots: true,
		arrows: false
	}); 
});

</script>