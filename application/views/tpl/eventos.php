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
        <div class="blog-page blog-content-1"> 
          
          <!-- FILTER -->
          <?php $this->load->view("templates/filters"); ?>
          <!-- END FILTER -->
          <div class="row">
            <div class="col-md-12">
              <?php
			$count=0;
			$counttotal =0;
			$total = count($eventos); 
			if ($total>0):
			foreach ($eventos as $evento): $count++;$counttotal++; ?>
              <?php if ($count==1): ?>
              <div class="row">
                <?php endif; ?>
                <?php 	if ($seccion->columnas == 2): ?>
                <div class="col-md-6">
                  <?php endif; ?>
                  <?php 	if ($seccion->columnas == 3): ?>
                  <div class="col-md-4">
                    <?php endif; ?>
                    
                    <!-- START ITEM -->
                    <div class="blog-banner blog-container" style="background-image:url('<?php echo base_url(); ?>img/<?php echo $localizacion; ?>/700x376-1/biblioteca/<?php echo $evento->archivo_nombre; ?>'); height:300px">
                      <div class="blog-data-container"> <a href="<?php echo base_url(); ?>seccion/<?php echo $seccion->id_seccion; ?>/<?php echo $seccion->url; ?>/<?php echo $evento->id_evento; ?>/<?php echo $evento->url_titulo; ?>">
                        <div class="blog-title">
                          <?php if (in_array("titulo",$secciones_campos)) : ?>
                          <h4 class="blog-banner-title"><?php echo $evento->titulo; ?></h4>
                          <?php endif; ?>
                          <?php if (in_array("fecha",$secciones_campos)) : ?>
                          <h5><?php echo fecha($evento->vigencia_desde); ?></h5>
                          <?php endif; ?>
                          <?php if (in_array("ubicacion",$secciones_campos)) : ?>
                          <p><i class="fa fa-map-marker"></i> <?php echo ($evento->evento_ubicacion); ?></p>
                          <?php endif; ?>
                        </div>
                        </a> 
                        <!-- blog config -->
                        <div class="blog-config">
                          <?php if (@$usuario_administrador == 1 && $usuarioPerfil->admin_colaborador == "on"): ?>
                          <div class="btn-group">
                            <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-gear font-default"></i> </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                              <li> <a href="<?php echo base_url(); ?>edit/eventos?id_evento=<?php echo $evento->id_evento; ?>"><?php echo $L["editar"]; ?></a></li>
                              <?php if ($evento->mantener_arriba == "0"): ?>
                              <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["enviar_arriba_listado"]; ?>" data-accion="mantener_arriba" data-table="eventos" data-key="id_evento" data-id="<?php echo $evento->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["enviar_arriba_listado"]; ?> </a></li>
                              <?php endif; ?>
                              <li> <a href="javascript:;" data-nombre_accion="<?php echo $L["marcar_borrador"]; ?>"  data-accion="borrador" data-table="eventos" data-key="id_evento" data-id="<?php echo $evento->id_evento; ?>" class="btn_accion_ajax"><?php echo $L["borrador"]; ?></a></li>
                              <li> <a href="<?php echo base_url(); ?>delete/eventos?id_evento=<?php echo $evento->id_evento; ?>"><?php echo $L["eliminar"]; ?></a></li>
                            </ul>
                          </div>
                          <?php endif; ?>
                        </div>
                        <!-- end blog config --> 
                        <!--
                    <div class="blog-download">
                      <button type="button" class="btn dropdown-toggle bg-transparent" data-toggle="dropdown"> <i class="fa fa-download font-default"></i> </button>
                    </div>
                    
                    --> 
                      </div>
                    </div>
                    <!-- END ITEM -->
                    
                    <?php 	if ($seccion->columnas == 2):  
		   				if ($count==2): 
							$count = 0;
							echo '</div>';
						elseif ($counttotal == $total):
							echo '</div>';
						endif;
		   
		   ?>
                  </div>
                  <?php endif; ?>
                  <?php 	if ($seccion->columnas == 3):
						if ($count==3): 
							$count = 0;
							echo '</div>';
						elseif ($counttotal == $total):
							echo '</div>';
						endif;
			 ?>
                </div>
                <?php endif; ?>
                <?php endforeach; ?>
                
                
                   <?php 	
				   			if ($seccion->columnas == 3):
				   				if ($count==1) echo '</div></div>';
				   				if ($count==2) echo '</div>';
				   			endif;
							
							if ($seccion->columnas == 2):
								if ($count==1) echo '</div>';
							endif; ?>
                
                         <?php $this->load->view('templates/pager'); ?>
                
                <?php else: ?>
                <div class="note note-info note-bordered">
                  <p> <?php echo $L["no_hay_eventos"]; ?></p>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <!-- END PAGE BASE CONTENT --> 
        </div>
      </div>
    </div>
    <!-- END SIDEBAR CONTENT LAYOUT --> 
  </div>
</div>
<?php $this->load->view('templates/footer'); ?>
<script>
$(".blog-data-container").not(".blog-config").on("click", function() {
	var href = $(this).find("a").attr("href");	
	document.location.href = href;

});
</script> 
